<?php
/**
 * Created by PhpStorm.
 * User: XavierdeCazenove1
 * Date: 2019-04-30
 * Time: 12:35
 */

$email = isset($_POST["email"])?$_POST["email"] : "";
$mdp= isset($_POST["mdp"])?$_POST["mdp"] : "";

//identifier le nom de base de données
$database = "amazon";

$db_handle = mysqli_connect('localhost', 'root', '1234' );
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

    $sql = "SELECT Id, Email, Mdp, Prenom FROM Acheteurs WHERE Email = '".$email."' AND Mdp = '".$mdp."' UNION 
            SELECT Id, Email, Mdp, Pseudo FROM Vendeurs WHERE Email = '".$email."' AND Mdp = '".$mdp."' UNION 
            SELECT Id, Email, Mdp, Nom FROM Admins WHERE Email = '".$email."' AND Mdp = '".$mdp."'";

    $result = mysqli_query($db_handle, $sql);

    $data = mysqli_fetch_assoc($result);

    if ($data['Email'] === $email && $data['Mdp'] === $mdp){
        $type = "";
        $id = $data['Id'];

        if($id >= 10000000 && $id< 20000000){
            $type="Admins";
            $name = $data['Prenom'];
        }
        if($id >= 20000000 && $id< 30000000){
            $type="Vendeurs";
            $name = $data['Prenom'];
        }
        if($id >= 30000000){
            $type="Acheteurs";
            $name = $data['Prenom'];
        }

        setcookie('type', $type, time() + 365*24*3600, null, null, false, true);
        setcookie('id', $id, time() + 365*24*3600, null, null, false, true);
        setcookie('nom', $name, time() + 365*24*3600, null, null, false, true);

        if($type === "Acheteurs"){
            header('Location: page_accueil_html.php');
        }
        if($type === "Vendeurs"){
            header('Location: vendre.php');
        }
        if($type === "Admins"){
            header('Location: gestion_vendeur.php');
        }
        
    }else{
        header('Location: connexion.php');
    }
}

else {
    echo "Database not found";
}

mysqli_close($db_handle);
?>

