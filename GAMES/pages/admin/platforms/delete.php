<?php

$platTable = App::getInstance()->getTable('Platform');

if(!empty($_POST)) {
	$result = $platTable->delete($_POST['id']);
    header('Location: admin.php?p=platforms.index');
}

?>