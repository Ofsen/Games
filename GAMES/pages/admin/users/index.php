<?php

$users = App::getInstance()->getTable('User')->all();
$adminForm = new \App\HTML\AdminForm();

echo $adminForm->header("users");
echo $adminForm->tableHead();

foreach($users as $user):
?>

<tr>
	<td class="left"><a href="index.php?p=user&id=<?= $user->id; ?>"><?= $user->username; ?></a></td>
	<td class="acts">
		<form action="?p=users.delete" method="post" style="display:inline" onsubmit="return confirm('Voulez vous vraiment supprimer cette utilisateur ?');">
			<input type="hidden" name="id" value="<?= $user->id; ?>">
			<button class="delete" type="submit" name="del">Delete</button>
		</form>
		
	</td>
</tr>

<?php
endforeach;

echo $adminForm->tableFooter();

?>