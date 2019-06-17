<?php

$userTable = App::getInstance()->getTable('User');

if(!empty($_POST)) {
	$result = $userTable->delete($_POST['id']);
    header('Location: admin.php?p=users.index');
}

?>