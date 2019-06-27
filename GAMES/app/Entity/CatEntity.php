<?php
namespace App\Entity;
use Core\Entity\Entity;

class CatEntity extends Entity {

	/**
	 * Récupère l'url de la catégorie
	 * 
	 * @return string
	 */
	public function getUrl() {
		return 'index.php?p=games.cats&id=' . $this->id;
    }
    
}

?>