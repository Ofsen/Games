<?php

$postTable = App::getInstance()->getTable('Post');

date_default_timezone_set("Europe/Amsterdam");
$now = new DateTime();
$date = $now->format('Y-m-d H:i:s'); 

if (isset($_POST['action'])) {
	if(!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['categorie_id']) && !empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name'])) {

		$name = $_FILES['img']['name'];
		$tmpName = $_FILES['img']['tmp_name'];
		$ext = strrchr($name, ".");
		$errors = $_FILES['img']['error'];
		$dest = './img/' . $name;
		$goodExt = array('.jpg', '.png');
		
		if(in_array($ext, $goodExt)) {
			if ($errors == 0) {
				if (move_uploaded_file($tmpName, $dest)) {
					$result = $postTable->create([
						'titre' => $_POST['titre'],
						'img' => $dest,
						'contenu' => $_POST['contenu'],
						'date' => $date,
						'categorie_id' => $_POST['categorie_id']						
						]);
					if($result) {
						header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
					} else {
						?>
						<div class="card-panel red lighten-2">
							Erreur : l'artice n'a pas été ajoutée.
						</div>
						<?php
					}
				} else {
					?>
					<div class="card-panel red lighten-2">
						Erreur : non uploader.
					</div>
					<?php
				}
			} else {
				?>
				<div class="card-panel red lighten-2">
					Erreur : veuillez reuploader l'image.
				</div>
				<?php
			}
		} else {
		?>
		<div class="card-panel red lighten-2">
			Erreur : format d'image incorrect.
		</div>
		<?php
		}
	} else {
		?>
		<div class="card-panel red lighten-2">
			Erreur : Tout les champs sont obligatoires.
		</div>
		<?php
	}
}

$cats = App::getInstance()->getTable('Category')->extract('id', 'nom');
$form = new \Core\HTML\MaterialiseForm($_POST);

?>

<h4>Nouveau jeu</h4>
<hr>

<form method="POST" class="add" enctype="multipart/form-data">
		<?= $form->input('titre', 'Titre'); ?>
		<?= $form->select('categorie_id', 'Catégorie', $cats); ?>
		<?= $form->input('img', 'Image', ['type' => 'file']); ?>
		<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
		<button type="submit" name="action">Sauvegarder</button>
</form>