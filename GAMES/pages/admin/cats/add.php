<?php

$catsTable = App::getInstance()->getTable('Cat');

$all = $catsTable->all();

if (isset($_POST['action'])) {
	if(!empty($_POST['nom'])) {

		foreach($all as $a) {
			$error = false;
			if($a->nom === htmlspecialchars($_POST['nom'])) {
				$error = true;
				break;
			}
		}
		
		if(!$error) {
			$result = $catsTable->create([
				'nom' => htmlspecialchars($_POST['nom'])		
				]);
			if($result) {
				header('Location: admin.php?p=cats.index');
			} else {
				?>
				<div class="danger">
					Erreur : la catégorie n'a pas été ajoutée.
				</div>
				<?php
			}
		} else {
			?>
			<div class="danger">
				Erreur : La catégorie existe déja.
			</div>
			<?php
		}
	} else {
		?>
		<div class="danger">
			Erreur : Tout les champs sont obligatoires.
		</div>
		<?php
	}
}

$form = new \App\HTML\GamesForm($_POST);

?>
<div class="adminAdd">
<h4>Nouvelle catégorie</h4>
<hr>

<form method="post" class="add">
		<?= $form->input('nom', 'Nom'); ?>
	<div class="row">
		<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
	</div>
</form>
</div>