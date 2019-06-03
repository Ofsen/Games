<?php
$app = App::getInstance();
$game = $app->getTable('Game')->findWithPlat($_GET['id']);
$plat = $app->getTable('Platform')->platIdByName($game->platform);

$id_game = htmlspecialchars($_GET['id']);
$id_user = htmlspecialchars($_SESSION['auth']);

$check = App::getInstance()->getTable('Achat')->query("SELECT gamekey FROM achat WHERE id_user = $id_user AND id_game = $id_game");

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
		<?php if($check) { ?>
			<button class="keyButton" id="keyButton" onclick="key()">
				Acheté ! voir la clé
			</button>
			<div class="key" id="key"><p>Clé :</p> <?= $check[0]['gamekey']; ?></div>
		<?php } else { ?>
			<button class="acheter" id="acheter" onclick="buy()">
				Acheter
			</button>
		<?php } ?>
	</div>
	<div class="desc">
		<h5 style="display: inline-block;">Développeur : </h5><span> <?= $game->dev; ?></span>
		<h5>Déscription :</h5>
		<p><?= $game->descr; ?></p>
	</div>
</div>

<div class="buy">
	<h6>Voulez vous vraiment acheter "<?= $game->titre; ?>" ?</h6>
	<form id="confirmBuy" class="editUser">
		<input type="hidden" id="id_game" name="id_game" value="<?= $game->id; ?>">
		<input type="hidden" id="id_user" name="id_user" value="<?= $_SESSION['auth']; ?>">
		<div class="button">
			<button type="submit" id="ok" name="ok"><i class="fas fa-check"></i></button>
			<button type="reset" id="no" name="no"><i class="fas fa-times"></i></button>
		</div>	
	</form>
	<div class="green" id="success" style="display:none;"></div>
	<div class="danger" id="error" style="display:none;"></div>
</div>