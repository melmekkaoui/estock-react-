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
                    <h2 class="page-title m-3">Générer un rapport  </h2>
            <!----  /********************** cards *******************/ -- -->
                <form action="generatedRapport.php" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <label for="date1" class="form-label">1ere Date(#1):</label>
                            <input type="date" class="form-control" id="email"  name="date1">
                        </div>
                        <div class="col-4">
                            <label for="date1" class="form-label">2eme Date(#2):</label>
                            <input type="date" class="form-control" id="email"  name="date2">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary" style="margin-top: 31px;width: 170px;">Chércher</button>
                        </div>
                    </div>
                </form>
            <!-- /*********************** cards **********************/ -->    
            </div>
            <!-- *********************************************** -->
        </div>
</div>

<?php 
      include (__DIR__."/resource/footer.php");
