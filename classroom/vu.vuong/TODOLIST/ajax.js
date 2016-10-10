function saveData(){
	var task = $('#task').val();
	var des = $('#des').val(); 
	if(task == ""){
		alert('Please insert task');
	}
	else{
		$.ajax({
		type:"POST",
		url: "db.php?p=add",
		data: "task="+task+"&des="+des,
		success: function(msg){
			alert("Success add task");
			loadData();	
		}
	});
	}
}
function loadData(){
	$.ajax({
		type:'GET',
		url:"db.php",
		success:function(data){
			$('tbody').html(data);
		}
	});
}
function updateData(str){
	var id=str;
	var task = $('#task-'+str).val();
	var des = $('#des-'+str).val();
	$.ajax({
		type:"POST",
		url:"db.php?p=edit",
		data:"task="+task+"&des="+des+"&id="+id,
		success:function(data){
			loadData();
			$('.modal-backdrop').hide();
		}
	}) 
}
function deleteData(str){
	var id=str;
	$.ajax({
		type:"POST",
		url:"db.php?p=delete",
		data:"id="+id,
		success:function(data){
			loadData();
		}
	}) 
}
