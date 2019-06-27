<?php
$app = App::getInstance();
$gameTable = $app->getTable('Game');
$gpTable = $app->getTable('Game_plat');
$gcTable = $app->getTable('Game_cat');

$game = $gameTable->findWithPlat($_GET['id']);

date_default_timezone_set("Europe/Amsterdam");
$now = new DateTime();
$dat = $now->format('Y-m-d H:i:s'); 

$platId = $gpTable->platIdByGameId(htmlspecialchars($_GET['id']));
$catId = $gcTable->catIdByGameId(htmlspecialchars($_GET['id']));

if (isset($_POST['action'])) {

	if(!empty($_POST['titre']) && !empty($_POST['descr']) && !empty($_POST['dev']) && !empty($_POST['plats']) && !empty($_POST['cats']) && !empty($_POST['price'])) {
		$titreEdited = ($game->titre != htmlspecialchars($_POST['titre']));
		$descrEdited = ($game->descr != htmlentities($_POST['descr'], ENT_QUOTES | ENT_XML1, 'UTF-8'));
		$devEdited = ($game->dev != htmlspecialchars($_POST['dev']));
		$priceEdited = ($game->price != htmlspecialchars($_POST['price']));

		$platIdArray = [];
		$i = 0;
		foreach($platId as $p) {
			$platIdArray[$i] = $p->plat_id;
			$i++;
		}
		$platsEdited = ($platIdArray != $_POST['plats']);

		$catIdArray = [];
		$i = 0;
		foreach($catId as $c) {
			$catIdArray[$i] = $c->cat_id;
			$i++;
		}
		$catsEdited = ($catIdArray != $_POST['cats']);

		$fileNotEmpty = ($_FILES['img']['size'] != 0);

		if($titreEdited || $descrEdited || $devEdited || $fileNotEmpty || $priceEdited || $platsEdited || $catsEdited) {
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
								'descr' => htmlentities($_POST['descr'], ENT_QUOTES | ENT_XML1, 'UTF-8'),
								'dev' => htmlspecialchars($_POST['dev']),
								'dat' => $dat,
								'price' => htmlspecialchars($_POST['price'])						
								]);
							
							$delp = $gpTable->delGByGId(htmlspecialchars($_GET['id']));
							foreach($_POST['plats'] as $idPlat) {
								$crep = $gpTable->create([
									'game_id' => htmlspecialchars($_GET['id']),
									'plat_id' => htmlspecialchars($idPlat)
								]);
							}

							$delc = $gcTable->delGByGId(htmlspecialchars($_GET['id']));
							foreach($_POST['cats'] as $idCat) {
								$crec = $gcTable->create([
									'game_id' => htmlspecialchars($_GET['id']),
									'cat_id' => htmlspecialchars($idCat)
								]);
							}
			
							if($result) {
								header('Location: admin.php?p=games.edit&id=' . htmlspecialchars($_GET['id']));
							} else {
								?>
								<div class="danger">
									Erreur : Le jeu n'a pas pu être modifiée.
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
					'descr' => htmlentities($_POST['descr'], ENT_QUOTES | ENT_XML1, 'UTF-8'),
					'dev' => htmlspecialchars($_POST['dev']),
					'dat' => $dat,
					'price' => htmlspecialchars($_POST['price'])
					]);
				
				$delp = $gpTable->delGByGId(htmlspecialchars($_GET['id']));
				foreach($_POST['plats'] as $idPlat) {
					$crep = $gpTable->create([
						'game_id' => htmlspecialchars($_GET['id']),
						'plat_id' => htmlspecialchars($idPlat)
					]);
				}

				$delc = $gcTable->delGByGId(htmlspecialchars($_GET['id']));
				foreach($_POST['cats'] as $idCat) {
					$crec = $gcTable->create([
						'game_id' => htmlspecialchars($_GET['id']),
						'cat_id' => htmlspecialchars($idCat)
					]);
				}

				if($result) {
					header('Location: admin.php?p=games.edit&id=' . htmlspecialchars($_GET['id']));
				} else {
					?>
					<div class="danger">
						Erreur : Le jeu n'a pas pu être modifiée.
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

$form = new \App\HTML\GamesForm($game);

?>
<div class="adminAdd">
<h4>Modifier "<?= $game->titre; ?>"</h4>
<hr>

<form method="post" class="edit" enctype="multipart/form-data">
		<?= $form->input('titre', 'Titre'); ?>
		<div class="addPlats">
			<label>Plateformes</label>
		<?php
		foreach ($app->getTable('Platform')->all() as $plat) {
			$checkId = false;
			foreach($platId as $p) {
				if($p->plat_id === $plat->id) {
					$checkId = true;
				}
			}
			echo $form->input($plat->nom, $plat->nom, ['type' => 'checkbox', 'value' => $plat->id, 'name' => 'plats[]', 'check' => $checkId]); 
		}
		?>
		</div>
		<div class="addPlats">
			<label>Catégories</label>
		<?php
		foreach ($app->getTable('Cat')->all() as $cat) {
			$checkId = false;
			foreach($catId as $c) {
				if($c->cat_id === $cat->id) {
					$checkId = true;
				}
			}
			echo $form->input($cat->nom, $cat->nom, ['type' => 'checkbox', 'value' => $cat->id, 'name' => 'cats[]', 'check' => $checkId]); 
		}
		?>
		</div>
		<?= $form->input('price', 'Prix'); ?>
		<div class="edit-img" style="background-image: url('<?= $game->img; ?>')"></div>
		<?= $form->input('img', 'Image', ['type' => 'file']); ?>
		<?= $form->input('descr', 'Déscription', ['type' => 'textarea']); ?>
		<?= $form->input('dev', 'Développeur'); ?>
		<button class="btn waves-effect waves-light" type="submit" name="action">Sauvegarder</button>
</form>
</div>