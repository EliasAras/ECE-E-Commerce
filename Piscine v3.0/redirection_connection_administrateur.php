<?php
    if (isset($_COOKIE['type']))
    {
     if($_COOKIE['type'] === "Acheteurs"){
         session_start();
         setcookie('creerCompte', "Administrateur", time() + 365*24*3600, null, null, false, true);
         header('Location: connexion.php');
     }
     if($_COOKIE['type'] === "Vendeurs"){
         session_start();
         setcookie('creerCompte', "Administrateur", time() + 365*24*3600, null, null, false, true);
         header('Location: connexion.php');
     }
     if($_COOKIE['type'] === "Admins"){
         session_start();
         header('Location: gestion_vendeur.php');
     }
    }else{
        setcookie('creerCompte', "Administrateur", time() + 365*24*3600, null, null, false, true);
        header('Location: connexion.php');
    }
?>