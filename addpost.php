<?php
  require("connection.php");
  require("url.php");
  if(isset($_POST['submit']))
  {
    $title=mysqli_real_escape_string($conn, $_POST['title']);
    $author=mysqli_real_escape_string($conn, $_POST['author']);
    $body=mysqli_real_escape_string($conn, $_POST['body']);
    if(empty($title)||empty($author)||empty($body))
    {
        echo "<script>alert('Enter all the fields');</script>";
    }
    else
    {
      $query="INSERT INTO post(title,author,body) VALUES('$title','$author','$body')";
      if(mysqli_query($conn,$query))
      {
        header('Location: '.ROOT_URL.'');
      }
      else
       {
          echo "Error".mysqli_error($conn);
       }
    }
  }
 ?>

  <?php include("common/header.php"); ?>
     <div class="container">
       <h1>addPost</h1>
       <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
         <div class="form-group">
           <label for="">Title</label>
           <input type="text" name="title" class="form-control" required>
         </div>
         <div class="form-group">
           <label for="">Author</label>
           <input type="text" name="author" class="form-control" required>
         </div>
         <div class="form-group">
           <label for="">Body</label>
           <textarea name="body" rows="8" cols="50" class="form-control" required></textarea>
         </div>
         <div class="form-group" style="margin-top:10px;">
            <input type="submit" name="submit" value="submit" class="btn btn-primary" onsubmit="call()">
         </div>
       </form>
       </div>
     </div>
     <!-- <script type="text/javascript">
       function call()
       {
         var title=document.getElementsById('title').value;
         var author=document.getElementsById('author').value;
         var body=document.getElementsById('body').value;
         if(title==""||author==""||body=="")
         {
           alert("");
         }
       }
     </script> -->
     <?php include("common/footer.php"); ?>
