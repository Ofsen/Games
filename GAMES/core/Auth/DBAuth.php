<?php
namespace Core\Auth;
use Core\Database\Database;

class DBAuth {

	private $db;

	/**
	 * Initialize la base de donnée dans la variable privé $db
	 * 
	 * @param $db
	 */
	public function __construct(Database $db) {
		$this->db = $db;
	}

	/**
	 * Renvoie l'id de l'utilisateur connécté
	 * 
	 * @return int
	 */
	public function getUserId() {
		if($this->logged()) {
			return $_SESSION['auth'];
		} else {
			return false;
		}
	}
	
	/**
	 * Renvoyé le champ 'admin' dans la base de donnée pour savoir si l'utilisateur est admin ou pas
	 * 
	 * @return boolean
	 */
	public function admin() {
		if($this->logged()) {
			$user = $this->db->prepare("SELECT admin FROM users WHERE id = ?", [$_SESSION['auth']], null, true);
			return $user->admin;
		} else {
			return false;
		}
	}

	/**
	 * Connécte l'utilisateur en affectant l'id de l'utilisateur a la variable global SESSION.
	 * 
	 * @param $username
	 * @param $password
	 * @return boolean
	 */
	public function login($username, $password) {
		$user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
		if($user) {
			if($user->password === sha1($password)) {
				$_SESSION['auth'] = $user->id;
				return true;
			}
		}
		return false;
	}

	/**
	 * Verifie si l'utilisateur est conneté.
	 * 
	 * @return boolean
	 */
	public function logged() {
		return isset($_SESSION['auth']);
	}

}