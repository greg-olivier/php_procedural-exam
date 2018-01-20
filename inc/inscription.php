<?php

global $bdd;

$sql = 'SELECT id_cours, nom, inscrit FROM cours WHERE capacite <> inscrit OR inscrit is NULL ';
$result = $bdd->query($sql);
$cours = $result->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['token'])) {
        if (isset($_GET['cours'])) {
            header('Location: ?page=inscription&cours=' . $_GET['cours']);
            exit();
        } else {
            header('Location: ?page=inscription');
            exit();
        }
    } else {
        global $time_store_token;
        if (($_POST['token'] == $_SESSION['token']) && (time() - $_SESSION['token_time']) <= $time_store_token) {
            $erreur = "";
            if (!isset($_POST["civil"])) {
                $erreur .= "Sélectionnez votre civilité<br>";
            }
            if (strlen($_POST["nom"]) < 2) {
                if ($_POST["nom"] == '') {
                    $erreur .= "Nom obligatoire<br>";
                } else {
                    $erreur .= "Nom saisi trop court<br>";
                }
            }
            if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === FALSE) {
                if ($_POST["email"] == '') {
                    $erreur .= "Email obligatoire<br>";
                } else {
                    $erreur .= "Email invalide<br>";
                }
            }
            if ($_POST["objet"] == 'Sélectionnez...') {
                $erreur .= "Sélectionnez votre cours<br>";
            }


            if ($erreur === "") {

                $civil = $_POST["civil"];
                $nom = $_POST["nom"];
                $email = $_POST["email"];
                $objet = $_POST["objet"];

                $sql = 'INSERT into  contact(civilite, nom, email) values(?, ?, ?)';
                $result1 = $bdd->prepare($sql);
                $result1->execute([$civil, $nom, $email]);


                $i = 0;
                while ($cours[$i]['nom'] !== $objet) {
                    $i += 1;
                }

                if ($cours[$i]['inscrit'] === NULL) {
                    $inscrit = 1;
                } else {
                    $inscrit = $cours[$i]['inscrit'] + 1;
                }

                $sql = 'UPDATE cours SET inscrit = ? WHERE nom = ?';
                $result2 = $bdd->prepare($sql);
                $result2->execute([$inscrit, $objet]);

                if ($result1 === FALSE or $result2 === FALSE) {
                    $erreur = 'Problème survenu lors de l\'enregistrement. Merci de recommencer';
                }

            }
        }
    }
}
$token = token_form();
include VUE . 'inscription.html.php';
