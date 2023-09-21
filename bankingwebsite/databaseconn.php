<?php
 $servername="localhost:3307";
 $username="root";
 $password="";
 $database="baking website";

 $connection= new mysqli($servername,$username,$password,$database);

 if ($connection->connect_error){
   die("connection failed " . $connection->connect_error);
 }
 
 

?>


