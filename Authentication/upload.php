<?php

  require("connection.php");
  // echo "<script>alert('I m called')</script>";
  // echo $_POST['submit'];
  if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['cpass'])&&isset($_POST['submit']))
  {
    echo "<script>alert('I m called if')</script>";
    $firstName=mysqli_real_escape_string($conn,$_POST['fname']);
    $lastName=mysqli_real_escape_string($conn,$_POST['lname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pass=mysqli_real_escape_string($conn,$_POST['pass']);
    $confirm_pass=mysqli_real_escape_string($conn,$_POST['cpass']);

    // echo "I m upload.php";
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $query="SELECT email from signup WHERE email='$email'";
       // die($query);
       $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0)
        {

               // notice the single quotes are tild and not normal , awp_login is database name and signup is table name
              // $query="INSERT INTO `awp_login`.`signup`(firstName,lastName,email,password) VALUES('five','here','five@gmail.com','five')";
              $query="INSERT INTO signup(firstName,lastName,email,password) VALUES('$firstName','$lastName','$email','$pass')";
              // die($query);
              if(mysqli_query($conn,$query))
              {
                  header('Location:http://localhost/php_program_files/website5/');
                  // echo "<h1>You are registered successfully</h1>";
              }
              else
              {

                    echo "Error while inserting data";
              }
        }
        else
        {
          // echo mysqli_num_rows($result);
            header('Location:http://localhost/php_program_files/website5/authentication/login.html');
        }
       // it returns no of rows present in the output of query executed
       // echo mysqli_num_rows($result);


      // if($pass==$confirm_pass)
      // {
      //   // notice the single quotes are tild and not normal , awp_login is database name and signup is table name
      //   // $query="INSERT INTO `awp_login`.`signup`(firstName,lastName,email,password) VALUES('five','here','five@gmail.com','five')";
      //   $query="INSERT INTO signup(firstName,lastName,email,password) VALUES('$firstName','$lastName','$email','$pass')";
      //   // die($query);
      //   if(mysqli_query($conn,$query))
      //   {
      //       header('Location:http://localhost/php_program_files/website5/');
      //       // echo "<h1>You are registered successfully</h1>";
      //   }
      //   else
      //   {
      //
      //         echo "Error while inserting data";
      //   }
      // }
      // else
      // {
      //   header('Location:http://localhost/php_program_files/website5/authentication/signup.html');
      //   // echo "Redirect to sigup page";
      // }

    }
    else
    {
          // header('Location:http://localhost/php_program_files/website5/authentication/signup.html');
         echo "You have Entered Invalid Email";
         // code...
    }
  }
  // $firstName=mysqli_real_escape_string($conn,$_POST['fname']);
  // $lastName=mysqli_real_escape_string($conn,$_POST['lname']);
  // $email=mysqli_real_escape_string($conn,$_POST['email']);
  // $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  // $confirm_pass=mysqli_real_escape_string($conn,$_POST['cpass']);
  //
  // // echo "I m upload.php";
  // if(filter_var($email, FILTER_VALIDATE_EMAIL))
  // {
  //   $query="SELECT email from login WHERE email='$email'";
  //
  //    // die($query);
  //    $result=mysqli_query($conn,$query);
  //     if(!mysqli_num_rows($result))
  //     {
  //         // echo "New User";
  //         if($pass==$confirm_pass)
  //         {
  //           // notice the single quotes are tild and not normal , awp_login is database name and signup is table name
  //           // $query="INSERT INTO `awp_login`.`signup`(firstName,lastName,email,password) VALUES('five','here','five@gmail.com','five')";
  //           $query="INSERT INTO signup(firstName,lastName,email,password) VALUES('$firstName','$lastName','$email','$pass')";
  //           // die($query);
  //           if(mysqli_query($conn,$query))
  //           {
  //               header('Location:http://localhost/php_program_files/website5/');
  //               // echo "<h1>You are registered successfully</h1>";
  //           }
  //           else
  //           {
  //
  //                 echo "Error while inserting data";
  //           }
  //         }
  //         else
  //         {
  //
  //
  //           echo "<script>alert()</script>";
  //           echo "<script>";
  //           echo "alert('You have entered incorrect password');";
  //           // echo "parent.location=";
  //           echo "</script>";
  //
  //           // header('Location:http://localhost/php_program_files/website5/authentication/signup.html');
  //           // echo "Redirect to sigup page";
  //         }
  //     }
  //     else
  //     {
  //         header('Location:http://localhost/php_program_files/website5/authentication/login.html');
  //     }
  //    // it returns no of rows present in the output of query executed
  //    // echo mysqli_num_rows($result);
  //
  //
  //
  //   // if($pass==$confirm_pass)
  //   // {
  //   //   // notice the single quotes are tild and not normal , awp_login is database name and signup is table name
  //   //   // $query="INSERT INTO `awp_login`.`signup`(firstName,lastName,email,password) VALUES('five','here','five@gmail.com','five')";
  //   //   $query="INSERT INTO signup(firstName,lastName,email,password) VALUES('$firstName','$lastName','$email','$pass')";
  //   //   // die($query);
  //   //   if(mysqli_query($conn,$query))
  //   //   {
  //   //       header('Location:http://localhost/php_program_files/website5/');
  //   //       // echo "<h1>You are registered successfully</h1>";
  //   //   }
  //   //   else
  //   //   {
  //   //
  //   //         echo "Error while inserting data";
  //   //   }
  //   // }
  //   // else
  //   // {
  //   //   header('Location:http://localhost/php_program_files/website5/authentication/signup.html');
  //   //   // echo "Redirect to sigup page";
  //   // }
  //
  // }
  // else
  // {
  //       header('Location:http://localhost/php_program_files/website5/authentication/signup.html');
  //      // echo "You have Entered Invalid Email";
  //      // code...
  // }

   mysqli_close($conn);
 ?>

 <html>
   <head>
     <meta charset="utf-8">
     <title>SignUp</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style media="screen">
       table
       {
         margin-left:40rem;
         margin-right:auto;
       }
       .Heading
       {
         /* text-align:center; */
         margin-left:45em;
         margin-bottom:1rem;
       }
       label
       {
         font-size: 18px;
         font-weight:bolder;
       }
       input
       {
         border-radius: 10px;
         height:30px;
       }
     </style>
   </head>
   <body style="background:lightblue">
     <div class="main">
       <div class="">
         <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validate()">
           <div class="Heading">
             <label for="">SignUp</label>
           </div>
           <div class="">
             <table>
               <tr>
                 <td><label for="">FirstName</label></td>
               </tr>
               <tr>
                 <td><input type="text" name="fname" value="" placeholder="FirstName" required></td>
               </tr>
               <tr>
                 <td><label for="">LastName</label></td>
               </tr>
               <tr>
                 <td><input type="text" name="lname" value="" placeholder="LasttName" required></td>
               </tr>
               <tr>
                 <td><label for="">Email</label></td>
               </tr>
               <tr>
                 <td><input type="email" name="email" placeholder="Enter your Email" required></td>
               </tr>
               <tr>
                 <td><label for="">Password</label></td>
               </tr>
               <tr>
                 <td><input type="password" name="pass"  placeholder="Password" id='password' required></td>
               </tr>
               <tr>
                 <td><label for=""> Confirm Password</label></td>
               </tr>
               <tr>
                 <td id="cpass_td"><input type="password" name="cpass"  placeholder="Confirm_Password" id='confirm_password' required></td>
                 <td><input type="text" name="hidden" id="hidden" style="border:0;width:250px;color:red;background:lightblue;"></td>
               </tr>
               <tr>
                 <td style="text-align:center; padding-top:10px;"><input type="submit" name="submit" placeholder="submit"></td>
               </tr>
             </table>
           </div>
         </form>
       </div>
     </div>
     <script type="text/javascript">
       function validate()
       {
         alert();
         if(document.getElementById('password').value==document.getElementById('confirm_password').value)
         {
           alert("true");
           return true;
         }
         else
         {
          alert("Incorrect");
          document.getElementById('hidden').value="Password doesn't match, Try Again!!";
          //document.getElementById('hidden').style.color="RED";
          document.getElementById('confirm_password').value="";
          document.getElementById('confirm_password').focus();
          return false;
         }
       }

     </script>
   </body>
 </html>
