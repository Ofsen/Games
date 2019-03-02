<?php

$games = App::getInstance()->getTable('Game')->all();

if (isset($_POST['del'])) {
	die("hello");
}

?>

<h4>Administration des Jeux</h4>
<hr>
<ul class="admin">
	<li><a href="admin.php" class="disabled">Jeux</a></li>
	<li> | </li>
	<li><a href="?p=platforms.index">Plateformes</a></li>
</ul>

<p class="add">
	<a href="?p=games.add"><i class="fas fa-plus"></i> Ajouter</a>
</p>

<table>
	<thead>
		<tr>
			<th>Titre</th>
			<th class="actions">Actions</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($games as $game): ?>
		<tr>
			<td class="left"><a href="index.php?p=games.show&id=<?= $game->id; ?>"><?= $game->titre; ?></a></td>
			<td class="acts">
				<a class="edit" href="?p=games.edit&id=<?= $game->id; ?>">Edit</a>
				<form action="?p=games.delete" method="post" style="display:inline">
					<input type="hidden" name="id" value="<?= $game->id; ?>">
					<button class="delete" type="submit" name="del">Delete</button>
				</form>
				
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>