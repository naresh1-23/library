<?php
   $host = "localhost";
   $username = "root";
   $password = "";
   $dbname = "library";

  $conn = mysqli_connect($host,$username,$password,$dbname);
  
  if(!$conn){
      die("connection failed");
  }
  
?>