<?php 
include "connectPDO.php";

class covoitDb
{
	public static function getLoginUser($login,$mdp)
	{
		$sql = "SELECT * FROM utilisateur WHERE Email='$login' AND Mdp='$mdp'";
		$objresultat = DbConnect::getPdo()->query($sql);
		$result = $objresultat->fetch();
		return $result;
	}
    public static function GetProfil($ID)
    {
        $sql = "SELECT * FROM utilisateur WHERE ID = '$ID'";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetchall();
        return $result;
    }
	public static function UpdateProfil($Genre,$vehicule,$Nom,$Prenom,$Email,$telephone,$ID)
	{
		$sql2 = "UPDATE utilisateur SET Genre='$Genre', vehicule='$vehicule',Nom='$Nom', Prenom = '$Prenom', Email = '$Email', Telephone = '$telephone' WHERE ID='$ID'";
		$objresultat = DbConnect::getPdo()->query($sql2);
		$result = $objresultat->fetch();
		return $result;
	}
    /*public static function InsertVehicule($ID,$ID_vehicule)
    {
        $sql2 = "INSERT INTO vehicule (ID_Vehicule,ID,Modele) VALUES (NULL,'$ID','$ID_vehicule')";
        $objresultat = DbConnect::getPdo()->query($sql2);
        $result = $objresultat->fetch();
        return $result;
    }*/



public static function getListeTrajet($id)
    {
        $sql = "SELECT * from trajet where ID = '$id'";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetchall();
        return $result;
}

public static function SupTrajet($ID)
{
    $sql1 = "DELETE FROM reservation WHERE ID_Trajet = $ID";
    $objresultat = DbConnect::getPdo()->query($sql1);

    $sql = "DELETE FROM trajet WHERE ID_Trajet = $ID";
    $objresultat = DbConnect::getPdo()->query($sql);

}

public static function getListeTrajet2($id)
    {
        $sql = "SELECT * from trajet where ID = '$id'";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetch();
        return $result;
}

public static function getListeTab($ID)
    {
        $sql = "SELECT * from reservation, utilisateur WHERE reservation.ID = utilisateur.ID AND ID_Trajet = '$ID'";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetchall();
        return $result;
}

public static function getListeUtilisateurs()
    {
        $sql = "SELECT * from utilisateur";
        $objresultat = DbConnect::getPdo()->query($sql);
        $lesUtilisateurs = $objresultat->fetchall();
        return $lesUtilisateurs;
}

public static function getTrajet($id)
    {
        $sql = "SELECT * from trajet";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetchall();
        return $result;
}

public static function Accepter($ID,$ID_trajet)
    {
        $sql1 = "UPDATE trajet SET NbPlace_Dispo = NbPlace_Dispo-1 WHERE  ID_Trajet = $ID_trajet";
        $objresultat = DbConnect::getPdo()->query($sql1);
        $sql = "UPDATE reservation SET statut = 'Reserver' WHERE  ID_Trajet = $ID_trajet AND ID = $ID";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetchall();
        return $result;
}
public static function Refuser($ID,$ID_trajet)
    {
        $sql = "DELETE from reservation WHERE ID_Trajet = $ID_trajet AND ID = $ID";
        $objresultat = DbConnect::getPdo()->query($sql);
}

public static function reservertrajet($statut,$idUser,$id_trajet)
    {
        $sql5 = DbConnect::getPdo()->prepare("INSERT INTO reservation (id_reservation, statut, ID, ID_Trajet) VALUES (NULL, '$statut', '$idUser','$id_trajet')");

        $sql5->execute(array('id_reservaton'=>NULL, 'statut'=>$statut, 'ID_Trajet'=>$id_trajet));

    }

public static function ajoutTrajet($ID_Trajet,$dateD,$lieuD,$lieuA,$nbPlace,$idUser,$vehicule, $heuredep, $duree, $Distance)
    {
        $sql5 = DbConnect::getPdo()->prepare("INSERT INTO trajet (ID_Trajet, DateDepart, LieuDepart, LieuArrive, NbPlace_Dispo, ID, Vehicule, HeureDepart, Duree, distance) VALUES (NULL, '$dateD', '$lieuD','$lieuA', '$nbPlace', '$idUser', '$vehicule', '$heuredep', '$duree', '$Distance')");

        $sql5->execute(array('ID_Trajet'=>NULL, 'DateDepart'=>$dateD, 'LieuDepart'=>$lieuD, 'LieuArrive'=>$lieuA, 'NbPlace_Dispo'=>$nbPlace, 'idUser'=>$idUser, 'Vehicule'=>$vehicule, 'HeureDepart'=>$heuredep, 'Duree'=>$duree, 'distance'=>$Distance));

    }

public static function SearchBar($LieuD,$LieuA,$DateDepart)
    {
        $sql = "SELECT * FROM trajet,utilisateur WHERE trajet.ID = utilisateur.ID AND DateDepart = '$DateDepart' AND LieuDepart LIKE '%$LieuD%' AND LieuArrive LIKE '%$LieuA%'";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetchall();
        return $result;
    }

public static function CountBar($LieuD,$LieuA,$DateDepart)
    {
        $sql = "SELECT * FROM trajet WHERE DateDepart = '$DateDepart' AND LieuDepart LIKE '%$LieuD%' AND LieuArrive LIKE '%$LieuA%'";
        $objresultat = DbConnect::getPdo()->query($sql);
        $result = $objresultat->fetchColumn();
        return $result;
    }

public static function getDistance($addressFrom, $addressTo, $unit = '')
{
    // Google API key
    $apiKey = 'AIzaSyAPBvbTpCrMtDSIXPAaDigJtNKbVJ0UNEE';
    
    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo);
    
    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
    $outputFrom = json_decode($geocodeFrom);
    if(!empty($outputFrom->error_message)){
        return $outputFrom->error_message;
    }
    
    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
    $outputTo = json_decode($geocodeTo);
    if(!empty($outputTo->error_message)){
        return $outputTo->error_message;
    }
    
    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
    
    // Calculate distance between latitude and longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;
    
    // Convert unit and return distance
    $unit = strtoupper($unit);
    if($unit == "K"){
        return round($miles * 1.609344, 2);
    }
}
public static function gettraveltime($distance)
{
    $result = '';
    $ttime = $distance / 60;

    if ($ttime<1) 
    {
        $result = $ttime * 100;
    }
    $result = strtoupper($result);
    if($ttime<1){
        return round($result).' min';
    }
    else
    {
        return round($ttime).' hrs';
    }

}
}







?>