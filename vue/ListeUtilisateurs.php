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
        document.getElementById('longitude_view'). innerHTML = near_place.geometry.location.lng();
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
//Affichage du resultat 

$ID = "<strong>#</strong>";
$Nom = "<strong>Nom</strong>";
$Prenom = "<strong>Prenom</strong>";
$sup = "<strong>Supprimer</strong>";


echo "<center><table  class=table table-sm>";
echo "<thead><tr>";
    echo 
        "<th>".$ID."</th><th>".$Nom."</th><th>".$Prenom."</th><th>".$sup."</th>";

    echo "</tr></thead>";

foreach ($lesUtilisateurs as $unUtilisateur) {

    {
            
        
    
        echo "<tr>";
            echo "
            <td>".$unUtilisateur['ID']."</td>
            <td>".$unUtilisateur['Nom']."</td>
            <td>".$unUtilisateur['Prenom']."</td>";
            
            
           


            echo "</tr>";
            
            
    }
}

 
echo "</table></center>";
?>
</div>
</div>
</div>



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
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
                    
        <section class="py-5 border-bottom">
              
        <!-- Contact section-->
       
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h2 class="fw-bolder">Get in touch</h2>
                    <p class="lead mb-0">We'd love to hear from you</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
  
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->  
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section></div></div></section>

        

