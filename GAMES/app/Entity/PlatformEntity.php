<?php
namespace App\Entity;
use Core\Entity\Entity;

class PlatformEntity extends Entity {

	/**
	 * Récupère l'url de la plateforme
	 * 
	 * @return string
	 */
	public function getUrl() {
		return 'index.php?p=games.platform&id=' . $this->id;
	}

}

?>