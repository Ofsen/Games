<?php

namespace App\Table;
use Core\Table\Table;

class AchatTable extends Table {

    protected $table = 'achat';

    /**
     * Récupère les jeux qui que l'utilisateur à acheté
     * 
     * @return object
     */
    public function myGames() {
        return $this->query("
            SELECT games.id, games.titre, games.img, games.descr, games.dev, games.dat, GROUP_CONCAT(platforms.nom) as platform
            FROM games
            INNER JOIN game_plat ON games.id = game_plat.game_id
			INNER JOIN platforms ON platforms.id = game_plat.plat_id
            INNER JOIN achat ON id_game = games.id
            WHERE id_user = " . htmlspecialchars($_GET['id']) . "
            GROUP BY achat.id DESC");
    }

}

?>