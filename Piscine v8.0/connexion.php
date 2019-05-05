<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Amazon</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body>

 <?php include 'navigation_bar.php';?>

 <br>

<h1 id="titreCentrer">Connection <?php echo $_COOKIE["creerCompte"];?></h1><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-6">
            <form action = "connexion_check.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="azerty@gmail.com" required>
                    <span id="emailHelp"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required>
                    <span id="mdpHelp"></span>
                </div>
                <button id="valider" type="submit" class="btn btn-outline-primary" >Vérifier</button>
                <?php

                if(isset($_COOKIE['creerCompte'])) {
                    if ($_COOKIE['creerCompte'] !== "Administrateur") {
                        echo "<a id=\"creerCompte\" href=";

                        if (isset($_COOKIE['creerCompte']))
                        {
                            if($_COOKIE['creerCompte'] === "Vendeur"){
                                echo "creer_compte_vendeur.php";
                            }
                            if($_COOKIE['creerCompte'] === "Acheteur"){
                                echo "creer_compte_utilisateur.php";
                            }
                        }
                        echo ">Créer un compte</a>";
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>


<br><br><br><br><br>


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
</html>