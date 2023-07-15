<?php

include "../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
  
 // session_start();
 include "session.php";
 // $conn = new mysqli($host, $user, $pswd, $dbnm);
//  $email = $_SESSION['email'];
 $con = $GLOBALS['con'];
 $username=$_SESSION['username'];

$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
$result = $con->query($sql);
$f = 0;

if (isset($_POST["sr"])) {
	$t = $_POST["sr"];
	$sql = "SELECT * FROM customer WHERE username='$t'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
		$_SESSION["f_user"] = $t;
		header("location: viewFreelancer.php");
	} else {
		$sql = "SELECT * FROM employer WHERE username='$t'";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION["e_user"] = $t;
			header("location: viewEmployer.php");
		}
	}
}

if (isset($_POST["s_inbox"])) {
	$t = $_POST["s_inbox"];
	$sql = "SELECT * FROM message WHERE receiver='$username' and sender='$t' ORDER BY timestamp DESC";
	$result = $con->query($sql);
	$f = 0;
}

if (isset($_POST["s_sm"])) {
	$t = $_POST["s_sm"];
	$sql = "SELECT * FROM message WHERE sender='$username' and receiver='$t' ORDER BY timestamp DESC";
	$result = $con->query($sql);
	$f = 1;
}

if (isset($_POST["inbox"])) {
	$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
	$result = $con->query($sql);
	$f = 0;
}

if (isset($_POST["sm"])) {
	$sql = "SELECT * FROM message WHERE sender='$username' ORDER BY timestamp DESC";
	$result = $con->query($sql);
	$f = 1;
}

if (isset($_POST["rep"])) {
	$_SESSION["msgRcv"] = $_POST["rep"];
	header("location: sendMessage.php");
}




?>



<!DOCTYPE html>
<html>

<head>
	<title>Message</title>
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
<div style="margin-top: 100px;">
        </div>
	<?php
	include "frontend/nav.html";
	?>
	<!--main body-->
    <!-- <section class="contact-clean"> -->

	<div style="padding:1% 3% 1% 3%;">
		<div class="row">
<!--Column 2-->
<div class="col-lg-3">

<!--Main profile card-->
<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
	<p></p>
	<form action="message.php" method="post">
		<div class="form-group">
			<input type="text" class="form-control" name="s_inbox">
			<center><button type="submit" style="background: rgb(99,168,231);" name="send"  class="btn btn-primary btn-book" role="button">Search Inbox</button></center>
		</div>
	</form>

	<form action="message.php" method="post">
		<div class="form-group">
			<input type="text" class="form-control" name="s_sm">
			<center><button type="submit" style="background: rgb(99,168,231);" name="send"  class="btn btn-primary btn-book" role="button">Search Sent Messages</button></center>
		</div>
	</form>

	<form action="message.php" method="post">
		<div class="form-group">
			<center><button type="submit" name="inbox" style="background: rgb(99,168,231);" name="send"  class="btn btn-primary btn-book" role="button">Inbox Messages</button></center>
		</div>
	</form>

	<form action="message.php" method="post">
		<div class="form-group">
			<center><button type="submit" name="sm" style="background: rgb(99,168,231);" name="send"  class="btn btn-primary btn-book" role="button">Sent Messages</button></center>
		</div>
	</form>

	<p></p>
</div>
<!--End Main profile card-->

</div>
<!--End Column 2-->

			<!--Column 1-->
			<div class="col-lg-9">

				<!--Freelancer Profile Details-->
				<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3>كل الرسائل</h3>
						</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>الرسائل</td>
										<td>الاسم</td>
										<td>رد</td>
										<td>تاريخ الرسالة</td>
									</tr>
									<?php
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
											$sender = $row["sender"];
											$receiver = $row["receiver"];
											$msg = $row["msg"];
											$timestamp = $row["timestamp"];

											if ($f == 0) {
												$sr = $sender;
											} else {
												$sr = $receiver;
											}


											echo '
                                <form action="message.php" method="post">
                                <input type="hidden" name="sr" value="' . $sr . '">
                                    <tr>
                                    <td>' . $msg . '</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $sr . '"></td>
                                    </form>
                                    <form action="message.php" method="post">
                                    <input type="hidden" name="rep" value="' . $sr . '">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="رد"></td>
                                    <td>' . $timestamp . '</td>
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


			
		</div>
	</div>
	<!--End main body-->
	</section>

	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<?php
        include "frontend/footer.html";
        ?>
</body>

</html>