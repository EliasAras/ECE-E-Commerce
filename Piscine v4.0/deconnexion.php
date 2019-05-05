<?php
/**
 * Created by PhpStorm.
 * User: XavierdeCazenove1
 * Date: 2019-05-01
 * Time: 22:54
 */

// Suppression du fichier cookie
setcookie('id', '');
setcookie('nom', '');
setcookie('type', '');

// Suppression de la valeur du cookie en mémoire dans $_COOKIE
unset($_COOKIE['id']);
unset($_COOKIE['nom']);
unset($_COOKIE['type']);

header('Location: page_accueil_html.php');

?>