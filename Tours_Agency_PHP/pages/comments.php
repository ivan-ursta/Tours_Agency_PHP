<h2>Add comment</h2>
<hr>
<?php
	$link = connect();

	echo '<form action="index.php?page=2" method="post">';
	echo '<select name="hotelid" class="col-sm-3 col-md-3 col-lg-3">';
	echo '<option value="0">Select hotel...</option>';

	$res = mysqli_query($link, "SELECT * FROM hotels ORDER BY hotel");
	while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
		echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
	}
	mysqli_free_result($res);

	echo '</select>';
	echo '<br><br><textarea name="comment" placeholder="Comment"></textarea><br>';
	echo '<input type="submit" name="addcomment" value="Add comment" class="btn btn-xs btn-primary">';
	echo '</form>';

	//handler
	if (isset($_POST['addcomment'])) {
		$hotelid = $_POST['hotelid'];
		if ($hotelid == 0) exit();
		$comment = trim(htmlspecialchars($_POST['comment']));
		$ins = 'INSERT INTO comments (comment, hotelid) VALUES("' . $comment . '",' . $hotelid . ')';
		if (mysqli_query($link, $ins)) {
			echo '<h3 style="color: green">Comment added successfully!</h3>';
		} else {
			echo '<h3>Error</h3>';
		}
	}

