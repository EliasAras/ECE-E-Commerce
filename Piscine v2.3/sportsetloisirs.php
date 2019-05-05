<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf-8">
        <title>Amazon</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </head>
    
    <body>

    <?php include 'navigation_bar.php';?>
        
        <?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '1234');

    

    //nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    //si le BDD existe
    if($db_found) {
        
        
        $sql1 = "SELECT * FROM sportsetloisirs";
        $result1 = mysqli_query($db_handle, $sql1);?>
        
        <table border="1">
    <tbody>
            <?php
            while ($data1 = mysqli_fetch_assoc($result1)) { ?>
        <tr>
            <td><?php echo "Nom du produit: " .$data1['Nom']; ?></td>
            <td><?php echo "Prix: " .$data1['Prix']; ?></td>
            <td><?php echo "Description: " .$data1['Description']; ?></td>
            <td><?php echo "Couleur: " .$data1['Couleur']; ?></td>
            <td><?php echo "Marque: " .$data1['Marque']; ?></td>
            <td><?php echo "Quantite vendues: " .$data1['QuantiteVendue']; ?></td>
            <td><?php echo "Quantite: " .$data1['Quantite']; ?></td>
            <td><?php echo '<img src="' . $data1["Image"] . '"width="100" height="100">'?></td>
        </tr>
                <?php  }
            ?>
    </tbody>
</table>

        
   <?php }else {
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
