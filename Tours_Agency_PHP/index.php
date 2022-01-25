<?php
	session_start();
	include_once("pages/functions.php");

	$page = $_GET['page'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Travel Agency</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<div class="container">
	<div class="row">
		<header class="col-sm-12 col-md-12 col-lg-12">
			<?php
			include_once('pages/login.php');
			?>
		</header>
	</div>
	<div class="row">
		<nav class="col-sm-12 col-md-12 col-lg-12 head">
			<?php
				include_once('pages/menu.php');
			?>
		</nav>
	</div>
	<div class="row">
		<section class="col-sm-12 col-md-12 col-lg-12">
			<?php
				if (isset($_GET['page'])) {
					if ($page == 1) include_once("pages/tours.php");
					if ($page == 2) include_once("pages/comments.php");
					if ($page == 3) include_once("pages/registration.php");
					if ($page == 4) include_once("pages/admin.php");
					if ($page == 6 && isset($_SESSION['radmin'])) include_once("pages/private.php");
				}
			?>
		</section>
	</div>
	<div class="row">
		<footer>Step Academy &copy;</footer>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>
