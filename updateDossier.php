<?php
    session_start();
    include('init.php');
    use App\SQLiteConnection;
    use App\Dossier;
    include (__DIR__."/resource/header.php");
?>


    <?php 
    /**
     * check the request method
     * 
     */

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pdo = ((new SQLiteConnection)->connect());
        $dossierObj = new Dossier($pdo);
        if(
            !empty($_POST['numDossier']) && !empty($_POST['annee']) &&
            !empty($_POST['cnie']) && !empty($_POST['nom']) && !empty($_POST['prenom'])
            && !empty($_POST['tel']) && !empty($_POST['type']) && !empty($_POST['date']) 
            && !empty($_POST['montant']) && $_POST['numDossier'] != 0)
            {
                $dossierData = Array(
                    "numdossier"=>$_POST['numDossier'],
                    "anneedossier"=>$_POST['annee'],
                    "codeVille"=>$_POST['codeVille'],
                    "cnie"=>$_POST['cnie'],
                    "nom"=>$_POST['nom'],
                    "prenom"=>$_POST['prenom'],
                    "tel"=>$_POST['tel'],
                    "type"=>$_POST['type'],
                    "date"=>$_POST['date'],
                    "montant"=>$_POST['montant'],
                    "obs1"=>$_POST['obs1'],
                    "obs2"=>$_POST['obs2'],
                    "obs3"=>$_POST['obs3'],
                );
                $id = $_POST['id'];
                $updateDossier = $dossierObj->updateSingleByid($id,$dossierData);
                if($updateDossier){
                    //echo "<script>alert('le dossier a ete modifié')</script>";
                    Alert::redirect('indexDossier.php','le dossier a ete modifié');
                }
                else{
                    echo "<script>alert('le dossier na pas ete modifié')</script>";
                    
                }
            }
    
        }
    
    
    
    
    
    
    
    
    
    
    
    ?>























  <?php
        /**
         * extract the id from  of the Dossier;
         */
        
        if(isset($_GET['id'])){
            $element = $_GET['id'];
            $pdo = ((new SQLiteConnection)->connect());
            $dossierObj = new Dossier($pdo);
            $dossierData = $dossierObj->fetchSingleByid($element);
            foreach($dossierData as $x){
  ?>
    
      <div class="container-fluid admin-pages">
          <?php include(__DIR__."/resource/sidebar.php"); ?>

              <div class="col py-3">
                    <!-- ******************************************** -->
                <div class="index-page p-4">
                  <h2 class="page-title m-3">Modifier Le Dossier (<?php echo "   ".$x['numdossier']." / ". $x['anneedossier']." / ".$x['codeVille'];?>)</h2>
                      <div class="ajouter_dossier_form">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="row mb-3 mt-4">
                                    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" name="year" aria-describedby="emailHelp" value="<?php echo $x['id']; ?>">
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">numéro de Dossier</label>
                                            <input type="number" name="numDossier" class="form-control" id="exampleInputEmail1"  value="<?php echo $x['numdossier']; ?>">
                                        
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Année</label>
                                            <input type="number" name="annee" class="form-control" id="exampleInputEmail1" name="year" aria-describedby="emailHelp"  min="2010" max="3000" step="1" value="<?php echo $x['anneedossier']; ?>">
                                        
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Code De ville</label>
                                            <input type="number" name="codeVille" class="form-control" id="exampleInputEmail1"  value="<?php echo $x['codeVille']; ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3 mt-4">
                                        
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">N° Cnie</label>
                                            <input type="text" name="cnie" class="form-control" id="exampleInputEmail1"  value="<?php echo $x['cnie']; ?>">
                                        
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nom Personnel</label>
                                            <input type="text " class="form-control" id="exampleInputEmail1" name="nom"   value="<?php echo $x['nom']; ?>">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Prenom</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="prenom" value="<?php echo $x['prenom']; ?>">
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tel</label>
                                            <input type="number" name="tel" class="form-control" id="exampleInputEmail1"  value="<?php echo $x['tel']; ?>">
                                        </div>
                                    </div>


                                    <div class="row mb-3 mt-4">
                                    <div class="col mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Type de dossier</label>

                                        <select class="form-select" name="type" aria-label="Default select example">
                                            <option value="<?php echo $x['type']; ?>" selected><?php echo $x['type']; ?></option>
                                            <option value="Dossier Plantation">Dossier Plantation</option>
                                            <option value="Dossier Achat Materiel Agricole">Dossier Achat de Materiel Agricole</option>
                                            <option value="Dossier Projet Irrigation">Projet Irrigation</option>
                                            <option value="Dossier Construction Etable et Bergerie">Construction Etable et Bergerie</option>
                                        </select>   
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Date De depot</label>
                                            <input type="date" name="date" value="<?php echo $x['date']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        
                                        </div>
                                      
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Montant Estimé(Dirham)</label>
                                            <input type="number" name="montant" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $x['montant']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3 mt-4">
                                        <h3>Les Observation Sur le Dossier</h3>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">1er Observation(#1)</label>
                                            <input type="text" name="obs1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $x['obs1']; ?>">
                                        
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">2eme Observation(#2)</label>
                                            <input type="text" name="obs2" class="form-control" id="exampleInputEmail1" name="year" aria-describedby="emailHelp" value="<?php echo $x['obs2']; ?>">
                                        
                                        </div>
                                        <div class="col mb-3">
                                            <label for="exampleInputEmail1" class="form-label">3eme Observation(#3)</label>
                                            <input type="text" name="obs3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $x['obs3']; ?>">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success" style="width:300px">Créer Le Dossier</button>
                                </form>
                              </div>
                          </div>

                          </div>  
                  <!-- *********************************************** -->
              </div>
          </div>
        </div>
<?php
    }
  }
    include (__DIR__."/resource/header.php");
?>
