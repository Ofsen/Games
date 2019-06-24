<?php

$games = App::getInstance()->getTable('Game')->all();
$adminForm = new \App\HTML\AdminForm();

echo $adminForm->header("games");
echo $adminForm->tableHead();

foreach($games as $game): ?>
<tr>
	<td class="left"><a href="index.php?p=games.show&id=<?= $game->id; ?>"><?= $game->titre; ?></a></td>
	<td class="acts">
		<a class="edit" href="?p=games.edit&id=<?= $game->id; ?>">Edit</a>
		<form action="?p=games.delete" method="post" style="display:inline" onsubmit="return confirm('Voulez vous vraiment supprimer ce jeu ?');">
			<input type="hidden" name="id" value="<?= $game->id; ?>">
			<button class="delete" type="submit" name="del">Delete</button>
		</form>
				
	</td>
</tr>
<?php 
endforeach;
echo $adminForm->tableFooter();

