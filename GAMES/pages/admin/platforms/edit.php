<?php

$platTable = App::getInstance()->getTable('Platform');
$plat = $platTable->find(htmlspecialchars($_GET['id']));

if (isset($_POST['action'])) {
	if(!empty($_POST['nom'])) {

		$nomEdited = $plat->nom != htmlspecialchars($_POST['nom']);
		$fileNotEmpty = $_FILES['img']['size'] != 0;

		if($nomEdited || $fileNotEmpty) {
			if(!empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name']))  {
				$name = str_replace(" ", "-", $_FILES['img']['name']);
				$tmpName = $_FILES['img']['tmp_name'];
				$ext = strrchr($name, ".");
				$errors = $_FILES['img']['error'];
				$dest = './img/plat/' . $name;
				$goodExt = array('.jpg', '.png');
				
				if(in_array($ext, $goodExt)) {
					if ($errors == 0) {
						if (move_uploaded_file($tmpName, $dest)) {
							$result = $platTable->update(htmlspecialchars($_GET['id']), [
								'nom' => htmlspecialchars($_POST['nom']),
								'img' => $dest					
								]);
							if($result) {
								header("location: admin.php?p=platforms.edit&id=" . htmlspecialchars($_GET['id']));
							} else {
								?>
								<div class="danger">
									Erreur : l'artice n'a pas été modifiée.
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
				$result = $platTable->update(htmlspecialchars($_GET['id']), [
					'nom' => htmlspecialchars($_POST['nom'])				
					]);
				if($result) {
					header("location: admin.php?p=platforms.edit&id=" . htmlspecialchars($_GET['id']));
				} else {
					?>
					<div class="danger">
						Erreur : Le nom de la plateforme n'a pas été modifiée.
					</div>
					<?php
				}
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
			Erreur : Nom de la plateforme vide.
		</div>
		<?php
	}
}

$form = new \App\HTML\GamesForm($plat);

?>
<div class="adminAdd">
<h4>Modifier "<?= $plat->nom; ?>"</h4>
<hr>
<form method="post" class="edit" enctype="multipart/form-data">
		<?= $form->input('nom', 'Titre'); ?>
		<div class="edit-img-plat" style="background-image: url('<?= $plat->img; ?>')"></div>
		<?= $form->input('img', 'Image', ['type' => 'file']); ?>
		<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
</form>
</div>