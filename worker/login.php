<?php
//  $workwe = new Worker();?>
 <!DOCTYPE html>
 <html>

 <?php
    define('MY_CONSTANT', 1);
    session_start();
    $title = "Login Drivers | Cabs Online";
    // include "mvc/worker.php ";
    include "frontend/header.php";

    // $workwe->checkUserLoggedInRedirect();
    ?>
    <head>
    </head>
 <body>
        <?php 
        include "frontend/nav.php";
        ?>

     <!-- Start: Login Form Clean -->
     <section class="login-clean" style="padding-top: 180px;">
         <form action="mvc/worker_controler.php?status=login_worker" method="POST">
             <?php

                $username = $password = "";
                $username_err = $password_err = $login_err = "";

                if (!empty($login_err)) {
                    echo '<div class="alert alert-danger text-center">' . $login_err . '</div>';
                }
                ?>
             <div class="illustration">
                 <h1 style="font-size: 30px;color: rgb(197,173,50);"> Login
                     <img src="../assets/img/logo4.jpg" style="border-radius: 13px;" width="50px" height="50px">
                 </h1>

                 <!-- <i class="la la-taxi" style="color: rgb(254,209,54);"></i> -->
             </div>
             <div class="mb-3">
                 <input type="text" name="username" placeholder="Username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" required="">
                 <span class="invalid-feedback"><?php echo $username_err; ?></span>
             </div>
             <div class="mb-3">
                 <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required="">
                 <span class="invalid-feedback"><?php echo $password_err; ?></span>
             </div>
             <!-- <div class="mb-3">

                 <select class="form-select" name="login_type">
                     <option>worker</option>
                     <option>customer</option>
                 </select>
             </div> -->
             <div class="mb-3">
                 <button class="btn btn-primary d-block w-100" type="submit" style="background: rgb(254,209,54);">Log In</button>
             </div>
             <a class="already" href="register.php">You don't have an account yet? Register here.</a>
         </form>
     </section>
     <!-- End: Login Form Clean -->

     
 </body>

 </html>