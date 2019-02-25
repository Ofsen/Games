<?php
namespace App\Entity;
use Core\Entity\Entity;

class PostEntity extends Entity {

	public function getUrl() {
		return 'index.php?p=posts.show&id=' . $this->id;
	}

	public function getExt() {
		$html = '<p>' . substr($this->contenu, 0, 190) . '...</p>';
		$html .= '<span><a href="' . $this->getUrl() . '">Voir la suite</a></span>';
		return $html;
	}
	
}

?>