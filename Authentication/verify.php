<?php

    require("connection.php");
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    // echo "I m called<br>";


    $query="SELECT email,password FROM login where email='$email'";
    // echo "result of query = ".$query."<br>";
    // Get result
    $result=mysqli_query($conn,$query);
    // echo var_dump($result)."<br><br>";111
    if($result==false)
    {
      echo "Email does not exists:<br>";
      exit();
    }
    else
    {
      $posts = mysqli_fetch_assoc($result);
      // echo var_dump($posts)."<br><br>";
      // free the resources from the memory

    }
    mysqli_free_result($result);
    mysqli_close($conn);

 ?>

 <?php
 if(isset($posts['email'])&&isset($posts['password']))
 {
   // echo "<script>Entereing</script>";
   $db_email=$posts['email'];
   $db_password=$posts['password'];
   if($db_email==$email&&$db_password==$pass)
    {
      // header('Location:http://localhost/php_program_files/website5/');
      echo "<h1>Authenticated user</h1><br>";
    }
    else
    {

      echo "<script>alert('Email is not Registered');</script>";
      // header('Location:http://localhost/php_program_files/website5/Authentication/login.html');
    }
    // else
    // {
    //     header('Location:http://localhost/php_program_files/website5/Authentication/login.html');
    //     // echo "<script>alert('You have Entered Incorrect Password')</script>";
    //     // echo "<h2>Incorrect Password</h2>";
    // }
 }
 else
 {

   echo "<script>alert('Email is not Registered')</script>";
   header('Location:http://localhost/php_program_files/website5/Authentication/login.html');
 }
?>
