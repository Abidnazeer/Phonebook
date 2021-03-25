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


$sql = "SELECT * FROM Users WHERE id = ".$_SESSION['contact_id'];
$result = $connection->query($sql);
$row = $result->fetch_assoc();
// var_dump($row); exit;


 ?>
<body class="bg-secondary">
    <div class="container text-center">
      <h3 class="mt-5">User Profile</h3>
      <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2"></div>
          <div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table table-bordered mt-5">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><a href="edit_profile.php">edit</a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2"></div>
        </div>
      </div>
</body>
</html>