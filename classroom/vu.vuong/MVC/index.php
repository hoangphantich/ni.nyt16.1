<?php
	$page_title = "All Tasks";
	include_once "Layout/header.php";
	echo "<div class='right-button-margin'>";
    echo "<a href='create_task.php' class='btn btn-success '>Create task</a>";
	echo "</div>";
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$records_per_page = 5;
	$from_record_num = ($records_per_page * $page) - $records_per_page;
	// include database and object files
	include_once 'Controller/Database.php';
	include_once 'Model/Task.php';
	include_once 'Model/category.php';
	 
	// instantiate database and task object
	$database = new Database();
	$db = $database->getConnection();
	 
	$task = new Task($db);
	 
	// query tasks
	$stmt = $task->readAll($page, $from_record_num, $records_per_page);
	$num = $stmt->rowCount();
	 
	// display the tasks if there are any
	if($num>0){
	 
	    $category = new Category($db);
	 
	    echo "<table class='table table-hover table-responsive table-bordered'>";
	        echo "<tr>";
	            echo "<th>Task</th>";
	            echo "<th>Category</th>";
	            echo "<th>Actions</th>";
	        echo "</tr>";
	 
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 
	            extract($row);
	 
	            echo "<tr>";
	                echo "<td>{$name}</td>";
	                echo "<td>";
	                    $category->id = $category_id;
	                    $category->readName();
	                    echo $category->name;
	                echo "</td>";
	                    echo "<td>";
					    // edit task button
					    echo "<a href='update_task.php?id={$id}' class='btn btn-info left-margin'>";
					        echo "<span class='glyphicon glyphicon-edit'></span> Edit";
					    echo "</a>";
					 
					    // delete task button
					    echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
					        echo "<span class='glyphicon glyphicon-remove'></span> Delete";
					    echo "</a>";
					echo "</td>";
	            echo "</tr>";
	 
	        }
	 
	    echo "</table>";
	 
	    include_once 'paging.php';
	}
	 
	// tell the user there are no tasks
	else{
	    echo "<div>No tasks found.</div>";
	}
?>

<?php
include_once "Layout/footer.php";
?>