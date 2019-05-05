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
<input type="button" onclick=display_tab() class="btn btn-outline-primary" value="tab" >
        
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

        $sql = "SELECT Image, Description, Prix FROM vetements WHERE Id = '54827892' UNION SELECT Image, Description, Prix FROM livres WHERE Id = '54827892' UNION SELECT Image, Description, Prix FROM musiques WHERE Id = '54827892' UNION SELECT Image, Description, Prix FROM sportsetloisirs WHERE Id = '54827892'";
        $result = mysqli_query($db_handle, $sql);?>
        
        <table border="0" id = "tab">
    <tbody>
            <?php
            while ($data = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td class = "case"><?php echo '<img src="' . $data["Image"] . '"width="200" height="200">'?>
            <?php echo "Description : " .$data['Description']; ?><br></td>
            <td><br><?php echo " Prix   |   " .$data['Prix']. "€"; ?></td>
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
        
        <a href="paiement.php">Payer</a>
            
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
