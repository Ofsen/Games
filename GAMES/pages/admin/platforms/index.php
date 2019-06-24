<?php

$plats = App::getInstance()->getTable('Platform')->all();
$adminForm = new \App\HTML\AdminForm();

echo $adminForm->header("plat");
echo $adminForm->tableHead();
foreach($plats as $plat): ?>
<tr>
	<td class="left"><a href="index.php?p=games.platform&id=<?= $plat->id; ?>"><?= $plat->nom; ?></a></td>
	<td class="acts">
		<a class="edit" href="?p=platforms.edit&id=<?= $plat->id; ?>">Edit</a>
		<form action="?p=platforms.delete" method="post"  onsubmit="return confirm('Voulez vous vraiment supprimer cette plateforme ?');">
			<input type="hidden" name="id" value="<?= $plat->id; ?>">
			<button class="delete" type="submit">Delete</button>
		</form>
				
	</td>
</tr>
<?php 
endforeach;
echo $adminForm->tableFooter();