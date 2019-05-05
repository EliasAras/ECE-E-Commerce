<?php

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');

    $database = "amazon";



    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    if(isset($_COOKIE['id']) && isset($_COOKIE['type'])){
        if($_COOKIE['type'] === "Acheteurs"){
            $idAcheteur = $_COOKIE['id'];

            $table = isset($_POST["table"])?$_POST["table"]:"";
            $id = isset($_POST["id"])?$_POST["id"]:"";
            $nom = isset($_POST["nom"])?$_POST["nom"]:"";
            $prix = isset($_POST["prix"])?$_POST["prix"]:"";
            $description = isset($_POST["description"])?$_POST["description"]:"";
            $image = isset($_POST["image"])?$_POST["image"]:"";

            if($db_found) {
                $sql = "SELECT * FROM Panier WHERE Id = " .$id;
                $result = mysqli_query($db_handle, $sql);
                $data = mysqli_fetch_assoc($result);

                if ($data['Id'] === $id){
                    $newQuantite = $data['Quantite'] + 1;
                    $sql2 = "UPDATE Panier SET Quantite = ".$newQuantite." WHERE Id = ".$data['Id'];
                    mysqli_query($db_handle, $sql2);

                    $sql = "SELECT * FROM ".$table." WHERE Id = " .$id;
                    $result = mysqli_query($db_handle, $sql);
                    $data = mysqli_fetch_assoc($result);
                }else{
                    $sql2 = "INSERT INTO Panier VALUES ('$id','$idAcheteur','$nom','$prix','$description','$image',1)";
                    mysqli_query($db_handle, $sql2);
                }

                header('Location: page_accueil_html.php');
            }
            else {
                echo "Database not found";
            }

            mysqli_close($db_handle);
        }
        else{
            header('Location: redirection_connection_utilisateur.php');
        }
    }else{
        header('Location: redirection_connection_utilisateur.php');
    }

?>