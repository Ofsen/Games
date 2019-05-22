<?php

if(empty($_SESSION)) {

    $userTable = App::getInstance()->getTable('User');
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    $form = new \App\HTML\GamesForm($_POST);

    if(isset($_POST['action'])) {
        $user = htmlspecialchars($_POST['username']);
        $pass = htmlspecialchars(sha1($_POST['password']));
        $passC = htmlspecialchars(sha1($_POST['passC']));
        $mail = htmlspecialchars($_POST['email']);
        $mailC = htmlspecialchars($_POST['emailC']);
        if(!empty($user) && !empty($pass) && !empty($passC) && !empty($mail) && !empty($mailC)) {
            if($pass === $passC) {
                if($mail === $mailC) {
                    $result = $userTable->create([
                        'username' => $user,
                        'password' => $pass,
                        'email' => $mail,
                        'admin' => false
                    ]);
                    if($result) {
                        $auth->login($user,$pass);
                        header('Location:index.php?p=user&id=' . App::getInstance()->getDb()->lastInsertId());
                    }
                } else {
                    ?>
                    <div class="danger">
                        Erreur : E-mail et Confirmation d'E-mail ne sont pas identique.
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="danger">
                    Erreur : Mot de passe et Confirmation de Mot de passe ne sont pas identique.
                </div>
                <?php
            }
        } else {
            ?>
            <div class="danger">
                Erreur : Tout les champs sont obligatoires.
            </div>
            <?php
        }

    }
} else {
    header('Location:index.php');
}
?>

<h4>Inscription</h4>
<hr>
<form method="post" class="add">
    <?= $form->input('username','Pseudo'); ?>
    <?= $form->input('password','Mot de passe',['type' => 'password']); ?>
    <?= $form->input('passC','Confirmer le mot de passe', ['type' => 'password']); ?>
    <?= $form->input('email', 'E-mail', ['type' => 'email']); ?>
    <?= $form->input('emailC', 'Confirmer d\'E-mail',['type' => 'email']); ?>
    <button type="submit" name="action">S'Inscrire</button>
</form>