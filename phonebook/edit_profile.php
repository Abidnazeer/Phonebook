<html>
<head>
  <title>EDIT_Profile</title>
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
$sql = "SELECT * FROM users WHERE id = ".$_SESSION['contact_id'];
$result = $connection->query($sql);
$row = $result->fetch_assoc();

$message = '';
if(isset($_POST['update'])){

  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  if($name == ''  || $username == '' || $email == ''){
    $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

  }
  else
  {
    $query = "UPDATE users SET name = '$name', username =  '$username', email =  '$email' WHERE id ='".$_SESSION['contact_id']."'";
    $result =$connection->query($query);
         // var_dump($query); exit;
 
    if($result){
      header("Location:view.php"); 
    } else {
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
    }
  }
}

 ?>
<body class="bg-secondary">
  <?php require 'menu.php' ?>
  <div class="container-fluid text-center mt-5">
    <div class="row">
      <div class="col-md-4 mt-5"></div>
      <div class="col-md-4 border">
        <h4 class="mt-5 mb-3 text-light">edit_profile</h4>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <?php echo $message; ?>
          <div class="mt-5">
            <label>Name<span class="text-danger">*</span></label><input class="ml-5" type="text" name="name"placeholder="Name*" value="<?php  echo $row['name']?>">
          </div>
          <div class="mt-2">
            <label>Username</label><input class="ml-3" type="text" name="username"placeholder="Username" value="<?php echo $row['username'] ?>">  
          </div>
          <div class="mt-2">
            <label>email<span class="text-danger">*</span></label><input class="ml-5" type="text" name="email"placeholder="email" value="<?php  echo $row['email']?>">
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