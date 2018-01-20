<?php

$id = $_GET['id'];


////// Recuperation du détail d'un article ////////////////
$sql = 'SELECT id_article, titre, image, contenu, date FROM article WHERE id_article = ?';
$result = $bdd->prepare($sql);
$result->execute([$id]);
$current_article = $result->fetch();


include VUE . 'article.html.php';