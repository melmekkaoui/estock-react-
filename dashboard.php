<?php
    session_start();
    include('init.php');
    use App\SQLiteConnection;
    use App\Dossier;
    include (__DIR__."/resource/header.php");

    $pdo = ((new SQLiteConnection)->connect());
    $dossierObj = new Dossier($pdo);

    

    ?>




<div class="container-fluid admin-pages">

    <?php include(__DIR__."/resource/sidebar.php"); ?>

    
        <!--          /*********************** cards **********************/ -->   
        <div class="col-md-10"> 
            <h2 class="page-title m-3">Tableau de Bord</h2>
            
        </div>


















            <!-- *********************************************** -->





        </div>
    </div>
</div>

<?php 
      include (__DIR__."/resource/footer.php");

?>