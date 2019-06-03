<?php

namespace App\HTML;
use Core\HTML\Form;

class AdminForm extends Form {
    
    public function h4($for) {
        if($for == "games") {
            $for = "Jeux";
        } else if($for == "plat") {
            $for = "Platformes";
        } else if($for == "users") {
            $for = "Utilisateurs";
        }
        return "<h4>Administration des {$for}</h4>";;
    }

    public function disable($li) {
        $sep = "<li> | </li>";
        $games = "<li><a href=\"admin.php\">Jeux</a></li>";
        $plat = "<li><a href=\"?p=platforms.index\">Plateformes</a></li>";
        $users = "<li><a href=\"?p=users.index\">Utilisateurs</a></li>";
        if($li == "games") {
            $games = "<li><a href=\"admin.php\" class=\"disabled\">Jeux</a></li>";
        } else if($li == "plat") {
            $plat = "<li><a href=\"?p=platforms.index\" class=\"disabled\">Plateformes</a></li>";
        } else if($li == "users") {
            $users = "<li><a href=\"?p=users.index\" class=\"disabled\">Utilisateurs</a></li>";
        }
        $html = "<ul class=\"admin\">" . $games . $sep . $plat . $sep . $users . "</ul>";
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
        return $head = "<table><thead><tr><th>Titre</th><th class=\"actions\">Actions</th></tr></thead><tbody>";
    }

    public function tableFooter() {
        return $footer = "</tbody></table>";
    }

}

?>