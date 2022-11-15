<?php 

session_start();

if (isset($_SESSION['Droit'])) {


if ($_SESSION['Droit']==1) {
				
				include "vue/enteteAdmin.php";
			}
			elseif ($_SESSION['Droit']==0) {
				include "vue/entete.php";
			}
}elseif(!isset($_SESSION['Droit'])){
	include "vue/entete.php";
}
if(!isset($_SESSION['connect']) && !isset($_GET['ctl'])){
	include "vue/accueil.php";
}
else if(isset($_SESSION['connect']) && !isset($_GET['ctl'])){
	include "vue/accueil.php";
}


if (isset($_GET['ctl'])) 
{
	switch($_GET['ctl'])
	{
		case 'connect':
			include "controleur/CtlConnexion.php";
			break;

		case 'Trajet':
			include "controleur/CtlTrajet.php";
			break;

		case 'Utilisateur':
			include "controleur/CtlUtilisateur.php";
			break;
	}
}
include "vue/piedpage.php";



?>
