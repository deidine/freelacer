<?php
// include "includes/backend/settings.php";
// include "mvc/dbConnetion.php";
include "../dbconf/dbConnetion.php";

    $dbConnObj = new dbConnetion();
    $conn=$GLOBALS["con"];    

$id = $_GET['uid'];
$sql = "Select * from customer where bookingRefNo='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tailwind Profile Card Template : Tailwind Toolbox</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
	<link rel="stylesheet" href="../assets/css/styles.min.css" />
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
<?php 
include "frontend/header.php";
?>
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
	<!-- <body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover" style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');"> -->
	<?php 
include "frontend/nav.php";
?>	<p style="margin-top: 120px;"></p>
	<div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

		<!--Main Col-->
		<div id="profile" class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">


			<div class="p-4 md:p-12 text-center lg:text-left">
				<!-- Image for mobile view-->
				<!-- <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center" style="background-image: url('workerimages/<?php echo $row['image']; ?>')"></div> -->

				<h1 class="text-3xl font-bold pt-8 lg:pt-0">My Name is 👷‍♀️ <br>
					<?php
					echo $row['customerName'];

					// $statuss = $row["status"];
					// // echo $statuss;
					// if ($statuss == 1) {
					// 	echo "✅";
					// } else echo "❌";
					?></h1>
				<div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
				<p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start"><svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
					</svg> What you do</p>
				<p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
					phone number :<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
						<path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
						<path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
					</svg> <br> <?php
								echo  $row['phoneNumber'];
								?>

				</p>

				<p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">email : <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
						<path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
						<path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
					</svg>
					<br>
					<?php
					echo $row['email'];
					?>
				</p>
				<p class="pt-8 text-sm">
					Description✍ <br>
					<?php
					echo $row['description'];
					?>
				<!-- <div class="pt-12 pb-8">
					<button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
						Get In Touch
					</button>
				</div> -->
 
			</div>

		</div>

		<!--Img Col-->
		<div class="w-full lg:w-2/5">
			<!-- Big profile image for side bar (desktop) -->
			<!-- <img src="workerimages/<?php echo $row['image']; ?>" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block"> -->
			<!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->

		</div>


		<!-- Pin to top right corner -->
		<div class="absolute top-0 right-0 h-12 w-18 p-4">
			<button class="js-change-theme focus:outline-none">🌙</button>
		</div>

	</div>

	<script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
	<script src="https://unpkg.com/tippy.js@4"></script>
	<script>
		//Init tooltips
		tippy('.link', {
			placement: 'bottom'
		})

		//Toggle mode
		const toggle = document.querySelector('.js-change-theme');
		const body = document.querySelector('body');
		const profile = document.getElementById('profile');


		toggle.addEventListener('click', () => {

			if (body.classList.contains('text-gray-900')) {
				toggle.innerHTML = "☀️";
				body.classList.remove('text-gray-900');
				body.classList.add('text-gray-100');
				profile.classList.remove('bg-white');
				profile.classList.add('bg-gray-900');
			} else {
				toggle.innerHTML = "🌙";
				body.classList.remove('text-gray-100');
				body.classList.add('text-gray-900');
				profile.classList.remove('bg-gray-900');
				profile.classList.add('bg-white');

			}
		});
	</script>

</body>

</html>