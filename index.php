<?php
include 'config.php';

// Ouverture et paramètrage de session
session_cache_limiter("private, must-revalidate");
session_start();

session_regenerate_id(true);
setcookie(session_name(), session_id(), time() + $time_store_cookie,'/', null, null, true);


setlocale(LC_ALL, $locale);

// Include des fonctions et de la bdd
include INC.'connexionbdd.php';

include 'inc/tools.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : 'accueil';


switch ($page) {
    default:
    case 'accueil' :
        $file = 'accueil.php';
        break;
    case 'article' :
        $file = 'article.php';
        break;
    case 'cours' :
        $file = 'cours.php';
        break;
    case 'inscription' :
        $file = 'inscription.php';
        break;
}


//déclenchage de la mise en tampon
ob_start();
include INC . $file;
$buffer = ob_get_clean();
include THEME . 'layout.html.php';
?>