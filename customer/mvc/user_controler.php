<?php

include "../../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
  
// session_start();
//  include "session.php";
// $conn = new mysqli($host, $user, $pswd, $dbnm);
// $email = $_SESSION['email'];
$con = $GLOBALS['con'];

if (isset($_REQUEST["status"])) {
    include 'user.php';

    $customerObj = new user();
    $status = $_REQUEST["status"];

    switch ($status) {
        case "register_user":
            if($customerObj->register_user()){
                header("location:../index.php");

            }else {
                // header("location:register.php");
echo "error";
            }
            break;
            case "delete_service":
                $idb=$_REQUEST["bookId"];
                if($customerObj->delete_service($idb)){
            $customerObj->sweetAlertMsgReturn("think you", "لقدم الحذف ", "success", "OK", "../index.php");

                    // header("location:index.php");

                } 
                break;
        case "login_customer":


            $username = $_REQUEST["username"];

            $password = $_REQUEST["password"];
        
            try {

                $isValid = $customerObj->validateUserLogin($username, $password);
                echo $isValid;


                // $patemail = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                // $patphone = "/^[0-9]{10}$/";

                // if (!preg_match($patemail, $email)) {
                //     throw new Exception("Invalid Email Addess");
                // }
                // if (!preg_match($patphone, $phone)) {
                //     throw new Exception("Invalid Phone Number");
                // }


                ///// Validating the existence of the email address
                if ($isValid) {
                    header("location:../index.php");
                    throw new Exception("Email Address is already taken!");
                } else {
                    //   <script>window.location = "admin.php" </script>
                    // header("location:admin.php");
                    echo "error";
                }
            } catch (Exception $ex) {
                $msg = $ex->getMessage();

                $msg = base64_encode($msg);

?>
                <!-- <script>window.location = "../view/customer/customer-signup.php?msg=<?php echo $msg; ?>" </script> -->
<?php
            }

            break;
        case "logout":
            $customerObj->logoutUser();
            break;
            case "insert_booking":
                $customerObj->addcustomer();
                break;      
                  case "update_booking":
                $idb=$_REQUEST["bookIdUp"];

                    $customerObj->updatecustomer($idb);
                    break;
    }
}
