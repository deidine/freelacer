<!--Author: Muhamad Miguel Emmara-->
<!--Student ID: 18022146-->
<!--Email: ryf2144@autuni.ac.nz-->
<!--
    Description of File:
    Admin page for drivers after login verification
-->

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

</head>
<?php

/*
|--------------------------------------------------------------------------
| Initialize the session
|--------------------------------------------------------------------------
|
| creates a session or resumes the current one
| based on a session identifier passed via
| a GET or POST request, or passed via a cookie.
|
*/

/*
|--------------------------------------------------------------------------
| Access Restriction
|--------------------------------------------------------------------------
|
| Here is the declaration that user or visitor
| can access the page
| all the define('MY_CONSTANT', 1) meaning pages that can be access.
|
*/

define('MY_CONSTANT', 1);

/*
|--------------------------------------------------------------------------
| Title Variable
|--------------------------------------------------------------------------
|
| Title variable used to
| make dynamic title depending
| on the page where user are on.
|
*/

$title = "worker info |  Online";

/*
|--------------------------------------------------------------------------
| Require frontend/header
|--------------------------------------------------------------------------
|
| include file
| frontend/header
| for displaying the header
|
 */

require dirname(__FILE__) . "/includes/frontend/header.php";

/*
|--------------------------------------------------------------------------
| Require backend/appFunction
|--------------------------------------------------------------------------
|
| include file
| backend/appFunction
| We'll require it so we can access the methods inside
|
*/

// require dirname(__FILE__) . "/includes/backend/appFunction.php";

/*
|--------------------------------------------------------------------------
| Require backend/SQLfunction
|--------------------------------------------------------------------------
|
| include file
| backend/SQLfunction
| We'll require it so we can access the methods inside
|
*/

// require dirname(__FILE__) . "/includes/backend/SQLfunction.php";

/*
|--------------------------------------------------------------------------
| Require backend/password
|--------------------------------------------------------------------------
|
| include file backend/password
| Since aut server use older version of php 5.4, I need https://github.com/ircmaxell/password_compat
| to use password functions supported in latest version of php
|
*/

// require dirname(__FILE__) . "/includes/backend/password.php";

/*
|--------------------------------------------------------------------------
| checkUserLoggedIn()
|--------------------------------------------------------------------------
|
| Check If User LoggedIn,
| if not then redirect
| the user to the login page
|
*/
require dirname(__FILE__) . "/includes/backend/settings.php";

// checkUserLoggedIn();

// When The Assign OR Search is clicked,
// we take the variable booking and check
// if whether or not it is empty before we pass it to the method
if (isset($_POST['bsearch'])) {

    /*
    |--------------------------------------------------------------------------
    | assignBookingManual($bookingRefNo)
    |--------------------------------------------------------------------------
    |
    | Assign the booking
    | according to the bookingRefNo
    | and update the data
    |
    */

    assignBookingManual($_POST['bsearch']);
}

?>

<body>
    <?php

    /*
|--------------------------------------------------------------------------
| Require frontend/nav
|--------------------------------------------------------------------------
|
| include file
| frontend/nav
| for displaying the navbar
|
*/

    require "includes/frontend/nav.php";


    mysqli_select_db($conn, $dbnm);

    $query = "SELECT * FROM worker ";
    // $query = "SELECT * FROM customer WHERE username='$driver_name'";

    $result = mysqli_query($conn, $query);
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
        })
          });

    </script>
    ';
    }

    ?>
    <!-- <header class="header-blue"> -->

        <!-- <div class="container hero"> -->
            <!-- <div id="image-taxi-row" class="row"> -->



                <!-- <div class="container"></div> -->
           <p style="height: 140px;">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                <table class="table table-striped table tablesorter" id="ipi-table">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 text-center">
                    <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم مقدم(ة) الخدمة</th>
                                <th class="text-center">رقم الهاتف</th>
                                <th class="text-center filter-false sorter-false">email</th>

                                <th class="text-center filter-false sorter-false">نوع الخدمة</th>
                                <th class="text-center filter-false sorter-false">موثوق فيه</th>
                                

                                <th class="text-center filter-false sorter-false">profile</th>
                            </tr>
                        </thead>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1 text-center">

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tbody class="text-center">
                            <tr id="<?= $row["id"] ?>">
                                <td  style="color: white;background: rgb(99,168,231);" width="12"><?= $row["id"] ?></td>
                                <td  style="color: white;background: rgb(99,168,231);"width="200"><?= "الاستاذ(ة) =>"  . $row["username"] ?></td>
                                <td  style="color: white;background: rgb(99,168,231);"width="50"><?= $row["phone"] ?></td>
                                <td style="color: white;background: rgb(99,168,231);" width="100"><?= $row["email"] ?></td>
                                <td style="color: white;background: rgb(99,168,231);"><?= $row["type_service"] ?></td>
                                <td style="color: white;background: rgb(99,168,231);">
                                <?php 
                                $statuss=$row["status"] ;
                                // echo $statuss;
                                if($statuss==1){
                                    echo "✅";
                                }
                                else echo "❌";
                                ?>
                            
                            </td>
                                <td style="color: white;background: rgb(99,168,231);" width="400">
                                    <a href="profile.php?wid=<?php echo $row["id"]?>"> <button class=" btn btn-primary" onclick="sweetAlertMsg();">  معرفة أكثر</button>
                                    </a>
                                </td>


                            </tr>
                        </tbody>
                    <?php } ?>
                    </div>
                </table>
                </div>
            </div>
        </div> </div>
    <!-- </header> -->

    <?php
    // Frees up the memory, after using the result pointer
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($conn); ?>
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

    // require 'includes/frontend/footer.php';

    ?>
</body>

</html>