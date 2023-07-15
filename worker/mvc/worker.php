<?php
session_start();
// define('MY_CONSTANT', 1);
include "../../dbconf/dbConnetion.php";
$dbConnObj = new dbConnetion();

class worker
{


    function sweetAlertMsg($title, $text, $icon, $btn)
    {
        echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
    <script type="text/javascript">

    $(document).ready(function(){

        swal({
            html: true,
            title: "' . $title . '",
            text: "' . $text . '",
            icon: "' . $icon . '",
            button: "' . $btn . '",
        })
          });

    </script>
    ';
    }

    function sweetAlertMsgReturn($title, $text, $icon, $btn, $return)
    {
        echo '
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
 
    <script type="text/javascript">

    $(document).ready(function(){

        swal({
            html: true,
            title: "' . $title . '",
            text: "' . $text . '",
            icon: "' . $icon . '",
            button: "' . $btn . '",
        }).then(function() {
            window.location.href = "' . $return . '";
        })
          });

    </script>
    ';
    }

    function checkUserLoggedInRedirect()
    {
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: ../index.php");
            exit;
        } else {
            $this->loginworkers();
        }
    }


    function loginworkers()
    {
        $conn = $GLOBALS['con'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $usernameTrimmed = trim($_POST["username"]);
            if (empty($usernameTrimmed)) {
                $username_err = "Please enter username.";
            } else {
                $username = trim($_POST["username"]);
            }

            $passwordTrimmed = trim($_POST["password"]);
            if (empty($passwordTrimmed)) {
                $password_err = "Please enter your password.";
            } else {
                $password = trim($_POST["password"]);
            }

            if (empty($username_err) && empty($password_err)) {
                $sql = "SELECT id, username, password FROM worker  WHERE username = ? and   status=1 ";
                $query11 = "SELECT * FROM worker WHERE username='$username'";

                $result11 = mysqli_query($conn, $query11);
                $res = mysqli_fetch_assoc($result11);
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    $param_username = $username;

                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_store_result($stmt);

                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                            if (mysqli_stmt_fetch($stmt)) {
                                if (password_verify($password, $hashed_password)) {
                                    session_start();



                                    $_SESSION["type_service"] = $res["type_service"];

                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["username"] = $username;

                                    header("location: ../index.php");
                                } else {
                                    $this->sweetAlertMsgReturn("Oh No...", "Username Or Password is incorrect or contact admin", "error", "Try Again","../login.php");
                                }
                            }
                        } else {
                            $this->sweetAlertMsgReturn("Oh No...", "Username Or Password is incorrect or contact admin", "error", "Try Again","../login.php");
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    mysqli_stmt_close($stmt);
                }
            }

            mysqli_close($conn);
        }
    }

    function registerworkers()
    {
        $conn = $GLOBALS['con'];

        global $email;
        global $username;
        global $phone;
        global $description;
        global $password;
        global $confirm_password;
        global $email_err;
        global $username_err;
        global $password_err;
        global $confirm_password_err;

        $email = $username = $password = $confirm_password = $cars = "";
        $email_err = $username_err = $password_err = $confirm_password_err = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $image = $_FILES["workerimage"]["name"];
            move_uploaded_file($_FILES["workerimage"]["tmp_name"], "../workerimages/" . $_FILES["workerimage"]["name"]);
            $description = $_POST['description'];
            $usernameTrimmed = trim($_POST["username"]);
            if (empty($usernameTrimmed)) {
                $username_err = "Please enter a username.";
            } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
                $username_err = "Username can only contain letters, numbers, and underscores.";
            } else {

                $sql = "SELECT id FROM worker WHERE username = ?";

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    $param_username = trim($_POST["username"]);

                    if (mysqli_stmt_execute($stmt)) {
                        /* store result */
                        mysqli_stmt_store_result($stmt);

                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            $username_err = "This username is already taken.";
                        } else {
                            $username = trim($_POST["username"]);
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    mysqli_stmt_close($stmt);
                }
            }

            $passwordTrimmed = trim($_POST["email"]);
            if (empty($passwordTrimmed)) {
                $password_err = "Please enter a password.";
            } elseif (strlen(trim($_POST["password"])) < 6) {
                $password_err = "Password must have at least 6 characters.";
            } else {
                $password = trim($_POST["password"]);
            }

            $passwordTrimmed = trim($_POST["confirm_password"]);
            if (empty($passwordTrimmed)) {
                $confirm_password_err = "Please confirm password.";
            } else {
                $confirm_password = trim($_POST["confirm_password"]);
                if (empty($password_err) && ($password != $confirm_password)) {
                    $confirm_password_err = "Password did not match.";
                }
            }

            if (empty($username_err) && (empty($email_err) && empty($password_err) && empty($confirm_password_err))) {

                $sql = "INSERT INTO worker (email, username, password, type_service,image,status,phone,description,logi_type) VALUES (?,?, ?, ?, ?,'0',?,?,'worker')";

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sssssss", $param_email, $param_username, $param_password, $param_cars, $image, $phone, $description);

                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $param_email = $email;
                    $param_username = $username;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                    // Array Permission Type For Cars
                    $permissionList = [];
                    foreach ($_POST["carsAvailabilityCheckBox"] as $check) {
                        array_push($permissionList, $check);
                    }
                    $_permissionTypeList = implode(", ", $permissionList);
                    $param_cars = $_permissionTypeList;

                    if (mysqli_stmt_execute($stmt)) {
                        $this->sweetAlertMsgReturn("Welcome!", "You Are Successfully Registered!", "success", "OK", "../login.php");
                    } else {
                        $this->sweetAlertMsg("Oh No...", "Error Occurred = $conn->error", "error", "OK");
                    }

                    mysqli_stmt_close($stmt);
                }
            }

            mysqli_close($conn);
        }
    }


    function validateWorkerEmail($email)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT 1 FROM customer WHERE  email = '$email'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    function viewWorker($WorkerId)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM customer WHERE id = '$WorkerId'";
        $results = mysqli_query($con, $sql);
        return $results;
    }
    public function validateWorkerLogin($email, $phone)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM customer where "
            . " email = '$email'"
            . " AND phoneNumber = '$phone'";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    function logoutWorkers()
    {
        if (!isset($_SESSION["username"])) {
            // If the user not logged, alert them

            $this->sweetAlertMsgReturn("Oh No...", "You Are Not Logged In, Please Log In First Buddy", "error", "OK", "../login.php");
            // echo $_SESSION["username"];
        } else {
            // Unset all of the session variables
            $_SESSION = array();
            // echo "hi";

            // Destroy the session.
            $_SESSION["loggedin"] = false;
            $_SESSION["username"] = "";
            session_destroy();
            // If the user successfully  logged out, alert them
            $this->sweetAlertMsgReturn("think you", "Hope You Enjoy The Ride", "success", "OK", "../index.php");
            // header('location:../../index.php');
            exit;
        }
    }

 
}
