<?php
  require("connection.php");
  require("url.php");

  if(isset($_POST['delete']))
  {
    $delete_id=mysqli_real_escape_string($conn, $_POST['delete_id']);

    $query="DELETE FROM post WHERE id=".$delete_id;
    // die($query);
    if(mysqli_query($conn,$query))
    {
      // echo "<h1>Good Job</h1>";
      header('Location: '.ROOT_URL.'');
    }
    else
     {
        echo "Error".mysqli_error($conn);
     }
  }

  //get id
  $id =mysqli_real_escape_string($conn,$_GET['id']);
  //query
  $query='SELECT * FROM  post where id='.$id;
  // Get result
  $result=mysqli_query($conn,$query);
  // if($result==True)
  // {
  //   echo "true";
  // }
  // else
  // {
  //   echo "False";
  // }
  // echo var_dump($result);
  // echo var_dump($result);
  // fetch data
  $posts = mysqli_fetch_assoc($result);
  // echo var_dump($posts);
  // free the resources from the memory
  mysqli_free_result($result);
  mysqli_close($conn);
  // echo $result;
 ?>

<?php include("common/header.php"); ?>
      <div class="container">
       <a  style="margin-top:10px;margin-bottom:10px;" href="<?php echo ROOT_URL ?>" class ="btn btn-secondary">Back</a>
       <h1><?php echo $posts['title']; ?></h1>
      <small>
          Created on <?php echo $posts['created_at']; ?> by
          <?php echo $posts['author'] ; ?>
      </small>
      <p><?php echo $posts['body']; ?></p>
      <hr>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="float:right;">
          <input type="hidden" name="delete_id" value="<?php echo $posts['id']; ?>">
          <input type="submit" name="delete" value="Delete" class="btn btn-danger">
      </form>
      <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $posts['id']; ?>" class="btn btn-primary">Edit</a>
     </div>
<?php include("common/footer.php"); ?>
