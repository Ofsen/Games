<?php
if(!empty($_POST)) {
	$auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
	if($auth->login($_POST['username'], $_POST['password'])) {
		header('Location:admin.php');
	} else {
		?>
		
		<div class="card-panel red lighten-2">
			Nom d'utilisateur ou mot de passe incorrecte.
		</div>

		<?php
	}
}
$form = new \Core\HTML\MaterialiseForm($_POST);

?>

<form method="post" class="col s12">
		<?= $form->input('username', 'Pseudo'); ?>
		<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
	<div class="row">
		<button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
	</div>
</form>