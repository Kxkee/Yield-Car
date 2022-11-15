<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5 " style="background-color: #F1F1F1;">
                <div class="card-heading">
                    <h2 class="title">VOTRE PROFIL</h2>
                </div><?php foreach ($Utilisateur as $UnUtilisateur) { ?>
                    
                                <div class="card-body">
                    <form method="POST" action="index.php?ctl=Utilisateur&action=ModifierProfil">
                        <div class="form-row p-t-20">
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Homme
                                    <input type="radio" name="genre" value="1" required  <?php if ($UnUtilisateur['Genre']==1) { ?> checked <?php  } ?>>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Femme
                                    <input type="radio" name="genre" value="2" <?php if ($UnUtilisateur['Genre']==2) { ?> checked <?php  } ?>>
                                    <span class="checkmark"></span>
                                </label><br><br>
                            </div>
                        </div>
                        <div>
                        <div class="form-row m-b-55">
                            <div class="name">Nom Complet</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="prenom" value=<?php echo $UnUtilisateur['Prenom'];?>>
                                            <label class="label--desc">Prénom</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nom" value=<?php echo $UnUtilisateur['Nom'];?>>
                                            <label class="label--desc">Nom</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="email" value=<?php echo $UnUtilisateur['Email'];?>>
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Téléphone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="telephone" value=<?php echo $UnUtilisateur['Telephone'];?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">Avez-vous un véhicule ?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Oui
                                    <input type="radio" name="vehicule" required value="1" <?php if ($UnUtilisateur['Vehicule']==1) { ?> checked <?php  } ?>>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Non
                                    <input type="radio" name="vehicule" value="2" <?php if ($UnUtilisateur['Vehicule']==2) { ?> checked <?php  } ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--blue" type="submit">Enregistrer</button><?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>