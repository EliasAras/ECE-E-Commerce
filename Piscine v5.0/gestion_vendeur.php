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
    if($db_found) {?>
        <br>
               <div class="row">
                   <div id="suppr_produit">
                   <form action = "delete_produit.php" method = "post">
            <table>
                <tr>
                    <td>Id du produit à supprimer ? </td>
                </tr>
                <tr>
                    <td><input type="value" name='Id'></td>
                    <td><input type="submit" value = "Supprimer" class="btn btn-outline-primary"></td>
                </tr>
            </table>  
        </form>     
                       </table>      
            </form>
        <br>
        <h5>Liste des produits en vente sur le site</h5>
               <?php
        $sql = "SELECT Id, Nom, Image FROM vetements UNION SELECT Id, Nom, Image FROM livres UNION SELECT Id, Nom, Image FROM musiques UNION SELECT Id, Nom, Image FROM sportsetloisirs";
        $result = mysqli_query($db_handle, $sql);?>
        
        <table border="0">
    <tbody>
            <?php
            while ($data = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo '<img src="Images/Produits/' . $data["Image"] . '"width="100" height="100">'?></td>
            <td><?php echo "Id du produit: " .$data['Id']; ?><br>
            <?php echo $data['Nom']; ?></td>
            
        </tr>
                <?php  }
            ?>
    </tbody>
</table>
                   </div>
                   
                
               <div id="suppr_produit">
               <form action = "delete_vendeur.php" method = "post">
                <table>
                    <tr>
                        <td>Id du vendeur à supprimer ? </td>
                        <td><a href="creer_compte_vendeur.php">Ajouter un vendeur</a></td>
                    </tr>
                    <tr>
                        <td><input type="value" name='IdVendeur'></td>
                        <td><input type="submit" value = "Supprimer" class="btn btn-outline-primary"></td>
                        
                    </tr>
                </table>      
            </form>
                   
                   <br>
<h5>Liste des vendeurs en activité sur le site</h5>
               <?php
        $sql1 = "SELECT * FROM vendeurs";
        $result1 = mysqli_query($db_handle, $sql1);?>
        
        <table border="0">
    <tbody>
            <?php
            while ($data1 = mysqli_fetch_assoc($result1)) { ?>
        <tr>
            <td><?php echo '<img src="Images/Produits/' . $data1["Photo"] . '"width="100" height="100">'?></td>
            <td><?php echo "Id du vendeur: " .$data1['Id']; ?><br>
            <?php echo "Pseudo du vendeur: " .$data1['Pseudo']; ?></td>

        </tr>
                <?php  }
            ?>
    </tbody>
</table>
                   </div>
                   
        </div>
        
   <?php }else {
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