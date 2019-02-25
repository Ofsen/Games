<?php

$catTable = App::getInstance()->getTable('Category');

if(!empty($_POST)) {
	$result = $catTable->delete($_POST['id']);
    header('Location: admin.php?p=categories.index');
}

?>