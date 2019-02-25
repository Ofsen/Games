<?php
namespace Core\HTML;

/**
 * Class From
 * Permet de générer un formulaire rapidement
 */
class Form {

	/**
	 * @var array Donnée utilisées
	 */
	private $data;

	/**
	 * @vat string Tag utilisé pour entourer les champs
	 */
	public $surround = 'p';

	/**
	 * @param array $data
	 */
	public function __construct($data = array()) {
		$this->data = $data;
	}

	private function surround($html) {
		return "<{$this->surround}>{$html}</{$this->surround}>";
	}

	protected function getValue($index) {
		if(is_object($this->data)) {
			return $this->data->$index;
		}
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}

	public function input($name, $label, $options = []) {
		$type = isset($options['type']) ? $options['type'] : 'text';
		return $this->surround(
			'<input type="' . $type . '" name"' . $name . '" value="' . $this->getValue($name) . '">'
		);
	}

	public function submit() {
		return $this->surround('<button type="submit">Envoyer</button>');
	}

}