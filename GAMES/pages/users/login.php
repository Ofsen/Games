<?php

define ('ROOT', "../../");

require ROOT . 'app/App.php';
App::load();

if(!empty($_POST)) {
    $user = htmlspecialchars($_POST['user']);
    $pass = htmlspecialchars($_POST['pass']);

    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());

	if($auth->login($user, $pass)) {
        echo $_SESSION['auth'];
	} else {
        echo "Nom d'utilisateur ou mot de passe incorrecte.";
    }
}

?>