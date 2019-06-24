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
if (!$auth->logged() || !$auth->admin()) {
	$app->forbidden();
}

ob_start();
if ($page === 'home') {
	require ROOT . '/pages/admin/games/index.php';
} elseif($page === 'games.edit') {
	require ROOT . '/pages/admin/games/edit.php';
} elseif($page === 'games.add') {
	require ROOT . '/pages/admin/games/add.php';
} elseif($page === 'games.delete') {
	require ROOT . '/pages/admin/games/delete.php';
} elseif ($page === 'platforms.index') {
	require ROOT . '/pages/admin/platforms/index.php';
} elseif($page === 'platforms.edit') {
	require ROOT . '/pages/admin/platforms/edit.php';
} elseif($page === 'platforms.add') {
	require ROOT . '/pages/admin/platforms/add.php';
} elseif($page === 'platforms.delete') {
	require ROOT . '/pages/admin/platforms/delete.php';
} elseif ($page === 'users.index') {
	require ROOT . '/pages/admin/users/index.php';
} elseif($page === 'users.delete') {
	require ROOT . '/pages/admin/users/delete.php';
} elseif ($page === 'cats.index') {
	require ROOT . '/pages/admin/cats/index.php';
} elseif($page === 'cats.edit') {
	require ROOT . '/pages/admin/cats/edit.php';
} elseif($page === 'cats.add') {
	require ROOT . '/pages/admin/cats/add.php';
} elseif($page === 'cats.delete') {
	require ROOT . '/pages/admin/cats/delete.php';
}
$content = ob_get_clean();

require ROOT . '/pages/template/default.php';