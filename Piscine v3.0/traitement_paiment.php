<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');

//identifier le nom de base de données
$database = "amazon";

//connecter l'utilisateur dans BDD
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);

$NomBancaire= isset($_POST["NomBancaire"])?$_POST["NomBancaire"]:"";
$NumBancaire= isset($_POST["NumBancaire"])?$_POST["NumBancaire"]:"";
$Mois= isset($_POST["Mois"])?$_POST["Mois"]:"";
$Annee= isset($_POST["Annee"])?$_POST["Annee"]:"";
$Cryptogramme= isset($_POST["Cryptogramme"])?$_POST["Cryptogramme"]:"";

$verification=0;

if($Mois < 10){ $Mois = "0".$Mois;}

$TitreArticle= [];
$QuantiteArticle= [];
$PrixArticle= [];


//si le BDD existe, faire le traitement
if($db_found) {

    $sql2 = "SELECT * FROM Acheteurs WHERE Id='".$_COOKIE['id']."'";
    $result = mysqli_query($db_handle, $sql2);

    echo"Les coordonnees sont en cours de traitement <br>";

        while ($data = mysqli_fetch_assoc($result)){

            if($NomBancaire == $data['NomBancaire']) {
                echo "NomBancaire identique".$data['NomBancaire']."<br>";
                $verification=$verification+1;
            }

            if($NumBancaire == $data['NumeroBancaire']) {
                echo "NumeroBancaire identique <br>";
                $verification=$verification+1;
            }
            echo "Date identique".$data['DateExpiration']."<br>";
            echo "DateExpiration     identique" .$Annee."-".$Mois."-01 <br>";
            if($Annee."-".$Mois."-01" === $data['DateExpiration']) {
                echo "DateExpiratio identique <br>";
                $verification=$verification+1;
            }

            echo "Crypto identique".$data['CryptogrammeBancaire']."<br>";
            echo "Cryptoenter identique" .$Cryptogramme. "<br>";

            if($Cryptogramme == $data['CryptogrammeBancaire']) {
                echo "Cryptogramme identique <br>";
                $verification=$verification+1;
            }

            echo "verification : ".$verification;

            if($verification == 4) {
                echo"Les coordonnees sont bonnes <br> <br>";
                echo"PAYEMENT ACCEPTE <br> <br>";

                $sql3 = "SELECT Id, Quantite FROM Panier WHERE IdAcheteur =" .$data['Id'];
                $result3 = mysqli_query($db_handle, $sql3);

                while ($data3 = mysqli_fetch_assoc($result3)) {

                    echo "Id : " .$data3['Id']. "<br>";

                    if($data3['Id'] > 40000000 && $data3['Id'] < 41000000) {

                        $sqlRequeteVetements="SELECT * FROM Vetements WHERE Id=".$data3['Id'];
                        $resultRequeteVetements = mysqli_query($db_handle, $sqlRequeteVetements);

                        while ($dataRequeteVetements = mysqli_fetch_assoc($resultRequeteVetements)) {

                            $TitreArticle[] = $dataRequeteVetements['Nom']. " de " .$dataRequeteVetements['Marque'];
                            $QuantiteArticle[] = $data3['Quantite'];
                            $PrixArticle[] = $dataRequeteVetements['Prix'];


                            //////Avec valeur quantite modifie
                            $Quantite= $dataRequeteVetements['Quantite']-$data3['Quantite'];
                            $QuantiteVendue = $dataRequeteVetements['QuantiteVendue']+$data3['Quantite'];
                        }

                        $sql_Vetements="UPDATE Vetements SET Quantite = ".$Quantite.", QuantiteVendue =".$QuantiteVendue." WHERE Id =".$data3['Id'];
                        $resultChangement_Vetements = mysqli_query($db_handle, $sql_Vetements);
                    }

                    if($data3['Id'] > 41000000 && $data3['Id'] < 42000000) {

                        $sqlRequeteSportsEtLoisirs="SELECT * FROM SportsEtLoisirs WHERE Id=".$data3['Id'];
                        $resultRequeteSportsEtLoisirs = mysqli_query($db_handle, $sqlRequeteSportsEtLoisirs);

                        while ($dataRequeteSportsEtLoisirs = mysqli_fetch_assoc($resultRequeteSportsEtLoisirs)) {

                            $TitreArticle[] = $dataRequeteSportsEtLoisirs['Nom']. " de " .$dataRequeteSportsEtLoisirs['NomSport'];
                            $QuantiteArticle[] = $data3['Quantite'];
                            $PrixArticle[] = $dataRequeteSportsEtLoisirs['Prix'];


                            //////Avec valeur quantite modifie
                            $Quantite= $dataRequeteSportsEtLoisirs['Quantite']-$data3['Quantite'];
                            $QuantiteVendue = $dataRequeteSportsEtLoisirs['QuantiteVendue']+$data3['Quantite'];
                        }

                        $sql_SportsEtLoisirs="UPDATE SportsEtLoisirs SET Quantite = ".$Quantite.", QuantiteVendue =".$QuantiteVendue." WHERE Id =".$data3['Id'];
                        $resultChangement_SportsEtLoisirs = mysqli_query($db_handle, $sql_SportsEtLoisirs);

                    }

                    if($data3['Id'] > 42000000 && $data3['Id'] < 43000000) {

                        $sqlRequeteMusique="SELECT * FROM Musiques WHERE Id=".$data3['Id'];
                        $resultRequete_Musique = mysqli_query($db_handle, $sqlRequeteMusique);

                        while ($dataRequeteMusique = mysqli_fetch_assoc($resultRequete_Musique)) {

                            $TitreArticle[] = $dataRequeteMusique['Nom']. " de " .$dataRequeteMusique['Artiste'];
                            $QuantiteArticle[] = $data3['Quantite'];
                            $PrixArticle[] = $dataRequeteMusique['Prix'];

                            //////Avec valeur quantite modifie
                            $Quantite= $dataRequeteMusique['Quantite']-$data3['Quantite'];
                            $QuantiteVendue = $dataRequeteMusique['QuantiteVendue']+$data3['Quantite'];
                        }

                        $sql_Musique="UPDATE Musiques SET Quantite = ".$Quantite.", QuantiteVendue =".$QuantiteVendue." WHERE Id =".$data3['Id'];
                        $resultChangement_Musique = mysqli_query($db_handle, $sql_Musique);
                    }

                    if($data3['Id'] > 43000000 && $data3['Id'] < 44000000) {

                        $sqlRequeteLivres="SELECT Nom, Prix, Quantite, QuantiteVendue FROM Livres WHERE Id=".$data3['Id'];
                        $resultRequeteLivres = mysqli_query($db_handle, $sqlRequeteLivres);

                        while ($dataRequeteLivres = mysqli_fetch_assoc($resultRequeteLivres)) {

                            $TitreArticle[] = $dataRequeteLivres['Nom']. " de " .$dataRequeteLivres['Auteur'];
                            $QuantiteArticle[] = $data3['Quantite'];
                            $PrixArticle[] = $dataRequeteLivres['Prix'];

                            //////Avec valeur quantite modifie
                            $Quantite= $dataRequeteLivres['Quantite']-$data3['Quantite'];
                            $QuantiteVendue = $dataRequeteLivres['QuantiteVendue']+$data3['Quantite'];
                        }

                        $sql_Livres="UPDATE Livres SET Quantite = ".$Quantite.", QuantiteVendue =".$QuantiteVendue." WHERE Id =".$data3['Id'];
                        $resultChangement_Livres = mysqli_query($db_handle, $sql_Livres);
                    }

                    echo "Supprimons le panier <br>";
                    $sql_Supp="DELETE FROM Panier WHERE IdAcheteur =30000001";
                    //$sql_Supp="DELETE FROM Panier WHERE IdAcheteur ="$_COOKIE['id'];
                    $result_Supp = mysqli_query($db_handle, $sql_Supp);
                    setcookie('error_CB', "Payement bien effectué", time() + 365*24*3600, null, null, false, true);

                    $messageArticles = "";
                    echo "Taille PrixArticle : " .count($PrixArticle). "<br>";


                }

                for ($nb = 0; $nb < count($PrixArticle); $nb++) {
                    $messageArticles .= "<p> - <u>" .$TitreArticle[$nb]. "</u> au nombre de " .$QuantiteArticle[$nb]. " au prix a l'unite de " .$PrixArticle[$nb]. " euros. <br></p>";
                }

                echo "Avant l'envoie du mail";

                $to_email = $data['Email'];
                $subject = 'Confirmation commande Souk';
                $message = "<html><head></head>
                                <body>
                                    <h1 style=\"font-size:300%; text-align: center; font-family:Times New Roman; font-weight: bold; border: 3px solid black; padding: 20px;\">
                                    Commande Souk</h1>
                                    <div style=\"padding-left:30px\">
                                        <h3>Bonjour Madame, Monsieur, " .$data['Nom']. "</h3>
                                        <p>Nous vous informons que votre commande a bien ete prise en compte.</p>
                                        <p>Elle comporte : </p>" .$messageArticles.

                    "<h4>Le total est de  euros</h4>
                                        <p>Merci de votre confiance en esperant vous revoir tres vite.</p>
                                    </div>
                                </body></html>";

                $headers = "From: pex@company.com\n";
                $headers .= "MIME-version: 1.0\n";
                $headers .= "Content-type: text/html; charset= iso-8859-1\n";

                mail($to_email,$subject,$message,$headers);


                header('Location: paiement.php');

            }else {
                echo "Les coordonnees sont eronnées";
                setcookie('error_CB', "Les coordoonées saisies sont incorrectes", time() + 365*24*3600, null, null, false, true);
                header('Location: paiement.php');
            }


        }
}//end if
//si le BDD n'existe pas
else {
    echo "Database not found";
}//end else

mysqli_close($db_handle);
?>