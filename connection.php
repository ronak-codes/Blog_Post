<?php
$server="localhost";
$username="root";
$password="xampp@007";
$dbName="blog";
// creating  connection
$conn = mysqli_connect($server,$username,$password,$dbName);
// checking if connection is made or note
if(mysqli_connect_error())
{
  echo "failed to connect to database ==> ".mysqli_connect_error();
}
// else
// {
//   echo "connection established<br>";
// }

 ?>
