<?php
	global $status;
	include "connection.php";
    if(isset($_POST['search'])){
    	$status = ($_POST['task_status']);
    	$filter_tasks = mysqli_query($conn, "SELECT * FROM tasks WHERE task_status='" . $status . "'");
    	$task = array();
			if(mysqli_num_rows($filter_tasks) > 0){
	    		while($row = mysqli_fetch_assoc($filter_tasks)){
	        		$task[] = $row;
    			}
    		}
    		echo "
    		<table class='table'>
    			<thead>
    			<tr>
    			 	<th>id</th>
    			 	<th>task_name</th>
    			 	<th>task_description</th>
    			 	<th>task_due_date</th>
    			 	<th>task_status</th>
    			 	<th> Action </th>
    			</tr>
    		</thead>
    		<tbody>";
    			foreach($task as $tasks){
	    			echo"<tr>";
	    			echo "<td> ". $tasks['id'] . "</td>";
			        echo "<td> ". $tasks['task_name'] . "</td>";
			        echo "<td> ". $tasks['task_description'] . "</td>";
			        echo "<td> ". $tasks['task_due_date'] . "</td>";
			        echo "<td> ". $tasks['task_status'] . "</td>";
			        echo "<td>
		            	<a href='delete.php?id=".$tasks['id']."'>
		            	<button type = 'submit' class='delete'> Delete</button></a>
		            	<a href ='edit.php?id=".$tasks['id']."'>
		            	<button type = 'submit' class='edit'> Edit</button></td></a>
		            </tr>";
		            echo "</tbody>";
    			}
    		}
    
    else {
    	$query = mysqli_query($conn, "SELECT * FROM tasks");
		$tasks = array();
			if(mysqli_num_rows($query) > 0){
		    	while($row = mysqli_fetch_assoc($query)){
	        		$tasks[] = $row;
    			}
    		}
    		echo "
    		<table class='table'>
    			<thead>
    			<tr>
    			 	<th>id</th>
    			 	<th>task_name</th>
    			 	<th>task_description</th>
    			 	<th>task_due_date</th>
    			 	<th>task_status</th>
    			 	<th> Action </th>
    			</tr>
    		</thead>
    		<tbody>";
    			foreach($tasks as $task){
	    			echo"<tr>";
	    			echo "<td> ". $task['id'] . "</td>";
			        echo "<td> ". $task['task_name'] . "</td>";
			        echo "<td> ". $task['task_description'] . "</td>";
			        echo "<td> ". $task['task_due_date'] . "</td>";
			        echo "<td> ". $task['task_status'] . "</td>";
			        echo "<td>
		            	
		            	<button type = 'submit' class='delete'> <a style ='color: white;' href='delete.php?id=".$task['id']."'>Delete</a></a></button>
		            	
		            	<button type = 'submit' class='edit'> <a style ='color: white;' href ='edit.php?id=".$task['id']."'>Edit</a></button>
		            	</td>
		            </tr>";
		            echo "</tbody>";
    			}
    		}
?>
<body style='font: 14px sans-serif; padding-top: 20px;'> <link rel='stylesheet' href='styles.css'>

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="container">
	<div class="search" style="margin-left: 235px; margin-bottom: 20px; float: left; width: 210px;">
    	<b>Search Filter<br></b>
	    <select id = "task_status" name = "task_status">
	    <option value="none" selected disabled hidden>Select progress:</option>
	    <option id="incomplete" value="incomplete"<?php if ($status == 'incomplete') echo ' selected="selected"'; ?>>Incomplete</option>
		<option id="in progress" value="in progress" <?php if ($status == 'in progress') echo ' selected="selected"'; ?>> In Progress </option>
		<option id="complete" value="complete" <?php if ($status == 'complete') echo ' selected="selected"'; ?>> Complete </option>
	    <br><br>
		</select>
		<button type="submit" class="searchbtn" name="search" id="search" style="background-color: grey; padding: 8px; border-radius: 10px; color: white; border: none;"> Search</button>
	</div>
	<button type = 'submit' class='add' style="margin-bottom: 10px; margin-top: -35px;"><a style="color:white;" href ='add.php'>Add</button></a>
	</form>
	
