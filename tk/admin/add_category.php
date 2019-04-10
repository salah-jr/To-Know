<?php include 'includes/header.php'; ?>
<?php
   $db = new Database;
   if(isset($_POST['submit'])){
     $name = mysqli_real_escape_string($db->link, $_POST['name']);
     //Simple Validation
     if($name ==''){
       //Set Error
       $error = "Please Enter Required Fields";
     }
     else{
       $query = "INSERT INTO categories
                    (name)
              VALUES('$name')";
       $update_query = $db->update($query);
   }
   }
?>
<form role="form" method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category Name">
  </div>

  <input name="submit" type="submit" class="btn btn-default" value="Submit">
  <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
