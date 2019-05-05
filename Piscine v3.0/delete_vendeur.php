<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');

    //identifier le nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    $P= isset($_POST["IdVendeur"])?$_POST["IdVendeur"]:"";

	if($P == "")
	{
		echo "Le champ Id vendeur est vide </br>";
	}

    //si le BDD existe, faire le traitement
    if($db_found) {
        
        $sql = "DELETE FROM vendeurs WHERE Id = " .$P;
        $result = mysqli_query($db_handle, $sql);
        header('Location: gestion_vendeur.php');
    }//end if 
    //si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);

?>