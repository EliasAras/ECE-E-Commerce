<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Amazon</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function hid_text(span) {

            span = span+'1';

            var spanreste = document.getElementById(span);


            document.getElementById("form_musique1").style.display ="none";
            document.getElementById("form_sport1").style.display ="none";
            document.getElementById("form_liv1").style.display ="none";
            document.getElementById("form_vetement1").style.display ="none";


            spanreste.style.display ="";
        }
    </script>


</head>



<body>

<?php include 'navigation_bar.php';?>

<br>

<h4 id="titreCentrer">Rentrez un produit</h4>

<div id="Centrer">
        <h5><u>Informations du produit</u></h5>
        <p class="infoNecessaire">* information nécessaire</p>

        <div class="form-group col-md-16">
            <label class="btn btn-outline-primary">
                <input type="radio" name="options" id="form_musique" autocomplete="off" value="Musiques" onClick="hid_text(id)" checked> Musique
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="options" id="form_sport" autocomplete="off" value="SportsEtLoisirs" onClick="hid_text(id)"> Sport et Loisir
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="options" id="form_liv" autocomplete="off" value="Livres" onClick="hid_text(id)"> Livres
            </label>
            <label class="btn btn-outline-primary">
                <input type="radio" name="options" id="form_vetement" autocomplete="off" value="Vetements" onClick="hid_text(id)"> Vetements
            </label>
        </div>

        <div id="form_musique1">
            <form id="signUpForm" action="Ajout_Produit.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-16">
                        <label for="inputNomM">Titre*</label>
                        <input type="text" name="NomM" class="form-control" id="inputNomM" required>
                        <span id="aideNomM"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputArtisteM">Artiste*</label>
                        <input type="text" name="ArtisteM" class="form-control" id="inputArtisteM" required>
                        <span id="aideArtisteM"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputAlbumM">Album*</label>
                        <input type="text" name="AlbumM" class="form-control" id="inputAlbumM" required>
                        <span id="aideAlbumM"></span>
                    </div>
                    <div class="form-group col-md-1" style="display:none">
                        <label for="inputCategorie">Categorie*</label>
                        <input type="text" name="Categorie" class="form-control" id="inputCategorie" value="Musiques" readonly>
                        <span id="aideCategorie"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-16">
                        <label for="inputStyleM">Style*</label>
                        <input type="text" name="StyleM" class="form-control" id="inputStyleM" required>
                        <span id="aideStyleM"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDescriptionM">Description*</label>
                        <input type="text" name="DescriptionM" class="form-control" id="inputDescriptionM" required>
                        <span id="aideDescriptionM"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputDureeM">Durée (en secondes) *</label>
                        <input type="number" name="DureeM" class="form-control" id="inputDureeM" placeholder="180" required>
                        <span id="aideDureeM"></span>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="inputQuantiteM">Quantité*</label>
                        <input type="number" name="QuantiteM" class="form-control" id="inputQuantiteM" min="0" required>
                        <span id="aideQuantiteM"></span>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="inputPrixM">Prix*</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">€</span>
                            </div>
                            <input type="number" class="form-control" name="PrixM" id="inputPrixM" aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label class="custom-file-label" for="customFile">Photo</label>
                    <input type="file" name="fileToUpload_Musique" class="custom-file-input" id="examplePhoto">
                </div>
                <button type="submit" class="btn btn-outline-primary" value="submit" name="SignIn" id="SignIn" style="margin-top: 10px; margin-bottom: 10px" >Ajouter votre produit</button>

            </form>

        </div>

        <div id="form_sport1" style="display:none">
            <form id="signUpForm" action="Ajout_Produit.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-16">
                        <label for="inputNomSeL">Nom*</label>
                        <input type="text" name="NomSeL" class="form-control" id="inputNomSeL" required>
                        <span id="aideNomSeL"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputMarqueSeL">Marque*</label>
                        <input type="text" name="MarqueSeL" class="form-control" id="inputMarqueSeL" required>
                        <span id="aideMarqueSeL"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputCouleurSeL">Couleur*</label>
                        <input type="text" name="CouleurSeL" class="form-control" id="inputCouleurSeL" required>
                        <span id="aideCouleurSeL"></span>
                    </div>
                    <div class="form-group col-md-1" style="display:none">
                        <label for="inputCategorie">Categorie*</label>
                        <input type="text" name="Categorie" class="form-control" id="inputCategorie" value="SportsEtLoisirs" readonly>
                        <span id="aideCategorie"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-16">
                        <label for="inputNom_SportSeL">Nom Sport*</label>
                        <input type="text" name="Nom_SportSeL" class="form-control" id="inputNom_SportSeL" required>
                        <span id="aideNom_SportSeL"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDescriptionSeL">Description*</label>
                        <input type="text" name="DescriptionSeL" class="form-control" id="inputDescriptionSeL" required>
                        <span id="aideDescriptionSeL"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputQuantiteSeL">Quantité*</label>
                        <input type="number" name="QuantiteSeL" class="form-control" id="inputQuantiteSeL" min="0" required>
                        <span id="aideQuantiteSeL"></span>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="inputPrixSeL">Prix*</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">€</span>
                            </div>
                            <input type="number" class="form-control" name="PrixSeL" id="inputPrixSeL" aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label class="custom-file-label" for="customFile">Photo</label>
                    <input type="file" name="fileToUpload_SeL" class="custom-file-input" id="examplePhoto">
                </div>
                <button type="submit" class="btn btn-outline-primary" value="submit" name="SignIn" id="SignIn" style="margin-top: 10px; margin-bottom: 10px" >Ajouter votre produit</button>
            </form>
        </div>

        <div id="form_liv1" style="display:none">
            <form id="signUpForm" action="Ajout_Produit.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-16">
                        <label for="inputNomL">Titre*</label>
                        <input type="text" name="NomL" class="form-control" id="inputNomL" required>
                        <span id="aideNomL"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputAuteurL">Auteur*</label>
                        <input type="text" name="AuteurL" class="form-control" id="inputAuteurL" required>
                        <span id="aideAuteurL"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputEditeurL">Editeur*</label>
                        <input type="text" name="EditeurL" class="form-control" id="inputEditeurL" required>
                        <span id="aideEditeurL"></span>
                    </div>
                    <div class="form-group col-md-1" style="display:none">
                        <label for="inputCategorie">Categorie*</label>
                        <input type="text" name="Categorie" class="form-control" id="inputCategorie" value="Livres" readonly>
                        <span id="aideCategorie"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-16">
                        <label for="inputNb_PagesL">Nombre de pages*</label>
                        <input type="number" name="Nb_PagesL" class="form-control" id="inputNb_PagesL" required>
                        <span id="aideNb_PagesL"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputDescriptionL">Description*</label>
                        <input type="text" name="DescriptionL" class="form-control" id="inputDescriptionL" required>
                        <span id="aideDescriptionL"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputQuantiteL">Quantité*</label>
                        <input type="number" name="QuantiteL" class="form-control" id="inputQuantiteL" min="0" required>
                        <span id="aideQuantiteL"></span>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="inputPrixL">Prix*</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">€</span>
                            </div>
                            <input type="number" class="form-control" name="PrixLivre" id="inputPrixL" aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label class="custom-file-label" for="customFile">Photo</label>
                    <input type="file" name="fileToUpload_Livre" class="custom-file-input" id="examplePhoto">
                </div>
                <button type="submit" class="btn btn-outline-primary" value="submit" name="SignIn" id="SignIn" style="margin-top: 10px; margin-bottom: 10px" >Ajouter votre produit</button>
            </form>
        </div>

        <div id="form_vetement1" style="display:none">
            <form id="signUpForm" action="Ajout_Produit.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-16">
                        <label for="inputNomVet">Titre*</label>
                        <input type="text" name="NomVet" class="form-control" id="inputNomVet" required>
                        <span id="aideNomVet"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputMarqueVet">Marque*</label>
                        <input type="text" name="MarqueVet" class="form-control" id="inputMarqueVet" required>
                        <span id="aideMarqueVet"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputCouleurVet">Couleur*</label>
                        <input type="text" name="CouleurVet" class="form-control" id="inputCouleurVet" required>
                        <span id="aideCouleurVet"></span>
                    </div>
                    <div class="form-group col-md-16">
                        <label for="inputTailleVet">Taille*</label>
                        <input type="text" name="TailleVet" class="form-control" id="inputTailleVet" required>
                        <span id="aideTailleVet"></span>
                    </div>
                    <div class="form-group col-md-1" style="display:none">
                        <label for="inputCategorie">Categorie*</label>
                        <input type="text" name="Categorie" class="form-control" id="inputCategorie" value="Vetements" readonly>
                        <span id="aideCategorie"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="inputDescriptionVet">Description*</label>
                        <input type="text" name="DescriptionVet" class="form-control" id="inputDescriptionVet" required>
                        <span id="aideDescriptionVet"></span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="inputQuantiteVet">Quantité*</label>
                        <input type="number" name="QuantiteVet" class="form-control" id="inputQuantiteVet" min="0" required>
                        <span id="aideQuantiteVet"></span>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="inputPrixVet">Prix*</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">€</span>
                            </div>
                            <input type="number" class="form-control" name="PrixVet" id="inputPrixVet" aria-describedby="inputGroupPrepend2" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label class="custom-file-label" for="customFile">Photo</label>
                    <input type="file" name="fileToUpload_Vetement" class="custom-file-input" id="examplePhoto">
                </div>
                <button type="submit" class="btn btn-outline-primary" value="submit" name="SignIn" id="SignIn" style="margin-top: 10px; margin-bottom: 10px" >Ajouter votre produit</button>
            </form>
        </div>
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