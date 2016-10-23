<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "sfulton", "applebutter", "sfulton");
    
    $username = $_POST["username"];
    
    if ($mysqli->connect_errno){
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $query = "INSERT INTO Users (user_id) VALUES ('" . $username . "');";
    
    if ($result = $mysqli->query($query)) {
        echo "<center><p>Successful Add</p>";
	echo "<br><form action='CreateUser.html'><input type='submit' value='Return to home page' /></form></center>";
        $result->free();
    }
    else
    {
        echo "<center><p>Failed Add (User already in system)</p>";
	echo "<br><form action='CreateUser.html'><input type='submit' value='Return to home page' /></form></center>";
    }
    $mysqli->close();
    
?>
