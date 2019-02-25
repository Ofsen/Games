<?php 

namespace App\Table;
use Core\Table\Table;

class PostTable extends Table {

	protected $table = 'articles';

	/**
	 * Récupère les dernièrs articles
	 * @return array
	 */
	public function last() {
		return $this->query("
				SELECT articles.id, articles.titre, articles.img, articles.contenu, articles.date, categories.nom as categorie
				FROM articles
				LEFT JOIN categories ON categorie_id = categories.id
				ORDER BY articles.date DESC");
	}

	/**
	 * Récupère les dernièrs articles de la catégorie demandé
	 * @param $cat_id int
	 * @return array
	 */
	public function lastByCat($cat_id) {
		return $this->query("
				SELECT articles.id, articles.titre, articles.img, articles.contenu, articles.date, categories.nom as categorie
				FROM articles
				LEFT JOIN categories ON categorie_id = categories.id
				WHERE articles.categorie_id = ?
				ORDER BY articles.date DESC", [$cat_id]);
	}

	/**
	 * Récupère un article en liant la catégorie associée
	 * @param $id int
	 * @return \App\Entity\PostEntity
	 */
	public function findWithCat($id) {
		return $this->query("
				SELECT articles.id, articles.titre, articles.img, articles.contenu, categories.nom as categorie
				FROM articles
				LEFT JOIN categories ON categorie_id = categories.id
				WHERE articles.id = ?", [$id], true);
	}

}

?>