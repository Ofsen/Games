<?php

$plats = App::getInstance()->getTable('Platform')->all();

?>

<h4>Administration des Plateformes</h4>
<hr>
<ul class="admin">
	<li><a href="admin.php">Jeux</a></li>
	<li> | </li>
	<li><a href="?p=platforms.index" class="disabled">Plateformes</a></li>
</ul>

<p class="add">
	<a href="?p=platforms.add"><i class="fas fa-plus"></i> Ajouter</a>
</p>

<table>
	<thead>
		<tr>
			<th>Titre</th>
			<th class="actions">Actions</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($plats as $plat): ?>
		<tr>
			<td class="left"><a href="index.php?p=games.platform&id=<?= $plat->id; ?>"><?= $plat->nom; ?></a></td>
			<td class="acts">
				<a class="edit" href="?p=platforms.edit&id=<?= $plat->id; ?>">Edit</a>
				<form action="?p=platforms.delete" method="post"  onsubmit="return confirm('En supprimant une platform vous allez au même temps supprimer tout les jeux lister sous cette platform. Voulez vous vraiment supprimer cette platform ?');">
					<input type="hidden" name="id" value="<?= $plat->id; ?>">
					<button class="delete" type="submit">Delete</button>
				</form>
				
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>