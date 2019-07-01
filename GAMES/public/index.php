<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])) {
	$page = $_GET['p'];
} else {
	$page = 'home';
}

ob_start();
if ($page === 'home') {
	require ROOT . '/pages/games/home.php';
} elseif ($page === 'games') {
	require ROOT . '/pages/games/index.php';
} elseif ($page === 'platforms') {
	require ROOT . '/pages/platforms/index.php';
} elseif($page === 'games.platform') {
	require ROOT . '/pages/platforms/platform.php';
} elseif($page === 'cats') {
	require ROOT . '/pages/cats/index.php';
} elseif($page === 'games.cats') {
	require ROOT . '/pages/cats/cats.php';
} elseif($page === 'games.show') {
	require ROOT . '/pages/games/show.php';
} elseif($page === 'logout') {
	require ROOT . '/pages/users/logout.php';
} elseif($page === 'signup') {
	require ROOT . '/pages/users/signup.php';
} elseif($page === 'user') {
	require ROOT . '/pages/users/user.php';
} elseif($page === 'contact') {
	require ROOT . '/pages/contact.php';
} elseif($page === '403') {
	require ROOT . '/pages/errors/403.php';
} elseif($page === 'search') {
	require ROOT . '/pages/search.php';
} else {
	require ROOT . '/pages/errors/404.php';
}
$content = ob_get_clean();	

require ROOT . '/pages/template/default.php';