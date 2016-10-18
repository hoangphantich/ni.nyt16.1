<?php
	$page_title = "Update task";
	include_once "Layout/header.php";
	echo "<div class='right-button-margin'>";
	echo "<a href='index.php' class='btn btn-success'>View all tasks</a>";
	echo "</div>";
	// get ID of the task to be edited
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
	 
	// include database and object files
	include_once 'Controller/Database.php';
	include_once 'Model/task.php';
	 
	// get database connection
	$database = new Database();
	$db = $database->getConnection();
	 
	// prepare task object
	$task = new Task($db);
	 
	// set ID property of task to be edited
	$task->id = $id;
	 
	// read the details of task to be edited
	$task->readOne();
	if($_POST){
 
    // set task property values
    $task->name = $_POST['name'];
    
    $task->category_id = $_POST['category_id'];
 
    // update the task
    if($task->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "task was updated.";
        echo "</div>";
    }
 
    // if unable to update the task, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to update task.";
        echo "</div>";
    }
}
?>

<form action='update_task.php?id=<?php echo $id; ?>' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $task->name; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
                 <?php
			        // read the task categories from the database
			        include_once 'Model/category.php';
			 
			        $category = new Category($db);
			        $stmt = $category->read();
			 
			        // put them in a select drop-down
			        echo "<select class='form-control' name='category_id'>";
			 
			            echo "<option>Please select...</option>";
			            while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
			                extract($row_category);
			 
			                // current category of the task must be selected
			                if($task->category_id==$id){
			                    echo "<option value='$id' selected>";
			                }else{
			                    echo "<option value='$id'>";
			                }
			 
			                echo "$name</option>";
			            }
			        echo "</select>";
			        ?>
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>
