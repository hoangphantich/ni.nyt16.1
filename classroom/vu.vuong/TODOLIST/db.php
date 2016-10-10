<?php  
	
	$con =new PDO("mysql:host=localhost;dbname=todolist","root","");
	 $page=isset($_GET['p'])?$_GET['p']:'';
	 if($page=="add"){
	 	$task=$_POST['task'];
	 	$des=$_POST['des'];
	 	$sql = 	$con->prepare("INSERT INTO task_list values('',?,?)");
	 	$sql->bindParam(1,$task);
	 	$sql->bindParam(2,$des);	
	 	if($sql->execute()){
	 		echo 'Add task success';
	 	}else{
	 		echo 'Add task fail';
	 	}
	 	;
	 }
	 elseif ($page=="edit") {
	 	$id=$_POST['id'];
	 	$task=$_POST['task'];
	 	$des=$_POST['des'];
	 	$sql = 	$con->prepare("UPDATE task_list SET name=?, description=? where id=?");
	 	$sql->bindParam(1,$task);
	 	$sql->bindParam(2,$des);	
	 	$sql->bindParam(3,$id);
	 	if($sql->execute()){
	 		echo 'Update task success';
	 	}else{
	 		echo 'Update task fail';
	 	}
	 	;
	 }
	 elseif ($page=="delete") {
	 	$id=$_POST['id'];
	 	$sql = $con->prepare("DELETE FROM task_list WHERE id=?");
	 	$sql->bindParam(1,$id);
	 	$sql->execute();
	 }
	 else{
	 	$sql = $con->prepare("SELECT * FROM task_list");
	 	$sql->execute();
	 	while($row = $sql->fetch()){
	 		?> 
	 		<tr>
	 			<td><?php echo $row['id'] ?></td>
	 			<td><?php echo $row['name'] ?></td>
	 			<td><?php echo $row['description'] ?></td>
	 			<td>
	 				<input type="button" class="btn btn-info" value="EDIT" data-toggle="modal" data-target="#edit-<?php echo $row['id'] ?>">
	 				<div class="modal fade" id="edit-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
        				<div class="modal-dialog" role="document">
         					<div class="modal-content">
       			 				<div class="modal-header">
           					 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							<h4 class="modal-title" id="editLabel-<?php echo $row['id'] ?>">EDIT Task</h4>
			      				</div>
			       		 <div class="modal-body">
			        		<form class='addForm'>
			        			<input type="hidden" id="<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>">
			         			<input id="task-<?php echo $row['id'] ?>" class="form-control" placeholder="Insert Task" value="<?php echo $row['name'] ?>">
			         			<input style="margin-top: 20px;" id="des-<?php echo $row['id'] ?>" class="form-control" placeholder="Description" value="<?php echo $row['description'] ?>">
			        		</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
			        <button  type="submit" data-dismiss="modal" onclick="updateData(<?php echo $row['id']?>)" class="btn btn-success" >UPDATE</button>
      				</div>
    			</div>
  				</div>
				</div>
				<input style="margin-left: 30px;" type="button" onclick="deleteData(<?php echo $row['id'] ?>)" class="btn btn-danger" value="DELETE">
	 			</td>
	 		</tr>
	 		<?php
	 	}
	 }
?>