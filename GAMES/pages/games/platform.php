<?php 

$app = App::getInstance();
$platform = $app->getTable('Platform');

$plat = $platform->find($_GET['id']);

if ($plat === false) {
	$app->notFound();
}

$games = $app->getTable('Game')->lastByPlat($_GET['id']);
$plats = $platform->all();

?>

<div class="posts">
	<h4><?= $plat->nom; ?></h4>
	<hr>
	<div class="post">
		<?php foreach ($games as $game): ?>
		<div onmouseover="showMore(this)" onmouseout="showLess(this)" class="inner-post">
			<a href="<?= $game->url; ?>"><img src="<?= $img = (empty($game->img)) ? "./img/default.jpg" : $game->img; ?>" alt="<?= $game->titre; ?>">
			<div class="details">
				<div class="head">
					<h5><a class="img-a" href="<?= $game->url; ?>"><?= $game->titre; ?></a></h5>
					<span class="cat"><?= $game->platform; ?></span>
				</div>
				<div id="tail" class="tail">
					<?= $game->ext; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	
	</div>

	<div class="cats">
	<h4>LES PLATFORMS</h4>
	<hr>
		<ul>
			<?php foreach ($plats as $ps): ?>
			<a href="<?= $ps->url; ?>">
				<li>
					<img src="<?= $ps->img; ?>" alt="<?= $ps->nom; ?>">
					<h3><?= $ps->nom; ?></h3>
					<p>Check out <?= $ps->nom; ?> games.</p>
				</li>
			</a>
			<?php endforeach; ?>
		</ul>
	</div>
</div>