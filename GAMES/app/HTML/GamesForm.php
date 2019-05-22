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
		if($type === 'textarea') {
			$input = '<textarea id="' . $name . '" name="' . $name . '">' . $value . '</textarea>';
		} else {
			$input = '<input id="' . $name . '" name="' . $name . '" type="' . $type . '" class="validate" value="' . $value . '">';
		}
		return $this->surround($label . $input);
	}

	public function select($name, $label, $options) {
		$label = '<label for="' . $name . '">' . $label . '</label>';
		$input = '<select name="' . $name . '" class="browser-default">';
			foreach ($options as $k => $v) {
				$attributes = '';
				if ($k == $this->getValue($name)) {
					$attributes = ' selected';
				}
				$input .= '<option value="' . $k . '" ' . $attributes . '>' . $v . '</option>';
			}
		$input .= '</select>';
		return $this->surround($label . ' ' . $input);
	}

	/**
	 * @return string
	 */
	public function submit() {
		return $this->surround('<div class="row"><button class="btn waves-effect waves-light" type="submit" name="submit">Envoyer</button></div>');
	}

}