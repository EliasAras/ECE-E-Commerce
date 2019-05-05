<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <META CONTENT="text/html; charset=utf-8"/>
    <title>Amazon</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>

<body>

<?php include 'navigation_bar.php'; ?>
<br>

<h5 id="titreCentrer" style="padding-left: 80px">Espace Administrateur</h5>


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
if ($db_found) { ?>
    <br>
    <a class="btn btn-info" href="creer_compte_vendeur.php" role="button" style="margin-left: 46%">Ajouter un vendeur</a>
    <br><br>
    <div class="row" style="margin-left: -50px">
        <div id="suppr_produit">
            <h5 style="text-align: center">Liste des produits en vente sur le site</h5><br>
            <div class="container">
                <div class="row">
                    <?php
                    $sql = "SELECT Id, Nom, Image FROM vetements UNION SELECT Id, Nom, Image FROM livres UNION SELECT Id, Nom, Image FROM musiques UNION SELECT Id, Nom, Image FROM sportsetloisirs";
                    $result = mysqli_query($db_handle, $sql);
                    while ($data = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-block">
                                    <?php echo '<img class="card-img-top" src="Images/Produits/' . $data["Image"] . '">'; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $data['Nom']; ?></h5>
                                        <h6><small class="text-muted"><?php echo "Id du produit : </small></h6>" . $data['Id'] . "<br><br>
                                            <form action=\"delete_produit.php\" method=\"post\">
                                            <input type=\"text\" name=\"Id\" value=\"". $data['Id']."\"style=\"display:none\">
                                            <input type=\"submit\" style='margin-left:10% ' value=\"Supprimer\" class=\"btn btn-outline-danger\">
                                            </form>"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>

        <div id="suppr_produit">
            <h5 style="text-align: center">Liste des vendeurs en activité sur le site</h5><br>
            <div class="container">
                <div class="row">
                    <?php
                    $sql1 = "SELECT * FROM vendeurs";
                    $result1 = mysqli_query($db_handle, $sql1);

                    while ($data = mysqli_fetch_assoc($result1)) { ?>
                        <div class="col-sm-5" style="margin-left: 35px">
                            <div class="card">
                                <div class="card-block">
                                    <?php echo '<img class="card-img-top" src="Images/Photos/' . $data["Photo"] . '">'; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $data['Pseudo']; ?></h5>
                                        <h6>
                                            <small class="text-muted"><?php echo "Id du vendeur : </small></h6>" . $data['Id'] . "<br><br>
                                            <form action=\"delete_vendeur.php\" method=\"post\">
                                            <input type=\"text\" name=\"IdVendeur\" value=\"". $data['Id']."\"style=\"display:none\">
                                            <input type=\"submit\" style='margin-left:20% ' value=\"Supprimer\" class=\"btn btn-outline-danger\">
                                            </form>"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>

<?php } else {
    echo "Database not found";
}//end else
mysqli_close($db_handle);
?>
<br><br>
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
