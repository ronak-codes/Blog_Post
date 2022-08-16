<?php
  require("connection.php");
  require("url.php");
  //query
  $query="SELECT * FROM  post ORDER BY created_at DESC";
  // Get result
  $result=mysqli_query($conn,$query);
  // echo var_dump($result);
  // fetch data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // echo var_dump($posts);
  // free the resources from the memory
  mysqli_free_result($result);
  mysqli_close($conn);
  // echo $result;
 ?>

  <?php include("common/header.php"); ?>
     <div class="container">
       <h1>POSTS</h1>
       <?php foreach($posts as $post) : ?>
        <div class="well">
          <h3><?php echo $post['title']; ?></h3>
          <small>
            Created on <?php echo $post['created_at']; ?> by
            <?php echo $post['author'] ; ?>
          </small>
          <p><?php echo $post['body']; ?></p>
          <a  class="btn btn-secondary" href="post.php?id=<?php echo $post["id"];?>">Read More</a>
        </div>
        <?php endforeach;  ?>
     </div>
     <?php include("common/footer.php"); ?>
