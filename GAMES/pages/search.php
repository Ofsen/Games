<?php

if(!empty($_POST['srchfield'])) {
    $keyword = htmlspecialchars($_POST['srchfield']);
    $keyword = preg_replace("#[^0-9a-z ]#i","",$keyword);
    $reqG = App::getInstance()->getTable('Game')->search($keyword);
    $reqP = App::getInstance()->getTable('Platform')->search($keyword);
} else {
    header('Location:index.php');
}

?>

<div class="posts">
    <h4>Rechérche de Jeux : <?= $keyword; ?></h4>
    <hr>
    <div class="post">
    <?php 
    if(!empty($reqG)) {
        foreach($reqG as $game): ?>
            <div onmouseover="showMore($(this))" onmouseout="showLess($(this))" class="inner-post">
                <a href="<?= $game->url; ?>"><div class="img-show" style="background-image: url('<?= $game->img; ?>')"></div></a>
                <div class="details">
                    <div class="head">
                        <h5><a class="img-a" href="<?= $game->url; ?>"><?= $game->titre; ?></a></h5>
                        <span class="cat">
					<?php
                    $platsName = explode(',',$game->platform);
                    foreach($platsName as $plat) {
                        echo "<a href=\"?p=games.platform&id=" . App::getInstance()->getTable('Platform')->platIdByName($plat)->id . "\" class=\"cat\" alt=\"" . $plat . "\" >" . $plat . "</a>";
                    }
                    ?>	
					</span>
                    </div>
                    <div id="tail" class="tail">
                        <?= $game->ext; ?>
                    </div>
                </div>
            </div>
        <?php 
        endforeach; 
    } else {
        echo "<p>Aucun jeu trouvé.</p>";
    } 
    ?>
    </div>
</div>

<div class="cats">
    <h4>Rechérche de Platforms : <?= $keyword; ?></h4>
	<hr>
	<ul>
    <?php
    if(!empty($reqP)) {
        foreach ($reqP as $plat): ?>
		<a href="<?= $plat->url; ?>">
			<li>
				<div class="img-plat" style="background-image: url('<?= $plat->img; ?>');"></div>
				<h3><?= $plat->nom; ?></h3>
				<p>Check out <?= $plat->nom; ?> games.</p>
			</li>
		</a>
        <?php endforeach;
    } else {
        echo "<p>Aucune platform trouvée.</p>";
    }  
    ?>
	</ul>
</div>