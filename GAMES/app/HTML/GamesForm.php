<?php 

namespace App\HTML;
use Core\HTML\Form;

class GamesForm extends Form {

	/**
	 * @param $html string code HTML à entourer
	 * @return string
	 */
	protected function surround($html) {
		return "<div class=\"input-field\">{$html}</div>";
	}

	/**
	 * @param $name string
	 * @param $label string
	 * @param $options array
	 * @return string
	 */
	public function input($name, $label, $options = [])  {
		$label = '<label for="' . $name . '">' . $label . '</label>';
		$type = isset($options['type']) ? $options['type'] : 'text';
		$value = isset($options['value']) ? $options['value'] : $this->getValue($name);
		$nom = isset($options['name']) ? $options['name'] : $name;
		if($type === 'textarea') {
			$input = '<textarea rows="10" id="' . $name . '" name="' . $nom . '" >' . html_entity_decode($value, ENT_QUOTES | ENT_XML1, 'UTF-8') . '</textarea>';
		} else if($type === 'checkbox') {
			if(isset($options['check']) && $options['check'] === true) {
				$input = '<input id="' . $name . '" name="' . $nom . '" type="' . $type . '" class="validate" value="' . $value . '" checked>';			
			} else {
				$input = '<input id="' . $name . '" name="' . $nom . '" type="' . $type . '" class="validate" value="' . $value . '">';			
			}
		} else {
			$input = '<input id="' . $name . '" name="' . $nom . '" type="' . $type . '" class="validate" value="' . $value . '">';
		}
		return $this->surround($label . $input);
	}

	/**
	 * @return string
	 */
	public function submit() {
		return $this->surround('<div class="row"><button class="btn waves-effect waves-light" type="submit" name="submit">Envoyer</button></div>');
	}

}