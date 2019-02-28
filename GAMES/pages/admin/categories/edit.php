<?php

$catTable = App::getInstance()->getTable('Category');
$cat = $catTable->find($_GET['id']);

if (isset($_POST['action'])) {

	$nomEdited = $cat->nom != $_POST['nom'];
	$fileNotEmpty = $_FILES['img']['size'] != 0;

	if($nomEdited || $fileNotEmpty) {
		if(!empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name']))  {
			$name = $_FILES['img']['name'];
			$tmpName = $_FILES['img']['tmp_name'];
			$ext = strrchr($name, ".");
			$errors = $_FILES['img']['error'];
			$dest = './img/cat/' . $name;
			$goodExt = array('.jpg', '.png');
			
			if(in_array($ext, $goodExt)) {
				if ($errors == 0) {
					if (move_uploaded_file($tmpName, $dest)) {
						$result = $catTable->update($_GET['id'], [
							'nom' => $_POST['nom'],
							'img' => $dest					
							]);
						if($result) {
							header("location: admin.php?p=categories.edit&id=" . $_GET['id']);
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
			$result = $catTable->update($_GET['id'], [
				'nom' => $_POST['nom']				
				]);
			if($result) {
				header("location: admin.php?p=categories.edit&id=" . $_GET['id']);
			} else {
				?>
				<div class="card-panel red lighten-2">
					Erreur : Le nom de la catégorie n'a pas été modifiée.
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

$form = new \Core\HTML\MaterialiseForm($cat);

?>

<h4>Modifier "<?= $cat->nom; ?>"</h4>
<hr>
<form method="post" class="edit" enctype="multipart/form-data">
		<?= $form->input('nom', 'Titre'); ?>
		<div class="edit-img">
			<img src="<?= $img = (empty($cat->img)) ? "./img/default.jpg" : $cat->img; ?>" alt="<?= $cat->nom; ?>">
		</div>
		<?= $form->input('img', 'Image', ['type' => 'file']); ?>
		<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
</form>