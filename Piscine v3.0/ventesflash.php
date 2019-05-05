<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf-8">
        <META CONTENT="text/html; charset=utf-8" />
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
    define('DB_PASS', 'root');

    

    //nom de base de données
    $database = "amazon";

    //connecter l'utilisateur dans BDD
    $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    $db_found = mysqli_select_db($db_handle, $database);

    //si le BDD existe
    if($db_found) {

        $sql = "SELECT * FROM Vetements ORDER BY QuantiteVendue DESC";
        $result = mysqli_query($db_handle, $sql);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        
        ?>
        
        <table border="1">
    <tbody>
            <?php
            while ($data = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo "Nom du vendeur: " .$data['Nom']; ?></td>
            <td><?php echo "Prix: " .$data['Prix']; ?></td>
            <td><?php echo "Description: " .$data['Description']; ?></td>
            <td><?php echo "Couleur: " .$data['Couleur']; ?></td>
            <td><?php echo "Marque: " .$data['Marque']; ?></td>
            <td><?php echo "Taille: " .$data['Taille']; ?></td>
            <td><?php echo "Quantite vendues: " .$data['QuantiteVendue']; ?></td>
            <td><?php echo "Quantite: " .$data['Quantite']; ?></td>
            <td><?php echo '<img src="Images/Produits/' . $data["Image"] . '"width="100" height="100">'?></td>
        </tr>
                <?php  }
            ?>
    </tbody>
</table>
        <br>
        
        <?php
        $sql1 = "SELECT * FROM sportsetloisirs ORDER BY QuantiteVendue DESC";
        $result1 = mysqli_query($db_handle, $sql1);
        $row1 = mysqli_fetch_row($result1);
        $id1 = $row1[0];
        ?>
        
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
            <td><?php echo '<img src="Images/Produits/' . $data1["Image"] . '"width="100" height="100">'?></td>
        </tr>
                <?php  }
            ?>
    </tbody>
</table>
                
        <br>
        
        <?php
        $sql3 = "SELECT * FROM livres ORDER BY QuantiteVendue DESC";
        $result3 = mysqli_query($db_handle, $sql3);
        $row3 = mysqli_fetch_row($result3);
        $id3 = $row3[0];
        ?>
        
        <table border="1">
    <tbody>
            <?php
            while ($data3 = mysqli_fetch_assoc($result3)) { ?>
        <tr>
            <td><?php echo "Titre: " .$data3['Nom']; ?></td>
            <td><?php echo "Prix: " .$data3['Prix']; ?></td>
            <td><?php echo "Description: " .$data3['Description']; ?></td>
            <td><?php echo "Nombre de pages: " .$data3['NombrePage']; ?></td>
            <td><?php echo "Auteur: " .$data3['Auteur']; ?></td>
            <td><?php echo "Editeur: " .$data3['Editeur']; ?></td>
            <td><?php echo "Quantite vendues: " .$data3['QuantiteVendue']; ?></td>
            <td><?php echo "Quantite: " .$data3['Quantite']; ?></td>
            <td><?php echo '<img src="Images/Produits/' . $data3["Image"] . '"width="100" height="100">'?></td>
        </tr>
                <?php  }
            ?>
    </tbody>
</table>
        
        <br>
        
        <?php
        $sql2 = "SELECT * FROM musiques ORDER BY QuantiteVendue DESC";
        $result2 = mysqli_query($db_handle, $sql2);
        $row2 = mysqli_fetch_row($result2);
        $id2 = $row2[0];
        ?>
        
        <table border="1">
    <tbody>
            <?php
            while ($data2 = mysqli_fetch_assoc($result2)) { ?>
        <tr>
            <td><?php echo "Titre du morceau: " .$data2['Nom']; ?></td>
            <td><?php echo "Prix: " .$data2['Prix']; ?></td>
            <td><?php echo "Durée: " .$data2['Duree']; ?></td>
            <td><?php echo "Artiste: " .$data2['Artiste']; ?></td>
            <td><?php echo "Album: " .$data2['Album']; ?></td>
            <td><?php echo "Genre musicale: " .$data2['Style']; ?></td>
            <td><?php echo "Description: " .$data2['Description']; ?></td>
            <td><?php echo "Quantite vendues: " .$data2['QuantiteVendue']; ?></td>
            <td><?php echo "Quantite: " .$data2['Quantite']; ?></td>
            <td><?php echo '<img src="Images/Produits/' . $data2["Image"] . '"width="100" height="100">'?></td>
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
