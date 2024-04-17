<?php
    session_start();
    include('init.php');
    use App\SQLiteConnection;
    use App\Dossier;
    include (__DIR__."/resource/header.php");
    
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
<div class="container-fluid admin-pages">
    <?php include(__DIR__."/resource/sidebar.php"); ?>

        <div class="col py-3">
               <!-- ******************************************** -->
           <div class="index-page p-4">
            <h2 class="page-title m-3">Afficher Les Dossiers</h2>
            <!--**------------Archives Table -------------** -->
            
            <div>
            
            <?php 
                /**
                 * creating the Dossier object
                 */
                 $dossierObj = new Dossier((new SQLiteConnection)->connect());
                 $dossier = $dossierObj->fetchDossier();

                /**
                 * 
                 */
                 ?>
            <table id="dtBasicExample" style="width:auto" class="table table-striped stripe table-bordered table-sm table_category" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="th-sm">#</th>
                            <th class="th-sm">Numéro De Dossier</th>
                            <th class="th-sm">Nom et Prénom</th>
                            <th class="th-sm">Type de Dossier</th>
                            <th class="th-sm">N° Cnie</th>
                            <th class="th-sm">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            foreach($dossier as $item){
                                $i +=1;
                                echo '
                                <tr>
                                <td>'.$i.'</td>
                                <td>'.$item['numdossier'].'/'.$item['anneedossier'].'/'.$item['codeVille'].'</td>
                                <td>'.$item['nom'].' '.$item['prenom'].'</td>
                                <td>'.$item['type'].'</td>
                                <td>'.$item['cnie'].'</td>
                                <td>
                                    <span>
                                        <a href="delete.php?id='.$item['id'].'"><i class="fa-solid fa-trash text-danger ms-3 me-4" style="font-size:30px; "></i></a>
                                        <a href="updateDossier.php?id='.$item['id'].'"><i class="fa-solid fa-pen-to-square text-success me-4" style="font-size:30px;"></i></i></a>
                                        <a href="singleDossier.php?id='.$item['id'].'"><i class="fa-solid fa-eye text-primary" style="font-size:30px;"></i></i></a>
                                    </span>
                                </td>
                            </tr>
                                
                                ';
                            }
                        
                        
                        
                        ?>
           
            



                        </tfoot>
                      </table>
            
            
            
            
            
            
            
            
            
            
            
            </div>

        







            <!--**------------Archives Table -------------** -->


        </div>
</div>



















            <!-- *********************************************** -->





        </div>
    </div>
</div> 
<!-- <script src="public/js/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
   
    <script src="public/js/jquery.dataTables.min.js"></script>
    <script src="public/js/dataTables.bootstrap5.min.js"></script>
 -->
 <script src="public/js/jquery-3.5.1.js"></script>
<script src="public/js/jquery.dataTables.min.js"></script>
<script src="public/js/dataTables.bootstrap5.min.js"></script>
<script>
     $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
      });
</script>
<?php
    
    include (__DIR__."/resource/footer.php");
?>