<?php 
namespace Core\Entity;

class Entity {

	public function __get($key) {
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

	public function getExt() {
		$html = '<p>' . substr(html_entity_decode($this->descr, ENT_QUOTES | ENT_XML1, 'UTF-8'), 0, 100) . '...</p>';
		$html .= '<span><a href="' . $this->getUrl() . '">Voir la suite</a></span>';
		return $html;
	}

	public function getUrl() {
		return 'index.php?p=games.show&id=' . $this->id;
	}

	/* doesn't wrok | don't know why | Fortunalty we call this one time 
	public function getDescr() {
		return html_entity_decode($this->descr, ENT_QUOTES | ENT_XML1, 'UTF-8');
	}
	*/

}

?>