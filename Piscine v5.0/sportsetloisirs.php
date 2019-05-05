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
<h1 id="titreCentrer">Sports & Loisirs</h1>

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


    $sql1 = "SELECT * FROM sportsetloisirs";
    $result1 = mysqli_query($db_handle, $sql1); ?>

    <div class="container">
        <div class="row">
            <?php
            while ($data1 = mysqli_fetch_assoc($result1)) {
                ?>

                <div class="col-sm-4" style="padding-bottom: 10px; padding-top: 30px">
                    <div class="card">
                        <div class="card-block">
                            <img class="card-img-top" src="<?php echo "Images/Produits/" . $data1["Image"]; ?>"
                                 alt="Card image cap" width="300" height="300">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data1['Nom']; ?>
                                </h5>
                                <h5>
                                    <small class="text-muted">Description :</small>
                                </h5>
                                <?php echo $data1['Description'] . "<br> 

                                    ";
                                echo "<h5>
                                        <small class=\"text - muted\">Couleur :</small>
                                        <select size=\"1\" id=\"couleur_sportsetloisirs\">
                                            <option value=\"Rouge\" selected>Rouge</option>
                                            <option value=\"Vert\">Vert</option>
                                            <option value=\"Bleu\">Bleu</option>
                                        </select>
                                        </p></h5>
                                        <h5><small class=\"text-muted\">Marque : " . $data1['Marque'] . "</small>"; ?></p></h5>
                                <?php
                                if ($data1['Quantite'] > 0) {
                                    echo "<p class=\"card-text\" style=\"color: green\">En stock";
                                } else {
                                    echo "<p class=\"card-text\" style=\"color: red\">En rupture de stock";
                                } ?></p>
                                <span>
                            <a id="prix" style="float: left; text-align: left"><?php
                                echo "Prix : " . $data1['Prix'] . "€";
                                ?></a>
                                        <form method="post" action="remplir_panier.php">
                                            <input type="text" name="table" value="sportsetloisirs"
                                                   style="display:none">
                                            <input type="text" name="id" value="<?php echo $data1['Id']; ?>"
                                                   style="display:none">
                                            <input type="text" name="nom" value="<?php echo $data1['Nom']; ?>"
                                                   style="display:none">
                                            <input type="text" name="description"
                                                   value="<?php echo $data1['Description']; ?>"
                                                   style="display:none">
                                            <input type="text" name="prix" value="<?php echo $data1['Prix']; ?>"
                                                   style="display:none">
                                            <input type="text" name="image" value="<?php echo $data1['Image']; ?>"
                                                   style="display:none">
                            <button type="submit" class="btn btn-outline-primary"
                                    style="float: right; text-align: right">Ajouter au panier</button>
                                        </form>
                        </span>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    </form>


<?php } else {
    echo "Database not found";
}//end else
mysqli_close($db_handle);
?>

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
