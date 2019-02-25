<?php 

namespace App\Table;
use Core\Table\Table;

class CategoryTable extends Table {

	protected $table = 'categories';

	/**
	 * Récupère l'id d'une catégorie a partire de son nom
	 * @param $catName String
	 * @return App/Entity/CategoryEntity
	 */
	public function catIdByName($catName) {
		return $this->query("SELECT id FROM categories WHERE nom = ?", [$catName], true);
	}

}
?>