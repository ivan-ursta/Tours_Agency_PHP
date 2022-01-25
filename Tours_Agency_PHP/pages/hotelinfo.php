<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hotel Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/info.css">
</head>
<body>
<?php

	include_once("functions.php");
	$link = connect();

	if (isset($_GET['hotel'])) {

	$hotel = $_GET['hotel'];
	$sel = 'SELECT * FROM hotels WHERE id=' . $hotel;
	$res = mysqli_query($link, $sel);
	$row = mysqli_fetch_array($res, MYSQLI_NUM);
	$hname = $row[1];
	$hstars = $row[4];
	$hcost = $row[5];
	$hinfo = $row[6];
	mysqli_free_result($res);

	echo '<h1 class="text-uppercase text-center"> ' . $hname . '</h1>'
?>

<div class="container-fluid">
	<div class="row header_bg">
		<div class="col pt-5">
			<div id="slides" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner text-center text-white ">
					<?php
						$sel = 'SELECT imagepath FROM images WHERE hotelid=' . $hotel;
						$res = mysqli_query($link, $sel);
						$i = 0;
						while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {

							if ($i) {
								echo ' <div class="carousel-item "><img img src="../' . $row[0] . '"></div>';
							} else {
								$i++;
								echo ' <div class="carousel-item  active"><img src="../' . $row[0] . '"></div>';
							}
						}
						mysqli_free_result($res);
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="info text-center">
		<h1>About Hotel</h1>
		<?php
			echo '<h4>' . $hinfo . '</h4>';
		?>
	</div>


	<div class="star text-center">
		<h2>Stars:</h2>
		<?php
			for ($i = 0; $i < $hstars; $i++) {
				echo '<image src="../images/star.png" alt="star">';
			}

		?>
	</div>

	<div class="cost text-center">
		<?php echo '<h1><label>Cost ' . $hcost . '$</label></h1>' ?>
	</div>

	<?php
		$sel = 'SELECT comment FROM comments WHERE hotelid =' . $hotel;
		$res = mysqli_query($link, $sel);

		echo '<div class="comments ">';
		echo '<h2>Comments:</h2>';
		echo '<hr>';

		while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
			echo '<div class="comm">';
			echo '<h5>' . $row[0] . '</h5>';
			echo '<hr>';
			echo '</div>';
		}
		echo '</div>';
		mysqli_free_result($res);
		}
	?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

</html>