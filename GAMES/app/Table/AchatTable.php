<?php

namespace App\Table;
use Core\Table\Table;

class AchatTable extends Table {

    protected $table = 'achat';

    public function myGames($id) {
        return $this->query("SELECT id_game FROM achat WHERE id_user = {$id}");
    }

}

?>