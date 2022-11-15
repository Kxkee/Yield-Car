<?php 
include './modele/covoitDb.php';
$action = $_GET['action'];
switch ($action) {
	case 'OngletPublier':
		include "./vue/offre.php";
	break;

    case 'AffichageTrajet':

    if (!empty($_POST['LieuDepart']) && !empty($_POST['LieuArrive']) && !empty($_POST['meeting-time'])) {
        $LieuD = $_POST['LieuDepart'];
        $LieuA = $_POST['LieuArrive'];
        $DateDepart = $_POST['meeting-time'];       

        $Liste = covoitDb::SearchBar($LieuD,$LieuA,$DateDepart);
        $count = covoitDb::CountBar($LieuD,$LieuA,$DateDepart);
        include "./vue/AffichageTrajet.php";
    }

	break; 

     case 'Trajets':
         $id = $_SESSION['ID'];
         $Liste = covoitDb::getTrajet($id);
        include"./vue/AffichageMesTrajets.php";
         break;

    case 'mesTrajets':
         $id = $_SESSION['ID'];
         $Liste = covoitDb::getListeTrajet($id);
        include"./vue/AffichageMesTrajets.php";
         break;

    case 'ReserverTrajet':

        $statut = "EnAttente";
        $id_trajet = $_GET['id'];
        $idUser = $_SESSION['ID'];

        $Liste = covoitDb::reservertrajet($statut,$idUser,$id_trajet);
        header("location: index.php");

    break;

	case'addProd':
        //header('Location: index.php');
            $message='Votre offre a bien été enregistré';
            $user = $_SESSION['ID'];
            $dateD = $_POST['meeting-time'];
            $lieuD = $_POST['fname'];
            $lieuA = $_POST['lname'];
            $nbPlace = $_POST['qte'];
            $vehicule = $_POST['vehicule'];
            $idUser = $_SESSION['ID'];
            $heuredep = $_POST['meeting-time1'];


            $addressFrom = $lieuD;
            $addressTo   = $lieuA;

            // Get distance in km
            $distance = covoitDb::getDistance($addressFrom, $addressTo, "K");
            $duree = covoitDb::gettraveltime($distance);
            $Distance = ($distance).'km';
            $trajet = covoitDb::ajoutTrajet(NULL, $dateD, $lieuD, $lieuA, $nbPlace, $idUser, $vehicule, $heuredep, $duree, $Distance); 
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
            include"./vue/accueil.php";

    break;

    case 'InfoTrajet':

         $id = $_SESSION['ID'];
         $ID = $_GET['id'];
         $Liste = covoitDb::getListeTrajet2($id);
         $Tab = covoitDb::getListeTab($ID);
        include "./vue/detailstrajet.php";
    break;

    case 'SupTrajet':
         $message='Votre trajet a bien été supprimé';
         $ID = $_GET['id'];
         $trajet = covoitDb::SupTrajet($ID);
         echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        include "./vue/accueil.php";
    break;

    case 'Accepter':
         $ID_trajet = $_GET['id'];
         $ID = $_GET['ID'];
         $trajet = covoitDb::Accepter($ID,$ID_trajet);
        include "./vue/accueil.php";
    break;

    case 'Refuser':
         $ID_trajet = $_GET['id'];
         $ID = $_GET['ID'];
         $trajet = covoitDb::Refuser($ID,$ID_trajet);
        include "./vue/accueil.php";
    break;
}
