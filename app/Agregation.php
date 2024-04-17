<?php
    namespace App;
    
    class Agregation{

        

        public static function count($pdo,$field,$value){
            $sql = "SELECT count(*) AS total FROM dossier WHERE $field='$value'";
            $stmt = $pdo->exec($sql) or die(print_r($pdo->errorInfo(), true));
            $row = $stmt->numRows(); 
            return $row;
        } 


    }


?>