<?php

	echo "<center><h1>448 Message Board Post Deletion</h1>";
	$mysqli = new mysqli("mysql.eecs.ku.edu", "sfulton", "applebutter", "sfulton");

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	if(!empty($_POST['del_list'])) {
		foreach($_POST['del_list'] as $del) {
			$query = "DELETE FROM Posts WHERE post_id='".$del."'";
			if ($result = $mysqli->query($query)) {}

		echo "<p>Post ".$del." successfully deleted</p>";
		}
	}
	else {
		echo "<p>No Posts Selected</p><br>";
	}
	echo "<form action='DeletePost.html'><input type=submit value='Return to Delete Posts Page'></form></center>";

	$mysqli->close();

?>