<?php

$users = App::getInstance()->getTable('User')->all();
$adminForm = new \App\HTML\AdminForm();

echo $adminForm->header("users");

?>

<table>
	<thead>
		<tr>
			<th>Titre</th>
			<th class="actions">Actions</th>
		</tr>
	</thead>

	<tbody>
		<?php foreach($users as $user): ?>
		<tr>
			<td class="left"><a href="index.php?p=users.show&id=<?= $user->id; ?>"><?= $user->titre; ?></a></td>
			<td class="acts">
				<a class="edit" href="?p=users.edit&id=<?= $user->id; ?>">Edit</a>
				<form action="?p=users.delete" method="post" style="display:inline" onsubmit="return confirm('Voulez vous vraiment supprimer cette utilisateur ?');">
					<input type="hidden" name="id" value="<?= $user->id; ?>">
					<button class="delete" type="submit" name="del">Delete</button>
				</form>
				
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>