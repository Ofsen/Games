<?php

$gameTable = App::getInstance()->getTable('Game');

if(!empty($_POST)) {
	$result = $gameTable->delete($_POST['id']);
    header('Location: admin.php');
}

?>