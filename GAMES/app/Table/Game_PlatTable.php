<?php 

namespace App\Table;
use Core\Table\Table;

class Game_platTable extends Table {

    protected $table = 'game_plat';

    public function update($id, $fields) {
		$sql_parts  = [];
		$attributes = [];
		foreach($fields as $k => $v) {
			$sql_parts[] = "$k = ?";
			$attributes[] = $v;
		}
		$attributes[] = $id;
		$sql_part = implode(', ',$sql_parts);
		return $this->query("UPDATE {$this->table} SET $sql_part WHERE game_id = ?", $attributes, true);
	}
    
}