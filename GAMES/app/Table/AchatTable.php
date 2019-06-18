<?php

namespace App\Table;
use Core\Table\Table;

class AchatTable extends Table {

    protected $table = 'achat';

    public function myGames() {
        return $this->query("
            SELECT games.id, games.titre, games.img, games.descr, games.dev, games.dat, platforms.nom as platform
            FROM games
            LEFT JOIN platforms ON plat_id = platforms.id
            INNER JOIN achat ON id_game = games.id
            WHERE id_user = " . htmlspecialchars($_GET['id']) . "
            ORDER BY achat.id DESC");
    }

}

?>