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

<?php include 'navigation_bar.php'; ?>


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
    $sql = "SELECT * FROM vendeurs WHERE Id= " . $_COOKIE['id'];
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);

    ?>


    <div class="row" style="background-image:url(Images/FondEcrans/<?php echo $data['FondEcran']; ?> ); padding-bottom: 5%"
         style="float:right">
        <div class="card" style="width: 14rem; margin-left: 5%; margin-top: 30px; height: 10%; border:3px;">
            <img class="card-img-top"
                <?php echo " src=\"Images/Photos/" . $data['Photo'] . "\" " ?> width="100" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data['Pseudo'] . " | " . $data['Email']; ?></h5>
            </div>
        </div>

        <br>
        <div class="card" style="margin-left: 15%; margin-top: 30px; float:right">

            <h5 style="margin: 20px">Liste des produits en vente sur le site</h5>
            <?php
            $sql = "SELECT Id, Nom, Image FROM vetements WHERE IdVendeur= " . $_COOKIE['id'] . " UNION SELECT Id, Nom, Image FROM livres WHERE  IdVendeur= " . $_COOKIE['id'] . " UNION SELECT Id, Nom, Image FROM musiques WHERE  IdVendeur= " . $_COOKIE['id'] . " UNION SELECT Id, Nom, Image FROM sportsetloisirs WHERE  IdVendeur= " . $_COOKIE['id'];
            $result = mysqli_query($db_handle, $sql); ?>

            <table border="0" style="margin-left: 10%">
                <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($result)) { ?>
                    <tr style="padding-top: 100px">
                        <td><?php echo '<img src="Images/Produits/' . $data["Image"] . '"width="100" height="100">' ?></td>
                        <td style="font-weight: bold;">&nbsp;&nbsp;<?php echo $data['Nom']; ?>
                            <h5>
                                <small>&nbsp;&nbsp;<?php echo $data['Id']. "<br></small>
                            </h5>
                            <form action=\"delete_produit_vendeur.php\" method=\"post\">
                                <input type=\"text\" name=\"Id\" value=\"". $data['Id']."\"style=\"display:none\">
                                <input type=\"submit\" style='margin-left:25% ' value=\"Supprimer\" class=\"btn btn-outline-danger\">
                            </form>"; ?>
                        </td>
                    </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>

        <a class="btn btn-primary" href="creer_produit.php" role="button"
           style="width: 12rem; height: 40px; margin-top:30px; margin-left: 15%">Ajouter un Produit</a>
        <br><br>
    </div>



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
