<?php
    if (isset($_COOKIE['type']))
    {
     if($_COOKIE['type'] === "Acheteurs"){
         session_start();
         header('Location: connexion.php');
     }
     if($_COOKIE['type'] === "Vendeurs"){
         session_start();
         header('Location: vendre.php');
     }
     if($_COOKIE['type'] === "Admins"){
         session_start();
         header('Location: connexion.php');
     }
    }else{
        header('Location: connexion.php');
    }
?>