<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php 
require 'db.php';
$message = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password =$_POST['confirm_password'];

  if($name == '' || $username == ''  || $email == ''  || $password == '' || $confirm_password ==''){
    $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>'; 

  }
  else if( $password != $confirm_password){
    
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Passwords do not match.</div>'; 
  }
  else
  {
    $emailExists = $connection->query("SELECT * FROM users WHERE email = '$email' ");
    $usernameExists = $connection->query("SELECT * FROM users WHERE username = '$username' ");

    if ($usernameExists->num_rows == 1) {
      
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username already exists</div>';
    }
    elseif ($emailExists->num_rows == 1) {
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email already exists</div>';
      
    }
    else
    {
        $sql = "INSERT INTO users(name, username, email, password) VALUES ('$name','$username','$email', '$password')";
        $result = $connection->query($sql);
        if($result == TRUE){
          $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Record added successfully</div>'; 
        }
        else  
        {
          $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';  
        }
    }
  }
}


?>

<body class="bg-secondary">
   <div class="container-fluid text-center mt-5">
    <div class="row">
      <div class="col-md-4 mt-5"></div>
          <div class="col-md-4 border">
          <h3 class="mt-5 mb-3 text-light">Registration</h3>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php echo $message; ?>
            <div class="mt-5">
            <label>Name<span class="text-danger">*</span></label><input name="name" class="ml-5" type="name" name="name"placeholder="Name*">
            </div>
            <div class="mt-2">
            <label>Username<span class="text-danger">*</span></label><input name="username" class="ml-4" type="name" placeholder="Username*"> 
            </div>
            <div class="mt-2">
            <label>Email<span class="text-danger">*</span></label><input name="email" class="ml-5" type="name" placeholder="email*">
            </div>
            <div class="mt-2">
            <label>Password<span class="text-danger">*</span></label><input name="password" class="ml-4" type="password" placeholder="password*">
            </div>
            <div class="mt-2">
            <label>Confirm<br>Password<span class="text-danger">*</span></label><input name="confirm_password" class="ml-4" type="password" placeholder="confirm password*">
            </div>
            <div class="mt-3 mb-3">
            <button type="submit" name="submit" class="btn btn-primary text-light">REGISTER</button>
            </div>
            <h6 class="text-primary">All ready an account?please login <a href="login.php" class="text-light">HERE</a></h6>
          </form>         
        </div>
        <div class="col-md-4">

            </div>
    </div>
   </div>

  

</body>
</html>

