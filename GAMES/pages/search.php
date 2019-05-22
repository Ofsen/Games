<?php

if(!empty($_POST['srchfield'])) {
    $keyword = htmlspecialchars($_POST['srchfield']);
    $req = App::getInstance()->getTable('Game')->search($keyword);
} else {
    header('Location:index.php');
}

?>

<div class="posts">
    <h4>Rechérche de : <?= $keyword; ?></h4>
    <hr>
    <div class="post">
    <?php 
    if(!empty($req)) {
        foreach($req as $game): ?>
            <div onmouseover="showMore(this)" onmouseout="showLess(this)" class="inner-post">
                <a href="<?= $game->url; ?>"><div class="img-show" style="background-image: url('<?= $game->img; ?>')"></div></a>
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
        <?php 
        endforeach; 
    } else {
        echo "<p>Aucun jeu trouvé.</p>";
    } 
    ?>
    </div>
</div>