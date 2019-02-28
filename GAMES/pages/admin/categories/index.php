<?php

$cats = App::getInstance()->getTable('Category')->all();

?>

<h4>Administration des Platforms</h4>
<hr>
<ul class="admin">
	<li><a href="admin.php">Jeux</a></li>
	<li> | </li>
	<li><a href="?p=categories.index" class="disabled">Platforms</a></li>
</ul>

<p class="add">
	<a href="?p=categories.add"><i class="fas fa-plus"></i> Ajouter</a>
</p>

<table>
	<thead>
		<tr>
			<th width="8%">Id</th>
			<th>Titre</th>
			<th width="20%">Actions</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($cats as $cat): ?>
		<tr>
			<td><?= $cat->id; ?></td>
			<td class="left"><a href="index.php?p=posts.show&id=<?= $cat->id; ?>"><?= $cat->nom; ?></a></td>
			<td>
				<a class="edit" href="?p=categories.edit&id=<?= $cat->id; ?>">Edit</a>
				<form action="?p=categories.delete" method="post" style="display:inline">
					<input type="hidden" name="id" value="<?= $cat->id; ?>">
					<button class="delete" type="submit">Delete</button>
				</form>
				
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>