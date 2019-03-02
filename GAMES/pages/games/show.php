<?php
$app = App::getInstance();
$game = $app->getTable('Game')->findWithPlat($_GET['id']);
$plat = $app->getTable('Platform')->platIdByName($game->platform);

if ($game === false) {
	$app->notFound();
}
$app->setTitle($game->titre);

?>

<div class="single">
	<div class="head" style="background-image: url(<?= $img = (empty($game->img)) ? "./img/game/default.jpg" : $game->img; ?>);">
		<h4><?= $game->titre; ?></h4>
		<hr>
		<span>Platform(s) : <a href="?p=games.platform&id=<?= $plat->id; ?>"><?= $game->platform; ?></a></span>
		<button class="acheter">
			Acheter
		</button>
	</div>
	<div class="desc">
		<h5 style="display: inline-block;">Développeur : </h5><span> <?= $game->dev; ?></span>
		<h5>Déscription :</h5>
		<p><?= $game->descr; ?></p>
	</div>
</div>