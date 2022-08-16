<?php
  require("connection.php");
  require("url.php");
  if(isset($_POST['submit']))
  {
    $update_id=mysqli_real_escape_string($conn, $_POST['update_id']);
    $title=mysqli_real_escape_string($conn, $_POST['title']);
    $author=mysqli_real_escape_string($conn, $_POST['author']);
    $body=mysqli_real_escape_string($conn, $_POST['body']);

    $query="UPDATE post SET
    title='$title',author='$author',body='$body' WHERE
    id={$update_id}";
    if(mysqli_query($conn,$query))
    {
      header('Location: '.ROOT_URL.'');
    }
    else
     {
        echo "Error".mysqli_error($conn);
     }
  }

  $id =mysqli_real_escape_string($conn,$_GET['id']);
  //query
  $query='SELECT * FROM  post where id='.$id;
  // Get result
  $result=mysqli_query($conn,$query);
  if($result==false)
  {
    echo "Error";
    echo var_dump($result);
    exit();
  }

  // echo var_dump($result);
  // fetch data
  $posts = mysqli_fetch_assoc($result);
  // echo var_dump($posts);
  // free the resources from the memory
  mysqli_free_result($result);
  mysqli_close($conn);
 ?>

  <?php include("common/header.php"); ?>
     <div class="container">
       <h1>addPost</h1>
       <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
         <div class="form-group">
           <label for="">Title</label>
           <input type="text" name="title" class="form-control" value="<?php echo $posts['title']; ?>">
         </div>
         <div class="form-group">
           <label for="">Author</label>
           <input type="text" name="author" class="form-control" value="<?php echo $posts['author']; ?>">
         </div>
         <div class="form-group">
           <label for="">Body</label>
           <textarea name="body" rows="8" cols="50" class="form-control"><?php echo $posts['body']; ?></textarea>
         </div>
         <div class="form-group" style="margin-top:10px;">
           <input type="hidden" name="update_id" value="<?php echo $posts['id']; ?>">
            <input type="submit" name="submit" value="submit" class="btn btn-primary">
         </div>

       </form>
       </div>
     </div>
     <?php include("common/footer.php"); ?>
