<?php 

namespace App\Table;
use Core\Table\Table;

class PlatformTable extends Table {

	protected $table = 'platforms';

	/**
	 * Récupère l'id d'une plateforme a partire de son nom
	 * @param $platName String
	 * @return App/Entity/PlatformEntity
	 */
	public function platIdByName($platName) {
		return $this->query("SELECT id FROM platforms WHERE nom = ?", [$platName], true);
	}

}
?>