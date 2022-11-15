<?php 
include './modele/covoitDb.php';
$action = $_GET['action'];
switch ($action) {

	case 'validConnect':
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$unUser = covoitDb::getLoginUser($login,$mdp);
		if(is_array($unUser))
		{
			$_SESSION['connect'] = true;
			$_SESSION['ID'] = $unUser['ID'];
			$_SESSION['Nom'] = $unUser['Nom'];
			$_SESSION['Prenom'] = $unUser['Prenom'];
			$_SESSION['Email'] = $unUser['Email'];
			$_SESSION['Vehicule'] = $unUser['Vehicule'];
			$_SESSION['Telephone'] = $unUser['Telephone'];
			$_SESSION['Genre'] = $unUser['Genre'];
			$_SESSION['Droit'] = $unUser['droit'];


			header('Location: ./index.php');


		}
		else
		{
			
			echo "log ou mdp inccorect";	
		}

	break;

	case 'deconnecter':
			session_destroy();
			header('Location: ./index.php');

	break;	

	case 'connecter':
				include "./vue/FormConnect.php";
	break;	

	case 'RetourAccueil':
				include "./vue/accueil.php";
	break;	




		
}

	
	

?>