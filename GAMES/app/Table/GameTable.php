<?php 

namespace App\Table;
use Core\Table\Table;

class GameTable extends Table {

	protected $table = 'games';

	/**
	 * Récupère tout les jeux dans la base de données et les arrange en fonction du titre
	 * 
	 * @return object
	 */
	public function showAll() {
		return $this->query("
			SELECT games.id, games.titre, games.img, games.descr, GROUP_CONCAT(platforms.nom) AS platform
			FROM games
			INNER JOIN game_plat ON games.id = game_plat.game_id
			INNER JOIN platforms ON platforms.id = game_plat.plat_id
			GROUP BY games.titre");
	}

	/**
	 * Récupère les 6 dernièrs jeux ajouté
	 * 
	 * @return array
	 */
	public function last() {
		return $this->query("
			SELECT games.id, games.titre, games.img, games.descr, GROUP_CONCAT(platforms.nom) AS platform
			FROM games
			INNER JOIN game_plat ON games.id = game_plat.game_id
			INNER JOIN platforms ON platforms.id = game_plat.plat_id
			GROUP BY games.dat DESC LIMIT 6");
	}

	/**
	 * Récupère les dernièrs jeux de la plateforme demandé
	 * 
	 * @param $plat_id int
	 * @return array
	 */
	public function lastByPlat($plat_id) {
		return $this->query("
				SELECT games.id, games.titre, games.img, games.descr, GROUP_CONCAT(platforms.nom) as platform
				FROM games
				INNER JOIN game_plat ON games.id = game_plat.game_id
				INNER JOIN platforms ON platforms.id = game_plat.plat_id
				WHERE games.plat_id = ?
				ORDER BY games.dat DESC", [$plat_id]);
	}

	/**
	 * Récupère un jeu en liant la plateforme associée
	 * 
	 * @param $id int
	 * @return \App\Entity\GameEntity
	 */
	public function findWithPlat($id) {
		return $this->query("
				SELECT games.id, games.titre, games.img, games.descr, games.dev, games.dat, games.price, GROUP_CONCAT(platforms.nom) as platform
				FROM games
				INNER JOIN game_plat ON games.id = game_plat.game_id
				INNER JOIN platforms ON platforms.id = game_plat.plat_id
				WHERE games.id = ?", [$id], true);
	}

	/**
	 * Recherche un jeu dans la base de donnée a partire de l'attribut
	 * 
	 * @param $key string
	 * @return object
	 */
	public function search($key) {
		$key = htmlspecialchars($key);
		return $this->query("
				SELECT games.id, games.titre, games.img, games.descr, platforms.nom as platform 
				FROM games 
				LEFT JOIN platforms ON plat_id = platforms.id
				WHERE games.titre LIKE '%$key%' OR games.descr LIKE '%$key%' OR games.dev LIKE '%$key%'");
	}

}

?>