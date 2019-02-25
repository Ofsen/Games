<?php 

$app = App::getInstance();
$category = $app->getTable('Category');

$categorie = $category->find($_GET['id']);

if ($categorie === false) {
	$app->notFound();
}

$articles = $app->getTable('Post')->lastByCat($_GET['id']);
$categories = $category->all();

?>

<div class="posts">
	<h4><?= $categorie->nom; ?></h4>
	<hr>
	<div class="post">
	<?php foreach ($articles as $post): ?>
		<div onmouseover="showMore(this)" onmouseout="showLess(this)" class="inner-post">
			<img src="<?= $img = (empty($post->img)) ? "./img/default.jpg" : $post->img; ?>" alt="<?= $post->titre; ?>">
			<div class="details">
				<div class="head">
					<h5><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h5>
					<span class="cat"><?= $post->categorie; ?></span>
				</div>
				<div id="tail" class="tail">
					<?= $post->ext; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	
	</div>

	<div class="cats">
	<h4>LES PLATFORMS</h4>
	<hr>
		<ul>
			<?php foreach ($categories as $cats): ?>
			<a href="<?= $cats->url; ?>">
				<li>
					<img src="<?= $cats->img; ?>" alt="<?= $cats->nom; ?>">
					<h3><?= $cats->nom; ?></h3>
					<p>Check out <?= $cats->nom; ?> games.</p>
				</li>
			</a>
			<?php endforeach; ?>
		</ul>
	</div>
</div>