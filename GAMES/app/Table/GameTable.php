<?php 

namespace App\Table;
use Core\Table\Table;

class GameTable extends Table {

	protected $table = 'games';

	/**
	 * Récupère les dernièrs jeux
	 * 
	 * @return array
	 */
	public function last() {
		return $this->query("
				SELECT games.id, games.titre, games.img, games.descr, games.dev, games.dat, platforms.nom as platform
				FROM games
				LEFT JOIN platforms ON plat_id = platforms.id
				ORDER BY games.dat DESC");
	}

	/**
	 * Récupère les dernièrs jeux de la plateforme demandé
	 * 
	 * @param $plat_id int
	 * @return array
	 */
	public function lastByPlat($plat_id) {
		return $this->query("
				SELECT games.id, games.titre, games.img, games.descr, games.dev, games.dat, platforms.nom as platform
				FROM games
				LEFT JOIN platforms ON plat_id = platforms.id
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
				SELECT games.id, games.titre, games.img, games.descr, games.dev, platforms.nom as platform
				FROM games
				LEFT JOIN platforms ON plat_id = platforms.id
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
				SELECT games.id, games.titre, games.img, games.descr, games.dev, platforms.nom as platform 
				FROM games 
				LEFT JOIN platforms ON plat_id = platforms.id
				WHERE games.titre LIKE '%$key%' OR games.descr LIKE '%$key%'");
	}

}

?>