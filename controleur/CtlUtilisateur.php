<?php 
include './modele/covoitDb.php';
$action = $_GET['action'];
switch ($action) {
	case 'OngletProfil':
	
		$ID = $_SESSION['ID'];
		$Utilisateur = covoitDb::GetProfil($ID);
		include "./vue/Profil.php";
	break;

	case 'ModifierProfil':

		$vehicule = $_POST['vehicule'];
		$Nom = $_POST['nom'];
		$Prenom = $_POST['prenom'];
		$Email = $_POST['email'];
		$telephone = $_POST['telephone']; 
		$Genre = $_POST['genre'];
		$ID = $_SESSION['ID'];

		$o = covoitDb::UpdateProfil($Genre,$vehicule,$Nom,$Prenom,$Email,$telephone,$ID);

		header('Location: index.php');
	break; 

	case 'LesUtilisateurs':

		
         $lesUtilisateurs = covoitDb::getListeUtilisateurs();
        include"./vue/ListeUtilisateurs.php";

	break;
	



}