<?php include '../libraries/Database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>
<?php include '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area</title>
    <link href="../post_css/bootstrap.css" rel="stylesheet">
    <link href="../../assets/post_css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../post_css/custom.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="blog-mastheadd">
      <div class="container s">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dash Board</a>
          <a class="blog-nav-item" href="add_post.php">Add Post</a>
          <a class="blog-nav-item" href="add_category.php">Add Category</a>
          <a class="blog-nav-item pull-right" href="../index.php">Visit Blog</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h2>Admin Area</h2>
      </div>


        <div>
          <div class="col-sm-12 blog-main">
            <?php if (isset($_GET['msg'])) : ?>
              <div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
            <?php endif; ?>
          </div>
        </div>
