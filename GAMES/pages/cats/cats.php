<?php 
$app = App::getInstance();
$category = $app->getTable('Cat');

$cat = $category->find($_GET['id']);

if ($cat === false) {
	$app->notFound();
}

$games = $app->getTable('Game')->lastByCat($_GET['id']);    

?>

<div class="posts">
	<h4><?= $cat->nom; ?></h4>
	<hr>
	<div class="post">
		<?php 
		if(!empty($games)) {
		foreach ($games as $game): ?>
		<div onmouseover="showMore($(this))" onmouseout="showLess($(this))" class="inner-post">
			<a alt="<?= $game->titre; ?>" href="<?= $game->url; ?>">
				<div class="img-show" style="background-image: url('<?= $game->img; ?>')"></div>
			</a>
			<div class="details">
				<div class="head">
					<h5><a class="img-a" alt="<?= $game->titre; ?>" href="<?= $game->url; ?>"><?= $game->getTitre(); ?></a></h5>
					<span class="cat">
					<?php
                    $platsName = explode(',',$game->platform);
                    foreach($platsName as $plat) {
                        echo "<a href=\"" . App::getInstance()->getTable('Platform')->platIdByName($plat)->url . "\" class=\"cat\" alt=\"" . $plat . "\" >" . $plat . "</a>";
                    }
                    ?>	
					</span>
				</div>
				<div id="tail" class="tail">
					<?= $game->ext; ?>
				</div>
			</div>
		</div>
		<?php endforeach; 
		} else {
			echo "<p>Il n'y a aucun jeu sous cette catégorie.</p>";
		}?>
	</div>

	<div class="cats">
	<h4>LES CATEGORIES</h4>
	<hr>
        <ul>
            <?php foreach (App::getInstance()->getTable('Cat')->threeCats() as $cat): ?>
            <a href="<?= $cat->url; ?>">
                <li>
                    <h3><?= $cat->nom; ?></h3>
                    <p>Check out <?= $cat->nom; ?> games.</p>
                </li>
            </a>
            <?php endforeach; ?>
        </ul>
        <a href="?p=cats" class="more" alt="Voir toutes les catégories" >
			Voir plus
		</a>
    </div>
</div>