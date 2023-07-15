<?php
// use ;
// namespace worker\mvc;
include "../frontend/header.php";
require_once ("worker.php");
// require_once ("booking.php");
$workerObj = new  worker();
// $bookObj = new  booking();

if (isset($_REQUEST["status"])) {
 
    $status = $_REQUEST["status"];

    switch ($status) {

        case "login_worker": 
            $workerObj->checkUserLoggedInRedirect( );
          break;
          case "logout_worker": 
            $workerObj->logoutWorkers();
          break;
           
 case "register_worker":
    $workerObj->registerworkers();
    break;
case "show_all_book":
    // $bookObj->show_all_book(); 
    break; 
    }
}
