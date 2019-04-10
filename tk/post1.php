<!DOCTYPE HTML>
<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'helpers/format_helper.php'; ?>
<?php
	$id = $_GET['id'];
  $db = new Database();
	//create query
	$query = "SELECT * FROM posts WHERE id = ".$id;
	//run query
	$post = $db->SELECT($query);
	$post = $post->fetch_assoc();
	//create query
	$query = "SELECT * FROM categories";
	//run query
	$categories = $db->SELECT($query);
?>
<html>
	<head>
		<title>To Know !</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="assets1/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="logo"><a href="index.php">To <span>Know</span></a></div>
				<a href="index.php">Home</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<?php if($categories) : ?>
				<ul class="links">
					<?php while($row = $categories->fetch_assoc()) : ?>
					<li><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
					<?php endwhile; ?>
				</ul>
			<?php else : ?>
			<p>There are no categories</p>
			<?php endif; ?>
			</nav>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Technology News, Tutorials, Events, And Some Popular Concepts</p>
						<h2>To Know</h2>
					</header>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p><?php echo formatDate($post['date']); ?> by <?php echo $post['author']; ?></p>
								<h2><?php echo $post['title']; ?></h2>
							</header>
							<p class="rtl"><?php echo $post['body']; ?></p>
							</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="https://www.facebook.com/Mr.Salah22" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://twitter.com/Mr_salah22" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://www.linkedin.com/in/salah96/" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
						<li><a href="https://www.instagram.com/m._.sala7/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>

					</ul>
				</div>
				<div class="copyright">
					&copy; Mohamed Salah. April,2017.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets1/js/jquery.min.js"></script>
			<script src="assets1/js/jquery.scrollex.min.js"></script>
			<script src="assets1/js/skel.min.js"></script>
			<script src="assets1/js/util.js"></script>
			<script src="assets1/js/main.js"></script>

	</body>
</html>
