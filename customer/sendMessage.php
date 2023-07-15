<?php 
session_start();
include "../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
    $conn = $GLOBALS['con'];
  
$username=$_SESSION["username"];

if(isset($_SESSION["msgRcv"])){
    $msgRcv=$_SESSION["msgRcv"];
}

if(isset($_POST["send"])){
    $msgTo=$_POST["msgTo"];
    $msgBody=$_POST["msgBody"];
    $sql = "INSERT INTO message (sender, receiver, msg) VALUES ('$username', '$msgTo', '$msgBody')";
    $result = $conn->query($sql);
    if($result==true){
        header("location: message.php");
    }
}




 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Send Message</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css"> -->
    <?php
        include "frontend/head.html";
        ?>
<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
</style>

</head>
<body>
 
<?php
        include "frontend/nav.html";
        ?>
        <!-- <div class="row"> -->
        <!-- <div style="margin-top: 100px;">
        </div> -->
    <section class="contact-clean">

<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>كتابة رسالة</h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">الى</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="msgTo" value="<?php echo $msgRcv; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">محتوى الرسالة</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="12" name="msgBody" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit"  style="background: rgb(99,168,231);" name="send"  class="btn btn-primary btn-book" role="button">ارسل</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

    </section>
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            msgTo: {
                validators: {
                    notEmpty: {
                        message: 'This is required and cannot be empty'
                    }
                }
            },
            msgBody: {
                validators: {
                    notEmpty: {
                        message: 'This is required and cannot be empty'
                    }
                }
            }
            
        }
    });
});
</script>
<?php
        include "frontend/footer.html";
        ?>
</body>
</html>