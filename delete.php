<?php 
     session_start();
     include('init.php');
     use App\SQLiteConnection;
     use App\Dossier;
     include (__DIR__."/resource/header.php");

    if(isset($_GET['id'])){
        $element = $_GET['id'];
        $pdo = ((new SQLiteConnection)->connect());
        $dossierObj = new Dossier($pdo);
        $delete = $dossierObj->delete($element);
        if($delete){
            Alert::redirect('indexDossier.php','Le Dossier a été Supprimer avec succes!');
        }









    }




?>