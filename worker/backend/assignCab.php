<?php

/*
|--------------------------------------------------------------------------
| Access Restriction
|--------------------------------------------------------------------------
|
| Here is the declaration that user or visitor
| can access the page
| all the define('MY_CONSTANT', 1) meaning pages that can be access.
|
*/

// define('MY_CONSTANT', 1);

/*
|--------------------------------------------------------------------------
| Require dbconf/settings.php
|--------------------------------------------------------------------------
|
| include file
| dbconf/settings.php
| for connect to database
|
*/

// require dirname(__FILE__) . "/../dbconf/settings.php";

/*
|--------------------------------------------------------------------------
| Initialize the session
|--------------------------------------------------------------------------
|
| creates a session or resumes the current one
| based on a session identifier passed via
| a GET or POST request, or passed via a cookie.
|
*/

session_start();
// include "../mvc/dbConnetion.php";
include "../../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
    $conn=$GLOBALS["con"];    
    session_start();
    $serv =  $_SESSION["type_service"];

// Here we will grab value from ajax
// onClick="updateAssignCab($row["bookingRefNo"])
// then it will update the passengers data on the database
if (isset($_GET["q"]) && !empty($_GET["q"])) {
    $bookingRefNo = $_GET["q"];
    $driver_name = $_SESSION["username"];

    $update = "UPDATE customer SET status = 'Assigned',  assignedBy = '" . $driver_name . "' WHERE bookingRefNo = '" . $bookingRefNo . "'";

    if ($conn->query($update) === true) {
        echo "Booking request '" . $bookingRefNo . "' has been assigned! For '" . $driver_name . "'";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    $conn->close();
}
