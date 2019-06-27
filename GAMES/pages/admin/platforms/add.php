<?php

$platTable = App::getInstance()->getTable('Platform');

if (isset($_POST['action'])) {
	if(!empty($_POST['nom']) && !empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name'])) {

		$name = str_replace(" ", "-", $_FILES['img']['name']);
		$tmpName = $_FILES['img']['tmp_name'];
		$ext = strrchr($name, ".");
		$errors = $_FILES['img']['error'];
		$dest = './img/plat/' . $name;
		$goodExt = array('.jpg', '.png');
		
		if(in_array($ext, $goodExt)) {
			if ($errors == 0) {
				if (move_uploaded_file($tmpName, $dest)) {
					$result = $platTable->create([
						'nom' => htmlspecialchars($_POST['nom']),
						'img' => $dest				
						]);
					if($result) {
						header('Location: admin.php?p=platforms.index');
					} else {
						?>
						<div class="danger">
							Erreur : la plateforme n'a pas été ajoutée.
						</div>
						<?php
					}
				} else {
					?>
					<div class="danger">
						Erreur : non uploader.
					</div>
					<?php
				}
			} else {
				?>
				<div class="danger">
					Erreur : veuillez reuploader l'image.
				</div>
				<?php
			}
		} else {
		?>
		<div class="danger">
			Erreur : format d'image incorrect.
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
	<h4>Nouvelle platform</h4>
	<hr>

	<form method="post" class="add" enctype="multipart/form-data">
			<?= $form->input('nom', 'Titre'); ?>
			<?= $form->input('img', 'Image', ['type' => 'file']); ?>
		<div class="row">
			<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
		</div>
	</form>
</div>