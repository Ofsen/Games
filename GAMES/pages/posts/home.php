<div class="cats">
	<h4>LES PLATFORMS</h4>
	<hr>
	<ul>
		<?php foreach (App::getInstance()->getTable('Category')->all() as $cat): ?>
		<a href="<?= $cat->url; ?>">
			<li>
				<img src="<?= $cat->img; ?>" alt="<?= $cat->nom; ?>">
				<h3><?= $cat->nom; ?></h3>
				<p>Check out <?= $cat->nom; ?> games.</p>
			</li>
		</a>
		<?php endforeach; ?>
	</ul>
</div>

<div class="posts">
	<h4>DERNIERS JEUX</h4>
	<hr>
	<div class="post">
		<?php foreach (App::getInstance()->getTable('Post')->last() as $post): ?>
		<div onmouseover="showMore(this)" onmouseout="showLess(this)" class="inner-post">
			<a href="#"><img src="<?= $img = (empty($post->img)) ? "./img/default.jpg" : $post->img; ?>" alt="<?= $post->titre; ?>"></a>
			<div class="details">
				<div class="head">
					<h5><a class="img-a" href="<?= $post->url; ?>"><?= $post->titre; ?></a></h5>
					<span class="cat"><?= $post->categorie; ?></span>
				</div>
				<div id="tail" class="tail">
					<?= $post->ext; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
