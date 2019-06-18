<?php

define ('ROOT', "../../");

require ROOT . 'app/App.php';
App::load();

$user = App::getInstance()->getTable('User');
$id = htmlspecialchars($_POST['id']);

if($_SESSION['auth'] === "$id" || $user->find($_SESSION['auth'])->admin === "1") {

    $edit = htmlspecialchars($_POST['edit']);
    (isset($_POST['value'])) ? $value = htmlspecialchars($_POST['value']) : "";

    if(isset($_POST['editC']) && isset($_POST['valueC'])) {
        $editC = htmlspecialchars($_POST['editC']);
        $valueC = htmlspecialchars($_POST['valueC']);
    }

    if(!empty($value) || !empty($_FILES)) {
        if($edit == "editAv") {

            $name = str_replace(" ", "-", $_FILES['img']['name']);
            $tmpName = $_FILES['img']['tmp_name'];
            $ext = strrchr($name, ".");
            $errors = $_FILES['img']['error'];
            $dest = ROOT  . './public/img/user/' . $name;
            $sqlField = './img/user/' . $name;
            $goodExt = array('.jpg', '.png');
            
            if(in_array($ext, $goodExt)) {
                if ($errors == 0) {
                    if (move_uploaded_file($tmpName, $dest)) {
                        $result = $user->update(($id), [
                            'img' => htmlspecialchars($sqlField),
                        ]);
                    } else {
                        $error = "Erreur : non uploader";
                    }
                } else {
                    $error = "Erreur : veuillez réessayer";
                }
            } else {
                $error = "Erreur : Format de l'image incorrecte";
            }

        }else if($edit == "editP") {
            $result = $user->update(($id), [
                'username' => $value
            ]);
        } else if ($edit == "editN") {
            $result = $user->update(($id), [
                'nom' => $value
            ]);
        } else if ($edit == "editPre") {
            $result = $user->update(($id), [
                'prenom' => $value
            ]);
        } else if ($edit == "editA") {
            $result = $user->update(($id), [
                'adresse' => $value
            ]);
        } else if ($edit == "editE" && $editC == "editEC") {
            if($_POST['value'] == $_POST['valueC']) {
                $result = $user->update(($id), [
                    'adresse' => $value
                ]);
            } else {
                $error = "Erreur : les informations entrées ne sont pas identique";
            }
        } else if ($edit == "editPass" && $editC == "editPassC") {
            if($_POST['value'] == $_POST['valueC']) {
                $result = $user->update(($id), [
                    'password' => sha1($valueC)
                ]);
            } else {
                $error = "Erreur : les informations entrées ne sont pas identique";
            }
        }

        if(isset($result)) {
            $error = "ok";
        } else {
            $error = "Erreur : veuillez réessayer";
        }
    } else {
        $error = "Erreur : tout les champs sont obligatoires";
    }

    echo $error;
} else {
    App::getInstance()->forbidden();
}

?>