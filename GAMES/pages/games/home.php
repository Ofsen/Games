<div class="cats">
	<h4>LES PLATFORMS</h4>
	<hr>
	<ul>
		<?php foreach (App::getInstance()->getTable('Platform')->all() as $plat): ?>
		<a href="<?= $plat->url; ?>">
			<li>
				<div class="img-plat" style="background-image: url('<?= $plat->img; ?>');"></div>
				<h3><?= $plat->nom; ?></h3>
				<p>Check out <?= $plat->nom; ?> games.</p>
			</li>
		</a>
		<?php endforeach; ?>
	</ul>
</div>

<div class="posts">
	<h4>DERNIERS JEUX</h4>
	<hr>
	<div class="post">
		<?php foreach (App::getInstance()->getTable('Game')->last() as $game): ?>
		<div onmouseover="showMore(this)" onmouseout="showLess(this)" class="inner-post">
			<a href="<?= $game->url; ?>">
				<div class="img-show" style="background-image: url('<?= $game->img; ?>')">

				</div>
			</a>
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
</div>
