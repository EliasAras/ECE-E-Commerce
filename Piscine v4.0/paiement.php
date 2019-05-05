<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Amazon</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" id="bootstrap-css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script language="JavaScript">

        function Affichage_Error_CB() {

            var message = "<?php echo $_COOKIE['error_CB']; ?>";

            if (message == "Payement bien effectué") {
                document.getElementById("error_CB").className = "alert alert-success";
                document.getElementById("error_CB").style.display = "";
            }
            else if(message == "rien") {
                document.getElementById("error_CB").style.display = "none";
            }
            else{
                document.getElementById("error_CB").className = "alert alert-warning";
                document.getElementById("error_CB").style.display = "";
            }
        }
    </script>

</head>

<body onload="Affichage_Error_CB()">
<?php include 'navigation_bar.php';?>


<div class="container" style="margin-left:30%">
    <br>
    <form action="traitement_paiment.php" method="post">
    <div class="row">
        <aside class="col-sm-6">

            <article class="card">
                <div class="card-body p-5">

                    <ul class="nav bg-light nav-pills rounded nav-fill mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill">
                                <i class="fa fa-credit-card"></i> Credit Card</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-tab-card">
                            <p class="alert alert-warning" id="error_CB"> <?php echo $_COOKIE['error_CB'] ?> </p>
                            <form role="form">
                                <div class="form-group">
                                    <label for="NomBancaire">Full name (on the card)</label>
                                    <input type="text" class="form-control" name="NomBancaire" required>
                                </div> <!-- form-group.// -->

                                <div class="form-group">
                                    <label for="NumBancaire">Card number</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="NumBancaire" pattern="{0-9}[16]" required>
                                        <div class="input-group-append">
				<span class="input-group-text text-muted">
					<i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>  
					<i class="fab fa-cc-mastercard"></i>
				</span>
                                        </div>
                                    </div>
                                </div> <!-- form-group.// -->

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Expiration</span> </label>
                                            <div class="input-group">
                                                <select name="Mois" id="inputMoisExpiration" class="form-control" required>
                                                    <option selected>MM</option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                    <option>05</option>
                                                    <option>06</option>
                                                    <option>07</option>
                                                    <option>08</option>
                                                    <option>09</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                </select>
                                                <select name="Annee" id="inputAnneeExpiration" class="form-control" required>
                                                    <option selected>YY</option>
                                                    <option>2020</option>
                                                    <option>2021</option>
                                                    <option>2022</option>
                                                    <option>2023</option>
                                                    <option>2024</option>
                                                    <option>2025</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label data-toggle="tooltip" title="" for="Cryptogramme" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                            <input type="number" class="form-control" name="Cryptogramme" min="0" max="999" required>
                                        </div> <!-- form-group.// -->
                                    </div>
                                </div> <!-- row.// -->
                                <button class="subscribe btn btn-primary btn-block" type="submit"> Payer  </button>
                            </form>
                        </div> <!-- tab-pane.// -->
                    </div> <!-- tab-content .// -->

                </div> <!-- card-body.// -->
            </article> <!-- card.// -->


        </aside> <!-- col.// -->
    </div> <!-- row.// -->
    </form>

</div>
<!--container end.//-->

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