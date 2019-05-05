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
<h1 id="titreCentrer">Ventes Flash</h1>

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

    $sql = "SELECT MAX(QuantiteVendue) FROM Vetements";
    $result = mysqli_query($db_handle, $sql);
    $row = mysqli_fetch_row($result);
    $id = $row[0];
    $sql = "SELECT * FROM Vetements WHERE QuantiteVendue = " . $id;
    $result = mysqli_query($db_handle, $sql);

    ?>

    <div class="container">
        <div class="row">
            <?php
            while ($data = mysqli_fetch_assoc($result)) {
                ?>

                <div class="col-sm-4" style="padding-bottom: 10px; padding-top: 30px">
                    <div class="card">
                        <div class="card-block">
                            <img class="card-img-top" src="<?php echo "Images/Produits/" . $data["Image"]; ?>"
                                 alt="Card image cap" width="300" height="300">
                            <div class="card-body">
                                <h5>
                                    <small class="text-muted">Description :</small>
                                </h5>
                                <?php echo $data['Description'] . "<br> 
                             <h5><small class=\"text-muted\">Couleur : </small>"; ?>
                                <select size="1" id="couleur_vetement">
                                    <option value="rouge" selected>Rouge</option>
                                    <option value="vert">Vert</option>
                                    <option value="bleu">Bleu</option>
                                </select></h5>

                                <?php echo "<h5>
                                        <small class=\"text-muted\">Taille :</small>"; ?>
                                <select size="1" id="taille_vetement">
                                    <option value="S" selected>S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select>
                                </p></h5>
                                <?php
                                if ($data['Quantite'] > 0) {
                                    echo "<p class=\"card-text\" style=\"color: green\">En stock";
                                } else {
                                    echo "<p class=\"card-text\" style=\"color: red\">En rupture de stock";
                                } ?></p>
                                <span>
                            <a id="prix" style="float: left; text-align: left"><?php
                                echo "Prix : " . $data['Prix'] . "€";
                                ?></a>
                                        <form method="post" action="remplir_panier.php">
                                                <input type="text" name="table" value="Vetements" style="display:none">
                                                <input type="text" name="id" value="<?php echo $data['Id']; ?>"
                                                       style="display:none">
                                                <input type="text" name="nom" value="<?php echo $data['Nom']; ?>"
                                                       style="display:none">
                                                <input type="text" name="description"
                                                       value="<?php echo $data['Description']; ?>"
                                                       style="display:none">
                                                <input type="text" name="prix" value="<?php echo $data['Prix']; ?>"
                                                       style="display:none">
                                                <input type="text" name="image" value="<?php echo $data['Image']; ?>"
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





            <?php
            $sql1 = "SELECT MAX(QuantiteVendue) FROM sportsetloisirs";
            $result1 = mysqli_query($db_handle, $sql1);
            $row = mysqli_fetch_row($result1);
            $id1 = $row[0];
            $sql1 = "SELECT * FROM sportsetloisirs WHERE QuantiteVendue = " . $id1;
            $result1 = mysqli_query($db_handle, $sql1);

            ?>

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



            <?php
            $sql3 = "SELECT MAX(QuantiteVendue) FROM livres";
            $result3 = mysqli_query($db_handle, $sql3);
            $row = mysqli_fetch_row($result3);
            $id3 = $row[0];
            $sql3 = "SELECT * FROM livres WHERE QuantiteVendue = " . $id3;
            $result3 = mysqli_query($db_handle, $sql3);
            ?>

            <?php
            while ($data3 = mysqli_fetch_assoc($result3)) {
                ?>

                <div class="col-sm-4" style="padding-bottom: 10px; padding-top: 30px">
                    <div class="card">
                        <div class="card-block">
                            <img class="card-img-top" src="<?php echo "Images/Produits/" . $data3["Image"]; ?>"
                                 alt="Card image cap" width="300" height="300">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data3['Nom']; ?>
                                    <small class="text-muted"><?php echo " - " . $data3['Auteur'] . " | " . $data3['Editeur']; ?></small>
                                </h5>
                                <h5>
                                    <small class="text-muted">Description :</small>
                                </h5>
                                <?php echo "" . $data3['Description'] . "<br> 
                             <h5><small class=\"text-muted\">Nombre de pages : " . $data3['NombrePage'] . "</small>"; ?></p></h5>
                                <?php
                                if ($data3['Quantite'] > 0) {
                                    echo "<p class=\"card-text\" style=\"color: green\">En stock";
                                } else {
                                    echo "<p class=\"card-text\" style=\"color: red\">En rupture de stock";
                                } ?></p>
                                <span>
                            <a id="prix" style="float: left; text-align: left"><?php
                                echo "Prix : " . $data3['Prix'] . "€";
                                ?></a>
                                        <form method="post" action="remplir_panier.php">
                                            <input type="text" name="table" value="Livres" style="display:none">
                                            <input type="text" name="id" value="<?php echo $data3['Id']; ?>"
                                                   style="display:none">
                                            <input type="text" name="nom" value="<?php echo $data3['Nom']; ?>"
                                                   style="display:none">
                                            <input type="text" name="description"
                                                   value="<?php echo $data3['Description']; ?>"
                                                   style="display:none">
                                            <input type="text" name="prix" value="<?php echo $data3['Prix']; ?>"
                                                   style="display:none">
                                            <input type="text" name="image" value="<?php echo $data3['Image']; ?>"
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





            <?php
            $sql2 = "SELECT MAX(QuantiteVendue) FROM Musiques";
            $result2 = mysqli_query($db_handle, $sql2);
            $row = mysqli_fetch_row($result2);
            $id2 = $row[0];
            $sql2 = "SELECT * FROM Musiques WHERE QuantiteVendue = " . $id2;
            $result2 = mysqli_query($db_handle, $sql2);
            ?>

            <?php
            while ($data2 = mysqli_fetch_assoc($result2)) {
                ?>


                <div class="col-sm-4" style="padding-bottom: 10px; padding-top: 30px">
                    <div class="card">
                        <div class="card-block">
                            <img class="card-img-top" src="<?php echo "Images/Produits/" . $data2["Image"]; ?>"
                                 alt="Card image cap" width="300" height="300">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data2['Nom']; ?>
                                    <small class="text-muted"><?php echo " - " . $data2['Artiste'] . " | " . $data2['Album']; ?></small>
                                </h5>
                                <h5>
                                    <small class="text-muted">Description :</small>
                                </h5>
                                <?php echo "" . $data2['Description'] . "<br> 
                             <h5><small class=\"text-muted\">Genre musical : " . $data2['Style'] . "</small></h5>
                                    <h5>
                                        <small class=\"text-muted\">Durée : " . $data2['Duree'] . " secondes</small></p></h5>"; ?>
                                <?php
                                if ($data2['Quantite'] > 0) {
                                    echo "<p class=\"card-text\" style=\"color: green\">En stock";
                                } else {
                                    echo "<p class=\"card-text\" style=\"color: red\">En rupture de stock";
                                } ?></p>
                                <span>
                            <a id="prix" style="float: left; text-align: left"><?php
                                echo "Prix : " . $data2['Prix'] . "€";
                                ?></a>
                                       <form method="post" action="remplir_panier.php">
                                        <input type="text" name="table" value="Musiques" style="display:none">
                                        <input type="text" name="id" value="<?php echo $data2['Id']; ?>"
                                               style="display:none">
                                        <input type="text" name="nom" value="<?php echo $data2['Nom']; ?>"
                                               style="display:none">
                                        <input type="text" name="description"
                                               value="<?php echo $data2['Description']; ?>"
                                               style="display:none">
                                        <input type="text" name="prix" value="<?php echo $data2['Prix']; ?>"
                                               style="display:none">
                                        <input type="text" name="image" value="<?php echo $data2['Image']; ?>"
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
