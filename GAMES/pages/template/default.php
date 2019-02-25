<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?= App::getInstance()->title; ?></title>
	<!-- CSS  -->
	<link href="css/awesome.css" rel="stylesheet"  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="css/reset.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php" class="logo-img">
					<img src="../public/img/res/logo.png" alt="">
					<p>The best place for Gamers.</p>
				</a>
				<div class="search">
					<input type="text" placeholder="Search for Games/Articles...">
					<button><i class="fas fa-search"></i></button>
				</div>
			</div>
			<div class="nav">
				<ul class="nav-l">
					<li><a href="index.php">Index</a></li>
					<li><a href="#">Lorem</a></li>
					<li><a href="#">Ipsum</a></li>
					<li><a href="#">Dolor</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<ul class="nav-r">
					<?php if(!empty($_SESSION)) { ?>
					<li><a href="admin.php">Admin</a></li>
					<li><a class="blue-bg" href="index.php?p=logout">Se Déconnecter</a></li>
					<?php } else { ?>
					<li><a href="#">S'inscrire</a></li>
					<li><a class="blue-bg" href="index.php?p=login">Se Connecter</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="cont">
		<?= $content; ?>
	</div>

	<div class="footer">
		Build with <i class="fas fa-heart"></i> by <a href="http://github.com/ofsen">@ofsen</a> | All rights reserved
	</div>
	
	<script src="../public/js/main.js"></script>
</body>
</html>