<?php

$cats = App::getInstance()->getTable('Category')->all();

?>

<h1>Admin Catégory tools</h1><span class=""><a href="admin.php">Articles</a></span>

<p>
	<a href="?p=categories.add" class="waves-effect waves-light btn green right">Ajouter</a>
</p>

<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Titre</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($cats as $cat): ?>
		<tr>
			<td><?= $cat->id; ?></td>
			<td><?= $cat->nom; ?></td>
			<td>
				<a class="waves-effect waves-light btn green" href="?p=categories.edit&id=<?= $cat->id; ?>">Edit</a>
				<form action="?p=categories.delete" method="post" style="display:inline">
					<input type="hidden" name="id" value="<?= $cat->id; ?>">
					<button type="submit" class="waves-effect waves-light btn red">Delete</button>
				</form>
				
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>