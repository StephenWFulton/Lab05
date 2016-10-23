<?php
	$username = $_POST["user"];
	echo "<h1>448 Message Board: ".$username."'s Posts</h1>";
	echo "<center><table><tr><th>Posts</th></tr>";
	$mysqli = new mysqli("mysql.eecs.ku.edu", "sfulton", "applebutter", "sfulton");

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "SELECT content FROM Posts WHERE author_id='".$username."'";
	if ($result = $mysqli->query($query)) {


		while ($row = $result->fetch_assoc()) {
			echo "<tr><td><center>".$row["content"]."</center></td></tr>";
		}
		$result->free();

	}
	echo "</table></center>";
?>