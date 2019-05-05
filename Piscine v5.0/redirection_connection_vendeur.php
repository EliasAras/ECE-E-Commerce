<?php
    if (isset($_COOKIE['type']))
    {
     if($_COOKIE['type'] === "Acheteurs"){
         session_start();
         setcookie('creerCompte', "Vendeur", time() + 365*24*3600, null, null, false, true);
         header('Location: connexion.php');
     }
     if($_COOKIE['type'] === "Vendeurs"){
         session_start();
         header('Location: supprimer_produit_vendeur.php');
     }
     if($_COOKIE['type'] === "Admins"){
         session_start();
         setcookie('creerCompte', "Vendeur", time() + 365*24*3600, null, null, false, true);
         header('Location: connexion.php');
     }
    }else{
        setcookie('creerCompte', "Vendeur", time() + 365*24*3600, null, null, false, true);
        header('Location: connexion.php');
    }
?>