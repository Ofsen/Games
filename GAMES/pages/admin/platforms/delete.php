<?php

$platTable = App::getInstance()->getTable('Platform');

if(!empty($_POST)) {
    $platTable->delete($_POST['id']);
    $platTable->query("DELETE FROM games WHERE plat_id = ? ", [$_POST['id']]);
    header('Location: admin.php?p=platforms.index');
}

?>