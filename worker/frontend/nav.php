<?php

?>


<!-- <div style="margin-top: 100px;"></div> -->
<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">

    <!-- <div class="bottom d-flex w-100"> -->

    <a class="navbar-brand" href="../index.php">

        <img src="../assets/img/logo4.jpg" style="border-radius: 13px;" width="50px" height="50px">

        &nbsp;قادة المستقبل
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <span class="navbar-toggler-icon"></span> -->
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto text-uppercase">
                <li class="nav-item"  style="margin-top: 10px;"><a class="btn btn-primary" role="button" style="background: rgba(10,9,8,0.27);" href="index.php">admin</a></li>
                <?php if (isset($_SESSION["id"])) {
                ?>

                    <li class="nav-item"  style="margin-top: 10px;">
                        <a class="btn btn-primary mx-1 mb-2" role="button" href="profile.php?wid=<?php echo $_SESSION["id"]; ?>">
                            my profile </a>
                            <a class="btn btn-primary mx-1 mb-2" role="button" href="notification.php">
                         <i class="fa fa-envelope"></i>&nbsp;اشعارات&nbsp; جديدة
                         <?php
                            $serv =  $_SESSION["type_service"];
                            $conn = $GLOBALS['con'];

                            $query2 = "SELECT * from `customer` where `status` = 'unread' and type_service='$serv' order by `date` DESC";
                            $res =  mysqli_query($conn, $query2);
                            if (mysqli_num_rows($res) > 0) {
                            ?>
                             <span class="badge badge-dark"><?php echo mysqli_num_rows($res); ?></span>
                         <?php
                            } else echo "0";
                            ?>
                     </a>

                            <a class="btn btn-primary mx-1 mb-2" role="button" href="mvc/worker_controler.php?status=logout_worker">
                            خروج </a>
                            <?php } ?>
                    </li>
                    <!-- <li class="nav-item"><a class="nav-link" href="index.php#about">خدمات</a></li>
                    <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary" role="button" style="background: rgba(10,9,8,0.27);" href="booking.php">حجز خدمات</a></li>
                    <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-book" role="button" href="register.php">تسجيل كعضو في الفريق</a></li> -->

                    <li class="nav-item" style="margin-left: 10px;">
                    </li>
            </ul>
        </div>
    </div>
    </div>
</nav>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>