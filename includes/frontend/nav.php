<?php

/*
|--------------------------------------------------------------------------
| Access Restriction
|--------------------------------------------------------------------------
|
| Here is the declaration that user or visitor
| can access the page
| all the (!defined('MY_CONSTANT')) meaning pages that CANNOT be access.
|
*/

if (!defined('MY_CONSTANT')) {
    // You can show a message
    die('Access not allowed!');
    exit;  // This line is needed to stop script execution
}
?>

<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">

    <div class="container"><a class="navbar-brand" href="index.php">
            <img src="assets/img/logo4.jpg" style="border-radius: 13px;" width="50px" height="50px">
            &nbsp;قادة المستقبل</a>

        <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
         type="button" class="navbar-toggler navbar-toggler-right" 
         aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars"></i></button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto text-uppercase">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">عن الموقع</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#about">خدمات</a></li>
                <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary" role="button" style="background: rgba(10,9,8,0.27);" href="booking.php">حجز خدمات</a></li>
                <li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-book" role="button" href="worker/register.php">تسجيل كعضو في الفريق</a></li>

                <li class="nav-item" style="margin-left: 10px;">
                    <!-- <a class="btn btn-primary btn-login" role="button" href="login.php" style="background: rgb(99,168,231);">دخول</a></li> -->
                </li>
                <div class="dropdown dropright" style=" font-family: 'Roboto', sans-serif;">
                    <li class="nav-item" style="margin-top: 10px;">
                        <button type="button" style="background: rgb(99,168,231);" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" style="width: 120px; height: auto; font-size: 20px; font-family: 'Nunito', sans-serif; "> دخول </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" style="color: white;" href="customer/login.php">دخول كعميل </a>
                            <a class="dropdown-item" style="color: white;" href="worker/login.php">دخول كعامل</a>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>