<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '1234');

    

    //nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    //si le BDD existe
    if($db_found) {

        $sql = "SELECT * FROM Vetements";
        $result = mysqli_query($db_handle, $sql);
        while($data = mysqli_fetch_assoc($result)) {
            echo "Id: " .$data['Id']. '<br>';
            echo "Id vendeur: " .$data['IdVendeur']. '<br>';
            echo "Nom: " .$data['Nom']. '<br>';
            echo "Prix: " .$data['Prix']. '<br>';
            echo "Description: " .$data['Description']. '<br>';
            echo "Couleur: " .$data['Couleur']. '<br>';
            echo "Marque: " .$data['Marque']. '<br>';
            echo "Taille: " .$data['Taille']. '<br>';
            echo "Quantite vendues: " .$data['QuantiteVendue']. '<br>';
            echo "Quantite: " .$data['Quantite']. '<br>';
            echo "Image: " .$data['Image']. '<br>';
        }//end while

    }//end if 
    //si la BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);

?>