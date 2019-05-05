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


    <div id="Centrer">
        <h3 class="titre">Créer votre compte</h3>
    <form id="signUpForm" action="Ajout_Vendeur.php" method="post" enctype="multipart/form-data">
        <h4><u>Informations de connexion</u></h4>
        <p class="infoNecessaire">* information nécessaire</p>
        <div class="form-row">
            <div class="form-group col-md-16">
                <label for="inputPseudo">Pseudo*</label>        
                <input type="text" name="Pseudo" class="form-control" id="inputPseudo" required>
                <span id="aidePseudo"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="inputEmail">Email*</label>
            <input type="email" name ="Email"class="form-control" id="inputEmail" placeholder="azerty@domaine.com" required>
            <span id="aideEmail">
           
            </span>

            </div>
            <div class="form-group col-md-16">
            <label for="inputPassword">Mot de Passe*</label>
            <input type="password" name="Mdp" class="form-control" id="inputPassword" required>
            <span id="aideMotdepasse"></span>
            </div>
        </div>
        <h4><u>Image</u></h4> 
        <div class="form-row">
            <div class="col-md-2">
                <label class="custom-file-label" for="examplePhoto">Photo</label>
                <input type="file" name="fileToUpload1" class="custom-file-input" id="examplePhoto">
            </div>
            <div class="col-md-2" style="margin-left: 40px;">
                <label class="custom-file-label" for="exampleFondecran">Fond d'écran</label>
                <input type="file" name="fileToUpload2" class="custom-file-input" id="exampleFondecran">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary" value="submit" id="SignIn" name="SingIn" style="margin-top:40px">Sign in</button>
        </form>
    </div>
        
    
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

    <?php 
        if(isset($_COOKIE['email'])){
            $_SESSION['email']=$_COOKIE['email'];
            if($_SESSION['email']==="oui"){
                echo "<script>var message = document.getElementById(\"aideEmail\");
                message.textContent=\"Cette adresse mail a deja été utilisé\";
                message.style.color=\"orange\"</script>";
            }
        }
    ?>
    </body>
</html>