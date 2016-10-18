<?php
// check if value was posted
if($_POST){

    // include database and object file
    include_once 'Controller/Database.php';
    include_once 'Model/task.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare task object
    $task = new Task($db);
     
    // set task id to be deleted
    $task->id = $_POST['object_id'];
     
    // delete the task
    if($task->delete()){
        echo "Object was deleted.";
    }
     
    // if unable to delete the task
    else{
        echo "Unable to delete object.";
         
    }
}
else{

}
?>