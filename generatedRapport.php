<?php
     session_start();
     include('init.php');
     use App\SQLiteConnection;
     use App\Rapport;
     include (__DIR__."/resource/header.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $pdo = ((new SQLiteConnection)->connect());
        $RapportObj = new Rapport($pdo);
        $generate = $RapportObj->rapportByDate($date1,$date2);
    
    }
    

?>
<div class="generatedRaportPage" style="min-height: 100vh;position:relative">
            <table id="dtBasicExample" style="width:full" class="table table-striped stripe table-bordered table-sm table_category" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">#</th>
                                        <th class="th-sm">Numéro De Dossier</th>
                                        <th class="th-sm">Nom et Prénom</th>
                                        <th class="th-sm">N° Cnie</th>
                                        <th class="th-sm">Type de Dossier</th>
                                        <th class="th-sm">Date d'entrée</th>
                                        <th class="th-sm">Montant estimatif</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 0;
                                        foreach($generate as $item){
                                            $i +=1;
                                            echo '
                                            <tr>
                                            <td>'.$i.'</td>
                                            <td>'.$item['numdossier'].'/'.$item['anneedossier'].'/'.$item['codeVille'].'</td>
                                            <td>'.$item['nom'].' '.$item['prenom'].'</td>
                                            <td>'.$item['cnie'].'</td>
                                            <td>'.$item['type'].'</td>
                                            <td>'.$item['date'].'</td>
                                            <td>'.$item['montant'].' (Dh) </td>
                                            
                                        </tr>
                                            
                                            ';
                                        }
                                    
                                    
                                    
                                    ?>
                    
                        



                                    </tfoot>
                                </table>




                      <!-- <div class="arrow-back" style="position:absolute;bottom :0; left:0;">
                            <a href="rapport.php" class="btn btn-danger">Retour</a>
                      </div> -->
    </div>
<?php




?>