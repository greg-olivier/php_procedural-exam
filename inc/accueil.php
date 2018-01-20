<?php


    $sql = 'SELECT id_article, titre, contenu, date, image FROM article ORDER BY date DESC' ;
    $result = $bdd-> query($sql);
    $all_articles = $result->fetchAll();



include VUE . 'accueil.html.php';