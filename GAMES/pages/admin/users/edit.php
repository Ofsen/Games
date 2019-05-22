<?php

$gameTable = App::getInstance()->getTable('Game');
$game = $gameTable->find($_GET['id']);
$plats = App::getInstance()->getTable('Platform')->extract('id', 'nom');

date_default_timezone_set("Europe/Amsterdam");
$now = new DateTime();
$dat = $now->format('Y-m-d H:i:s'); 

if (isset($_POST['action'])) {

	if(!empty($_POST['titre']) && !empty($_POST['descr']) && !empty($_POST['dev']) && !empty($_POST['plat_id'])) {
		$titreEdited = ($game->titre != htmlspecialchars($_POST['titre']));
		$descrEdited = ($game->descr != htmlspecialchars($_POST['descr']));
		$devEdited = ($game->dev != htmlspecialchars($_POST['dev']));
		$platEdited = ($game->plat_id != htmlspecialchars($_POST['plat_id']));
		$fileNotEmpty = $_FILES['img']['size'] != 0;

		if($titreEdited || $descrEdited || $devEdited || $platEdited || $fileNotEmpty ) {
			if(!empty($_FILES['img']['name']) && !empty($_FILES['img']['tmp_name'])) {
				$name = str_replace(" ", "-", $_FILES['img']['name']);
				$tmpName = $_FILES['img']['tmp_name'];
				$ext = strrchr($name, ".");
				$errors = $_FILES['img']['error'];
				$dest = './img/game/' . $name;
				$goodExt = array('.jpg', '.png');
				
				if(in_array($ext, $goodExt)) {
					if ($errors == 0) {
						if (move_uploaded_file($tmpName, $dest)) {
							$result = $gameTable->update(htmlspecialchars($_GET['id']), [
								'titre' => htmlspecialchars($_POST['titre']),
								'img' => htmlspecialchars($dest),
								'descr' => htmlspecialchars($_POST['descr']),
								'dev' => htmlspecialchars($_POST['dev']),
								'dat' => $dat,
								'plat_id' => htmlspecialchars($_POST['plat_id'])						
								]);
							if($result) {
								header("location: admin.php?p=games.edit&id=" . $_GET['id']);
							} else {
								?>
								<div class="danger">
									Erreur : le jeu n'a pas été modifiée.
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
				$result = $gameTable->update(htmlspecialchars($_GET['id']), [
					'titre' => htmlspecialchars($_POST['titre']),
					'descr' => htmlspecialchars($_POST['descr']),
					'dev' => htmlspecialchars($_POST['dev']),
					'dat' => $dat,
					'plat_id' => htmlspecialchars($_POST['plat_id'])						
					]);
				if($result) {
					header("location: admin.php?p=games.edit&id=" . htmlspecialchars($_GET['id']));
				} else {
					?>
					<div class="danger">
						Erreur : Le nom, la déscription et la plateforme n'a pas été modifiée.
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
			Erreur : Tout les champs sont obligatoires.
		</div>
		<?php
	}
}

$form = new \Core\HTML\GamesForm($game);

?>

<h4>Modifier "<?= $game->titre; ?>"</h4>
<hr>

<form method="post" class="edit" enctype="multipart/form-data">
		<?= $form->input('titre', 'Titre'); ?>
		<?= $form->select('plat_id', 'Plateforme', $plats); ?>
		<div class="edit-img" style="background-image: url('<?= $game->img; ?>')"></div>
		<?= $form->input('img', 'Image', ['type' => 'file']); ?>
		<?= $form->input('descr', 'Déscription', ['type' => 'textarea']); ?>
		<?= $form->input('dev', 'Développeur'); ?>
		<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
</form>