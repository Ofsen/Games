<?php

$userTable = App::getInstance()->getTable('User')->find(htmlspecialchars($_GET['id']));
$form = new \App\HTML\UserForm($_POST);

$pseudo = $userTable->username;
$pass = md5($userTable->password);
$email = $userTable->email;
?>

<h4>Profile de <?= $pseudo; ?></h4>
<hr>
<div class="user">
    <?= $form->userInput('username', 'Pseudo', $pseudo, 'editP'); ?>
    <?= $form->userInput('nom', 'Nom', '', 'editN'); ?>
    <?= $form->userInput('email', 'E-mail', $email, 'editE', true); ?>
    <?= $form->userInput('prenom', 'Prenom', '', 'editP'); ?>
    <?= $form->userInput('pass', 'Mot de passe', '***', 'editP', 'password', true); ?>
    <?= $form->userInput('adr', 'Adresse', '', 'editA'); ?>
</div>