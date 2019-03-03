<?php

$platTable = App::getInstance()->getTable('Platform');
$gameTable = App::getInstance()->getTable('Game');

if(!empty($_POST)) {
    $platTable->delete($_POST['id']);
    $gameTable->query("DELETE FROM games WHERE plat_id = ? ", [$_POST['id']]);
    header('Location: admin.php?p=platforms.index');
}

?>