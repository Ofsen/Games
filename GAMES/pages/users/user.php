<?php

$app = App::getInstance();
$user = $app->getTable('User');
$userTable = $user->find(htmlspecialchars($_GET['id']));

if(!empty($_SESSION)) {
    if($userTable) {

        $form = new \App\HTML\UserForm($_POST);

        $img = $userTable->img;
        $pseudo = $userTable->username;
        $nom = $userTable->nom;
        $prenom = $userTable->prenom;
        $pass = md5($userTable->password);
        $email = $userTable->email;
        $adr = $userTable->adresse;

        $allow = false;
        if($_SESSION['auth'] === htmlspecialchars($_GET['id'])) {
            $allow = true;
        }

        $myGames = $app->getTable('Achat')->myGames();

        ?>

        <div class="user">
            <?= $form->userInput(null, [['name' => 'avatar', 'value' => $img, 'edit' => 'editAv'], ['name' => 'pseudo', 'value' => $pseudo, 'edit' => 'editP']], $allow); ?>
            <?= $form->userInput('Informations Personnelles', [['name' => 'Nom', 'value' => $nom, 'edit' => 'editN'], ['name' => 'Prenom', 'value' => $prenom, 'edit' => 'editPre']], $allow); ?>
            <?= $form->userInput('Contact', [['name' => 'E-mail', 'value' => $email, 'edit' => 'editE', 'conf' => true], ['name' => 'Adresse', 'value' => $adr, 'edit' => 'editA']], $allow); ?>
            <?= $form->userInput('Sécurité', [['name' => 'Mot de passe', 'value' => '***', 'edit' => 'editPass', 'conf' => true]], $allow); ?>
            <?php if($user->find($_SESSION['auth'])->admin === "1" || $_SESSION['auth'] === $_GET['id']) { ?>
            <div class="posts" style="flex-basis: 100%; background: none !important; padding: 0 !important">
                <h4>Jeux acheté</h4>
                <hr>
                <div class="post">
                <?php 
                if(!empty($myGames)) {
                    foreach($myGames as $game): ?>
                        <div onmouseover="showMore($(this))" onmouseout="showLess($(this))" class="inner-post">
                            <a href="<?= $game->url; ?>"><div class="img-show" style="background-image: url('<?= $game->img; ?>')"></div></a>
                            <div class="details">
                                <div class="head">
                                    <h5><a class="img-a" href="<?= $game->url; ?>"><?= $game->getTitre(); ?></a></h5>
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
            <?php } ?>
        </div>

        <script type="text/javascript">
        $(document).ready(function () {
            $("#editAv").fadeTo("fast",0.5);
            $(".avatar").hover(function () {
                $("#editAv").fadeTo("fast", 0.8);
            }, function () {
                $("#editAv").fadeTo("fast", 0.5);
            });
        });
        </script>

    <?php 
    } else {
        $app->notfound();
    }
} else {
    $app->forbidden();
}
?>