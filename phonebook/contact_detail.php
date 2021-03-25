<?php 
 
 require 'db.php';

 $sql = "CREATE TABLE contact_detail(
 	id INT(11) UNSIGNED AUTO_INCREMENT  PRIMARY KEY,
 	name VARCHAR(255) NOT NULL,  
 	designation VARCHAR(255) NOT NULL,  
 	phone INT(11) NOT NULL, 
 	email VARCHAR(255) NOT NULL)";  

 if ($connection->query($sql) == TRUE) {
	 echo "create table succssfully ";
 }
 else{
	 echo "Error" . $connection->error;
	}


?>