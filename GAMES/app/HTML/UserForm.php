<?php

namespace App\HTML;
use Core\HTML\Form;

class UserForm extends Form {

    /**
     * Entour le contenu d'une div avec la class info
     * 
     * @param $html string
     * @return string
     */
    public function surround($html) {
        return "<div class=\"info\">{$html}</div>";
    }

    public function inp($name, $value, $type = 'text') {
        return "<input type=\"{$type}\" id=\"{$name}\" name=\"{$name}\" value=\"{$value}\">";
    }

    public function userInput($name, $for, $value, $idIcone, $type = 'text', $conf = false) {
        $userl = "<div class=\"userl\"><h5>{$for} : </h5> <span>{$value}<i id=\"{$idIcone}\" class=\"fas fa-pen\"></i></span></div>";
        $input = $this->inp($name,$value, $type);
        if($conf) {
            $input .= $this->inp($name . 'C', $value, $type);
        }
        $button = "<div class=\"button\"><button type=\"reset\" class=\"no\" name=\"no\"><i class=\"fas fa-times\"></i></button><button type=\"submit\" class=\"ok\" name=\"ok\"><i class=\"fas fa-check\"></i></button></div>";
        $userr = "<form id=\"{$name}\" method=\"post\" class=\"userr\">";
        $input .= $button;
        $userr .= $input . "</form>";

        return $this->surround($userl . $userr);
    }

}