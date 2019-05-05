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

</head>

<body>
<?php include 'navigation_bar.php'; ?>


<h1 id="titreCentrer">Mon Panier</h1><br><br><br>
<?php

setcookie('error_CB', "rien", time() + 365 * 24 * 3600, null, null, false, true);

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
    $additionPrix = 0;

    $sql = "SELECT * FROM Panier WHERE IdAcheteur = " .$_COOKIE['id'];
    $result = mysqli_query($db_handle, $sql); ?>

    <table border="0" style="margin-left: 10%;">
        <tbody>
        <?php
        while ($data = mysqli_fetch_assoc($result)) {
            $additionPrix = $additionPrix + ($data['Prix'] * $data['Quantite']);
            ?>
            <form action="supprimer_element_panier.php" method="post">
                <input type="text" name="id" value="<?php echo $data['Id']; ?>" style="display:none">

                <tr style="border: 1px solid gray;">
                    <td class="case"><?php echo '<img src="Images/Produits/' . $data["Image"] . '"width="200" height="200">' ?>
                    <td class="case">
                        <div id="paul">&nbsp;<?php echo $data['Nom']; ?></div>

                        &nbsp;&nbsp;<?php echo "Description : " . $data['Description']; ?><br><br>

                        <button type="submit" class="btn btn-outline-secondary" style="margin-left : 10%">Supprimer
                        </button>
                    </td>
                    <td><br><b><?php echo "Quantité : " . $data['Quantite']; ?></b></td>
                    <td style="padding-right: 70px;"><br><a id="payement2"><?php echo "Prix : " . $data['Prix'] . "€"; ?></a></td>
                </tr>
            </form>

        <?php }
        ?>
        </tbody>
    </table>
<?php } else {
    echo "Database not found";
}//end else
mysqli_close($db_handle);
?>
<br><br>
<a class="btn btn-outline-primary" href="paiement.php" style="margin-left : 10%" role="button">Procéder au payement</a>
<a id="payement">Total : <?php
    echo $additionPrix . "€";

    ?></a>

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
