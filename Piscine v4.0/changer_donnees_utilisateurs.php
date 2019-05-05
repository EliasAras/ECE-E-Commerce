<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');

$Nom= isset($_POST["Nom"])?$_POST["Nom"]:"";
$Prenom= isset($_POST["Prenom"])?$_POST["Prenom"]:"";
$Email= isset($_POST["Email"])?$_POST["Email"]:"";
$Mdp= isset($_POST["Mdp"])?$_POST["Mdp"]:"";
$Adresse= isset($_POST["Adresse"])?$_POST["Adresse"]:"";
$Ville= isset($_POST["Ville"])?$_POST["Ville"]:"";
$codePostal= isset($_POST["Zip"])?$_POST["Zip"]:"";
$numeroBancaire= isset($_POST["NumeroCarte"])?$_POST["NumeroCarte"]:"";
$nomBancaire= isset($_POST["NomBancaire"])?$_POST["NomBancaire"]:"";
$dateExpiration= isset($_POST["DateExpiration"])?$_POST["DateExpiration"]:"";
$Cryptho= isset($_POST["Crypthogramme"])?$_POST["Crypthogramme"]:"";

$dateExpiration .= "-01";


//nom de base de données
$database = "amazon";

//connecter l'utilisateur dans BDD
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);

//si le BDD existe
if ($db_found) {
    $id = $_COOKIE['id'];

    echo $id;
    echo $Nom;
    echo $Prenom;
    echo $Email;
    echo $Mdp;
    echo $Adresse;

    $sql = "UPDATE Acheteurs SET Nom = '".$Nom."', Prenom = '".$Prenom."', Rue = '".$Adresse."', Ville = '".$Ville."', CodePostal = '".$codePostal."',
            Email = '".$Email."', Mdp = '".$Mdp."', NomBancaire = '".$nomBancaire."', NumeroBancaire = '".$numeroBancaire."', DateExpiration = '".$dateExpiration."',
            CryptogrammeBancaire = '".$Cryptho."' WHERE Id = ".$id;
    $result = mysqli_query($db_handle, $sql);
    header('Location: donnees_utilisateur.php');
}
?>