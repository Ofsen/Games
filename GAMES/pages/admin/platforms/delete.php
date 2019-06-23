<?php

$app = App::getInstance();

if(!empty($_POST)) {
    $app->getTable('Platform')->delete(htmlspecialchars($_POST['id']));
    $app->getTable('Game_plat')->delPByPId(htmlspecialchars($_POST['id']));

    header('Location: admin.php?p=platforms.index');
}

?>