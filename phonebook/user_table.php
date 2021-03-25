<?php 
 
 require 'db.php';

 $sql = "CREATE TABLE Users(
 	id INT(11) UNSIGNED AUTO_INCREMENT  PRIMARY KEY,
 	name VARCHAR(255) NOT NULL,  
 	username VARCHAR(255) NOT NULL,  
 	email VARCHAR(255) NOT NULL,  
 	password INT(11) NOT NULL)";  

 if ($connection->query($sql) === TRUE) {
	 echo "create table succssfully ";
 }
 else{
	 echo "Error" . $connection->error;
	}


?>
