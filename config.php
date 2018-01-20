<?php
// DIRECTORY SHORTCUT
define('THEME', 'theme/');
define('VUE', 'theme/vue/');
define('INC','inc/');
define('CSS', 'theme/css/');
define('IMAGE', 'images/');



$locale = '';


$mail_admin = 'greg.olivier@hotmail.fr';



// Config des temps de stockage des différents éléments
$time_store_token = 5 * 60; // 5min -> temps de saisie des formulaires
$time_store_cookie = 3600; // 12h -> temps avant que le cookies ne soit plus valable


// Versionning de fichier CSS
// (pour être sur que si le fichier css a été modifié, il soit rechargé)
$sha1FileCss = sha1_file(CSS.'style.css');



// CONNEXION DATABASE
$host = 'localhost';
$dbname='danceschool';
$user = 'root';
$pwd = '';
$dsn = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8';



