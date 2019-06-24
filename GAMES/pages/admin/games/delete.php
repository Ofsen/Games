<?php
$app = App::getInstance();

if(!empty($_POST)) {
    $app->getTable('Game')->delete($_POST['id']);
    $app->getTable('Game_plat')->delGByGId($_POST['id']);
    $app->getTable('Game_cat')->delGByGId($_POST['id']);
    
    header('Location: admin.php');
}

?>