<?php
	include "connection.php";
	if(isset($_POST['submit'])){
	    $task_name = mysqli_real_escape_string($conn,$_POST['task_name']);
	    $task_description = mysqli_real_escape_string($conn,$_POST['task_description']);
	    $task_due_date = mysqli_real_escape_string($conn,$_POST['task_due_date']);
	   	$task_status = mysqli_real_escape_string($conn,$_POST['task_status']);
	   	
	    $query = "INSERT INTO tasks(task_name, task_description, task_due_date, task_status) VALUES('$task_name', '$task_description', '$task_due_date', '$task_status')";

	    if(mysqli_query($conn, $query)){
	      echo '<script>alert("Successfully added task.")</script>';
	    } else {
	      echo 'ERROR: '. mysqli_error($conn);
	    }
	  }
?>
<html>
<head>
	<link rel='stylesheet' href='styles.css'>
	<title>Add New Task</title>
</head>
<body style="font: 14px sans-serif;">
	<div class = "addform">
	    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	    <b>Task name: <br></b>
	    <input type="text" size="45" name="task_name" id="task_name"><br><br>
	    <b>Task Description:</b>
	    <input type="text" size="45" name="task_description" id="task_description"><br><br>
	    <b>Task Due Date<br></b>
	    <input type="date" size="45" name="task_due_date" id="task_due_date"><br><br>
	    <b>Task Status<br></b>
	    <select id = "task_status" name = "task_status">
	    <option value="none" selected disabled hidden>Select progress:</option>
	    <option id="incomplete" value="incomplete">Incomplete</option>
		<option id="in progress" value="in progress"> In Progress </option>
		<option id="complete" value="complete"> Complete </option>
	    <br><br>
		</select><br><br>
	    <button name = "submit" id="submits" value="Submit" class="submit">Submit</button>
	    </form>
	    <a href = 'index.php' class="link">Go back to task list: </a>

	</div>

</body>

</html>