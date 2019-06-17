<?php 
$app = App::getInstance();
$platform = $app->getTable('Platform');

$plat = $platform->find($_GET['id']);

if ($plat === false) {
	$app->notFound();
}

$plats = $platform->all();
$games = $app->getTable('Game')->lastByPlat($_GET['id']);

?>

<div class="posts">
	<h4><?= $plat->nom; ?></h4>
	<hr>
	<div class="post">
		<?php 
		if(!empty($games)) {
		foreach ($games as $game): ?>
		<div onmouseover="showMore($(this))" onmouseout="showLess($(this))" class="inner-post">
			<a href="<?= $game->url; ?>">
				<div class="img-show" style="background-image: url('<?= $game->img; ?>')"></div>
			</a>
			<div class="details">
				<div class="head">
					<h5><a class="img-a" href="<?= $game->url; ?>"><?= $game->titre; ?></a></h5>
					<span class="cat"><a href="?p=games.platform&id=<?= App::getInstance()->getTable('Platform')->platIdByName($game->platform)->id; ?>"><?= $game->platform; ?></a></span>
				</div>
				<div id="tail" class="tail">
					<?= $game->ext; ?>
				</div>
			</div>
		</div>
		<?php endforeach; 
		} else {
			echo "<p>Il n'y a aucun jeu sous cette platform.</p>";
		}?>
	</div>

	<div class="cats">
	<h4>LES PLATFORMS</h4>
	<hr>
		<ul>
			<?php foreach ($plats as $ps): ?>
			<a href="<?= $ps->url; ?>">
				<li>
					<div class="img-plat" style="background-image: url('<?= $ps->img; ?>');"></div>
					<h3><?= $ps->nom; ?></h3>
					<p>Check out <?= $ps->nom; ?> games.</p>
				</li>
			</a>
			<?php endforeach; ?>
		</ul>
	</div>
</div>