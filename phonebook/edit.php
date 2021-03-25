<!DOCTYPE html>
<html>
<head>
	<title>EDIT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php

session_start();
require 'db.php'; 
$message = '';
if(isset($_POST['update'])){

	$name = $_POST['name'];
	$designation = $_POST['designation'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$id = $_POST['id'];

	if($name == ''  || $phone ==''  ){
		$message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

	}
	else
	{
		$query = "UPDATE contact_detail SET name = '$name', designation =  '$designation', phone =  '$phone', address = '$address' WHERE id ='$id'";
		$result =$connection->query($query);
         // var_dump($result); exit;
 
		if($result){
			header("Location:view_all.php"); 
		} else {
			$message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
		}
	}
}

$editid = $_GET['editid']; // GETTING ID FROM URL
$query = "SELECT * FROM contact_detail WHERE id =".$editid." AND user_id = ".$_SESSION['contact_id'];
$result = $connection->query($query);
if ($result->num_rows == 1) {
 $row = $result->fetch_assoc(); 
}
else
{
  header('Location: view_all.php');
}

?>
<body class="bg-secondary">
	<?php require 'menu.php' ?>
	<div class="container-fluid text-center mt-5">
		<div class="row">
			<div class="col-md-4 mt-5"></div>
			<div class="col-md-4 border">
				<h4 class="mt-5 mb-3 text-light">edit user</h4>
				<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
					<?php echo $message; ?>
					<div class="mt-5">
						<label>Name<span class="text-danger">*</span></label><input class="ml-5" type="text" name="name"placeholder="Name*" value="<?php  echo $row['name']?>">
						<input type="hidden" name="id" value="<?php  echo $row['id'] ?>">
					</div>
					<div class="mt-2">
						<label>Designation</label><input class="ml-3" type="text" name="designation"placeholder="Designation" value="<?php echo $row['designation'] ?>">	
					</div>
					<div class="mt-2">
						<label>Phone<span class="text-danger">*</span></label><input class="ml-5" type="text" name="phone"placeholder="Phone*" value="<?php  echo $row['phone']?>">
					</div>
					<div class="mt-2">
						<label>Address</label><input class="ml-5" type="text" name="address"placeholder="Address" value="<?php  echo $row['address']?>">
					</div>
					<div class="mt-3 mb-3">
						<button type="submit" name="update" class="btn btn-primary text-light">EDIT</button>
					</div>
				</form>		 			
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</body>
</html>