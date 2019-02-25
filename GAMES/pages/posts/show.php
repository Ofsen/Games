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
	<h4><?= $post->titre; ?></h4>
	<hr>
	<span>Platform : <a href="?p=posts.category&id=<?= $cat->id; ?>"><?= $post->categorie; ?></a></span>
	<img src="<?= $img = (empty($post->img)) ? "./img/default.jpg" : $post->img; ?>" alt="<?= $post->titre; ?>">
	<p><?= $post->contenu; ?></p>
	<button class="acheter">
		Acheter
	</button>
</div>