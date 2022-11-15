<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" type="text/css" href="css/op.css">
        <title>Yield Car</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="images/icone.ico"  />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAPBvbTpCrMtDSIXPAaDigJtNKbVJ0UNEE"></script>
        <script src="https://kit.fontawesome.com/7a85fd3916.js" crossorigin="anonymous"></script>
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <!-- Font special for pages-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

        <!-- Vendor CSS-->
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
        <script src="vendor/jquery/jquery.min.js"></script>
        <!-- Vendor JS-->
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/datepicker/moment.min.js"></script>
        <script src="vendor/datepicker/daterangepicker.js"></script>
        

        <!-- Main JS-->
        <script src="js/global.js"></script>

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    </head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container px-6">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <img src="images/logo.png" style="width: 11%; height: 11%; "> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php?ctl=connect&action=RetourAccueil">Accueil</a></li>
                        <?php if (isset($_SESSION['connect'])) {?>
                        <li class="nav-item"><a class="nav-link" href="index.php?ctl=Trajet&action=mesTrajets">Mes offres</a></li>
                        <?php }else { ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?ctl=connect&action=connecter">Mes offres</a></li>
                        <?php }  ?>
                        <?php if (isset($_SESSION['connect'])) {?>
                            <li class="nav-item"><a class="nav-link" href="index.php?ctl=Trajet&action=OngletPublier">Publier votre offre</a></li>
                        <?php }else { ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?ctl=connect&action=connecter">Publier votre offre</a></li>
                        <?php }  ?>

                        <?php if (isset($_SESSION['connect'])) 
                        { 

                            echo "<li class=nav-item><a class=nav-link href=index.php?ctl=connect&action=deconnecter>Se déconnecter</a></li>";
                            
                        }
                        else
                        {
                            echo "<li class=nav-item><a class=nav-link href=index.php?ctl=connect&action=connecter>Se Connecter</a></li> ";
                        }

                        ?>
                    <?php if (isset($_SESSION['connect']))
                { ?>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php?ctl=Utilisateur&action=OngletProfil"><?php echo $_SESSION['Prenom']." ".$_SESSION['Nom']; ?></a></li> 
                    <!--<i class="fas fa-user" ></i>-->
                    <?php
                }

                 ?>
                       
                    </ul>
                </div>
            </div>
        </nav>