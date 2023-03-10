<?php 
	$host = "localhost";
	$username = "root";
	$password = "admin";
	$db = "todo_db";
	$conn = mysqli_connect($host, $username, $password, $db);

	if(mysqli_connect_errno()){
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}
?>