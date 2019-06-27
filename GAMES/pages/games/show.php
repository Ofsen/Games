<?php
$app = App::getInstance();
$game = $app->getTable('Game')->findWithPlat($_GET['id']);
$plat = $app->getTable('Platform')->platIdByName($game->platform);
$cat = $app->getTable('Cat')->catByGameId($game->id);

$id_game = htmlspecialchars($_GET['id']);
$id_user = null;
$check = false;

if(isset($_SESSION['auth'])) {
	$id_user = htmlspecialchars($_SESSION['auth']);
	$check = App::getInstance()->getTable('Achat')->query("SELECT gamekey FROM achat WHERE id_user = $id_user AND id_game = $id_game");
}

if ($game === false) {
	$app->notFound();
}
$app->setTitle($game->titre);

?>

<div class="single">
	<div class="head" style="background-image: url(<?= $img = (empty($game->img)) ? "./img/game/default.jpg" : $game->img; ?>);">
		<h4><?= $game->titre; ?></h4>
		<hr>
		<span>Plateforme(s) :
            <?php
            $platsName = explode(',',$game->platform);
            foreach($platsName as $plat) {
                echo "<a href=\"" . App::getInstance()->getTable('Platform')->platIdByName($plat)->url . "\" class=\"cat\" alt=\"" . $plat . "\" >" . $plat . "</a>";
            }
            ?>
        </span>
		<?php if($check) { ?>
			<button class="keyButton" id="keyButton" onclick="key()">
				Acheté ! voir la clé
			</button>
			<div class="key" id="key"><p>Clé :</p> <?= $check[0]->gamekey; ?></div>
		<?php } else { ?>
			<button class="acheter" id="acheter"<?= $buy = (!empty($id_user)) ? "onclick=\"buy()\"" : "onclick=\"loginShow()\"" ; ?> >
				Acheter à <?= $game->price; ?> DA
			</button>
		<?php } ?>
	</div>
	<div class="desc">
		<p><?= html_entity_decode($game->descr, ENT_QUOTES | ENT_XML1, 'UTF-8'); ?></p>
		<span>Développé par </span><span style="font-weight:bold"> <?= $game->dev; ?></span><br>
		<span>Catégorie(s) </span>
		<ul class="cats">
			<?php foreach($cat as $c): ?>
			<li><a style="font-weight:bold" href="<?= $c->url; ?>"><?= $c->nom; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<div class="buy">
	<h6>Voulez vous vraiment acheter "<?= $game->titre; ?>" ?</h6>
	<form id="confirmBuy" class="editUser">
		<input type="hidden" id="id_game" name="id_game" value="<?= $game->id; ?>">
		<input type="hidden" id="id_user" name="id_user" value="<?= $id_user; ?>">
		<div class="button">
			<button type="submit" id="ok" name="ok"><i class="fas fa-check"></i></button>
			<button type="reset" id="no" name="no"><i class="fas fa-times"></i></button>
		</div>	
	</form>
	<div class="green" id="success" style="display:none;"></div>
	<div class="danger" id="error" style="display:none;"></div>
</div>