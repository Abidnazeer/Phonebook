<?php 
 
 require 'db.php';

 $sql = "CREATE DATABASE phonebook";
if ($connection->query($sql) === TRUE) {
	echo "create database succssfully ";
}
else{
	echo "connection Error:" . $connection->error;
}



 ?>