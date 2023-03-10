<?php
	include "connection.php";
	if(isset($_POST['submit'])){
	    $task_name = mysqli_real_escape_string($conn,$_POST['task_name']);
	    $task_description = mysqli_real_escape_string($conn,$_POST['task_description']);
	    $task_due_date = mysqli_real_escape_string($conn,$_POST['task_due_date']);
	   	$task_status = ($_POST['task_status']);

	    $query = "UPDATE tasks SET task_name='$task_name', task_description='$task_description', task_due_date='$task_due_date', task_status='$task_status' WHERE id='" . $_GET["id"] . "'";

	    if(mysqli_query($conn, $query)){
	      echo '<script>alert("Task updated successfully.")</script>';
	    } else {
	      echo 'ERROR: '. mysqli_error($conn);
	    }
	}

	$query = mysqli_query($conn, "SELECT * FROM tasks WHERE id='" . $_GET['id'] . "'");
	$row= mysqli_fetch_array($query);
?>

<html>
<head>
	<link rel='stylesheet' href='styles.css'>
	<title>Edit Task Details</title>
</head>
<body style="font: 14px sans-serif;">
	<div class="editform">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <b>Task name:<br> </b>
    <input type="text" size="45" name="task_name" id="task_name" value="<?php echo $row['task_name']; ?>"><br><br>

    <b>Task Description:<br></b><input type="text" size="45" name="task_description" id="task_description" value="<?php echo $row['task_description']; ?>"><br><br>

    <b>Task Due Date: <br></b>
    <input type="date" size="45" name="task_due_date" id="task_due_date" value="<?php echo $row['task_due_date']; ?>"><br><br>

    <b>Task Status<br></b>
    <select id = "task_status" name = "task_status">
    <option id="incomplete" value="incomplete"<?php if ($row['task_status'] == 'incomplete') echo ' selected="selected"'; ?>>Incomplete</option>
    <option id="in progress" value="in progress"<?php if ($row['task_status'] == 'in progress') echo ' selected="selected"'; ?>>In Progress</option>

    <option id="complete" value="complete"<?php if ($row['task_status'] == 'complete') echo ' selected="selected"'; ?>>Complete</option>
    <br><br>
	</select>
	<br><br>
    <input type="submit" name="submit" id="submits" value="Submit" class="submit2">
    <br><br>
    <a href = 'index.php' class="link">Go back to task list: </a>
	</form>
    </div>
</body>
</html>