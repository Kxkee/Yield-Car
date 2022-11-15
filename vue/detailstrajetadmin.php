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
                    <h2 class="display-5 fw-bolder" >Détails du trajet</h2>
                </div>
            </div>
        </section><br>
                <div class="row">
                    <div class="col-lg-4 col-xl-4" >
                        <div class="card mb-5 mb-xl-0" style="width: 28rem;">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <span class="display-6 fw-bold">Trajet #<?php echo $Liste['ID_Trajet']; ?></span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo $Liste['LieuDepart']; ?> <i class="fas fa-long-arrow-alt-right"></i> <?php echo  $Liste['LieuArrive']; ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo $Liste['DateDepart'];  ?> à <?php  echo $Liste['HeureDepart']; ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="far fa-clock"></i>
                                         <?php echo $Liste['distance']; ?> ≈ <?php echo $Liste['Duree']; ?>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-user-check"></i>
                                        Place(s) Disponible(s) : <?php echo $Liste['NbPlace_Dispo'];  ?>                                        
                                    </li>
                                    <li class="mb-2">
                                        <i class="fa-solid fa-person"></i>
                                        Conducteur : <?php echo $Liste['Prenom']." ".$Liste['Nom']  ?>                                        
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-car"></i>
                                        Voiture : <?php echo $Liste['vehicule'];?>                                        
                                    </li>
                                </ul> 

                            </div>
                        </div>
                     </div>

                        <table class="table table-bordered" style="width:28rem; height: 10rem;">
                          <thead>
                            <tr>
                              <th scope="col">Nom</th>
                              <th scope="col">Prenom</th>
                              <th scope="col">Action</th>
                              <th scope="col">Téléphone</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          if (empty($Tab)) {
                            echo "<tr><td colspan=4><center>Pas de demande de covoiturage</center></td></tr>";
                          }
                          else{    
                          
                          foreach ($Tab as $UnTab ) { 
                          ?>
                            <tr>
                              <td><?php echo $UnTab['Nom'];  ?></td>
                              <td><?php echo $UnTab['Prenom'];  ?></td>
                              <td><center>
                                <?php if ($UnTab['statut']=="EnAttente") {  ?>                              

                                <a href="index.php?ctl=Trajet&action=Accepter&id=<?php echo $UnTab['ID_Trajet']; ?>&ID=<?php echo $UnTab['ID']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir accepter cet utilisateur ?');"><i class="fa-solid fa-check"></i></a> 

                                <a href="index.php?ctl=Trajet&action=Refuser&id=<?php echo $UnTab['ID_Trajet']; ?>&ID=<?php echo $UnTab['ID']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir refuser cet utilisateur ?');"><i class="fa-solid fa-xmark"></i></a>
                                <?php } else { ?>
                                    <p>Validé</p>
                                <?php } ?>
                            </center>
                            </td>
                            <td><?php echo $UnTab['Telephone'];  ?></td>
                            </tr>
                          
                        <?php } }?>
                        </tbody>
                        </table></div><br>




            



                        
        