<?php 

namespace App\Table;
use Core\Table\Table;

class Game_platTable extends Table {

    protected $table = 'game_plat';

	public function delGByGId($id) {
		return $this->query("DELETE FROM {$this->table} WHERE game_id = ?", [$id]);
	}

	public function delPByPId($id) {
		return $this->query("DELETE FROM {$this->table} WHERE plat_id = ?", [$id]);
	}

	public function platIdByGameId($id) {
		return $this->query("SELECT plat_id FROM {$this->table} WHERE game_id = ?", [$id]);
	}
    
}