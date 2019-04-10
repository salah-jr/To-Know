<?php include 'includes/header.php'; ?>
<?php
  $id = $_GET['id'];
  //Create object
  $db = new Database;
  //Create query
  $query = "SELECT * FROM posts WHERE id=".$id;
  //Run query
  $posts = $db->select($query)->fetch_assoc();

  //Create query
  $query = "SELECT * FROM categories";
  //Run query
  $categories = $db->select($query);
?>
<?php

    if(isset($_POST['submit'])){
      $title = mysqli_real_escape_string($db->link, $_POST['title']);
      $body = mysqli_real_escape_string($db->link, $_POST['body']);
      $category = mysqli_real_escape_string($db->link, $_POST['category']);
      $author = mysqli_real_escape_string($db->link, $_POST['author']);
      $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
      $image = mysqli_real_escape_string($db->link, $_POST['image']);
      //Simple Validation
      if($title =='' || $body =='' || $category =='' || $author =='' || $image ==''){
        //Set Error
        $error = "Please Enter Required Fields";
      }
      else{
        $query = "UPDATE posts
                  SET
                  title = '$title',
                  body = '$body',
                  category = '$category',
                  author = '$author',
                  tags = '$tags',
                  image = '$image'
                  WHERE id=".$id;
      $update_row = $db->update($query);
}
}
?>

<?php

    if(isset($_POST['delete'])){
      $query = "DELETE FROM posts WHERE id = ".$id;
      $delete_row = $db->delete($query);
    }
?>

<form role="form" method="post" action="edit_post.php?id=<?php echo $id ;?>">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $posts['title']; ?>">
  </div>

  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"><?php echo $posts['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label>category</label>
    <select name="category" class="form-control">
      <?php while($row = $categories->fetch_assoc()) : ?>
        <?php
          if($row['id'] == $post['category']){
            $selected = 'selected';
           }  else {
              $selected = '';
           }

        ?>
        <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name" value="<?php echo $posts['author']; ?>">
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $posts['tags']; ?>">
  </div>

  <div class="form-group">
    <label>image</label>
    <input name="image" type="text" class="form-control" placeholder="Enter image" value="<?php echo $posts['image']; ?>">
  </div>
  <div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit">
    <input name="delete" type="submit" class="btn btn-danger" value="Delete">
    <br>
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>
<?php include 'includes/footer.php'; ?>
