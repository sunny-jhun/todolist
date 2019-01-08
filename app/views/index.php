<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title> <?php echo $pageTitle ?> </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="#"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List Application PHP and MySQL database</h2>
	</div>
	<form>
		
		<input type="text" name="name" id="new-task" class="task_input">
		<button id="addTaskBtn" class="add_btn">Add Task</button>

	</form>

	<script>
	
	//add task
	$("#addTaskBtn").click( () => {
        const newTask = $('#new-task').val();
        
        $.ajax({
          method : 'GET',
          url : '../controllers/add_task.php',
          data : {name : newTask},
        }).done( 
        	console.log('added task')
        );
     });


	</script>



	<!-- display tasks -->

	<h1 class="text-center">Task List</h1>
	<tbody>

 <div class="row justify-content-center">
 	<div class="col-12">
	<ul id="taskList" class="justify-content-center">
	
		<?php 

		require_once '../controllers/connect.php';

		$sql = "SELECT * FROM tasks";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result) ) { ?>
			<li data-id="<?php echo $row['id'] ; ?>"> 
				<?php echo $row['name'] . " is task number " . $row['id'] ; ?>
				<button class="deleteBtn">Delete</button>
			</li>

		<?php } ?>

	</ul>
  </div>
 </div>

		<script>
			// delete task
	      $('#taskList').on('click', '.deleteBtn', function() {
	        const task_id = $(this).parent().attr('data-id');
	        // console.log(task_id);
	        $.ajax({
	          method : 'post',
	          url : '../controllers/remove_task.php',
	          data : { task_id : task_id }
	        }).done( data => {
	          $(this).parent().fadeOut();
	        });
	      });

		</script>






	
</body>
</html>