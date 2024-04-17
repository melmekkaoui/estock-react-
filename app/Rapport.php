<?php
    namespace App;

    class Rapport{
        /**
         * PDO object
         * @var \PDO
         */
        private $pdo;

        /**
         * Initialize the object with a specified PDO object
         * @param \PDO $pdo
         */

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }
        /**
         * 
         * 
         */
        public function rapportByDate($date1,$date2){
            $stmt = $this->pdo->query("SELECT  * FROM dossier WHERE dateInsert >= '$date1' AND dateInsert <= '$date2' ");
            $row = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            return $row;


        }




    }


?>