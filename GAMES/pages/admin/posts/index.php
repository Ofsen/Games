<?php

$posts = App::getInstance()->getTable('Post')->all();

?>

<h1>Admin Article tools</h1><span class=""><a href="?p=categories.index">Catégories</a></span>

<p>
	<a href="?p=posts.add" class="waves-effect waves-light btn green right">Ajouter</a>
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
		<?php foreach($posts as $post): ?>
		<tr>
			<td><?= $post->id; ?></td>
			<td><?= $post->titre; ?></td>
			<td>
				<a class="waves-effect waves-light btn green" href="?p=posts.edit&id=<?= $post->id; ?>">Edit</a>
				<form action="?p=posts.delete" method="post" style="display:inline">
					<input type="hidden" name="id" value="<?= $post->id; ?>">
					<button type="submit" class="waves-effect waves-light btn red">Delete</button>
				</form>
				
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>