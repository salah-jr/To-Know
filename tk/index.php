<!DOCTYPE HTML>
<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php include 'helpers/format_helper.php'; ?>
<?php
  $db = new Database();
	//create query
	$query = "SELECT * FROM posts ORDER BY id DESC";
	//run query
	$posts = $db->SELECT($query);
	//create query
	$query = "SELECT * FROM categories";
	//run query
	$categories = $db->SELECT($query);

  $query = "SELECT * FROM posts ORDER BY id DESC";
  $post = $db->SELECT($query);
?>
<html>
	<head>
		<title>To Know !</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"> <a href="index.php">T<span>K</span></a> </div>
				<a href="#menu" class="posts">Posts</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<?php if($post) : ?>
				<ul class="links">
					<?php while($row = $post->fetch_assoc()) : ?>
					<li><a href="post1.php?id=<?php echo urlencode($row['id']); ?>" target="_blank"><?php echo $row['title']; ?></a></li>
					<?php endwhile; ?>
				</ul>
			<?php else : ?>
			<p>There are no posts</p>
			<?php endif; ?>
			</nav>

		<!-- Banner -->
			<section class="banner full">
			</div>
				<article>
					<img src="images/bg.jpg"  alt="" />
					<div class="inner">
						<header>
							<p class="typing">Technology News, Tutorials, Events, And Some Popular Concepts</p>
							<h2>To Know</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/bg4.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Technology News, Tutorials, Events, And Some Popular Concepts</p>
							<h2>To Know</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/bg6.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Technology News, Tutorials, Events, And Some Popular Concepts</p>
							<h2>To Know</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/bg7.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Technology News, Tutorials, Events, And Some Popular Concepts</p>
							<h2>To Know</h2>
						</header>
					</div>
				</article>

			</section>

		<!-- One -->

			<section id="one" class="wrapper style2">
				<div class="inner">

					<div class="grid-style">
						<?php if($posts) : ?>
							<?php while($row = $posts->fetch_assoc()) : ?>
						<div>
							<div class="box">
								<div class="image fit t">
									<a href="post1.php?id=<?php echo urlencode($row['id']); ?>"><img src="<?php echo $row['image']; ?>" alt="" /></a>
								</div>
								<div class="content">
									<header class="align-center">
										<p><?php echo formatDate($row['date']); ?> by Mohamed Salah</p>
										<a class="aa" href="post1.php?id=<?php echo urlencode($row['id']); ?>"><h2><?php echo $row['title']; ?></h2></a>
									</header>
									<p class="rtl"><?php echo shortenText($row['body']); ?></p>
									<footer class="align-center">
										<a href="post1.php?id=<?php echo urlencode($row['id']); ?>" target="_blank" class="button alt">Learn More</a>
									</footer>

								</div>

							</div>

						</div>
					<?php endwhile; ?>
					<?php else : ?>
						<p>There is no posts yet</p>
					<?php endif; ?>
						<footer class="browse">
							<a "#" class="button alt t">BROWSE ALL</a>
						</footer>
					</div>

				</div>

			</section>

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<div class="ss">
							<div class="about">Mohamed Salah</div>
							<hr />
							<p>Junior Full Stack Develober, and Graphic designer.</p>
							<img src="images/img.jpg" class="img">
						<div>
					</header>
				</div>
			</section>



		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="social">
						<li><a href="https://www.facebook.com/Mr.Salah22" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>&nbsp
						<li><a href="https://twitter.com/Mr_salah22" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>&nbsp
						<li><a href="https://www.linkedin.com/in/salah96/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>&nbsp
						<li><a href="https://www.instagram.com/m._.sala7/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>&nbsp
				</ul>
				</div>
				<div class="copyright">
					&copy; Mohamed Salah. April,2017.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="https://use.fontawesome.com/dbb72ac4f9.js"></script>
	</body>
</html>
