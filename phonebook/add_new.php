<!DOCTYPE html>
<html>
<head>
	<title>add new</title>
	 <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<?php 

require 'menu.php'; 
require 'db.php';
$message = '';
  if(isset($_POST['update'])){

      $name = $_POST['name'];
      $designation = $_POST['designation'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
       $id = $_SESSION['contact_id'];

      if($name == ''  || $phone ==''  ){
         $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

      }
      else
      {
         $sql = " INSERT INTO contact_detail(name , designation , phone , address ,user_id)VALUES('$name' , '$designation' , '$phone' , '$address' , '".$_SESSION['contact_id']."')";
         // var_dump($sql); exit;
          $result =$connection->query($sql);

          if($result){
            	$message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>success!</strong> Add new record successfully</div>';	 
           } else {
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
           }
      }
   }

?>
<body class="bg-secondary">
	 <div class="container-fluid text-center mt-5">
	 	<div class="row">
	 		<div class="col-md-4 mt-5"></div>
	 		 <div class="col-md-4 border">
	 		   <h4 class="mt-5 mb-3 text-light">Add New</h4>
	 			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	 					<?php echo $message; ?>
	 					<div class="mt-5">
	 					<label>Name<span class="text-danger">*</span></label><input class="ml-5" type="text" name="name" placeholder="Name*">
	 					</div>
	 					<div class="mt-2">
	 					<label>Designation</label><input class="ml-3" type="name" name="designation" placeholder="Designation">	
	 					</div>
	 					<div class="mt-2">
	 					<label>Phone<span class="text-danger">*</span></label><input class="ml-5" type="phone" name="phone" placeholder="Phone*">
	 					</div>
	 					<div class="mt-2">
	 					<label>Address</label><input class="ml-5" type="address" name="address" placeholder="Address">
	 					</div>
	 					<div class="mt-3 mb-3">
	 					<button type="submit" name="update" class="btn btn-primary text-light" herf='view_all.php'>Add new</button>
	 					</div>
					</form>		 			
	 			</div>
	 			<div class="col-md-4"></div>
	 	</div>
	 </div>

</body>
</html>