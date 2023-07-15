<?php
// define('MY_CONSTANT', 1);

// $dbConnObj = new dbConnetion();

// require_once("../../includes/backend/settings.php");
// include "../../dbconf/dbConnetion.php";
// $dbConnObj = new dbConnetion();

class booking
{
    function assignBookingManual($bookingRefNo)
    {
        $conn = $GLOBALS['con'];

        // Check if bookingRefNo input by user in the text box
        if (isset($_POST["bsearch"]) && !empty($_POST["bsearch"])) {
            $worker_name = $_SESSION["username"];
            $update = "UPDATE customer SET status = 'Assigned',  assignedBy = '" . $worker_name . "' WHERE bookingRefNo = '" . $bookingRefNo . "'";
    
            $query = "SELECT * FROM customer WHERE bookingRefNo = '$bookingRefNo'";
    
            if ($result = mysqli_query($conn, $query)) {
                // Return the number of rows in result set
                $rowcount1 = mysqli_num_rows($result);
    
                // Check if bookingRefNo exist - If Exist
                if ($rowcount1 > 0) {
                    $query = "SELECT * FROM customer WHERE bookingRefNo = '$bookingRefNo' AND status = 'Unassigned'";
    
                    $result = mysqli_query($conn, $query);
                    // Return the number of rows in result set
                    $rowcount2 = mysqli_num_rows($result);
    
                    // Check if bookingRefNo is Unassigned - If Unassigned
                    if ($rowcount2 > 0) {
                        if ($conn->query($update) === true) {
                            // assigned bookingRefNo
                            sweetAlertMsgReturn("Congratulations!", "Booking request $bookingRefNo  \\nHas been assigned! For: $worker_name", "success", "OK!", "admin.php");
                        } else {
                            sweetAlertMsgReturn("Oh No...", "Error Occurred = $conn->error", "error", "OK","index.php");
                        }
                        // Check if bookingRefNo is Unassigned - If Assigned
                    } else {
                        sweetAlertMsgReturn("Oh No...", "This Booking Number Reference has already been Assigned", "error", "OK","index.php");
                    }
                    // Check if bookingRefNo exist - If NOT Exist
                } else {
                    sweetAlertMsgReturn("Oh No...", "This Booking Number Reference Is Not Exist", "error", "OK","index.php");
                }
            } 
        } else {
            // Check if bookingRefNo input by user in the text box
            sweetAlertMsgReturn("Oh No...", "Please Fill The Booking Reference", "error", "OK","index.php");
        }
    
        // Close connection
        // $conn->close();
    }
    

}
