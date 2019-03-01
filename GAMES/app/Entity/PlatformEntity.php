<?php
namespace App\Entity;
use Core\Entity\Entity;

class PlatformEntity extends Entity {

	public function getUrl() {
		return 'index.php?p=games.platform&id=' . $this->id;
	}

}

?>