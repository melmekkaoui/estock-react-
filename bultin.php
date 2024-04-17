<?php
    session_start();
    include('init.php');
    use App\SQLiteConnection;
    use App\Bultin;
    include (__DIR__."/resource/header.php");


    /**
     * check the request method
     * 
     */
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pdo = ((new SQLiteConnection)->connect());
        $dossierObj = new Bultin($pdo);
        
        $numD = $_POST['numD'];
        $annee = $_POST['anneeD'];
        $table1 = $_POST['approbation'];
        $table2= $_POST['table2'];
        $dossierObj->setDossierNumber($numD);
        $dossierObj->setYear($annee);
        $data = $dossierObj->fetchData();
        if(count($data)){
            foreach($data as $x){

        
    
    
    ?>
            <!--    The document structur  -->
        
    <div class="bultin_page m-4 " >
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-4 mt-3 text-center" style="font-size:13px;line-height:1px">
                    <p>Royaume Du Maroc</p>
                    <p>Ministére de L'agriculture et</p>
                    <p>de la Pêche Maritime</p>
                </div>

                <div class="col-4 d-flex justify-content-center">
                    <img src="public/img/mrLogo.jpg" style="width:90px;height:90px;"/>
                </div>

                <div class="col-4 mt-3 text-center" style="font-size:13px;line-height:1px;">
                    <p>المملكة المغربية</p>
                    <p>وزارة الفلاحة والصيد البحري</p>
                    <p>المديرية الإقليمية للفلاحة الخميسات</p>
                </div>
            
            
            </div>
            
            <div class="w-100 text-center">
                <p class="mt-2" style="font-weight:bold;">A Monsieur :<?php echo " ".$x['nom']." ".$x['prenom'] ?></p>
            </div>

            <div class="approbation">
                <p class="ms-4" style="font-size:12px">J'ai l'honneur de vous informer que votre dossier(1):</p>
                <table class="table table-bordered">
                   
                <tbody style="font-size:12px">
                        <tr>
                            <td>Approbation préalable</td>
                            <td style="text-align:center;font-size:20px"><?php echo ($table1 == '1') ? '<i class="fa-solid fa-xmark"></i>' : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Demande de l'aide Financière</td>
                            <td style="text-align:center;font-size:20px"><?php echo ($table1 == '2') ? '<i class="fa-solid fa-xmark"></i>' : ''; ?></td>
                        </tr>
                        
                    </tbody>
                    
                </table>
            </div>


            <div class="depot mt-2 w-100" style="font-size:13px">
                <p class="ms-4 w-100">
                                        <span style="font-weight:bold;">Déposé Le: <?php
                                        $date=date_create($x['date']);
                                        echo date_format($date,"d/m/Y");
                                        ?> </span> au Guichet Unique de la <span>D.P.A</span> de Khémisset au titre de (2):</p>
                <table class="table table-bordered">
                
                    <tbody>
                        <tr>
                            <td>Approbation préalable</td>
                            <td style="text-align:center;font-size:20px"><?php echo ($table2 == '1') ? '<i class="fa-solid fa-xmark"></i>' : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Amélioration fonciéres et collecte des eaux pluviales</td>
                            <td style="text-align:center;font-size:20px"><?php echo ($table2 == '2') ? '<i class="fa-solid fa-xmark"></i>' : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Autre rubrique(3)</td>
                            <td style="text-align:center;font-size:20px"><?php echo ($table2 == '3') ? '<i class="fa-solid fa-xmark"></i>' : ''; ?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <div class="dossier mt-2">
                    <p class="mt-1" style="font-weight:bold;font-size:12px;"><?php echo $x['type'] ?> N° <?php echo $x['numdossier'] ?>/ <?php echo $x['anneedossier'] ?></p>
                    <p>Présente les insuffisances suivantes au niveau des pièces le constituant</p>
                    <p class="ms-5" style="font-weight:bold;font-size:12px">-- Voire note d'observation ci-joint n°....................du .........../..../..../.....:</p>
                    <p style="font-size:12px"><span class="ms-5" >Aussi</span> vous prie-je de bien vouloir vous présenter au Guichet Unique, pour satisfaire l'ensemble des insuffisances sus indiquées et ce dans un délai ne dépassant pas <span style="font-weight:bold;font-size:13px;"> <?php echo $_POST['mois'] ?> Mois </span> à compter de la date de la présente lettre, Passé ce délai, Votre dossier de demande de l'aide financière sera définitivement rejeté conformément à la réglementation en vigueur .</p>
            </div> 

            <div> 
                <p class="ms-5" style="font-size:13px"> Veuillez agréer, Monsieur, l'expression de mes salutations distinguées</p>
            </div>
            <div class="text-end">
                <p>Fait à Khémisset Le <?php
                                        $date=date_create();
                                        echo date_format($date,"d/m/Y");
                                        ?>
                </p>
                                                    </div>
            

            <div>
                <p> Rappel des délais accordés par la réglementation en vigueur</p> 
                <table class="table table-bordered" style="font-size:13px">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Irrigation Localisée et de complément </th>
                            <th>Améliorations Foncières </th>
                            <th>Autres Rubriques</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                    <td>Approbation Préalable</td>
                                    <td>6 mois</td>
                                    <td>6 mois</td>
                                    <td>3 mois</td>
                            </tr>
                            <tr>
                                    <td>Demande de subvention</td>
                                    <td>3 mois</td>
                                    <td>3 mois</td>
                                    <td>3 mois</td>
                            </tr>
                            
                    </tbody>
                </table>
                <p>(1)Barrer la mention inutile</p>
                <p>(2)Barrer la mention inutile</p>
            </div>


        </div>
    
    
    </div>



    <?php
        }
    }else{
        Alert::redirect('observation.php','Ce dossier n existe pas!','error');

    }
}
?>
