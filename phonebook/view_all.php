<!DOCTYPE html>
<html>
<head>
  <title>ADD User</title>
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


$sql = "SELECT * FROM contact_detail WHERE user_id = ".$_SESSION['contact_id'];
$result = $connection->query($sql);
 ?>
<body class="bg-secondary">
    <div class="container text-center">
      <h3 class="mt-5">view all contact</h3>
      <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2"></div>
          <div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table table-bordered mt-5">
              <thead>
                <tr>
                  <th scope="col">S.on</th>
                  <th scope="col">Name</th>
                  <th scope="col">Designation</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
                  
              <tbody>
                <tr>
                    <?php if ($result->num_rows >  0) {
                      $count = 1;
                      while($row = $result->fetch_assoc()){
                      ?>
                      <tr>
                        <th><?php echo $count; ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['designation'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td> <a href="edit.php?editid=<?php echo $row["id"]; ?>" class="text-decoration-none text-white mr-2">Edit </a> |  <a href="delete.php?deleteid=<?php echo $row["id"]; ?>" class="text-decoration-none text-white ml-2" onclick="return confirm('Are you sure do you wan\'t to delete the user?')">Delete </a></td>
                      </tr>
                      <?php $count++; }
                        } else {?>
                      <tr>
                        <td colspan="6" class="text-center text-white"> No Record Found</td>
                      </tr>
                    <?php }?>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2"></div>
        </div>
      </div>
</body>
</html>