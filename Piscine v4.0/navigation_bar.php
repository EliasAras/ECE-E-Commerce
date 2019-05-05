
<?php
/**
 * Created by PhpStorm.
 * User: XavierdeCazenove1
 * Date: 2019-05-01
 * Time: 18:20
 */

echo "<nav class=\"navbar navbar-expand-md\">
         <a class=\"navbar-brand\" href=\"page_accueil_html.php\"><img src=\"Images/Photos/souk.png\"></a>
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
                 <li class=\"nav-item\"><a class=\"nav-link\" href=\"redirection_connection_utilisateur.php\">Votre Compte</a></li>
                 <li class=\"nav-item\"><a class=\"nav-link\" href=\"redirection_connection_administrateur.php\">Administrateur</a></li>
                 <li class=\"nav-item\"><a class=\"nav-link\" href=\"redirection_connection_vendeur.php\">Vendre</a></li>";

if (isset($_COOKIE['nom'])) {
    if ($_COOKIE['type'] === "Acheteurs") {
        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"donnees_utilisateur.php\">" . $_COOKIE['nom'] . "</a></li>";
    }
    if ($_COOKIE['type'] === "Vendeurs") {
        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"creer_produit.php\">" . $_COOKIE['nom'] . "</a></li>";
    }
    if ($_COOKIE['type'] === "Admins") {
        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"gestion_vendeur.php\">" . $_COOKIE['nom'] . "</a></li>";
    }
}

echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"";

if (isset($_COOKIE['type'])) {
    if ($_COOKIE['type'] === "Acheteurs") {
        echo "panier.php";
    } else {
        echo "redirection_connection_utilisateur.php";
    }
}else{
    echo "redirection_connection_utilisateur.php";
}
echo "\"><img id='image' src='Images/Photos/panier.png' onmouseover=\"this.src='Images/Photos/panier_changer.png';\" onmouseout=\"this.src='Images/Photos/panier.png';\"></a></li>";

if (isset($_COOKIE['id'])) {
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"deconnexion.php\">Déconnexion</a></li>";
}
echo "
            </ul>
         </div>
    </nav>"; ?>




