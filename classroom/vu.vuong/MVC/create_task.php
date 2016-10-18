<?php 
	$page_title="Create Task";
	include_once"Layout/header.php";
	include_once 'Controller/Database.php';
 ?>
<div class='right-button-margin'>
	<a href='index.php' class='btn btn-primary'>View All Task</a>
</div>
<?php 
	$database = new Database();
	$db = $database -> getConnection();
    if($_POST){
 
    // instantiate task object
    include_once 'Model/task.php';
    $task = new Task($db);
 
    // set task property values
    $task->name = $_POST['name'];
    $task->category_id = $_POST['category_id'];
 
    // create the task
    if($task->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "task was created.";
        echo "</div>";
    }
 
    // if unable to create the task, tell the user
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
            echo "Unable to create task.";
        echo "</div>";
    }
}
 ?>

 <form action='create_task.php' method='post'>
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Category</td>
            <td>
            <?php
		    	
		    	include_once 'Model/category.php';
		 
		   		 $category = new Category($db);
		   		 $stmt = $category->read();

		    	echo "<select class='form-control' name='category_id'>";
		        echo "<option>Select category...</option>";
		 
		        while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
		            extract($row_category);
		            echo "<option value='{$id}'>{$name}</option>";
        }
 
    echo "</select>";
    ?>
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>
 <?php 
 	include_once"Layout/footer.php";
  ?>