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
position: absolute;
    left: 77%;
    height: 6.3%;
    width: 10.5%;
    margin-top:0.3%;

}
#search_input2{
    position: absolute;
    right: 36%;
    height: 6.3%;
    width: 20%;
}
#meetsing-time{
    
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
                            <form class="form-inline" action="index.php?ctl=Trajet&action=AffichageTrajet" method="post">
                                <input id="search_input" placeholder="Lieu de départ" type="text" name="LieuDepart" class="form-control" required>
                                <input type="text" id="search_input2" name="LieuArrive" class="form-control" placeholder="Lieu d'arrivée" required>
                                <input type="date" name="meeting-time" class="form-control" id="meetsing-time" placeholder="Date Départ" required>
                                <button type="submit" id="search" class="btn btn-outline-light  "><i class="fas fa-search-location"></i></button>
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
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <?php if (isset($_SESSION['ID'])) { ?>
                        <h2 class="fw-bolder">Bienvenue <?php echo $_SESSION['Prenom']; ?></h2>
                    

                </div></div></section>
                <?php } ?>
                <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-emoji-smile"></i>
</div>
                        <h2 class="h4 fw-bolder">100% Satisfait</h2>
                        <p>Tous nos clients sont satisfaits de l'érgonomie et la praticité de notre application.</p>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-geo-alt-fill"></i></div>
                        <h2 class="h4 fw-bolder">Utilisation mondial</h2>
                        <p>Utilisé notre application n'importe où dans le monde !</p>
                            
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-cash-stack"></i></div>
                        <h2 class="h4 fw-bolder">100% gratuit</h2>
                        <p>Fait par des étudiants, pour les étudiants, notre application est 100% gratuite afin de facilité le transport et ainsi divisé la quantité d'émissions de gaz à effet de serre.</p>
                        
                        </a>
                    </div>
                </div>
            </div>
        </section>
                    
        <!-- Testimonials section-->
        <section class="py-5 border-bottom">
              
        <!-- Contact section-->
       
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h2 class="fw-bolder">Une question ?</h2>
                    <p class="lead mb-0">Nous sommes à l'écoute !</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">

                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->  
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="email" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Nom complet</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Nom et prénom requis</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email </label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Un Email est requis</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Téléphone</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Un téléphone portable est requis</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Votre message...</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Un message est requis</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Message envoyé !</div>

                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Erreur</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section></div></div></section>

        

