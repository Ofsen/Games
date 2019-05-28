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
    public function surr($html, $what) {
        $result = "<div class=\"info\">{$html}</div>";
        if($what == null) {
            $result = "<div class=\"info entete\">{$html}</div>";
        }
        return $result;
    }

    public function field($name, $value, $edit, $conf = false, $allow = false) {
        $editField = "";
        if($allow) {
            $editField = "<i id=\"{$edit}\" onclick=\"formShow($('#form" . ucfirst($name) . "'))\" class=\"fas fa-pen\"></i>";
        }
        $html = "<div class=\"field\"><h6>{$name} :</h6> <span id=\"text{$edit}\">{$value}</span>" . $editField;
        if ($name == 'pseudo') {
            $html = "<div class=\"field {$name}\"><h5 id=\"text{$edit}\">{$value}</h5>" . $editField;
        } else if($name == 'avatar') {
            $html = "<div class=\"field {$name}\" id=\"text{$edit}\" style=\"background:url('{$value}') no-repeat center\">" . $editField;
        } else if($name == 'Mot de passe') {
            $html = "<div class=\"field\"><h6>{$name} :</h6> <span id=\"text{$edit}\">{$value}</span>";
            if($allow) {
                $html .= "<i id=\"{$edit}\" onclick=\"formShow($('#formPass'))\" class=\"fas fa-pen\"></i>";
            }
        }
        if($allow) {
            $html .= $this->form($name, $edit, $conf);
        }   
        return $html . "</div>";
    }

    public function form($name,$edit, $conf = false) {
        $title = ($name == "Adresse" || $name == "E-mail") ? "<h6>Modification de l'" . ucfirst($name) . "</h6>" : "<h6>Modification du " . ucfirst($name) . "</h6>";
        $input = "<input type=\"text\" placeholder=\"" . ucfirst($name) . "\" name=\"{$edit}\" id=\"{$edit}\">";
        if($name == "avatar") {
            $input = "<input type=\"file\" name=\"{$edit}\" id=\"{$edit}\">";
            $head = "<form id=\"form" . ucfirst($name) . "\" enctype=\"multipart/form-data\" class=\"editUser\">";
        }
        if($name == "Mot de passe") {
            $input = "<input type=\"password\" placeholder=\"" . ucfirst($name) . "\" name=\"{$edit}\" id=\"{$edit}\">";
        }
        if($name == "E-mail") {
            $input = "<input type=\"email\" placeholder=\"" . ucfirst($name) . "\" name=\"{$edit}\" id=\"{$edit}\">";
        }
        if($conf) {
            if ($name == "Mot de passe") {
                $input .= "<input type=\"password\" placeholder=\"" . ucfirst($name) . " (confirmation)\" name=\"{$edit}C\" id=\"{$edit}C\">";
            } else {
                $input .= "<input type=\"text\" placeholder=\"" . ucfirst($name) . " (confirmation)\" name=\"{$edit}C\" id=\"{$edit}C\">";
            }
        }
        if($name == "Mot de passe") {
            $name = "pass";
        }
        $buttons = "<div class=\"button\"><button type=\"submit\" onclick=\"editProfile($('#form" . ucfirst($name) . "'))\" id=\"ok\" name=\"ok\"><i class=\"fas fa-check\"></i></button><button type=\"reset\" id=\"no\" name=\"no\"><i class=\"fas fa-times\"></i></button></div>";
        $head = "<form id=\"form" . ucfirst($name) . "\" class=\"editUser\">";
        if ($name == "avatar") {
            $head = "<form id=\"form" . ucfirst($name) . "\" class=\"editUser\" enctype=\"multipart/form-data\" >";
        }
        $html = $head . $title . $input . $buttons . "<input type=\"hidden\" value=\"{$_GET['id']}\" id=\"id\" name=\"id\"><div id=\"success\" class=\"green\"></div><div id=\"error\" class=\"danger\"></div></form>";
        return $html;
    }

    public function userInput($name, $fields = [], $allow) {
        if($name != null) {
            $name = "<h5>" . $name . "</h5>";
        }
        if(isset($fields[0]['conf'])) {
            $field = $this->field($fields[0]['name'],$fields[0]['value'],$fields[0]['edit'], $fields[0]['conf'], $allow);
            if(sizeof($fields) == 2) {
                if(isset($fields[1]['conf'])) {
                    $field .= $this->field($fields[1]['name'],$fields[1]['value'],$fields[1]['edit'], $fields[1]['conf'], $allow);
                } else {
                    $field .= $this->field($fields[1]['name'],$fields[1]['value'],$fields[1]['edit'], false, $allow);
                }
            }
        } else {
            $field = $this->field($fields[0]['name'],$fields[0]['value'],$fields[0]['edit'],false, $allow);
            if(sizeof($fields) == 2) {
                $field .= $this->field($fields[1]['name'],$fields[1]['value'],$fields[1]['edit'],false, $allow);
            }
        }
        return $this->surr($name . $field, $name);
    }

}