<html>
<head>
  <title>To do List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body onload="loadData()">

  <div class="container">
  <input type="button" value="Add new task" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addData">
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addLabel">Add Task</h4>
      </div>
        <div class="modal-body">
        <form class='addForm'>
         <input id="task" class="form-control" placeholder="Insert Task">
         <input style="margin-top: 20px;" id="des" class="form-control" placeholder="Description">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button  type="submit" onclick="saveData()" class="btn btn-success" >Add</button>
      </div>
    </div>
  </div>
</div>
  <table class="table table-bordered table-striped">
    <caption>TODO LIST</caption>
    <thead>
      <tr>
        <th>ID</th>
        <th>Task name</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
  </table>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='ajax.js'></script> 
</body>
</html>