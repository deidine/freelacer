<?php

include "../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
  
 // session_start();
 include "session.php";
 // $con = new mysqli($host, $user, $pswd, $dbnm);
 
 $con = $GLOBALS['con'];

$sql = "SELECT * FROM worker  ";
$result = $con->query($sql);

if (isset($_POST["f_user"])) {
    $user_work = $_POST["f_user"];
    $sql1 = "SELECT * FROM worker where username='$user_work' ";
$result1 = $con->query($sql1);
    $row = $result1->fetch_assoc();
    echo '	<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
<p></p>

<h2> '. $row["username"].'</h2>
<h4> '. $row["phone"].'</h4>
<p><span class="glyphicon glyphicon-user"></span>'.$row['description'].'</p>
<center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
<p></p>
</div>';
}


if (isset($_POST["s_username"])) {
    $t = $_POST["s_username"];
    
    $sql = "SELECT * FROM worker where username='$t' ";
$result = $con->query($sql);
}


if (isset($_POST["s_email"])) {
    $t = $_POST["s_email"];
       
    $sql = "SELECT * FROM worker where email='$t' ";
$result = $con->query($sql);
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>All Freelancer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css"> -->

    <style>
        body {
            padding-top: 3%;
            margin: 0;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background: #fff
        }
    </style>
  <?php
        include "frontend/head.html";
        ?>
</head>

<body>
<?php
        include "frontend/nav.html";
        ?>

    <!--main body-->
    <div style="padding:1% 3% 1% 3%;">
        <div class="row">

            <!--Column 1-->
            <div class="col-lg-9">

                <!--Freelancer Profile Details-->
                <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px;overflow-y:scroll;overflow-x:scroll; max-height:1000px;max-width:1000px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>كل عاملينا</h3>
                        </div>
                        <div class="panel-body">
                            <h4>
                                <table style="width:100%;" border="1">
                                    <tr>
                                        <td>أسم العامل</td>
                                        <td>الهاتف</td>
                                        <td>الايميل</td>
                                        <td>التخصص</td>
                                    </tr>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            $username = $row["username"];
                                            $prof_title = $row["phone"];
                                            $email = $row["email"];
                                            $skills = $row["type_service"];

                                            echo '
                                <form action="allWorker.php" method="post">
                                <input type="hidden" name="f_user" value="' . $username . '">
                                    <tr>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $username . '"></td>
                                   
                                    <td>' . $prof_title . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . $skills . '</td>
                                    </tr>
                                </form>
                                ';
                                        }
                                    } else {
                                        echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                                    }

                                    ?>
                                </table>
                            </h4>
                        </div>
                    </div>
                    <p></p>
                </div>
                <!--End Freelancer Profile Details-->

            </div>
            <!--End Column 1-->


            <!--Column 2-->
            <div class="col-lg-3">
            <center><button onclick="reload()" class="btn btn-info">تجديد الشاشة</button></center>
            <center><button onclick="retour()" class="btn btn-info">عودة</button></center>
<script>
    function reload(){
        window.location="allWorker.php";
    }
    function retour(){
        window.location="index.php";
    }
</script>
                <!--Main profile card-->
                <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                    <p></p>
                    <form action="allWorker.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="البحث بالاسم" name="s_username">
                            <center><button type="submit" class="btn btn-info">البحث بالاسم</button></center>
                        </div>
                    </form>
 

                    <form action="allWorker.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="البحث بلايميل" name="s_email">
                            <center><button type="submit" class="btn btn-info">البحث بلايميل</button></center>
                        </div>
                    </form>

                    <p></p>
                </div>
                <!--End Main profile card-->

            </div>
            <!--End Column 2-->

        </div>
    </div>
    <!--End main body-->


    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


</body>

</html>