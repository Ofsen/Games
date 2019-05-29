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

        $check = App::getInstance()->getTable('Achat')->all();

        $allow = false;
        if($_SESSION['auth'] == htmlspecialchars($_GET['id'])) {
            $allow = true;
        }
        ?>

        <div class="user">
            <?= $form->userInput(null, [['name' => 'avatar', 'value' => $img, 'edit' => 'editAv'], ['name' => 'pseudo', 'value' => $pseudo, 'edit' => 'editP']], $allow); ?>
            <?= $form->userInput('Informations Personnelles', [['name' => 'Nom', 'value' => $nom, 'edit' => 'editN'], ['name' => 'Prenom', 'value' => $prenom, 'edit' => 'editPre']], $allow); ?>
            <?= $form->userInput('Contact', [['name' => 'E-mail', 'value' => $email, 'edit' => 'editE', 'conf' => true], ['name' => 'Adresse', 'value' => $adr, 'edit' => 'editA']], $allow); ?>
            <?= $form->userInput('Sécurité', [['name' => 'Mot de passe', 'value' => '***', 'edit' => 'editPass', 'conf' => true]], $allow); ?>
            <?php if($check) { ?>
                <div class="info" style="flex-basis: 100%; background: none !important; padding: 0 !important">
                    <h5>Jeux acheté</h5>
                    <hr>
                    Yes
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