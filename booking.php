 <!DOCTYPE html>
 <html>

 <?php

    define('MY_CONSTANT', 1);

    date_default_timezone_set('Pacific/Auckland');

    $title = "Book A Ride | Cabs Online";


    require dirname(__FILE__) . "/includes/frontend/header.php";

    include "dbconf/dbConnetion.php";
    $dbConnObj = new dbConnetion();

    $fName = $lName = $phoneNumber = $unitNumber = $streetNumber = $streetName = $suburb = $destinationSuburb = $cars = "";
    $fName_err = $lName_err = $phoneNumber_err = $unitNumber_err = $streetNumber_err = $streetName_err = $suburb_err = $destinationSuburb_err = "";

    if (isset($_POST['book-button'])) {


        addcustomer();
    }

    ?>

 <body>
     <?php

        require "includes/frontend/nav.php";

        ?>
     <!-- Start: Contact Form Clean -->
     <section class="contact-clean">
         <div class="container">
             <div class="row">
                 <div class="col-lg-7">
                     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="margin-top: 70px;max-width: 1000px;">
                         <h2 class="text-center">حجز خدمات</h2>
                         <div class="mb-3">
                             <p><strong>الاسم </strong></p>
                             <input type="text" id="fName" name="fName" placeholder="👤 ali" required class="form-control">
                         </div>
                         <div class="mb-3">
                             <p><strong>الاسم العائلي</strong></p>
                             <input type="text" id="lName" name="lName" placeholder="👤 med" required class="form-control">
                         </div>

                         <input type="hidden" id="date" name="date" value="<?php date_default_timezone_set('UTC');
                                                                            echo date("Y-m-d"); //date("Y-m-d H:i:s"); 
                                                                            ?>" readonly>

                         <div class="mb-3">
                             <p><strong>رقم الهاتف</strong></p>
                             <input type="text" id="phone" name="phone" placeholder="☎️ Format = 0123456789" required class="form-control">
                         </div>
                         <div class="mb-3">
                             <p><strong>email</strong><br></p>
                             <input type="email" id="email" name="email" placeholder=" email@gmail.com" class="form-control">
                         </div>
                         <div class="mb-3">
                             <p><strong>اختيار خدمة</strong><br></p>


                             <?php
                                // require  "includes/dbconf/settings.php";
                                $conn = $GLOBALS['con'];

                                $query = "SELECT * FROM service";
                                $result = mysqli_query($conn, $query);
                                $result2;
                                $num = mysqli_num_rows($result);
                                $numm = $num;
                                ?><select class="form-select" name="inlineRadioOptions"><?php
                                                                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                     <option>
                                         <?php echo  $row["ServType"]; ?>
                                     </option>
                                 <?php
                                                                                        }
                                    ?>
                             </select>
                         </div>
                         <br>
                         <div class="mb-3">
                             <p><strong>معلومات عن الخدمة التي تريد</strong><br></p>
                             <textarea id="description" name="description" rows="6" cols="50" placeholder="description" class="form-control"></textarea>
                         </div>
                         <div class="d-flex d-xxl-flex justify-content-xxl-center mb-3">
                             <input class="btn btn-secondary flex-fill" type="submit" name="book-button" style="background: rgb(254,209,54);" value="حجز">

                         </div>
                     </form>
                 </div>
                 <div class="col-lg-5">
                     <section id="map-head" class="map-clean" id="ride-map" style="margin-top: 70px;">
                         <div class="container">
                             <div class="intro">
                                 <h3 class="text-center">Location </h3>
                                 <p class="text-center">Une carte pour votre commodité </p>
                             </div>
                         </div><iframe allowfullscreen frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB3YYb5sin7I3vXQiaX02RIp9zQn91ClLY&amp;q=Auckland&amp;zoom=15" width="100%" height="450"></iframe>

                 </div>
     </section>
     </div>
     </div>
     </div>

     </section>
     <!-- End: Contact Form Clean -->

     <?php


        require 'includes/frontend/footer.php';
        function uniqueRefCheck($conn, $sql_table, $referenceNumber)
        {
            $searchQuery = "SELECT * FROM $sql_table WHERE bookingRefNo = '$referenceNumber'";
            return mysqli_query($conn, $searchQuery)->num_rows === 0;
        }
        function sweetAlertMsg($title, $text, $icon, $btn)
        {
            echo '
    <script type="text/javascript">

    $(document).ready(function(){

        swal({
            html: true,
            title: "' . $title . '",
            text: "' . $text . '",
            icon: "' . $icon . '",
            button: "' . $btn . '",
        });

    </script>
    ';
        }

        function addcustomer()
        {
            $conn = $GLOBALS['con'];


            // Define variables and initialize with empty values
            global $fName;
            global $lName;
            global $customerName;
            global $phoneNumber;
            global $email;

            global $fName_err;
            global $lName_err;
            global $phoneNumber_err;


            $fName
                = $lName
                = $unitNumber
                = $phoneNumber = $email = "";

            $fName_err
                = $lName_err
                = $phoneNumber_err  = "";

            date_default_timezone_set('Pacific/Auckland');

            // Processing form data when form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Validate fName
                $fNameTrimmed = trim($_POST["fName"]);
                if (empty($fNameTrimmed)) {
                    $fName_err = "Please enter a First Name.";
                } else {
                    $fName = trim($_POST["fName"]);
                }

                // Validate lName
                $lNameTrimmed = trim($_POST["lName"]);
                if (empty($lNameTrimmed)) {
                    $lName_err = "Please enter a Last Name.";
                } else {
                    $lName = trim($_POST["lName"]);
                }
                $description = trim($_POST["description"]);
                if (empty($description)) {
                    $description_err = "Please enter a descr.";
                } else {
                    $lName = trim($_POST["lName"]);
                }

                // Validate phoneNumber
                $phoneNumberTrimmed = trim($_POST["phone"]);
                $email = trim($_POST["email"]);
                if (empty($phoneNumberTrimmed)) {
                    $phoneNumber_err = "Please enter a valid phone number.";
                } else if (is_numeric($phoneNumberTrimmed)) {
                    $phoneNumber = $_POST['phone'];
                } else {
                    $phoneNumber_err = "Please enter a valid phone number. (eg. 0221234567)";
                }

                // Check input errors before inserting in database
                if (empty($fName_err) && (empty($lName_err) && (empty($phoneNumber_err)))) {

                    $customerName = $fName . " " . $lName;
                    $status = 'Unassigned';
                    $type_service = $_POST['inlineRadioOptions'];
                    $assignedBy = 'None';

                    // Generate a Unique reference number the first three characters are upper case “BRN”, then the rest five character are digits.
                    $digits = 5;
                    $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);

                    $sql_table = "customer";

                    // Check if the reference number is unique in the database
                    while (!uniqueRefCheck($conn, $sql_table, $referenceNumber)) {
                        $referenceNumber = 'BRN' . str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                    }
                    $notification = "number => " . $referenceNumber . "> name => " . $customerName;
                    // $query2 = "INSERT INTO `notifications` (`id`, `name`, `type`, `message`, `status`, `date`) VALUES ('$referenceNumber', '$customerName', '$type_service', '$description', 'unread', CURRENT_TIMESTAMP)";
                    // mysqli_query($conn, $query2);
                    $date = $_POST['date'];
                    // If the date is the SAME as today, NEED to check for PICK-UP TIME
                    $sql = "INSERT INTO $sql_table (
                            `bookingRefNo`, 
                             `customerName`,
                             `phoneNumber`,
                            `email`, 
                            `status`, `type_service`, `assignedBy`,`description`,`bookdate`,`status2`, `date`
        )
        VALUES
            (
                '$referenceNumber', 
                '$customerName',
                '$phoneNumber',
                 '$email', 
                 '$status', 
                 '$type_service', '$assignedBy','$description','$date', 'unread', CURRENT_TIMESTAMP
            )
        ";

                    if ($conn->query($sql) === true) {
                        sweetAlertMsg("Thank you for your booking!", "Booking reference number: $referenceNumber  ", "success", "Aww yiss!");
                        header("location:index.php");
                    } else {
                        sweetAlertMsg("Oh No...", "Error Occurred = $conn->error", "error", "OK");
                    }
                } else {
                    sweetAlertMsg("Oh No...", "Error Occurred, please recheck your pick-up TIME", "error", "OK");
                }

                // If the date is NOT the same as today, NO NEED to check for PICK-UP TIME
            }

            $conn->close();
        }

        ?>
 </body>

 </html>