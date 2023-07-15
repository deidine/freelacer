 
<!DOCTYPE html>
<html>

<?php

//   if (isset($_POST['signUp-button'])) {

 
//     registerworkers();
// }
require "frontend/head.html";

?>

<body>
    <?php

 

    require "frontend/nav.html";

    ?>
    <!-- Start: Registration Form with Photo -->
    <section class="register-photo" style="margin-top: 60px;">
        <!-- Start: Form Container -->
        <div class="form-container">
            <!-- <div class="image-holder"></div> -->
            <!-- Start: Image -->
            <!-- End: Image -->
            <form action="mvc/user_controler.php?status=register_user" method="POST" enctype="multipart/form-data">
                <h2 class="text-center" style="margin-top: -18px;"><strong>Create</strong> an account.</h2>
                <p class="text-center" style="margin-top: 1px;">Associez-vous à nous pour gérer votre propre gagne-pain et plus encore.<br></p>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" required="" class="form-control">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Username" required="" class="form-control">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" placeholder="phone number" required="" class="form-control">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" required="" class="form-control">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" placeholder="Password (repeat)" required="" class="form-control" >
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                  <div class="mb-3">
                    
                    <input type="file" class="btn  d-block w-100" name="workerimage" id="serviceimage" required>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" required="">I agree to the license terms.</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary d-block w-100" type="submit" name="signUp-button" style="background: rgb(254,209,54);" value="Sign Up">
                </div>
                <a class="already" href="login.php">Don't have an account? Register here.</a>
            </form>
        </div>
   </section>
  
    <?php
 

    require 'frontend/footer.html';

    ?>
</body>

</html>