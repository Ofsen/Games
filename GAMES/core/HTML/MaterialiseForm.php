<?php 
namespace Core\HTML;

class MaterialiseForm extends Form {

	/**
	 * @param $html string code HTML à entourer
	 * @return string
	 */

	protected function surround($html) {
		return "<div class=\"input-field col s6\">{$html}</div>";
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
		if($type === 'textarea') {
			$input = '<textarea id="' . $name . '" name="' . $name . '" class="materialize-textarea">' . $this->getValue($name) . '</textarea>';
		} else {
			$input = '<input id="' . $name . '" name="' . $name . '" type="' . $type . '" class="validate" value="' . $this->getValue($name) . '">';
		}
		return $this->surround(
			'<div class="row">
				<div class="input-field col s12 m12 l12">'
					
				. $input . ' ' . $label .
					
				'</div>
			</div>'
		);
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
		return $this->surround('<div class="col s12">' . $label . ' ' . $input . '</div>');
	}

	/**
	 * @return string
	 */
	public function submit() {
		return $this->surround('<div class="row"><button class="btn waves-effect waves-light" type="submit" name="submit">Envoyer</button></div>');
	}

}