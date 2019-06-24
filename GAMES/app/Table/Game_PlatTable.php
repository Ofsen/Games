<?php 

namespace App\Table;
use Core\Table\Table;

class Game_platTable extends Table {

    protected $table = 'game_plat';

	/**
	 * Supprime les tuplés de la base de donnée où game_id est égale à l'attribut id
	 * 
	 * @param $id int
	 * @return boolean
	 */
	public function delGByGId($id) {
		return $this->query("DELETE FROM {$this->table} WHERE game_id = ?", [$id]);
	}

	/**
	 * Supprime les tuplés de la base de donnée où plat_id est égale à l'attribut id
	 * 
	 * @param $id int
	 * @return boolean
	 */
	public function delPByPId($id) {
		return $this->query("DELETE FROM {$this->table} WHERE plat_id = ?", [$id]);
	}

	/**
	 * Récupère tout les ids des plateformes où l'id des jeux est égale a l'attribut id
	 * 
	 * @param $id int
	 * @return object
	 */
	public function platIdByGameId($id) {
		return $this->query("SELECT plat_id FROM {$this->table} WHERE game_id = ?", [$id]);
	}
    
}