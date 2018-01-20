<?php

$action = (isset($_GET['action'])) ? $_GET['action'] : 'index';


switch ($action) {
    default:
    case 'index':
        indexAction();
        break;
    case 'cours':
        listAction();
        break;
}

function indexAction()
{
    global $bdd;
    $sql = 'SELECT cat.id_cat, cat.nom, COUNT(id_cours) nb FROM categorie cat JOIN cours c ON cat.id_cat = c.id_cat GROUP BY cat.id_cat ORDER BY cat.nom ASC';

    $result = $bdd->query($sql);

    $all_categories = $result->fetchAll();


    include VUE . 'categories.html.php';
}

function listAction()
{
    global $bdd;
    $cat = $_GET['cat'];
    $sql = 'SELECT id_cours, nom, capacite, inscrit FROM cours WHERE id_cat = ?';
    $result = $bdd->prepare($sql);
    $result->execute([$cat]);
    $category_allcours = $result->fetchAll();


    include VUE . 'cours.html.php';
}