<?php
  $server="localhost";
  $username="root";
  $password="xampp@007";
  $dbName="AWP_LOGIN";
  $conn=mysqli_connect($server,$username,$password,$dbName);
  if(mysqli_connect_error())
  {
    echo "failed to connect with database:\n".mysqli_connect_error();
  }
?>
