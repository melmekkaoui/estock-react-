<?php
    session_start();
    include('init.php');
    use App\SQLiteConnection;
    use App\Dossier;
    include (__DIR__."/resource/header.php");
?>
    <?php
        /**
         * extract the id from  of the Dossier;
         */
        $element = $_GET['id'];
        if(isset($element)){

            $pdo = ((new SQLiteConnection)->connect());
            $dossierObj = new Dossier($pdo);
            $dossierData = $dossierObj->fetchSingleByid($element);

    ?>
        <div class="container-fluid admin-pages">
    <?php include(__DIR__."/resource/sidebar.php"); ?>

        <div class="col py-3">
               <!-- ******************************************** -->
           <div class="detail_page p-4">
               <?php 
                    foreach($dossierData as $x){
                        ?>
                             <h2 class="page-title m-3 detail_title">Afficher Dossier Unique(<?php echo "   ".$x['numdossier']." / ". $x['anneedossier']." / ".$x['codeVille'];           ?>)</h2>
        <!----  /********************** content *******************/ -- -->
                <!--  -------------- single dossier details---------------- -->
                <div class="row m-3">
                            <div class="col-md-4 personal_details">
                                <h5>LES DONNÉES PERSONNEL</h5>
                                <br />
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Nom Complet</td>
                                        <td class="info"><?php echo $x['nom']." ". $x['prenom'];           ?></td>
                                    </tr>

                                    <tr>
                                        <td>N° CNIE</td>
                                        <td class="info"><?php echo $x['cnie']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>N° Tel</td>
                                        <td class="info"><?php echo $x['tel']; ?></td>
                                    </tr>
                                   
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-7 dossier_details">
                                <h5>LES DETAILS DU DOSSIER</h5>
                                <br />
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Numéro du Dossier</td>
                                            <td class="info"><?php echo "   ".$x['numdossier']." / ". $x['anneedossier']." / ".$x['codeVille'];   ?></td>
                                        </tr>
                                        <tr>
                                            <td>Type De Dossier</td>
                                            <td class="info"><?php echo $x['type']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date de Dépot</td>
                                            <td class="info">
                                                
                                                <?php
                                                    $date=date_create($x['date']);//date_create();
                                                    echo date_format($date,"d/m/Y");
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Montant Estime</td>
                                            <td class="info"><?php echo $x['montant']; ?> (DIHRAM)</td>
                                        </tr>
                                        <tr>
                                            <td>1er Observation(#1)</td>
                                            <td class="info"><?php echo $obs1 = !($x['obs1'] == "")  ? $x['obs1'] :"Aucune remarque n'a été donnée"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>2eme Observation(#2)</td>
                                            <td class="info"><?php echo $obs2 = !($x['obs2'] == "") ? $x['obs2'] :"Aucune remarque n'a été donnée"; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>3eme Observation(#3)</td>
                                            <td class="info"><?php echo $obs2 = !($x['obs3'] == "") ? $x['obs3'] :"Aucune remarque n'a été donnée"; ?> </td>
                                        </tr>


                                    
                                   
                                    </tbody>
                                </table>

                            </div>                        
                        </div>      
                




                <!-- **---------------------single dossier detail ------------->
    <!----  /********************** content *******************/ -- -->
            </div>
        </div>


            





        
    


















                        <?php
                    }

               ?>
               
    
    


    <?php
    
        }
    ?>

























































