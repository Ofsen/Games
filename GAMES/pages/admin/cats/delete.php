<?php

$app = App::getInstance();

if(!empty($_POST)) {
    $app->getTable('Cat')->delete(htmlspecialchars($_POST['id']));
    $app->getTable('Game_cat')->delCByCId(htmlspecialchars($_POST['id']));

    header('Location: admin.php?p=cats.index');
}

?>