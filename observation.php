<?php
    session_start();
    include('init.php');
    use App\SQLiteConnection;
    use App\User;
    include (__DIR__."/resource/header.php");




    ?>




<div class="container-fluid admin-pages">
    <?php include(__DIR__."/resource/sidebar.php"); ?>

        <div class="col py-3">
               <!-- ******************************************** -->
           <div class="index-page p-4">
            <h2 class="page-title m-3">Créer Bulletin d'observation</h2>
    <!--        --  /********************** cards *******************/ -- -->
            <form action="bultin.php" method="POST">
                            <div class="row">
                                <div class="col-4">
                                    <label for="date1" class="form-label">Numéro dossier</label>
                                    <input type="number" class="form-control" id="email"  name="numD" value="0">
                                </div>

                                <div class="col-4">
                                    <label for="date1" class="form-label">Année de depot</label>
                                    <input type="number" class="form-control" id="email"  name="anneeD" value="2023" min="2010">
                                </div>
                                <div class="col-4">
                                    <label for="date1" class="form-label">Mois à compter</label>
                                    <input type="number" class="form-control" id="email"  name="mois" value="3" min="1">
                                </div>
                               
                            </div>
                            <div class="row mt-3 ms-2">
                                <div class="form-check mb-3 col-3">
                                    <label class="form-check-label">
                                        <input type="radio" id="html" name="approbation" value="1" /> 
                                        Approbation préalable
                                    </label>
                                </div>
                                <div class="form-check mb-3 col-4">
                                    <label class="form-check-label">
                                        <input type="radio" id="html" name="approbation" value="2" /> 
                                        Demande de l'aide financiére
                                    </label>
                                </div>

                            </div>

                            <div class="row mt-3 ms-2">
                                <div class="form-check mb-3 col-4">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="radio"  name="table2" value="1">Irrigation Localisée ou de complément
                                    </label>
                                </div>
                                <div class="form-check mb-3 col-4">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="table2" value="2"> Améliorations foncières et collecte des eaux pluviales
                                    </label>
                                </div>
                                <div class="form-check mb-3 col-4">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="table2" value="3"> Autres rubrique (3)
                                    </label>
                                </div>
                                
                            </div>

                                <div class="col-4">
                                    <button class="btn btn-primary" style="margin-top: 31px;width: 170px;">génerer</button>
                                </div>
                            
                </form>
        <!--          /*********************** cards **********************/ -->    
 </div>



















            <!-- *********************************************** -->





        </div>
    </div>
</div>

<?php 
      include (__DIR__."/resource/footer.php");

?>