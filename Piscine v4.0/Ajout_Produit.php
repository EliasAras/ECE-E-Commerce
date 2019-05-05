<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');

//identifier le nom de base de données
$database = "amazon";

//connecter l'utilisateur dans BDD
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);

$id_vendeur = $_COOKIE['id'];

$type = isset($_POST["Categorie"])?$_POST["Categorie"]:"";

if($type === "Musiques") {

    /////////////Pour la Photo Musique
    //"Images/Photos/" = subdirectory for images in www directory
    $target_dir = "Images/Produits/";
    $target_file = $target_dir . basename($_FILES["fileToUpload_Musique"]["name"]);
    $uploadOk = 1;
    //file extension in lower case
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Vérifier si le fichier image est une image réelle ou une image fausse
    if(isset($_POST["SignIn"])) {
        $check = getimagesize($_FILES["fileToUpload_Musique"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }
    // Vérifier la taille du fichier
    if ($_FILES["fileToUpload_Musique"]["size"] > 500000) {
        echo "<br>" . "Désolé, votre fichier est trop volumineux."; $uploadOk = 0;
    }
    // Autoriser certains formats de fichier
    if (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg")
        || ($imageFileType == "gif")) {
        echo "<br>" . "Fichier autorisé. Format  = JPG | JPEG| PNG | GIF.";
        $uploadOk = 1;
    } else {
        echo "<br>" . "Désolé. Seuls fichiers en format JPG, JPEG, PNG, GIF sont autorisés.";
        $uploadOk = 0;
    }
    // Vérifiez si $uploadOk est défini comme 0 par une erreur
    if ($uploadOk == 0) {
        echo "<br>" . "Désolé, votre fichier n'a pas été téléchargé.";
        // si tout est correct, télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["fileToUpload_Musique"]["tmp_name"], $target_file)) {
            echo "<br>" . "Le fichier ". basename( $_FILES["fileToUpload_Musique"]["name"]). " a été
    téléchargé.";
        } else {
            echo "<br>" . "Désolé, une erreur s'est produite lors de l'envoi de votre
    fichier."; }
    }

    $NomM= isset($_POST["NomM"])?$_POST["NomM"]:"";
    $ArtisteM= isset($_POST["ArtisteM"])?$_POST["ArtisteM"]:"";
    $AlbumM= isset($_POST["AlbumM"])?$_POST["AlbumM"]:"";
    $StyleM= isset($_POST["StyleM"])?$_POST["StyleM"]:"";
    $DescriptionM= isset($_POST["DescriptionM"])?$_POST["DescriptionM"]:"";
    $DureeM= isset($_POST["DureeM"])?$_POST["DureeM"]:"";
    $QuantiteM= isset($_POST["QuantiteM"])?$_POST["QuantiteM"]:"";
    $PrixM= isset($_POST["PrixM"])?$_POST["PrixM"]:"";
    $PhotoM= basename( $_FILES["fileToUpload_Musique"]["name"]);

    //si le BDD existe, faire le traitement
    if($db_found) {

        $sql = "SELECT MAX(Id) FROM Musiques";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $id=$id+1;


        $sql1= "INSERT INTO Musiques (`Id`, `IdVendeur`, `Nom`, `Prix`, `Duree`, `Artiste`, `Album`, `Style`, 
        `Description`, `QuantiteVendue`, `Quantite`, `Image`)
        values ('$id', '$id_vendeur', '$NomM', '$PrixM', '$DureeM', '$ArtisteM', '$AlbumM', '$StyleM', '$DescriptionM',
        '0', '$QuantiteM', '$PhotoM')";

        $result1 = mysqli_query($db_handle, $sql1);
        if ( false===$result1 ) {
            printf("error: %s\n", mysqli_error($db_handle));
            //header('Location: creer_produit.php');
        }
        else {
            //header('Location:  creer_produit.php');
        }
    }//end if
//si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);

}

if($type === "SportsEtLoisirs") {

    /////////////Pour la Photo Sports et Loisirs
    //"Images/Photos/" = subdirectory for images in www directory
    $target_dir = "Images/Produits/";
    $target_file = $target_dir . basename($_FILES["fileToUpload_SeL"]["name"]);
    $uploadOk = 1;
    //file extension in lower case
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Vérifier si le fichier image est une image réelle ou une image fausse
    if(isset($_POST["SignIn"])) {
        $check = getimagesize($_FILES["fileToUpload_SeL"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }
    // Vérifier la taille du fichier
    if ($_FILES["fileToUpload_SeL"]["size"] > 500000) {
        echo "<br>" . "Désolé, votre fichier est trop volumineux."; $uploadOk = 0;
    }
    // Autoriser certains formats de fichier
    if (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg")
        || ($imageFileType == "gif")) {
        echo "<br>" . "Fichier autorisé. Format  = JPG | JPEG| PNG | GIF.";
        $uploadOk = 1;
    } else {
        echo "<br>" . "Désolé. Seuls fichiers en format JPG, JPEG, PNG, GIF sont autorisés.";
        $uploadOk = 0;
    }
    // Vérifiez si $uploadOk est défini comme 0 par une erreur
    if ($uploadOk == 0) {
        echo "<br>" . "Désolé, votre fichier n'a pas été téléchargé.";
        // si tout est correct, télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["fileToUpload_SeL"]["tmp_name"], $target_file)) {
            echo "<br>" . "Le fichier ". basename( $_FILES["fileToUpload_SeL"]["name"]). " a été
    téléchargé.";
        } else {
            echo "<br>" . "Désolé, une erreur s'est produite lors de l'envoi de votre
    fichier."; }
    }


    $NomSeL= isset($_POST["NomSeL"])?$_POST["NomSeL"]:"";
    $MarqueSeL= isset($_POST["MarqueSeL"])?$_POST["MarqueSeL"]:"";
    $CouleurSeL= isset($_POST["CouleurSeL"])?$_POST["CouleurSeL"]:"";
    $Nom_SportSeL= isset($_POST["Nom_SportSeL"])?$_POST["Nom_SportSeL"]:"";
    $DescriptionSeL= isset($_POST["DescriptionSeL"])?$_POST["DescriptionSeL"]:"";
    $QuantiteSeL= isset($_POST["QuantiteSeL"])?$_POST["QuantiteSeL"]:"";
    $PrixSeL= isset($_POST["PrixSeL"])?$_POST["PrixSeL"]:"";
    $PhotoSeL= basename( $_FILES["fileToUpload_SeL"]["name"]);

    //si le BDD existe, faire le traitement
    if($db_found) {

        $sql = "SELECT MAX(Id) FROM SportsEtLoisirs";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $id=$id+1;


        $sql1= "INSERT INTO SportsEtLoisirs (`Id`, `IdVendeur`, `NomSport`, `Nom`, `Prix`, `Description`, `Couleur`, `Marque`, 
        `QuantiteVendue`, `Quantite`, `Image`)
        values ('$id', '$id_vendeur', '$Nom_SportSeL', '$NomSeL', '$PrixSeL', '$DescriptionSeL', 'red', '$MarqueSeL', '0',
        $QuantiteSeL, '$PhotoSeL')";

        $result1 = mysqli_query($db_handle, $sql1);
        if ( false===$result1 ) {
            printf("error: %s\n", mysqli_error($db_handle));
            header('Location: creer_produit.php');
        }
        else {
            header('Location: creer_produit.php');
        }
    }//end if
//si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);

}

if($type === "Livres") {

    /////////////Pour la Photo Livres
    //"Images/Photos/" = subdirectory for images in www directory
    $target_dir = "Images/Produits/";
    $target_file = $target_dir . basename($_FILES["fileToUpload_Livre"]["name"]);
    $uploadOk = 1;
    //file extension in lower case
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Vérifier si le fichier image est une image réelle ou une image fausse
    if(isset($_POST["SignIn"])) {
        $check = getimagesize($_FILES["fileToUpload_Livre"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }
    // Vérifier la taille du fichier
    if ($_FILES["fileToUpload_Livre"]["size"] > 500000) {
        echo "<br>" . "Désolé, votre fichier est trop volumineux."; $uploadOk = 0;
    }
    // Autoriser certains formats de fichier
    if (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg")
        || ($imageFileType == "gif")) {
        echo "<br>" . "Fichier autorisé. Format  = JPG | JPEG| PNG | GIF.";
        $uploadOk = 1;
    } else {
        echo "<br>" . "Désolé. Seuls fichiers en format JPG, JPEG, PNG, GIF sont autorisés.";
        $uploadOk = 0;
    }
    // Vérifiez si $uploadOk est défini comme 0 par une erreur
    if ($uploadOk == 0) {
        echo "<br>" . "Désolé, votre fichier n'a pas été téléchargé.";
        // si tout est correct, télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["fileToUpload_Livre"]["tmp_name"], $target_file)) {
            echo "<br>" . "Le fichier ". basename( $_FILES["fileToUpload_Livre"]["name"]). " a été
    téléchargé.";
        } else {
            echo "<br>" . "Désolé, une erreur s'est produite lors de l'envoi de votre
    fichier."; }
    }

    $NomL= isset($_POST["NomL"])?$_POST["NomL"]:"";
    $AuteurL= isset($_POST["AuteurL"])?$_POST["AuteurL"]:"";
    $EditeurL= isset($_POST["EditeurL"])?$_POST["EditeurL"]:"";
    $Nb_PagesL= isset($_POST["Nb_PagesL"])?$_POST["Nb_PagesL"]:"";
    $DescriptionL= isset($_POST["DescriptionL"])?$_POST["DescriptionL"]:"";
    $QuantiteL= isset($_POST["QuantiteL"])?$_POST["QuantiteL"]:"";
    $PrixL= isset($_POST["PrixLivre"])?$_POST["PrixLivre"]:"";
    $PhotoL= basename( $_FILES["fileToUpload_Livre"]["name"]);

    //si le BDD existe, faire le traitement
    if($db_found) {

        $sql = "SELECT MAX(Id) FROM Livres";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $id=$id+1;


        $sql1= "INSERT INTO Livres (`Id`, `IdVendeur`, `Nom`, `Prix`, `Description`, `NombrePage`, `Auteur`, `Editeur`, `QuantiteVendue`, `Quantite`, `Image`)
        values ('$id', '$id_vendeur', '$NomL', '$PrixL', '$DescriptionL', '$Nb_PagesL', '$AuteurL', '$EditeurL', '0', '$QuantiteL', '$PhotoL')";

        $result1 = mysqli_query($db_handle, $sql1);
        if ( false===$result1 ) {
            printf("error: %s\n", mysqli_error($db_handle));
            header('Location: creer_produit.php');
        }
        else {
            header('Location: creer_produit.php');
        }
    }//end if
//si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);

}

if($type === "Vetements") {


    /////////////Pour la Photo Vetements
    //"Images/Photos/" = subdirectory for images in www directory
    $target_dir = "Images/Produits/";
    $target_file = $target_dir . basename($_FILES["fileToUpload_Vetement"]["name"]);
    $uploadOk = 1;
    //file extension in lower case
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Vérifier si le fichier image est une image réelle ou une image fausse
    if(isset($_POST["SignIn"])) {
        $check = getimagesize($_FILES["fileToUpload_Vetement"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }
    // Vérifier la taille du fichier
    if ($_FILES["fileToUpload_Vetement"]["size"] > 500000) {
        echo "<br>" . "Désolé, votre fichier est trop volumineux."; $uploadOk = 0;
    }
    // Autoriser certains formats de fichier
    if (($imageFileType == "jpg") || ($imageFileType == "png") || ($imageFileType == "jpeg")
        || ($imageFileType == "gif")) {
        echo "<br>" . "Fichier autorisé. Format  = JPG | JPEG| PNG | GIF.";
        $uploadOk = 1;
    } else {
        echo "<br>" . "Désolé. Seuls fichiers en format JPG, JPEG, PNG, GIF sont autorisés.";
        $uploadOk = 0;
    }
    // Vérifiez si $uploadOk est défini comme 0 par une erreur
    if ($uploadOk == 0) {
        echo "<br>" . "Désolé, votre fichier n'a pas été téléchargé.";
        // si tout est correct, télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["fileToUpload_Vetement"]["tmp_name"], $target_file)) {
            echo "<br>" . "Le fichier ". basename( $_FILES["fileToUpload_Vetement"]["name"]). " a été
    téléchargé.";
        } else {
            echo "<br>" . "Désolé, une erreur s'est produite lors de l'envoi de votre
    fichier."; }
    }



    $NomVet= isset($_POST["NomVet"])?$_POST["NomVet"]:"";
    $MarqueVet= isset($_POST["MarqueVet"])?$_POST["MarqueVet"]:"";
    $CouleurVet= isset($_POST["CouleurVet"])?$_POST["CouleurVet"]:"";
    $TailleVet= isset($_POST["TailleVet"])?$_POST["TailleVet"]:"";
    $DescriptionVet= isset($_POST["DescriptionVet"])?$_POST["DescriptionVet"]:"";
    $QuantiteVet= isset($_POST["QuantiteVet"])?$_POST["QuantiteVet"]:"";
    $PrixVet= isset($_POST["PrixVet"])?$_POST["PrixVet"]:"";
    $PhotoVet= basename( $_FILES["fileToUpload_Livre"]["name"]);

    //si le BDD existe, faire le traitement
    if($db_found) {

        $sql = "SELECT MAX(Id) FROM Vetements";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $id=$id+1;


        $sql1= "INSERT INTO Vetements (`Id`, `IdVendeur`, `Nom`, `Prix`, `Description`, `Couleur`, `Marque`, `Taille`, `QuantiteVendue`, `Quantite`, `Image`)
        values ('$id', '$id_vendeur', '$NomVet', '$PrixVet', '$DescriptionVet', '$CouleurVet', '$MarqueVet', '$TailleVet', '0', '$QuantiteVet', '$PhotoVet')";

        $result1 = mysqli_query($db_handle, $sql1);
        if ( false===$result1 ) {
            printf("error: %s\n", mysqli_error($db_handle));
            header('Location: creer_produit.php');
        }
        else {
            header('Location: creer_produit.php');
        }
    }//end if
//si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);


}

?>