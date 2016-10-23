<?php
	echo "<center><table><tr><th>Users</th></tr>";
	$mysqli = new mysqli("mysql.eecs.ku.edu", "sfulton", "applebutter", "sfulton");

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query2 = "SELECT user_id FROM Users;";
	if ($result = $mysqli->query($query2)) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["user_id"]."</td></tr>";
		}
	}
	echo "</table><a href='AdminHome.html'>Return to Admin Homepage</a></center>";
?>
