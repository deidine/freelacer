 <?php
    include "session.php";
    include "../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();

    // session_start(); 
    // $conn = new mysqli($host, $user, $pswd, $dbnm);
    $username = $_SESSION['username'];
    $con = $GLOBALS['con'];

    $sql = "SELECT * FROM user u LEFT  join customer c on c.email=u.email where u.username = '$username'";
    $results = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($results);
    // echo $row;
    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <title>Freelancer profile</title>
     <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
     <?php
        include "frontend/head.html";
        ?>

 </head>

 <body>
     <?php
        include "frontend/nav.html";
        ?>

     <section class="contact-clean" style="margin-top: 75px;">


         <!-- <section id="about"> -->
         <div class="container">
             <div class="row row-about">

                 <div>
                     <div class="container hero">

                         <!--main body-->
                         <div style="padding:1% 3% 1% 3%;">
                             <div class="row">

                                 <!--Column 1-->
                                 <div class="col-lg-3">

                                     <!--Main profile card-->
                                     <div class="card" style="padding:20px 20px 5px 20px;">
                                         <p></p>
                                         <img src="userimages/<?php echo $row['image']; ?>" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">

                                         <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center" style="background-image: url('userimages/<?php echo $row['image']; ?>');margin-top:70px;"></div>
                                         <h2><?php echo $row['username']; ?></h2>

                                         <p><span class="glyphicon glyphicon-user"></span> </p>
                                         <ul class="list-group">
                                             <a href="message.php" class="list-group-item list-group-item-info">الرسائل</a>
                                             <a href="#" class="list-group-item list-group-item-info"> تغير معلوماتي</a>
                                             <a href="problem.php" class="list-group-item list-group-item-info">ابلاغ عن مشكلة</a>
                                             <a href="user_controler.php?status=logout" class="list-group-item list-group-item-info">خروج</a>
                                         </ul>
                                     </div>
                                     <!--End Main profile card-->
                                     <!--Contact Information-->
                                     <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                                         <div class="panel panel-success">
                                             <div class="panel-heading">
                                                 <h4>معلومات الاتصال</h4>
                                             </div>
                                         </div>
                                         <div class="panel panel-success">
                                             <div class="panel-heading">الايميل</div>
                                             <div class="panel-body"><?php echo $row['email']; ?></div>
                                         </div>
                                         <div class="panel panel-success">
                                             <div class="panel-heading">رقم الاتصال</div>
                                             <div class="panel-body"><?php echo $row['phone']; ?></div>
                                         </div>
                                         <div class="panel panel-success">
                                             <div class="panel-heading">تاريخ الحجز</div>
                                             <div class="panel-body"><?php echo $row['bookdate']; ?></div>
                                         </div>
                                     </div>
                                     <!--End Contact Information-->

                                     <!--Reputation-->
                                     <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                                         <div class="panel panel-warning">
                                             <div class="panel-heading">
                                                 <h4>Reputation</h4>
                                             </div>
                                         </div>
                                         <div class="panel panel-warning">
                                             <div class="panel-heading">Reviews</div>
                                             <div class="panel-body">Nothing to show</div>
                                         </div>
                                         <div class="panel panel-warning">
                                             <div class="panel-heading">Ratings</div>
                                             <div class="panel-body">Nothing to show</div>
                                         </div>
                                     </div>
                                     <!--End Reputation-->

                                 </div>
                                 <!--End Column 1-->

                                 <!--Column 2-->
                                 <div class="col-lg-7">

                                     <!--Freelancer Profile Details-->
                                     <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                                         <div class="panel panel-primary">
                                             <div class="panel-heading">
                                                 <h3>اهلا بكم في موقع قادة المستقبل نتمنى لكم احسن الاوقات </h3>
                                             </div>
                                         </div>

                                         <?php
                                            $sql1 = "SELECT * FROM user u LEFT  join customer c on c.email=u.email where u.username = '$username' ORDER BY u.id ASC  ";
                                            $results1 = mysqli_query($con, $sql1);
                                            $i = 0;
                                            while ($row1 = mysqli_fetch_assoc($results1)) {

                                                $i += 1;

                                            ?>
                                             <div class="panel panel-primary">
                                                 <div class="panel-heading"><?php echo $i . " "; ?>مواصفات طلبكم رقم </div>
                                                 <div class="panel-body">
                                                     <h4><?php echo $row1['description']; ?></h4>
                                                 </div>
                                             </div>
                                             <div class="panel panel-primary">
                                                 <div class="panel-heading">نوعية الخدمة</div>
                                                 <div class="panel-body">
                                                     <h5><?php echo $row1['type_service']; ?></h5>
                                                 </div>
                                             </div>
                                             <div class="panel panel-primary">
                                                 <div class="panel-heading">حالة طلبكم</div>
                                                 <div class="panel-body">
                                                     <h4><?php $status = $row1['status'];
                                                            if ($status == "Assigned") {
                                                                echo "أخذه عامل ";
                                                            } else echo "لم يتم الاخذ بعد";
                                                            ?></h4>
                                                 </div>
                                             </div>
                                             <div class="panel panel-primary">
                                                 <div class="panel-heading">اسم العامل الذي ترشح للقيام بخدمتكم</div>
                                                 <div class="panel-body">
                                                     <h4><?php echo $row1['assignedBy']; ?></h4>
                                                 </div>
                                             </div>
                                             <div style="inline:block;"> <a href="mvc/user_controler.php?status=delete_service&bookId=<?php echo $row1['bookingRefNo']; ?>"> <button class="btn btn-danger">حذف</button></a>
                                                 <a href="update_booking.php?bookId=<?php echo $row1['bookingRefNo']; ?>"> <button class="btn btn-success">تغير</button></a>
                                             </div>
                                             <hr>
                                         <?php } ?>
                                     </div>
                                     <!--End Freelancer Profile Details-->

                                 </div>
                                 <!--End Column 2-->


                                 <!--Column 3-->
                                 <div class="col-lg-2">
                                     <!--My Wallet-->
                                     <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                                         <div class="panel panel-info">
                                             <div class="panel-heading">
                                                 <h3>My Wallet</h3>
                                             </div>
                                         </div>
                                         <ul class="list-group">
                                             <li class="list-group-item">Balance: $0.0</li>
                                             <li class="list-group-item">Hourly Rate: $3.0</li>
                                             <li class="list-group-item">Payment Method: </li>
                                             <li class="list-group-item">Withdraw</li>
                                         </ul>
                                     </div>
                                     <!--End My Wallet-->

                                     <!--Social Network Profiles-->
                                     <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                                         <div class="panel panel-info">
                                             <div class="panel-heading">
                                                 <h3>Social Network Profiles</h3>
                                             </div>
                                         </div>
                                         <ul class="list-group">
                                             <li class="list-group-item" style="font-size:20px;color:#3B579D;"><i class="fab fa-facebook-square"> Facebook</i></li>
                                             <li class="list-group-item" style="font-size:20px;color:#D34438;"><i class="fab fa-google-plus-square"> Google</i></li>
                                             <li class="list-group-item" style="font-size:20px;color:#2CAAE1;"><i class="fab fa-twitter-square"> Twitter</i></li>
                                             <li class="list-group-item" style="font-size:20px;color:#0274B3;"><i class="fab fa-linkedin"> Linkedin</i></li>
                                         </ul>
                                     </div>
                                     <!--End Social Network Profiles-->

                                 </div>
                                 <!--End Column 3-->

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!--End main body-->

     <?php
        include "frontend/footer.html";
        ?>

     <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 </body>

 </html>