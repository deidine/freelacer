 
<!DOCTYPE html>
<html>
<head>
<?php

   
require "frontend/header.php";

?>
    </head>

    <?php
 
 define('MY_CONSTANT', 1);
 
 $title = "Register Driver | Cabs Online";
 $email = $username = $password = $confirm_password = "";
 $email_err = $username_err = $password_err = $confirm_password_err = "";
 
?>

<body>
    <?php

include "../dbconf/dbConnetion.php";

$dbConnObj = new dbConnetion();
$conn=$GLOBALS["con"];    

    require "frontend/nav.php";

    ?>
    <!-- Start: Registration Form with Photo -->
    <section class="register-photo" style="margin-top: 60px;">
        <!-- Start: Form Container -->
        <div class="form-container">
            <div class="image-holder"></div>
            <!-- Start: Image -->
            <!-- End: Image -->
            <form action="mvc/worker_controler.php?status=register_worker" method="POST" enctype="multipart/form-data">
                <h2 class="text-center" style="margin-top: -18px;"><strong>Create</strong> an account.</h2>
                <p class="text-center" style="margin-top: 1px;">Associez-vous à nous pour gérer votre propre gagne-pain et plus encore.<br></p>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" required="" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Username" required="" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" placeholder="phone number" required="" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" required="" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div class="mb-3">
                    <input type="password" name="confirm_password" placeholder="Password (repeat)" required="" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="mb-3">
                    <p><strong>Select Type of Services You Have</strong><br></p>

                    <?php
                 
                    $query = "SELECT * FROM service";
                    $result = mysqli_query($conn, $query);
                    $result2;
                    $num = mysqli_num_rows($result);
                    $numm = $num;
                    ?><select class="form-select"  name="carsAvailabilityCheckBox[]" ><?php
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option>
                                <?php echo  $row["ServType"]; ?>
                                <!-- <div class="form-check form-check-inline">
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="carsAvailabilityCheckBox[]" id="checkRadio5" value="Van">
                                        <img src="./assets/img/cars/Van.png" alt="Car 5">
                                    </label>
                                </div> -->
                            </option>
                            <!-- // foreach ($result2  as $res) {
                                echo "<h1>".$row["ServType"]."</h1>";
                                // } -->

                        <?php
                                }
                        ?>
                    </select>

                </div>
                <div class="mb-3">
                            <p><strong>معلومات عن الخدمة التي ستقدم</strong><br></p>
                            <textarea rows="6" cols="50" id="description" name="description" placeholder="description" width="130px" heigth="40px" class="form-control"></textarea>
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

        <!-- End: Form Container -->
    </section>
    <!-- End: Registration Form with Photo -->

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

    require 'frontend/footer.php';

    ?>
</body>

</html>