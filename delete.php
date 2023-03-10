<?php
	include "connection.php";
	$query = "DELETE FROM tasks WHERE id='" . $_GET["id"] . "'";
	if (mysqli_query($conn, $query)) {
	    echo '<script>alert("Task record successfully deleted.")</script>';
	} else {
	    echo "Error deleting record: " . mysqli_error($conn);
	}
	mysqli_close($conn);
	echo "<a href = 'index.php'><button style = 'color: white;
	background-color: red; padding: 15px; margin-left: 650px; margin-right: 650px; margin-top: 350px; border-radius: 10px; border: none;'> Go back to task list: </button></a>";
?>