<?php
include "session.php";
include "../dbconf/dbConnetion.php";

$dbConnObj = new dbConnetion();

// session_start(); 
// $conn = new mysqli($host, $user, $pswd, $dbnm);
$bid = $_GET['bookId'];
$con = $GLOBALS['con'];

$sql = "SELECT * FROM   customer   where  bookingRefNo = '$bid'";
$results = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($results);
// echo $row;
?>
<!DOCTYPE html>
<html>
<?php
include "frontend/head.html";

?>

<body>
    <?php
    include "frontend/nav.html";
    ?>
    <!-- Start: Contact Form Clean -->
    <section class="contact-clean">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="mvc/user_controler.php?status=update_booking&bookIdUp=<?php echo $bid;?>" method="POST" style="margin-top: 70px;max-width: 1000px;">
                        <h2 class="text-center">حجز خدمات</h2>
                        <div class="mb-3">
                            <p><strong>الاسم </strong></p>
                            <input type="text" id="fName" name="fName" value="<?php echo $row['customerName'] ?>" readonly  placeholder="👤 ali" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <!-- <p><strong>الاسم العائلي</strong></p>
                            <input type="text" id="lName" value="<?php echo $row['customerName'] ?>" readonly name="lName" placeholder="" required class="form-control">
                        </div>
-->
                        <input type="hidden" id="date" name="date" value="<?php date_default_timezone_set('UTC');
                                                                            echo date("Y-m-d"); //date("Y-m-d H:i:s"); 
                                                                            ?>" readonly> 

                        <!-- <div class="mb-3">
                            <p><strong>رقم الهاتف</strong></p>
                            <input type="text" id="phone" name="phone" value="<?php echo $row['phoneNumber'] ?>" readonly required class="form-control">
                        </div>
                        <div class="mb-3">
                            <p><strong>email</strong><br></p>
                            <input type="email" id="email" name="email" value="<?php echo $row['email'] ?>" readonly class="form-control">
                        </div> -->
                        <div class="mb-3">
                            <p><strong>اختيار خدمة</strong><br></p>


                            <?php

                            $query = "SELECT * FROM service";
                            $result = mysqli_query($con, $query);
                            $result2;
                            $num = mysqli_num_rows($result);
                            $numm = $num;
                            ?><select class="form-select" name="inlineRadioOptions">
                                <option><?php echo$row['type_service'];?></option> <?php
                                                                                    while ($row2 = mysqli_fetch_assoc($result)) { ?>
                                    <option>
                                        <?php echo  $row2["ServType"]; ?>
                                    </option>
                                <?php
                                                                                    }

                                ?>
                            </select>
                        </div>
                        <br>
                        <div class="mb-3">
                            <p><strong>معلومات عن الخدمة التي تريد</strong><br></p>
                            <textarea id="description" name="description" rows="6" cols="50" placeholder="description" class="form-control"><?php echo $row['description']; ?></textarea>
                        </div>
                        <div class="d-flex d-xxl-flex justify-content-xxl-center mb-3">
                            <input class="btn btn-secondary flex-fill" type="submit" name="book-button" style="background: rgb(254,209,54);" value="حجز">

                        </div>
                    </form>
                </div>

    </section>
    </div>
    </div>
    </div>

    </section>
    <!-- End: Contact Form Clean -->
    <?php
    include "frontend/footer.html";
    ?>
</body>

</html>