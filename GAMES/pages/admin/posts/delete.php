<?php

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)) {
	$result = $postTable->delete($_POST['id']);
    header('Location: admin.php');
}

?>