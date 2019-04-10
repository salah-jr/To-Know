<?php include 'includes/header.php'; ?>
<?php
  //Create object
  $db = new Database;
  //Create query
  $query = "SELECT posts.*, categories.name FROM posts
                INNER JOIN categories
                ON posts.category = categories.id
                ORDER BY posts.title DESC";
  //Run query
  $posts = $db->select($query);

  //Create query
  $query = "SELECT * FROM categories ORDER BY name DESC";
  //Run query
  $categories = $db->select($query);
  $name = $_POST['search'];
  $search = "SELECT * FROM posts WHERE title = $name";
?>
<!--Post Table -->
<form action="#" method="post">
  <textarea name="search" class="form-control" placeholder="search"></textarea>
  <input type="submit">
</form>
<table class="table table-striped">
  <tr>
    <th>Post ID#</th>
    <th>Title</th>
    <th>Category</th>
    <th>Author</th>
    <th>Date</th>
  </tr>
    <?php while ($rowp = $posts->fetch_assoc()) : ?>
  <tr>
      <td><?php echo $rowp['id']; ?></td>
      <td><a href="edit_post.php?id=<?php echo $rowp['id']; ?>"> <?php echo $rowp['title']; ?> </a></td>
      <td><?php echo $rowp['name']; ?></td>
      <td><?php echo $rowp['author']; ?></td>
      <td><?php echo formatDate($rowp['date']); ?></td>
  </tr>
    <?php endwhile; ?>
</table>
<br>
<!--Category Table -->
<table class="table table-striped">
  <tr>
    <th>Category ID#</th>
    <th>Name</th>
  </tr>
  <?php while ($rowc = $categories->fetch_assoc()) : ?>
    <tr>
      <td><?php echo $rowc['id'] ?></td>
      <td><a href="edit_category.php?id=<?php echo $rowc['id'] ?>"><?php echo $rowc['name'] ?></a></td>
    </tr>
  <?php endwhile; ?>
</table>
<?php include 'includes/footer.php'; ?>
