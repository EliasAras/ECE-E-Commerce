<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');

    //identifier le nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    $P= isset($_POST["Id"])?$_POST["Id"]:"";

	if($P == "")
	{
		echo "Le champ Id est vide </br>";
	}

    //si le BDD existe, faire le traitement
    if($db_found) {
        
        $sql1 = "DELETE FROM vetements WHERE Id = " .$P;
        $result1 = mysqli_query($db_handle, $sql1);
        
        $sql2 = "DELETE FROM livres WHERE Id = " .$P;
        $result2 = mysqli_query($db_handle, $sql2);
        
        $sql3 = "DELETE FROM musiques WHERE Id = " .$P;
        $result3 = mysqli_query($db_handle, $sql3);
        
        $sql4 = "DELETE FROM sportsetloisirs WHERE Id = " .$P;
        $result4 = mysqli_query($db_handle, $sql4);
        
        header('Location: gestion_vendeur.php');
    }//end if 
    //si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);

?>