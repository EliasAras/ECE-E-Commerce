<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');


    //nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

//si le BDD existe
    if ($db_found) {

    $sql = "SELECT * FROM Acheteurs WHERE Id = ".$_COOKIE['id'];
    $result = mysqli_query($db_handle, $sql);

    $data = mysqli_fetch_assoc($result);

    if ($_COOKIE['id'] === $data['Id']){
        $nom = $data['Nom'];
        $prenom = $data['Prenom'];
        $rue = $data['Rue'];
        $ville = $data['Ville'];
        $codepostal = $data['CodePostal'];
        $email = $data['Email'];
        $mdp = $data['Mdp'];
        $nomBancaire = $data['NomBancaire'];
        $numeroBancaire = $data['NumeroBancaire'];
        $dateExpiration = $data['DateExpiration'];
        $cryptogrammeBancaire = $data['CryptogrammeBancaire'];

        $AnneeMoisExpiraiton = substr($dateExpiration, 0, 7);
    }
    else{
        echo "Error Database";
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Amazon</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="application/javascript" src="panier.js"></script>
    <script language="JavaScript">
    </script>

</head>

<body>
<?php include 'navigation_bar.php'; ?>

<br>
<h1 id="titreCentrer">Votre Compte</h1>

<div id="Centrer">
    <form id="signUpForm" action="changer_donnees_utilisateurs.php" method="post">
        <h4><u>Informations de connexion</u></h4>
        <div class="form-row">
            <div class="form-group col-md-16">
                <label for="inputNom">Nom</label>
                <input type="text" name="Nom" class="form-control" id="inputNom" value="<?php echo $nom; ?>" required>
                <span id="aideNom"></span>
            </div>
            <div class="form-group col-md-16">
                <label for="inputPrenom">Prenom</label>
                <input type="text" name="Prenom" class="form-control" id="inputPrenom" value="<?php echo $prenom; ?>"required>
                <span id="aidePrenom"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">Email</label>
                <input type="email" name="Email" class="form-control" id="inputEmail" value="<?php echo $email; ?>"
                       required>
                <span id="aideEmail">

            </span>

            </div>
            <div class="form-group col-md-16">
                <label for="inputPassword">Password</label>
                <input type="password" name="Mdp" class="form-control" id="inputPassword" value="<?php echo $mdp; ?>"
                       required>
                <span id="aideMotdepasse"></span>
            </div>
        </div>
        <h4><u>Adresse de Livraison</u></h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Adresse</label>
                <input type="text" name="Adresse" class="form-control" id="inputAddress" value="<?php echo $rue; ?>" required>
                <span id="aideAdress"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputVille">Ville</label>
                <input type="text" name="Ville" class="form-control" id="inputVille" value="<?php echo $ville; ?>" required>
                <span id="aideVille"></span>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Code Postal</label>
                <input type="value" name="Zip" class="form-control" id="inputZip" value="<?php echo $codepostal; ?>" required>
                <span id="aideZip"></span>
            </div>
        </div>
        <h4><u>Informations Bancaires</u></h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNum_Carte">Numéro de Carte</label>
                <input type="number" name="NumeroCarte" class="form-control" id="inputNum_Carte" value="<?php echo $numeroBancaire; ?>"required
                       pattern="[0-9]{16}">
                <span id="aideNumCarte"></span>
            </div>
            <div class="form-group col-md-2">
                <label for="inputNomBancaire">Titulaire de la Carte</label>
                <input type="text" name="NomBancaire" class="form-control" id="inputNomBancaire" value="<?php echo $nomBancaire; ?>" required>
                <span id="aideNomBancaire"></span>
            </div>
        </div>
        <div class="form-row">
            <label for="inputDateExpiration">Date d'expiration</label>
            <div class="form-group col-md-16">
                <input type="text" name="DateExpiration" class="form-control" id="inputDateExpiration" value="<?php echo $AnneeMoisExpiraiton; ?>" required>
                <span id="aideMoisExpiration"></span>
            </div>
            <label for="inputCryptho">Crypthogramme</label>
            <div class="form-group col-md-16">
                <input type="number" name="Crypthogramme" class="form-control" id="inputCryptho" min="000" max="999" value=" <?php echo $cryptogrammeBancaire; ?>"
                       required>
                <span id="aideCryptho"></span>
            </div>
        </div>
    <button type="submit" class="btn btn-outline-primary" value="submit" id="Modifier">Modifier</button>
    </form>
</div>

<br>
<br>


<footer class="page-footer">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <h6>Contact</h6>
        <p>
            37, quai de Grenelle, 75015 Paris, France <br>
            info@webDynamique.ece.fr <br>
            +33 01 02 03 04 05 <br>
            +33 01 03 02 05 04
        </p>
    </div>
    <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
</footer>

</body>
