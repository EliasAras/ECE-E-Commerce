<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');

    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    if(isset($_COOKIE['id'])){

        $idAcheteur = $_COOKIE['id'];

        $id = isset($_POST["id"])?$_POST["id"]:"";

        if($db_found) {
            $sql = "DELETE FROM Panier WHERE Id = " .$id;
            $result = mysqli_query($db_handle, $sql);
            $data = mysqli_fetch_assoc($result);

            header('Location: panier.php');
        }
        else {
            echo "Database not found";
        }

        mysqli_close($db_handle);
    }
?>