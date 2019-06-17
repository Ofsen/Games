<?php 

namespace App\Table;
use Core\Table\Table;

class PlatformTable extends Table {

	protected $table = 'platforms';

	/**
	 * Récupère l'id d'une plateforme a partire de son nom
	 * 
	 * @param $platName String
	 * @return App/Entity/PlatformEntity
	 */
	public function platIdByName($platName) {
		return $this->query("SELECT id FROM platforms WHERE nom = ?", [$platName], true);
	}

	/**
	* Recherche une platform dans la base de donnée a partire de l'attribut
	* 
	* @param $key string
	* @return object
	*/
	public function search($key) {
		return $this->query("
				SELECT platforms.id, platforms.nom, platforms.img 
				FROM platforms
				WHERE platforms.nom LIKE '%$key%'");
	}
}
?>