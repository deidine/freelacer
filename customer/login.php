 
<!DOCTYPE html>
<html>

<?php
include "frontend/head.html";

// checkUserLoggedInRedirect();
?>
<style>
 
</style>

<body>
    <?php

  
    require "frontend/nav.html";
    


    ?> 
    <section class="login-clean" style="padding-top: 180px;">
        <form action="mvc/user_controler.php?status=login_customer" method="POST">
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
                <input type="text" name="username" placeholder="Username" class="form-control">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="password" class="form-control">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-block w-100" type="submit" style="background: rgb(254,209,54);">Log In</button>
            </div>
            <a class="already" href="register.php"><h5>>اذا لم تسجل بعد اضغط هنا</h5></a>
        </form>
    </section>
    <!-- End: Login Form Clean -->

    <?php

    /*
|--------------------------------------------------------------------------
| Require frontend/footer
|--------------------------------------------------------------------------
|
| include file
| frontend/footer
| for displaying the footer
|
*/

    require 'frontend/footer.html';

    ?>
</body>

</html>