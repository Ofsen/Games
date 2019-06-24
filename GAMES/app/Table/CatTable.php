<?php 

namespace App\Table;
use Core\Table\Table;

class CatTable extends Table {

    protected $table = 'cats';

    /**
	* Récupère tout les noms des catégories où l'id des jeux est égale a l'attribut id
	* 
	* @param $id int
	* @return object
	*/
	public function catByGameId($id) {
		return $this->query("SELECT id, nom 
			FROM {$this->table} 
			INNER JOIN game_cat ON game_id = ?
            WHERE game_id = ?
            GROUP BY id", [$id,$id]);
	}

	/**
	* Récupère 3 catégories de la base de donnée ordonné avec l'id de celle-ci
	* 
	* @return object
	*/
	public function threeCats() {
		return $this->query("SELECT * FROM {$this->table} ORDER BY id ASC LIMIT 3");
	}

	public function search($key) {
		return $this->query("
			SELECT cats.id, cats.nom 
			FROM {$this->table}
			WHERE cats.nom LIKE '%$key%'");
	}

}