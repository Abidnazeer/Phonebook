<!DOCTYPE html>
<html>
<head>
	<title>home</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body class="bg-secondary">
	<?php require 'menu.php';
	$sql = "SELECT * FROM contact_detail WHERE user_id =".$_SESSION["contact_id"];
	 ?>

<div>
	<h3 class="text-center mt-5">Phone Book</h3>
	<p class="text-center mt-3">Logged in as <span><?php  ?></span></p>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">			 
			
				<h3 class="mt-5 text-white">Total users is your contacts</h3>
				<h3 class="mt-2 text-white">4</h3>			 
		</div>
	</div>
</div>
			
</body>
</html>


