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
        <script type="application/javascript" src="panier.js"> </script>
        
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

        $sql = "SELECT * FROM Vetements";
        $result = mysqli_query($db_handle, $sql);?>
        
        <table border="0" id = "tab">
    <tbody>
        
            <?php
            while ($data = mysqli_fetch_assoc($result)) { ?>
        <form method="post" action="remplir_panier.php">
            
        <tr>
            <td class = "case"><?php echo '<img src="Images/Produits/' . $data["Image"] . '" width="200" height="200">'?></td>
            <td class = "case" ><div id="paul"><?php echo $data['Nom']; ?><input type="text" name="oka" value="<?php echo $data['Nom']; ?>" style="display:none"></div>
                
                <?php echo "Description : " .$data['Description']; ?><br>
            <?php echo "Couleur ";?>
            <select size="1" id = "couleur_vetement">
                <option value="" selected></option>
                <option value="rouge">Rouge</option>
                <option value="vert">Vert</option>
                <option value="bleu">Bleu</option>

            </select>
                
            <?php echo " - Taille "?>
            <select size="1" id = "taille_vetement">
                <option value="" selected></option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
            </select><br><?php echo "Marque : " .$data['Marque']; ?><br><?php echo "Prix   |   " .$data['Prix']. "€"; ?></td>
            <td class = "case"><br><br>
                    <button type="submit" class="btn btn-outline-primary" style = "margin-left : 10%">Ajouter au panier</button>
                    
                 <br>
                <?php echo "Quantite disponible : " .$data['Quantite']; ?></td>
            
        </tr>
            </form>
                <?php  }
            ?>
        
    </tbody>
</table>
        
        <?php
        $sql1 = "SELECT * FROM sportsetloisirs";
        $result1 = mysqli_query($db_handle, $sql1);?>
        
        <table border="1" id = "tab">
    <tbody>
            <?php
            while ($data1 = mysqli_fetch_assoc($result1)) { ?>
        <tr>
            <td><?php echo '<img src="Images/Produits/' . $data1["Image"] . '"width="200" height="200">'?></td>
            <td class = "case"><?php echo "Description: " .$data1['Description']; ?><br>
            <?php echo "Nom du produit: " .$data1['Nom']. " / "; ?>
            <?php echo "Prix: " .$data1['Prix']; ?><br>
            <?php echo "Couleur: " .$data1['Couleur']; ?><br>
            <?php echo "Marque: " .$data1['Marque']; ?></td>
            <td class = "case"><?php echo "Quantite vendues: " .$data1['QuantiteVendue']; ?></td>
            <td class = "case"><?php echo "Quantite: " .$data1['Quantite']; ?></td>
            <td class = "case"><button type="submit" class="btn btn-outline-primary" >Acheter</button></td>
        </tr>
                <?php  }
            ?>
    </tbody>
</table>
                
        <br>
        
        <?php
        $sql3 = "SELECT * FROM livres";
        $result3 = mysqli_query($db_handle, $sql3);?>
        
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
        $sql2 = "SELECT * FROM musiques";
        $result2 = mysqli_query($db_handle, $sql2);?>
        
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
