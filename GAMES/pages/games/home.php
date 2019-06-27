<div class="cats">
	<h4>LES PLATEFORMES</h4>
	<hr>
	<ul>
		<?php foreach (App::getInstance()->getTable('Platform')->threePlats() as $plat): ?>
		<a href="<?= $plat->url; ?>">
			<li>
				<div class="img-plat" style="background-image: url('<?= $plat->img; ?>');"></div>
				<h3><?= $plat->nom; ?></h3>
				<p>Check out <?= $plat->nom; ?> games.</p>
			</li>
		</a>
		<?php endforeach; ?>
	</ul>
	<a href="?p=platforms" class="more" alt="Voir toutes les platforms" >
		Voir plus
	</a>
</div>

<div class="posts">
	<h4>DERNIERS JEUX</h4>
	<hr>
	<div class="post">
		<?php foreach (App::getInstance()->getTable('Game')->last() as $game): ?>
		<div onmouseover="showMore($(this))" onmouseout="showLess($(this))" class="inner-post">
			<a alt="<?= $game->titre; ?>" href="<?= $game->url; ?>"><div class="img-show" style="background-image: url('<?= $game->img; ?>')"></div></a>
			<div class="details">
				<div class="head">
					<h5><a class="img-a" alt="<?= $game->titre; ?>" href="<?= $game->url; ?>"><?= $game->getTitre(); ?></a></h5>
					<div class="cats">
                    <?php
                    $platsName = explode(',',$game->platform);
                    foreach($platsName as $plat) {
                        echo "<a href=\"" . App::getInstance()->getTable('Platform')->platIdByName($plat)->url . "\" class=\"cat\" alt=\"" . $plat . "\" >" . $plat . "</a>";
                    }
                    ?>
                    </div>
				</div>
				<div id="tail" class="tail">
					<?= $game->ext; ?>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<a href="?p=games" class="more" alt="Voir tout les jeux disponible" >
		Voir plus
	</a>
</div>
