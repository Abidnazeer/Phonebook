<!DOCTYPE html>
<html>
<head>
	<title>add User</title>
	 <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body class="bg-secondary">

	 <?php require 'menu.php';?>

	 <div class="container-fluid text-center mt-5">
	 	<div class="row">
	 		<div class="col-md-4 mt-5">
	 					
	 				</div>
	 				<div class="col-md-4">
	 				<form class="border">
	 				 <h3 class="mt-5 mb-3 text-light">Add User</h3>
	 					<div class="mt-5">
	 					<label>Name<span class="text-danger">*</span></label><input class="ml-3" type="name" name="name"placeholder="Name*">
	 					</div>
	 					<div class="mt-2">
	 					<label>Desig</label><input class="ml-4" type="name" name="name"placeholder="Designation">	
	 					</div>
	 					<div class="mt-2">
	 					<label>Phone<span class="text-danger">*</span></label><input class="ml-2" type="name" name="name"placeholder="Phone*">
	 					</div>
	 					<div class="mt-2">
	 					<label>Address</label><input class="ml-1" type="name" name="name"placeholder="Address">
	 					</div>
	 					<div class="mt-5 mb-3">
	 					<button class="btn btn-primary text-light">ADD</button>
	 					</div>

	 				</form>		 			
	 			</div>
	 			<div class="col-md-4">

            </div>
	 	</div>
	 </div>

	

</body>
</html>