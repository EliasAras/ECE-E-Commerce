<?php

    $camarche = 0;
    /////////////Pour la Photo 1
    //"Images/Photos/" = subdirectory for images in www directory
    $target_dir = "Images/Photos/";
    $target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
    $uploadOk = 1;
    //file extension in lower case
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Vérifier si le fichier image est une image réelle ou une image fausse
    if(isset($_POST["SingIn"])) {
        $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }
    // Vérifier la taille du fichier
    if ($_FILES["fileToUpload1"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
            echo "<br>" . "Le fichier ". basename( $_FILES["fileToUpload1"]["name"]). " a été
    téléchargé.";
            $camarche ++;
        } else {
            echo "<br>" . "Désolé, une erreur s'est produite lors de l'envoi de votre
    fichier."; }
    } 

    ///////////Pour le Fond d'écran
    //"Images/Photos/" = subdirectory for images in www directory
    $target_dir = "Images/FondEcrans/";
    $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
    $uploadOk = 1;
    //file extension in lower case
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Vérifier si le fichier image est une image réelle ou une image fausse
    if(isset($_POST["SingIn"])) {
        $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
        if($check !== false) {
            echo "Le fichier est une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }
    }
    // Vérifier la taille du fichier
    if ($_FILES["fileToUpload2"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
            echo "<br>" . "Le fichier ". basename( $_FILES["fileToUpload2"]["name"]). " a été
    téléchargé.";
        $camarche ++;
        } else {
            echo "<br>" . "Désolé, une erreur s'est produite lors de l'envoi de votre
    fichier.";     }
    } 
    
    echo "combien vaut :" .$camarche;

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '1234');

    //identifier le nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    $Pseudo= isset($_POST["Pseudo"])?$_POST["Pseudo"]:"";
    $Email= isset($_POST["Email"])?$_POST["Email"]:"";
    $Mdp= isset($_POST["Mdp"])?$_POST["Mdp"]:"";
    $Photo= basename( $_FILES["fileToUpload1"]["name"]);
    $FondEcran= basename( $_FILES["fileToUpload2"]["name"]);

    setcookie("email","non",time() + 365*24*3600, null, null, false,true);

    //si le BDD existe, faire le traitement
    if($db_found) {

        $sql = "SELECT MAX(Id) FROM Vendeurs";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $id=$id+1;

        $sql2 = "SELECT Email FROM Vendeurs WHERE Email = '" .$Email. "'";
        $result2 = mysqli_query($db_handle, $sql2);
        $lors= mysqli_num_rows($result2);

        if($lors === 0) {
            $sql1= "INSERT INTO Vendeurs (`Id`, `Pseudo`, `Email`, `Mdp`, `Photo`, `FondEcran`)
            values ('$id', '$Pseudo', '$Email', '$Mdp', '$Photo', '$FondEcran' )";
            echo "J'envoie la requete pour l'inscription";

            $result1 = mysqli_query($db_handle, $sql1);
            if ( false===$result1 ) {
                printf("error: %s\n", mysqli_error($db_handle));
                setcookie("email","oui",time() + 365*24*3600, null, null, false,true);
                header('Location: creer_compte_vendeur.php');
            }
            else {
                echo 'Vous avez bien été ajouté à notre base de donnée vendeur.<br/> <br/>';
                setcookie("email","non",time() + 365*24*3600, null, null, false,true);
                header('Location: vendre.php');
            }
        }else {
            echo "Cette adresse aexiste deja";
            setcookie("email","oui",time() + 365*24*3600, null, null, false,true);
            header('Location: creer_compte_vendeur.php');
        }
    }//end if 
    //si le BDD n'existe pas
    else {
        echo "Database not found";
    }//end else

    mysqli_close($db_handle);
?>