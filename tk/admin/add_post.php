<?php include 'includes/header.php'; ?>
<?php
   $db = new Database;
   if(isset($_POST['submit'])){
     $title = mysqli_real_escape_string($db->link, $_POST['title']);
     $body = mysqli_real_escape_string($db->link, $_POST['body']);
     $category = mysqli_real_escape_string($db->link, $_POST['category']);
     $author = mysqli_real_escape_string($db->link, $_POST['author']);
     $image = mysqli_real_escape_string($db->link, $_POST['image']);
     $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
     //Simple Validation
     if($title =='' || $body =='' || $category =='' || $author =='' || $tags =='' || $image =='' ){
       //Set Error
       $error = "Please Enter Required Fields";
       echo $error;
     }
     else{
       $query = "INSERT INTO posts
                    (title, body, category, author, tags, image)
              VALUES('$title', '$body', '$category', '$author', '$tags', '$image')";
       $insert_query = $db->INSERT($query);
   }
   }
?>
<?php
    $db = new Database;
    //Create query
    $query = "SELECT * FROM categories";
    //Run query
    $categories = $db->select($query);
?>
<form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>

  <div class="form-group b">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
  </div>

  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
      <?php while($rowc = $categories->fetch_assoc()) : ?>
        <?php
          if($rowc['id'] == $rowp['category']){
            $selected = 'selected';
           }  else {
              $selected = '';
           }

        ?>
        <option <?php echo $selected; ?> value="<?php echo $rowc['id'] ?>"><?php echo $rowc['name'] ?></option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
  </div>

  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>

  <div class="form-group">
    <label>image</label>
    <input name="image" type="text" class="form-control" placeholder="Enter image link like(images/...)">
  </div>
  <div>
  <input name="submit" type="submit" class="btn btn-default" value="Submit">
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>

</form>

<?php include 'includes/footer.php'; ?>
