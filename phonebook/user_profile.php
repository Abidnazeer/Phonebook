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
    <?php require 'menu.php' ?>

    <div class="container text-center text-light">
      <h3 class="mt-5">User Profile</h3>
      <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2"></div>
          <div class="col-lg-8 col-md-8 col-sm-8">
            <table class="table table-bordered mt-5">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                   <td>Mark</td>
                   <td>Otto</td>
                   <td>@mdo</td>
                   <td><a href="Edit" class="text-light">Edit</a></td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2"></div>
        </div>
      </div>
</body>
</html>