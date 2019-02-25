<?php

$postTable = App::getInstance()->getTable('Post');
$post = $postTable->find($_GET['id']);
$cats = App::getInstance()->getTable('Category')->extract('id', 'nom');

$now = new DateTime();
$date = $now->format('Y-m-d H:i:s'); 

if (isset($_POST['action'])) {
	
	$titreEdited = ($post->titre != $_POST['titre']);
	$contentEdited = ($post->contenu != $_POST['contenu']);
	$catEdited = ($post->categorie_id != $_POST['categorie_id']);
	$fileNotEmpty = $_FILES['img']['size'] != 0;

	if($titreEdited || $contentEdited || $catEdited || $fileNotEmpty ) {
		if(!empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name'])) {
			$name = $_FILES['img']['name'];
			$tmpName = $_FILES['img']['tmp_name'];
			$ext = strrchr($name, ".");
			$errors = $_FILES['img']['error'];
			$dest = './img/' . $name;
			$goodExt = array('.jpg', '.png');
			
			if(in_array($ext, $goodExt)) {
				if ($errors == 0) {
					if (move_uploaded_file($tmpName, $dest)) {
						$result = $postTable->update($_GET['id'], [
							'titre' => $_POST['titre'],
							'img' => $dest,
							'contenu' => $_POST['contenu'],
							'date' => $date,
							'categorie_id' => $_POST['categorie_id']						
							]);
						if($result) {
							header("location: admin.php?p=posts.edit&id=" . $_GET['id']);
						} else {
							?>
							<div class="card-panel red lighten-2">
								Erreur : l'artice n'a pas été modifiée.
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
			$result = $postTable->update($_GET['id'], [
				'titre' => $_POST['titre'],
				'contenu' => $_POST['contenu'],
				'date' => $date,
				'categorie_id' => $_POST['categorie_id']						
				]);
			if($result) {
				header("location: admin.php?p=posts.edit&id=" . $_GET['id']);
			} else {
				?>
				<div class="card-panel red lighten-2">
					Erreur : Le nom, le contenu et la catégorie n'a pas été modifiée.
				</div>
				<?php
			}
		}
	} else {
		?>
		<div class="card-panel grey lighten-2">
			Rien n'a été changé.
		</div>
		<?php
	}
}

$form = new \Core\HTML\MaterialiseForm($post);

?>

<form method="post" class="col s12" enctype="multipart/form-data">
		<?= $form->input('titre', 'Titre'); ?>
		<img src="<?= $img = (empty($post->img)) ? "./img/default.jpg" : $post->img; ?>" alt="<?= $post->titre; ?>">
		<?= $form->input('img', 'Image', ['type' => 'file']); ?>
		<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
		<?= $form->select('categorie_id', 'Catégorie', $cats); ?>
	<div class="row">
		<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
	</div>
</form>