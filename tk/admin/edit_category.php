<?php include 'includes/header.php'; ?>
<?php
    $id = $_GET['id'];
    //Create object
    $db = new Database;
    //Create query
    $query = "SELECT * FROM categories WHERE id=".$id;
    //Run query
    $category = $db->select($query)->fetch_assoc();
    //create query
    $query = "SELECT * FROM categories";
    //run query
    $categories = $db->select($query);
?>
<?php
    if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($db->link, $_POST['name']);
      //Simple Validation
      if($name ==''){
        //Set Error
        $error = "Please Enter Required Fields";
      }
      else{
        $query = "UPDATE categories
                  SET
                  name = '$name'
                  WHERE id=".$id;
      $update_row = $db->update($query);
}

}
?>

<?php
    if(isset($_POST['delete'])){
        $query = "DELETE FROM categories WHERE id = ".$id;
        $delete_row = $db->delete($query);
    }
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id; ?>">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter Category Name" value="<?php echo $category['name']; ?>">
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
