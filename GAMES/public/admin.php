<?php
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])) {
	$page = $_GET['p'];
} else {
	$page = 'home';
}

// Authentification 
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if (!$auth->logged()) {
	$app->forbidden();
}

ob_start();
if ($page === 'home') {
	require ROOT . '/pages/admin/posts/index.php';
} elseif($page === 'posts.edit') {
	require ROOT . '/pages/admin/posts/edit.php';
} elseif($page === 'posts.add') {
	require ROOT . '/pages/admin/posts/add.php';
} elseif($page === 'posts.delete') {
	require ROOT . '/pages/admin/posts/delete.php';
} elseif ($page === 'categories.index') {
	require ROOT . '/pages/admin/categories/index.php';
} elseif($page === 'categories.edit') {
	require ROOT . '/pages/admin/categories/edit.php';
} elseif($page === 'categories.add') {
	require ROOT . '/pages/admin/categories/add.php';
} elseif($page === 'categories.delete') {
	require ROOT . '/pages/admin/categories/delete.php';
}
$content = ob_get_clean();

require ROOT . '/pages/template/default.php';