<!DOCTYPE html>
<html>
<head>
  <title>login</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php 
session_start();

if(isset($_SESSION['username'])){
  header('Location: home.php');
  // redirect krne k liye use krty hain header
}
$message = '';

require 'db.php';
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
    if($username == '' || $password == ''){
     $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

  }
  else
  {

   $query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";

   $result = $connection->query($query);
    // var_dump($result); exit;

   if($result->num_rows > 0) {

     $member = $result->fetch_assoc();

     $_SESSION['username'] = $username;
     $_SESSION['contact_id'] = $password['id'];

     header('Location:home.php');
    }
   else
   {
     $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Invalid username or password</div>';  

   }

  }
}


?>

<body class="bg-secondary">
   <div class="container-fluid text-center mt-5">
    <div class="row">
      <div class="col-md-4"></div>
          <div class="col-md-4 border">
           <h3 class="mt-5 mb-3 text-light">LOGIN</h3>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <?php echo $message; ?>
            <div class="mt-5">
            <label>Username<span class="text-danger">*</span></label>
            <input name="username" class="ml-5" type="username"placeholder="Username*">
            </div>
            <div class="mt-2">
            <label>password<span class="text-danger">*</span></label>
            <input class="ml-5" type="password" name="password"placeholder="password*"> 
            <div 
            class="mt-3 mb-3">
            <button type="submit" name="submit" class="btn btn-primary text-light mb-3">LOGIN</button>
            <p>Already have an account?please register <a class="text-light" href="registration_form.php">HERE</a></p>
            </div>
          </form>         
        </div>
        <div class="col-md-4"></div>
    </div>
   </div>

  

</body>
</html>