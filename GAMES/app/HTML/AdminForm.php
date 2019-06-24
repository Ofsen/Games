<?php

namespace App\HTML;
use Core\HTML\Form;

class AdminForm extends Form {
    
    public function h4($for) {
        if($for == "games") {
            $for = "Jeux";
        } else if($for == "plat") {
            $for = "Plateformes";
        } else if($for == "users") {
            $for = "Utilisateurs";
        } else if ($for == "cats") {
            $for = "Catégories";
        }
        return "<h4>Administration des {$for}</h4>";;
    }

    public function disable($li) {
        $sep = "<li> | </li>";
        $games = "<li><a href=\"admin.php\">Jeux</a></li>" . $sep;
        $plat = "<li><a href=\"?p=platforms.index\">Plateformes</a></li>" . $sep;
        $users = "<li><a href=\"?p=users.index\">Utilisateurs</a></li>" . $sep;
        $cats = "<li><a href=\"?p=cats.index\">Catégories</a></li>";
        if($li == "games") {
            $games = "<li><a href=\"admin.php\" class=\"disabled\">Jeux</a></li>" . $sep;
        } else if($li == "plat") {
            $plat = "<li><a href=\"?p=platforms.index\" class=\"disabled\">Plateformes</a></li>" . $sep;
        } else if($li == "users") {
            $users = "<li><a href=\"?p=users.index\" class=\"disabled\">Utilisateurs</a></li>" . $sep;
        } else if($li == "cats") {
            $cats = "<li><a href=\"?p=cats.index\" class=\"disabled\">Catégories</a></li>";
        }
        $html = "<ul class=\"admin\">" . $games . $plat . $users . $cats . "</ul>";
        return $html;
    }

    public function addTag($for) {
        if ($for == "plat") {
            $for = "platforms";
        }
        $html = "<p class=\"add\"><a href=\"?p={$for}.add\"><i class=\"fas fa-plus\"></i> Ajouter</a></p>";
        return $html;
    }

    public function header($for) {
        $html = $this->h4($for);
        $html .= $this->disable($for);
        if($for != "users") {
            $html .= $this->addTag($for);
        }
        return $html;
    }

    public function tableHead() {
        return "<table><thead><tr><th>Titre</th><th class=\"actions\">Actions</th></tr></thead><tbody>";
    }

    public function tableFooter() {
        return "</tbody></table>";
    }

}

?>