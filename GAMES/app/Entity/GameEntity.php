<?php
namespace App\Entity;
use Core\Entity\Entity;

class GameEntity extends Entity {

	public function getUrl() {
		return 'index.php?p=games.show&id=' . $this->id;
	}

	public function getExt() {
		$html = '<p>' . substr($this->descr, 0, 190) . '...</p>';
		$html .= '<span><a href="' . $this->getUrl() . '">Voir la suite</a></span>';
		return $html;
	}
	
}

?>