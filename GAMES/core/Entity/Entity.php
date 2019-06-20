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

	public function getTitre() {
        return (strlen($this->titre) > 20) ?  substr($this->titre,0,15) . '...' : $this->titre;
    }

	/* doesn't wrok | don't know why | Fortunalty we don't call this a lot of times
	public function getDescr() {
		return html_entity_decode($this->descr, ENT_QUOTES | ENT_XML1, 'UTF-8');
	}
	*/

}

?>