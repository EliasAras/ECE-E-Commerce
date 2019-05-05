<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');

    //identifier le nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    $Nom= isset($_POST["Nom"])?$_POST["Nom"]:"";
    $Prenom= isset($_POST["Prenom"])?$_POST["Prenom"]:"";
	$Email= isset($_POST["Email"])?$_POST["Email"]:"";
	$Mdp= isset($_POST["Mdp"])?$_POST["Mdp"]:"";
	$Adresse= isset($_POST["Adresse"])?$_POST["Adresse"]:"";
	$Ville= isset($_POST["Ville"])?$_POST["Ville"]:"";
    $Zip= isset($_POST["Zip"])?$_POST["Zip"]:"";
    $NC= isset($_POST["NumeroCarte"])?$_POST["NumeroCarte"]:"";
    $NB= isset($_POST["NomBancaire"])?$_POST["NomBancaire"]:"";
    $ME= isset($_POST["MoisExpiration"])?$_POST["MoisExpiration"]:"";
    $AE= isset($_POST["AnneeExpiration"])?$_POST["AnneeExpiration"]:"";
    $Cryptho= isset($_POST["Crypthogramme"])?$_POST["Crypthogramme"]:"";

   
    setcookie("email","non",time() + 365*24*3600, null, null, false,true);

    //si le BDD existe, faire le traitement
    if($db_found) {

        $sql = "SELECT MAX(Id) FROM Acheteurs";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $id=$id+1;

        $sql2 = "SELECT Email FROM Acheteurs WHERE Email = '" .$Email. "'";
        $result2 = mysqli_query($db_handle, $sql2);
        $lors= mysqli_num_rows($result2); 

        if($lors === 0) {
            $sql1= "INSERT INTO Acheteurs (`Id`, `Nom`, `Prenom`, `Rue`, `Ville`, `CodePostal`, `Email`, `Mdp`, 
            `NomBancaire`, `NumeroBancaire`, `DateExpiration`, `CryptogrammeBancaire`)
            values ('$id', '$Nom', '$Prenom', '$Adresse'
            , '$Ville', '$Zip', '$Email', '$Mdp', '$NB', '$NC', '$AE-$ME-01', '$Cryptho')";

            $result1 = mysqli_query($db_handle, $sql1);
            if ( false===$result1 ) {
                printf("error: %s\n", mysqli_error($db_handle));
                setcookie("email","oui",time() + 365*24*3600, null, null, false,true);
                header('Location: creer_compte_utilisateur.php');
            }
            else {
                setcookie("email","non",time() + 365*24*3600, null, null, false,true);
                header('Location: page_accueil_html.php');
            }

        }else {
            setcookie("email","oui",time() + 365*24*3600, null, null, false,true);
            header('Location: creer_compte_utilisateur.php');
        }
    }//end if 
    //si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);
?>