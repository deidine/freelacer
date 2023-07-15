<?php
// session_start();
// error_reporting(0);
// include('includes/config.php');
// if (isset($_POST['submit1'])) {
// 	$fname = $_POST['fname'];
// 	$email = $_POST['email'];
// 	$mobile = $_POST['mobileno'];
// 	$subject = $_POST['subject'];
// 	$description = $_POST['description'];
// 	$sql = "INSERT INTO  tblenquiry(FullName,EmailId,MobileNumber,Subject,Description) VALUES(:fname,:email,:mobile,:subject,:description)";
// 	$query = $dbh->prepare($sql);
// 	$query->bindParam(':fname', $fname, PDO::PARAM_STR);
// 	$query->bindParam(':email', $email, PDO::PARAM_STR);
// 	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
// 	$query->bindParam(':subject', $subject, PDO::PARAM_STR);
// 	$query->bindParam(':description', $description, PDO::PARAM_STR);
// 	$query->execute();
// 	$lastInsertId = $dbh->lastInsertId();
// 	if ($lastInsertId) {
// 		$msg = "Enquiry  Successfully submited";
// 	} else {
// 		$error = "Something went wrong. Please try again";
// 	}
// }

?>
<!DOCTYPE HTML>
<html>

<head>
	<title>TMS | Tourism Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Tourism Management System In PHP" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
</head>

<body>
	<!-- top-header -->
	<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">

		<div class="container"><a class="navbar-brand" href="index.php">
				<img src="assets/img/logo.png" width="40px" height="40px">
				&nbsp;قادة المستقبل</a><button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto text-uppercase">
					<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="about.php">عن الموقع</a></li>
					<li class="nav-item"><a class="nav-link" href="index.php#about">خدمات</a></li>
					<li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary" role="button" style="background: rgba(10,9,8,0.27);" href="booking.php">حجز خدمات</a></li>
					<li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-book" role="button" href="register.php">تسجيل كعضو في الفريق</a></li>
					<li class="nav-item" style="margin-top: 10px;"><a class="btn btn-primary btn-login" role="button" href="login.php" style="background: rgb(99,168,231);">دخول</a></li>
				</ul>
			</div>
		</div>
	</nav>


	<div class="top-header">

		<div class="banner-1 ">
			<div class="container">
				<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">TMS-Tourism Management System</h1>
			</div>
		</div>
		<!--- /banner-1 ---->
		<!--- privacy ---->
		<div class="privacy">
			<div class="container">
				<?php
				$pagetype = $_GET['type'];
				require  "includes/dbconf/settings.php";

				$query =  "SELECT  PageName,detail from page where PageName='$pagetype'";
				$resultt = mysqli_query($conn, $query);

				$results = mysqli_fetch_assoc($resultt);
				$cnt = 1;

				// if (mysqli_num_rows($resultt) > 0) {
					while ($row= mysqli_fetch_assoc($resultt)) {

				?>


						<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" 
						style="visibility: visible; animation-delay: 0.5s; 
						animation-name: fadeInDown;"><?php echo $_GET['type'] ?></h3>


						<p>
							<?php echo $row['PageName']; ?>


						</p>
				<?php }
				// } ?>



			</div>
		</div>

</body>

</html>