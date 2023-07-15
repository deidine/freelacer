<?php
session_start();

// include "../includes/backend/settings.php";
// include "../dbconf/dbConnetion.php";

//     $dbConnObj = new dbConnetion();

class User
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

    // -----------------------------------------------------------------------

    function uniqueRefCheck($conn, $sql_table, $referenceNumber)
    {
        $searchQuery = "SELECT * FROM $sql_table WHERE bookingRefNo = '$referenceNumber'";
        return mysqli_query($conn, $searchQuery)->num_rows === 0;
    }
    // -----------------------------------------------------------------------
    function register_user()
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

        $email = $username = $password = $confirm_password   = "";
        $email_err = $username_err = $password_err = $confirm_password_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $image = $_FILES["workerimage"]["name"];
            move_uploaded_file($_FILES["workerimage"]["tmp_name"], "userimages/" . $_FILES["workerimage"]["name"]);
            // $description = $_POST['description'];
            // Validate username
            $usernameTrimmed = trim($_POST["username"]);
            if (empty($usernameTrimmed)) {
                $username_err = "Please enter a username.";
            } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
                $username_err = "Username can only contain letters, numbers, and underscores.";
            } else {

                // Prepare a select statement
                $sql = "SELECT id FROM user WHERE username = ?";

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Bind variables to the prepared statement as parameters & to prevent SQL injection
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    // Set parameters
                    $param_username = trim($_POST["username"]);

                    // Attempt to execute the prepared statement
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

                    // Close statement
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

            // Validate confirm password
            $passwordTrimmed = trim($_POST["confirm_password"]);
            if (empty($passwordTrimmed)) {
                $confirm_password_err = "Please confirm password.";
            } else {
                $confirm_password = trim($_POST["confirm_password"]);
                if (empty($password_err) && ($password != $confirm_password)) {
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if (empty($username_err) && (empty($email_err) && empty($password_err) && empty($confirm_password_err))) {

                // Prepare an insert statement
                $sql = "INSERT INTO user ( `username`, `email`, `password`, `image`, `phone`) VALUES (?,?, ?, ?, ? )";

                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Bind variables to the prepared statement as parameters & to prevent SQL injection
                    mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_email,  $param_password, $image, $phone);

                    // Set parameters
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $param_email = $email;
                    $param_username = $username;
                    $_SESSION["username"] = $email;
                    $_SESSION["Usrloggedin"] = true;

                    $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                    if (mysqli_stmt_execute($stmt)) {
                        $this->sweetAlertMsgReturn("Welcome!", "You Are Successfully Registered!", "success", "OK", "../login.php");
                        return true;
                    } else {
                        $this->sweetAlertMsg("Oh No...", "Error Occurred = $conn->error", "error", "OK");
                        return false;
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }

            // Close connection
            mysqli_close($conn);
        }
    }


    //-----------------------------------------------------------------------------------------------
    function addcustomer()
    {
        $conn = $GLOBALS['con'];

        // Define variables and initialize with empty values
        global $fName;
        global $lName;
        global $customerName;
        global $phoneNumber;
        global $email;

        global $fName_err;
        global $lName_err;
        global $phoneNumber_err;


        $fName
            = $lName
            = $unitNumber
            = $phoneNumber = $email = "";

        $fName_err
            = $lName_err
            = $phoneNumber_err  = "";

        // Include config file
        // include "../includes/backend/settings.php";

        date_default_timezone_set('Pacific/Auckland');

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validate fName
            $fNameTrimmed = trim($_POST["fName"]);
            if (empty($fNameTrimmed)) {
                $fName_err = "Please enter a First Name.";
            } else {
                $fName = trim($_POST["fName"]);
            }

            // Validate lName
            $lNameTrimmed = trim($_POST["lName"]);
            if (empty($lNameTrimmed)) {
                $lName_err = "Please enter a Last Name.";
            } else {
                $lName = trim($_POST["lName"]);
            }
            $description = trim($_POST["description"]);
            if (empty($description)) {
                $description_err = "Please enter a descr.";
            } else {
                $lName = trim($_POST["lName"]);
            }

            // Validate phoneNumber
            $phoneNumberTrimmed = trim($_POST["phone"]);
            $email = trim($_POST["email"]);
            if (empty($phoneNumberTrimmed)) {
                $phoneNumber_err = "Please enter a valid phone number.";
            } else if (is_numeric($phoneNumberTrimmed)) {
                $phoneNumber = $_POST['phone'];
            } else {
                $phoneNumber_err = "Please enter a valid phone number. (eg. 0221234567)";
            }

            // Check input errors before inserting in database
            if (empty($fName_err) && (empty($lName_err) && (empty($phoneNumber_err)))) {

                $customerName = $fName . " " . $lName;
                $status = 'Unassigned';
                $type_service = $_POST['inlineRadioOptions'];
                $assignedBy = 'None';

                // Generate a Unique reference number the first three characters are upper case “BRN”, then the rest five character are digits.
                $digits = 5;
                $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

                $sql_table = "customer";

                // Check if the reference number is unique in the database
                while (!$this->uniqueRefCheck($conn, $sql_table, $referenceNumber)) {
                    $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                }
                $notification = "number => " . $referenceNumber . "> name => " . $customerName;
                // $query2 = "INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES ('$referenceNumber', '$customerName', '$type_service', '$description', 'unread', CURRENT_TIMESTAMP)";
                // mysqli_query($conn, $query2);
                $date = $_POST['date'];
                // If the date is the SAME as today, NEED to check for PICK-UP TIME
                $sql = "INSERT INTO $sql_table (
                            `bookingRefNo`, 
                             `customerName`,
                             `phoneNumber`,
                            `email`, 
                            `status`, `type_service`, `assignedBy`,`description`,`bookdate`,`status2`, `date`
        ) 
        VALUES
            (
                '$referenceNumber', 
                '$customerName',
                '$phoneNumber',
                 '$email', 
                 '$status', 
                 '$type_service', '$assignedBy','$description','$date', 'unread', CURRENT_TIMESTAMP
            )
        ";

                if ($conn->query($sql) === true) {
                    $this->sweetAlertMsgReturn("Thank you for your booking!", "Booking reference number: $referenceNumber  ", "success", "Aww yiss!", "../index.php");
                    // header("location:index.php");
                } else {
                    $this->sweetAlertMsg("Oh No...", "Error Occurred = $conn->error", "error", "OK");
                }
            } else {
                $this->sweetAlertMsg("Oh No...", "Error Occurred, please recheck your pick-up TIME", "error", "OK");
            }

            // If the date is NOT the same as today, NO NEED to check for PICK-UP TIME
        }

        $conn->close();
    }

    //-----------------------------------------------------------------------------------------------
    function updatecustomer($idupdate)
    {
        $conn = $GLOBALS['con'];

        // Define variables and initialize with empty values
        global $fName;
        global $lName;
        global $customerName;
        global $phoneNumber;
        global $email;

        global $fName_err;
        global $lName_err;
        global $phoneNumber_err;


        $fName
            = $lName
            = $unitNumber
            = $phoneNumber = $email = "";

        $fName_err
            = $lName_err
            = $phoneNumber_err  = "";

        // Include config file
        // include "../includes/backend/settings.php";

        date_default_timezone_set('Pacific/Auckland');

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Validate fName
            $fNameTrimmed = trim($_POST["fName"]);
            if (empty($fNameTrimmed)) {
                $fName_err = "Please enter a First Name.";
            } else {
                $fName = trim($_POST["fName"]);
            }
 
            $description = trim($_POST["description"]);
            if (empty($description)) {
                $description_err = "Please enter a descr.";
            } else {
                // $lName = trim($_POST["lName"]);
            }

            // Validate phoneNumber
             

            // Check input errors before inserting in database
            if (empty($fName_err) && (empty($lName_err) && (empty($phoneNumber_err)))) {

                $customerName = $fName  ;
                $status = 'Unassigned';
                $type_service = $_POST['inlineRadioOptions'];
                $assignedBy = 'None';

                // Generate a Unique reference number the first three characters are upper case “BRN”, then the rest five character are digits.
                $digits = 5;
                $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

                $sql_table = "customer";

                // Check if the reference number is unique in the database
                while (!$this->uniqueRefCheck($conn, $sql_table, $referenceNumber)) {
                    $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                }
                $notification = "number => " . $referenceNumber . "> name => " . $customerName;
                // $query2 = "INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES ('$referenceNumber', '$customerName', '$type_service', '$description', 'unread', CURRENT_TIMESTAMP)";
                // mysqli_query($conn, $query2);
                $date = $_POST['date'];
                // If the date is the SAME as today, NEED to check for PICK-UP TIME
                $sql = "UPDATE   $sql_table set 
                           
                            --  `customerName`='$customerName',
                            --  `phoneNumber`='$phoneNumber',
                            -- `email`='$email', 
                            `status`='$status', `type_service`='$type_service',  
                            `description`='$description',`bookdate`='$date',`status2`='unread', `date`=CURRENT_TIMESTAMP
      Where   `bookingRefNo`='$idupdate'
        ";

                if ($conn->query($sql) === true) {
                    $this->sweetAlertMsgReturn("Thank you for your booking!", "Booking reference number: $referenceNumber  ", "success", "Aww yiss!", "../index.php");
                    // header("location:index.php");
                } else {
                    $this->sweetAlertMsg("Oh No...", "Error Occurred = $conn->error", "error", "OK");
                }
            } else {
                $this->sweetAlertMsg("Oh No...", "Error Occurred, please recheck your pick-up TIME", "error", "OK");
            }

            // If the date is NOT the same as today, NO NEED to check for PICK-UP TIME
        }

        $conn->close();
    }


    //-----------------------------------------

    function logoutUser()
    {
        if (!isset($_SESSION["username"])) {
            // If the user not logged, alert them

            $this->sweetAlertMsgReturn("Oh No...", "You Are Not Logged In, Please Log In First Buddy", "error", "OK", "../login.php");
        } else {
            // Unset all of the session variables
            $_SESSION = array();

            // Destroy the session.
            $_SESSION["Usrloggedin"] = false;
            $_SESSION["username"] = '';
            session_destroy();
            // If the user successfully  logged out, alert them
            $this->sweetAlertMsgReturn("think you", "Hope You Enjoy The Ride", "success", "OK", "../login.php");
            // header('location:../index.php');
            exit;
        }
    }
    //-----------------------------------------------------------------------------------------------

    function checkUserLoggedInRedirect($username, $password)
    {
        // Check if the user is already logged in, if yes then redirect him to admin page
        if (isset($_SESSION["email"]) && $_SESSION["Usrloggedin"] === true) {
            header("location: ../index.php");
            exit;
        } else {
            $this->validateUserLogin($username, $password);
        }
    }

    //-----------------------------------------------------------------------------------------------

    function validateUserEmail($email)
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
    //-----------------------------------------------------------------------------------------------

    function delete_service($id)
    {
        $con = $GLOBALS['con'];
        $sql = "delete from customer WHERE  bookingRefNo  = '$id'";
        mysqli_query($con, $sql);
        $sql1 = "SELECT 1 FROM customer WHERE  bookingRefNo  = '$id'";
        $result1 = mysqli_query($con, $sql1);

        if ($result1->num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }
    //-----------------------------------------------------------------------------------------------

    function viewUser($userId)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM user WHERE id = '$userId'";
        $results = mysqli_query($con, $sql);
        return $results;
    }
    public function validateUserLogin($username, $password)
    {
        $conn = $GLOBALS['con'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if username is empty
            $usernameTrimmed = trim($_POST["username"]);
            if (empty($usernameTrimmed)) {
                $username_err = "Please enter username.";
            } else {
                $username = trim($_POST["username"]);
            }

            // Check if password is empty
            $passwordTrimmed = trim($_POST["password"]);
            if (empty($passwordTrimmed)) {
                $password_err = "Please enter your password.";
            } else {
                $password = trim($_POST["password"]);
            }

            // Validate credentials
            if (empty($username_err) && empty($password_err)) {
                // Prepare a select statement
                $sql = "SELECT id, username, password FROM user  WHERE username = ?   ";
                // $query11 = "SELECT * FROM user WHERE username='$username'";

                // $result11 = mysqli_query($conn, $query11);
                // $res = mysqli_fetch_assoc($result11);
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    // Bind variables to the prepared statement as parameters & to prevent SQL injection
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    // Set parameters
                    $param_username = $username;
                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Store result
                        mysqli_stmt_store_result($stmt);

                        // Check if username exists, if yes then verify password
                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            // Bind result variables
                            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                            if (mysqli_stmt_fetch($stmt)) {
                                if (password_verify($password, $hashed_password)) {
                                    // Password is correct, so start a new session
                                    session_start();



                                    // $_SESSION["type_service"] = $res["type_service"];

                                    // Store data in session variables
                                    // $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    // glo   $username;
                                    $_SESSION["username"] = $username;

                                    // Redirect user to welcome page
                                    header("location: ../index.php");
                                } else {
                                    // Password is not valid, display a generic error message
                                    $this->sweetAlertMsgReturn("Oh No...", "Username Or Password is incorrect or contact admin deidine", "error", "Try Again","../login.php");
                                }
                            }
                        } else {
                            // Username doesn't exist, display a generic error message
                            $this->sweetAlertMsgReturn("Oh No...", "Username Or Password is incorrect or contact admin adddd", "error", "Try Again","../login.php");
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }

            // Close connection
            mysqli_close($conn);
        }
    }
}
