 <!DOCTYPE html>
 <html>

 <head>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">


     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <?php
        include "frontend/header.php";
        ?>
 </head>
 <body>

 <?php


    // session_start();

    define('MY_CONSTANT', 1);

    // include "mvc/dbConnetion.php";
    include "../dbconf/dbConnetion.php";
    include "session.php";

    $db = new dbConnetion();
    $title = "Admin | Cabs Online";

    function sweetAlertMsgReturn($title, $text, $icon, $btn, $return)
    {
        echo '
<script type="text/javascript">

$(document).ready(function(){


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


    function checkUserLoggedIn()
    {
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {

            sweetAlertMsgReturn("Oh No...", "You Are Not Logged In, Please Log In First Buddy", "error", "OK", "login.php");

            header('location:login.php');
            exit();
        }
    }
    checkUserLoggedIn();
    if (isset($_POST['bsearch'])) {
        include "mvc/booking.php";
        $booking = new booking();

        $booking->assignBookingManual($_POST['bsearch']);
    }

    ?>

     <?php

        require "frontend/nav.php";
        // date_default_timezone_set('UTC'); 
        // $date= date("Y-m-d");
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo $date;
        ?>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

     
     <section>
         <!-- Start: Ludens - 1 Index Table with Search & Sort Filters  -->
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-6">

                     <h3 class="text-dark mb-4">اهلا بعودتك, <?php echo $_SESSION["username"]; ?> </h3>

                 </div>
                 <div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;">
                     <a class="btn btn-primary mx-1 mb-2" role="button" onclick="showall()">
                         <i class="fa fa-plus"></i>&nbsp;عرض كل الحجزات </a>


                     <a class="btn btn-primary mx-1 mb-2" role="button" onclick="showRecent()">
                         <i class="fa fa-plus"></i>&nbsp;عرض اليوم</a>


                         <a class="btn btn-primary mx-1 mb-2" role="button" onclick="showallNot()">
                         <i class="fa fa-plus"></i>&nbsp;عرض الحجزات التي لم تأخذ بعد </a>


                     <a class="btn btn-primary mx-1 mb-2" role="button" onclick="showallMy()">
                         
                         <i class="fa fa-plus"></i>&nbsp;عرض الحجزات اخذتها </a>
                 
                 </div>
             </div>
             <!-- Start: TableSorter -->
             <div class="card" id="TableSorterCard">
                 <div class="card-header py-3">
                     <div class="row table-topper align-items-center justify-content-between">
                         <div class="col-md-4 text-start">
                             <p class="text-primary m-0 fw-bold">كل الحجزات</p>
                         </div>
                         <div class="col-md-2 py-2 text-end">
                             <form class="form-inline" action="index.php" method="POST">
                                 <div class="row g-3 align-items-center">
                                     <div class="col-auto">
                                         <input class="form-control mb-2" type="text" name="bsearch" id="bsearch" placeholder="Booking Number">
                                     </div>

                                     <div class="col-auto">
                                         <button class="btn btn-primary flex-fill py-2 mb-2" type="submit">
                                             <i class="far fa-paper-plane"></i> عمل الخدمة
                                         </button>

                                         <a class="btn btn-primary flex-fill py-2 mb-2" role="button" name="sbutton" id="sbutton" onclick="searchWorkers(bsearch.value)">
                                             <i class="fas fa-search"></i></i> بحث </a>

                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-12">
                         <div class="table-responsive">
                             <div id="tableID">
                                 <b class="text-warning">الحجزات ستظهر هنا.</b>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- End: TableSorter -->
         </div>
         <!-- End: Ludens - 1 Index Table with Search & Sort Filters  -->
     </section>


     <?php

        include "frontend/footer.php";

        ?>
     <script src="frontend/admin.js?1"></script>
 </body>

 </html>