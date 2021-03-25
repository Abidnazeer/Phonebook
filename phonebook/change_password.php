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
<?php

require 'menu.php'; 
require 'db.php';
    $message= '';
        if(isset($_POST['update']))
        {
          $old_password = $_POST['old_password'];
          $new_password = $_POST['new_password'];
          $confirm_password = $_POST['confirm_password'];
          if($old_password == ''  || $new_password ==''  || $confirm_password ==''  ){
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  
          } 
          else 
          {
             $sql = "SELECT * FROM users where id = ".$_SESSION['contact_id']." AND password = '".$old_password."'";
              $result = $connection->query($sql);

              if ($result->num_rows == 1) {
                if ($new_password == $confirm_password) {
                  $query = "UPDATE users SET password='".$new_password."' WHERE id =".$_SESSION['contact_id'];

                   $result= $connection->query($query);
                   if($result){
                      $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Password Changed successfully.</div>';
                   }else {
                      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> There was error while adding record.</div>';  
                   } 
                } else if($password != $confirm_password){
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Confirm Password does not match.</div>';  
               } 
              }else {
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Old Password does not match.</div>';  
               }  


             
          }
        }

?>
<body class="bg-secondary">


   <div class="container-fluid text-center mt-5">
    <div class="row">
      <div class="col-md-4 mt-5">
            
          </div>
          <div class="col-md-4 border">
           <h4 class="mt-5 mb-3 text-light">change password</h4>
          <form action="<?php echo $_SERVER['PHP_SELF']?> " method= "POST">
             <?php echo $message; ?>
            <div class="mt-5">
            <label>old <br> password<span class="text-danger">*</span></label><input class="ml-5" type="password" name="old_password"placeholder="old password*">
            </div>
            <div class="mt-2">
            <label>new <br> password<span class="text-danger">*</span></label><input class="ml-5" type="password" name="new_password"placeholder="new password*"> 
            </div>
            <div class="mt-2">
            <label>confirm<br>new password<span class="text-danger">*</span></label><input class="ml-2" type="Password" name="confirm_password"placeholder="Password*">
            </div>
            <div class="mt-3 mb-3">
            <button type="submit" name="update" class="btn btn-primary text-light">CHANGE</button>
            </div>

          </form>         
        </div>
        <div class="col-md-4">

            </div>
    </div>
   </div>

  

</body>
</html>

