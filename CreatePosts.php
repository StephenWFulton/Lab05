
<?php
	$username = $_POST["username"];
	$post_text = $_POST["post_content"];
	$match_user = False;
	$mysqli = new mysqli("mysql.eecs.ku.edu", "sfulton", "applebutter", "sfulton");

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post_text . "','" .  $username . "');";
	$query2 = "SELECT user_id FROM Users;";
	if ($result = $mysqli->query($query2)) {
		while ($row = $result->fetch_assoc()) {
			if($row["user_id"] == $username){
				$match_user = True;
				break;
			}
		}
		if ($match_user == True && $post_text != "") {
			if ($result = $mysqli->query($query)) {
				echo "<center><p> Post Successfully Added </p>";
			}
			else {
				echo "<center><p> Post Unsuccessful. Please Try Again. </p>";
			}
		}
		else {
			echo "<center><p> Post Unsuccessful. Please ensure the post content is not empty and that the username is valid. </p><br><br>";
		}
		echo "<form action='CreatePosts.html'><input type='submit' value='Return to posts page'></input></form></center>";

	}
?>
