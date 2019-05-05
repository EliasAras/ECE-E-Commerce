<?php
/**
 * Created by PhpStorm.
 * User: XavierdeCazenove1
 * Date: 2019-05-01
 * Time: 18:20
 */

echo "<nav class=\"navbar navbar-expand-md\">
         <a class=\"navbar-brand\" href=\"page_accueil_html.php\">Amazon</a>
         <button class=\"navbar-toggler navbar-dark\" type=\"button\" data-toggle=\"collapse\" data-target=\"#main-navigation\">
            <span class=\"navbar-toggler-icon\"></span>
         </button> 

        <div class=\"dropdown\">
            <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-                   expanded=\"false\">Categories</button>
            <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                <a class=\"dropdown-item\" href=\"musiques.php\">Musiques</a>
                <a class=\"dropdown-item\" href=\"livres.php\">Livres</a>
                <a class=\"dropdown-item\" href=\"sportsetloisirs.php\">Sports et loisirs</a>
                <a class=\"dropdown-item\" href=\"vetements.php\">Vetements</a>
            </div>
        </div>
                        
            <div>
            <ul class=\"navbar-nav\">
                 <li class=\"nav-item\"><a class=\"nav-link\" href=\"ventesflash.php\">Ventes flash</a></li>
                 <li class=\"nav-item\"><a class=\"nav-link\" href=\"panier.php\">Panier</a></li>
                 <li class=\"nav-item\"><a class=\"nav-link\" href=\"redirection_connection_utilisateur.php\">";
                         if (isset($_COOKIE['type']))
                         {
                             if($_COOKIE['type'] === "Acheteurs"){
                                 session_start();
                                 echo $_COOKIE['nom'];
                             }else{
                                 echo "Votre compte";
                             }
                         }else{
                             echo "Votre compte";
                         }
                         echo "</a></li>
                 <li class=\"nav-item\"><a class=\"nav-link\" href=\"redirection_connection_administrateur.php\">";
                         if (isset($_COOKIE['type']))
                         {
                             if($_COOKIE['type'] === "Admins"){
                                 session_start();
                                 echo $_COOKIE['nom'];
                             }else{
                                 echo "Administrateur";
                             }
                         }else{
                             echo "Administrateur";
                         }
                         echo "</a></li>
                <li class=\"nav-item\"><a class=\"nav-link\" href=\"redirection_connection_vendeur.php\">";
                        if (isset($_COOKIE['type']))
                        {
                            if($_COOKIE['type'] === "Vendeurs"){
                                session_start();
                                echo $_COOKIE['nom'];
                            }else{
                                echo "Vendre";
                            }
                        }else{
                            echo "Vendre";
                        }
                        echo"</a></li>
            </ul>
         </div>
    </nav>
        ";