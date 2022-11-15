            <script>
            var searchInput = 'search_input';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['geocode'],
    });
    
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
        document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();
        
        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    });
});
        </script>

<script>
            var searchInput2 = 'search_input2';

$(document).ready(function () {                 
    var autocomplete2;
    autocomplete2 = new google.maps.places.Autocomplete((document.getElementById(searchInput2)), {
        types: ['geocode'],
    });
    
    google.maps.event.addListener(autocomplete2, 'place_changed', function () {
        var near_place = autocomplete2.getPlace();
        document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();
        
        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    });
});
        </script>

    <style type="text/css">
    header {
  background-image: url("images/MOUNT.png");
  
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  
  background-size: cover;
}
#search_input{
    width: 20%;
    position: absolute;
    right: 57%;
    height: 6.3%

}
#search{
    margin-top: 0.3rem;
    position: absolute;
    right: 15.5%;
    height: 6.3%;

}
#search_input2{
    position: absolute;
    right: 36%;
    height: 6.3%;
    width: 20%;
}
#meeting-time{
    
    position: absolute;
    left: 65%;
    height: 6.3%;
    width: 10.5%;
    margin-top:0.3%;
}
</style>
        <header class="py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder text-white mb-2" >TROUVEZ</h2>
                            <h1 class="display-5 fw-bolder text-white mb-2">UN COVOITURAGE</h1><br>
                            <form class="form-inline" method="post" action="index.php?ctl=Trajet&action=AffichageTrajet">
                                <input id="search_input" placeholder="Lieu de départ" type="text" name="LieuDepart" class="form-control" required>
                                <input type="text" id="search_input2" name="LieuArrive" class="form-control" placeholder="Lieu d'arrivée" required>
                                <input type="date" name="meeting-time" class="form-control" id="meeting-time" placeholder="Date Départ" required>
                              <button type="submit" id="search" class="btn btn-outline-light mb-2"><i class="fas fa-search-location"></i></button>
                              <br><br><br><br>
                            </form>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="bg-light py-5 border-bottom">
            <div class="container px-1 my-5">
                <div class="text-center mb-5" >
                    <h2 class="display-5 fw-bolder" >Gestions Trajets</h2>
                </div>
            </div>
        </section><br>
        <div class="row">
                <?php 
                foreach ($Liste as $UnTrajet ) {    
                ?>  
            
                    <div class="col-lg-4 col-xl-6" style="width: 30rem;">
                        <div class="card mb-5 mb-xl-0" style="height: 24rem;" >
                            <div class="card-body p-5" >
                                <div class="mb-3">
                                    <span class="display-6 fw-bold">Trajet #<?php echo $UnTrajet['ID_Trajet']; ?></span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo $UnTrajet['LieuDepart']; ?> <i class="fas fa-long-arrow-alt-right"></i> <?php echo  $UnTrajet['LieuArrive']; ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo $UnTrajet['DateDepart'];  ?> à <?php  echo $UnTrajet['HeureDepart']; ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="far fa-clock"></i>
                                         <?php echo $UnTrajet['distance']; ?> ≈ <?php echo $UnTrajet['Duree']; ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-user-check"></i>
                                        Place(s) Disponible(s) : <?php echo $UnTrajet['NbPlace_Dispo'];  ?>                                        
                                    </li>
                                    <li class="mb-2">
                                        <i class="fa-solid fa-person"></i>
                                        Conducteur : <?php echo $UnTrajet['Prenom']." ".$UnTrajet['Nom']  ?>                                        
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-car"></i>
                                        Voiture : <?php echo $UnTrajet['vehicule'];?>                                        
                                    </li>
                                </ul> 
                    <a class="btn btn-primary" href="index.php?ctl=Trajet&action=InfoTrajetAdmin&id=<?php echo $UnTrajet['ID_Trajet']; ?>&ID=<?php echo $UnTrajet['ID']; ?> ">Details</a>
                    <a class="btn btn-danger" href="index.php?ctl=Trajet&action=SupTrajet&id=<?php echo $UnTrajet['ID_Trajet']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?');">Supprimer</a>
                    </div>
                </div>
            <br></div>
                  <?php } ?>
                  </div>
<br><br><br><br>

                        
        