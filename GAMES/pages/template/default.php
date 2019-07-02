<?php 

if(empty($_SESSION)) {
	$form = new \App\HTML\GamesForm($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title><?= App::getInstance()->title; ?></title>
	<!--	 CSS	 -->
    <link href="css/reset.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/awesome.css" rel="stylesheet"  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="../public/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<!--	 JS		 -->
	<script src="../public/js/main.js"></script>
	<script src="../public/js/jquery.min.js"></script>
	<!--	Favicon	-->
	<link rel="shortcut icon" href="../public/img/res/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../public/img/res/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="large">
	<div id="black" onclick="hide($(this))"> </div>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php" class="logo-img">
					<img src="../public/img/res/logo.png" alt="">
					<p>The best place for Gamers.</p>
				</a>
				<div class="search">
					<form method="post" action="index.php?p=search">
						<input type="text" id="srchfield" name="srchfield" placeholder="Recherche...">
						<button id="srch" name="srch"><i class="fas fa-search"></i></button>
					</form>
				</div>
			</div>
			<div class="nav">
				<ul class="nav-l">
					<li><a href="index.php">Index</a></li>
					<li><a href="index.php?p=games">Jeux</a></li>
					<li><a href="index.php?p=platforms">Plateformes</a></li>
					<li><a href="index.php?p=cats">Catégories</a></li>
					<li><a href="index.php?p=contact">Contact</a></li>
				</ul>
				<ul class="nav-r">
					<?php 
					if(!empty($_SESSION)) {
						?>
						<li><a href="index.php?p=user&id=<?= $_SESSION['auth']; ?>">Profil</a></li>
						<?php
						if($_SESSION['auth'] == '1') {
							?>
							<li><a href="admin.php">Admin</a></li>
							<?php 
						}
						?>
					<li><a class="blue-bg" href="index.php?p=logout">Se Déconnecter</a></li>
						<?php
					} else { 
					?>
					<li><a href="index.php?p=signup">S'inscrire</a></li>
					<li><a class="blue-bg" href="#" onclick="loginShow()">Se Connecter</a></li>
					<?php } ?>
				</ul>
				<a href="#" class="nav-mobile" onclick="sideNavShow()">
					<i class="fas fa-bars"></i>
				</a>
				<ul class="nav-m-l">
					<h4>Menu</h4>
					<hr>
					<li><a href="index.php">Index</a></li>
					<li><a href="index.php?p=games">Jeux</a></li>
					<li><a href="index.php?p=platforms">Plateformes</a></li>
					<li><a href="index.php?p=cats">Catégories</a></li>
					<li><a href="index.php?p=contact">Contact</a></li>
				</ul>
			</div>

		</div>
	</div>

	<div class="cont">
		<?= $content; ?>
	</div>

	<div class="footer">
		Build with <i class="fas fa-heart"></i> by <a href="http://github.com/ofsen/games">@_ofsen & Co.</a> | All rights reserved
	</div>

	<?php if(empty($_SESSION)) { ?>
	<div class="login" id="login">
		<h4>Se Connecter</h4>
		<hr>
		<span onclick="loginHide()" >&times;</span>
		<form method="post" id="loginForm">
			<?= $form->input('username', 'Pseudo'); ?>
			<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
			<div class="row">
				<button type="submit" id="submit" name="action">Login</button>
			</div>
		</form>
		<p style="display: block; text-align:center; font-size: 0.8em; padding: 0.5em 0;">Pas encore inscrit ? <a href="index.php?p=signup" style="color: #007cb6;">s'inscrire</a></p>
		<div id="error" style="display:none;" class="danger"></div>
	</div>
	<?php } ?>
	</div>
	
	<div id="small">
		<p>Sorry but your screen is so small that we don't have enough space to show our content or even to apologize... </p>
	</div>

	<script type="text/javascript">
	$(document).ready(function() {
		$("#loginForm").submit(function() {
			$("#error").css("display","none");
			var user = $(this).find("input[name=username]").val();
			var pass = $(this).find("input[name=password]").val();
			$.ajax({
				method	: 'post',
				url 	: '../pages/users/login.php',
				data	: {user:user, pass:pass},
				success : function(data) {
					if(data=="Nom d'utilisateur ou mot de passe incorrecte.") {
						$("#error").css("display","block");
						$("#error").empty().text(data);
					} else {
						if(data!="1") {
							window.location.replace("index.php");
						} else {
							window.location.replace("admin.php");
						}
					}
				}
			});
			return false;
		});
	});
	</script>
</body>
</html>