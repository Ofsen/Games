<?php

$posts = App::getInstance()->getTable('Post')->all();

if (isset($_POST['del'])) {
	die("hello");
}

?>

<h4>Administration des Jeux</h4>
<hr>
<ul class="admin">
	<li><a href="admin.php" class="disabled">Jeux</a></li>
	<li> | </li>
	<li><a href="?p=categories.index">Platforms</a></li>
</ul>

<p class="add">
	<a href="?p=posts.add"><i class="fas fa-plus"></i> Ajouter</a>
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
		<?php foreach($posts as $post): ?>
		<tr>
			<td><?= $post->id; ?></td>
			<td class="left"><a href="index.php?p=posts.show&id=<?= $post->id; ?>"><?= $post->titre; ?></a></td>
			<td>
				<a class="edit" href="?p=posts.edit&id=<?= $post->id; ?>">Edit</a>
				<form action="?p=posts.delete" method="post" style="display:inline">
					<input type="hidden" name="id" value="<?= $post->id; ?>">
					<button class="delete" type="submit" name="del">Delete</button>
				</form>
				
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>