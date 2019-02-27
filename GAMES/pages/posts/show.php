<?php
$app = App::getInstance();
$post = $app->getTable('Post')->findWithCat($_GET['id']);
$cat = $app->getTable('Category')->catIdByName($post->categorie);

if ($post === false) {
	$app->notFound();
}
$app->setTitle($post->titre);

?>

<div class="single">
	<div class="head" style="
							background: url(<?= $img = (empty($post->img)) ? "./img/default.jpg" : $post->img; ?>);
							background-size: cover;
							background-repeat: no-repeat;
							background-position: 50% 50%;">
		<h4><?= $post->titre; ?></h4>
		<hr>
		<span>Platform(s) : <a href="?p=posts.category&id=<?= $cat->id; ?>"><?= $post->categorie; ?></a></span>
		<button class="acheter">
			Acheter
		</button>
	</div>
	<div class="desc">
		<h5>Description :</h5>
		<p><?= $post->contenu; ?></p>
	</div>
</div>