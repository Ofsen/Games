<?php

$catsTable = App::getInstance()->getTable('Cat');
$cat = $catsTable->find(htmlspecialchars($_GET['id']));

$all = $catsTable->all();

if (isset($_POST['action'])) {
	if(!empty($_POST['nom'])) {

		$nomEdited = $cat->nom != htmlspecialchars($_POST['nom']);

		if($nomEdited) {
			
			foreach($all as $a) {
				$error = false;
				if($a->nom === htmlspecialchars($_POST['nom'])) {
					$error = true;
					break;
				}
			}

			if(!$error) {
				$result = $catsTable->update(htmlspecialchars($_GET['id']), [
					'nom' => htmlspecialchars($_POST['nom']),			
					]);
				if($result) {
					header("location: admin.php?p=cats.edit&id=" . htmlspecialchars($_GET['id']));
				} else {
					?>
					<div class="danger">
						Erreur : la catégorie n'a pas pu être modifiée.
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
			<div class="warn">
				Rien n'a été changé.
			</div>
			<?php
		}

	} else {
		?>
		<div class="danger">
			Erreur : Nom de la catégorie vide.
		</div>
		<?php
	}
}

$form = new \App\HTML\GamesForm($cat);

?>
<div class="adminAdd">
	<h4>Modifier "<?= $cat->nom; ?>"</h4>
	<hr>
	<form method="post" class="edit">
			<?= $form->input('nom', 'Titre'); ?>
			<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
	</form>
</div>