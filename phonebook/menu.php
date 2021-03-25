<?php

session_start();
if (!$_SESSION) {
  header('Location:login.php');
}
require 'db.php';
$sql = "SELECT * FROM contact_detail WHERE user_id = ".$_SESSION['contact_id'];
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $count = $result->num_rows;
}
else{
  $count = 0;
}


 ?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark text-light">
    <h4>Phonebook Directory</h4>
     <ul class="navbar-nav ml-auto">
       <li class="nav-item active">
         <a class="nav-link" href="home.php">Home</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="add_new.php">Add new</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="View_all.php">View all <span class="text-danger "><?php echo $count; ?></span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link " href="view.php">View</a>
       </li>
       <li class="nav-item">
         <a class="nav-link " href="Change_password.php">Change_password</a>
       </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li> 
     </ul>
   </nav>