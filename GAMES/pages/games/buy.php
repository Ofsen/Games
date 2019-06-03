<?php

define ('ROOT', "../../");

require ROOT . 'app/App.php';
App::load();

$achatTable = App::getInstance()->getTable('Achat');
$id_game = htmlspecialchars($_POST['id_game']);
$id_user = htmlspecialchars($_POST['id_user']);
$key = sha1(rand(0,1000));

$error = "Erreur";

if(!empty($_POST)) {

    $check = $achatTable->query("SELECT id FROM achat WHERE id_user = $id_user AND id_game = $id_game");

    if(empty($check)) {
        $result = $achatTable->create([
            'id_game' => $id_game,
            'id_user' => $id_user,
            'gamekey' => $key
        ]);
        if ($result) {
            $error = $key;
        } else {
            $error = "Erreur : Veuillez réessayer";
        }
    } else {
        $error = "Erreur : Vous avez déja acheter ce jeu";
    }

} else {
    $error = "Forbidden";
}

echo $error;

?>