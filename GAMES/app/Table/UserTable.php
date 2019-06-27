<?php
namespace App\Table;
use Core\Table\Table;

class UserTable extends Table {
    
    protected $table = 'users';

    /**
     * Recherche les pseudos dans la base de donnée a partire de l'attribut
     * 
     * @param $key string
     * @return object
     */
    public function searchPseudo($key) {
		$key = htmlspecialchars($key);
        return $this->query("SELECT username FROM $this->table WHERE username LIKE '%$key%'");
	}

}

?>