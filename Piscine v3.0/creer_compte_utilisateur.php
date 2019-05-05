<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Amazon</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script language="JavaScript">
            function Affichage_Error_Email(){

                var message = "<?php echo $_COOKIE['email']; ?>";

                if(message == "") {
                    document.getElementById("error_CB").className ="alert alert-success";
                }else{
                    document.getElementById("error_CB").className ="alert alert-warning";
                }
            }
        </script>
        
    </head>


    
    <body>
        <?php include 'navigation_bar.php';?>


    <div id="Centrer">
        <h3 class="titre">Créer votre compte</h3>
    <form id="signUpForm" action="Ajout_Utilisateur.php" method="post">
        <h4><u>Informations de connexion</u></h4>
        <p class="infoNecessaire">* information nécssaire</p>
        <p class="alert alert-warning" id="error_CB"> Salut</p>
        <div class="form-row">
            <div class="form-group col-md-16">
                <label for="inputNom">Nom*</label>        
                <input type="text" name="Nom" class="form-control" id="inputNom" placeholder="Nom" required>
                <span id="aideNom"></span>
            </div>
            <div class="form-group col-md-16">
                <label for="inputPrenom">Prenom*</label>        
                <input type="text" name="Prenom" class="form-control" id="inputPrenom" placeholder="Prenom" required>
                <span id="aidePrenom"></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
            <label for="inputEmail">Email*</label>
            <input type="email" name ="Email"class="form-control" id="inputEmail" placeholder="azerty@gmail.com" required>
            <span id="aideEmail">
           
            </span>

            </div>
            <div class="form-group col-md-16">
            <label for="inputPassword">Password*</label>
            <input type="password" name="Mdp" class="form-control" id="inputPassword" placeholder="Password" required>
            <span id="aideMotdepasse"></span>
            </div>
        </div>
        <h4><u>Adresse de Livraison</u></h4>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputAddress">Adresse*</label>
            <input type="text" name="Adresse" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
            <span id="aideAdress"></span>
            </div>
        </div>  
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputVille">Ville*</label>
            <input type="text" name="Ville" class="form-control" id="inputVille" placeholder="Baven" required>
            <span id="aideVille"></span>
            </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Code Postal*</label>
            <input type="value" name="Zip" class="form-control" id="inputZip" placeholder="33000" required>
            <span id="aideZip"></span>
            </div>
        </div>
        <h4><u>Informations Bancaires</u></h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputNum_Carte">Numéro de Carte*</label>
                <input type="number" name="NumeroCarte" class="form-control" id="inputNum_Carte" onblur="verifCB()" required>
                <span id="aideNumCarte"></span>
            </div>
            <div class="form-group col-md-2">
                <label for="inputNomBancaire">Titulaire de la Carte*</label>
                <input type="text" name="NomBancaire" class="form-control" id="inputNomBancaire" required>
                <span id="aideNomBancaire"></span>
            </div>
        </div>
        <div class="form-row">
                <label for="inputDateExpiration">Date d'expiration*</label>
            <div class="form-group col-md-16">
                
                <select name="MoisExpiration" id="inputMoisExpiration" class="form-control" required>
                        <option selected>Mois...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                </select>
                <span id="aideMoisExpiration"></span>
            </div>
            <div class="form-group col-md-16">
                <select name="AnneeExpiration" id="inputAnneeExpiration" class="form-control" required>
                        <option selected>Année...</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                </select>
                <span id="aideAnneeExpiration"></span>
            </div>
            <label for="inputCryptho">Crypthogramme*</label>
            <div class="form-group col-md-16">
                <input type="number" name ="Crypthogramme" class="form-control" id="inputCryptho" min="000" max="999" required>
                <span id="aideCryptho"></span>
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary" value="submit" id="SignIn">Sign in</button>
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
            //session_start();
            $_SESSION['email'] = $_COOKIE['email'];
           
            if($_SESSION['email']==="oui"){
                echo ("<script>
                var message = document.getElementById(\"aideEmail\");
                message.textContent=\"Cette adresse mail a deja été utilisé\";
                message.style.color=\"orange\";
                </script>");
            }
        }
    ?>

    </body>
</html>