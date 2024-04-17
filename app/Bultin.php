<?php
    namespace App;

    class Bultin{
        /**
         * PDO object
         * @var \PDO
         */
        private $pdo;

        /**
         * Initialize the object with a specified PDO object
         * @param \PDO $pdo
         */
        private $name;
        private $cnie;
        private $dateDepot;
        private $type;
        private $dossierNum;
        private $year;

        /**
         * Constructor of the class
         * 
         */
        public function __construct($pdo) {
            $this->pdo = $pdo;
            $this->name = $this->getName();
            $this->cnie = $this->getName();
            $this->dossierNum = $this->getDossierNum();
            $this->type = $this->getType();
            $this->year = $this->getYear();
        }
        /**
         * getters
         */
        public function getName(){
            return $this->name;
        }
        public function getCnie(){
            return $this->cnie;
        }
        public function getdate(){
            return $this->dateDepot;
        }
        public function getType(){
            return $this->type;
        }
        public function getDossierNum(){
            return $this->dossierNum;
        }
        public function getYear(){
            return $this->year;
        }
        /**
         * setters
         */
        public function setName($arg=" "){
            $newstr = filter_var($arg, FILTER_SANITIZE_STRING);
             $this->name=$newstr;
        }
        public function setCnie($arg=" "){
            $newstr = filter_var($arg, FILTER_SANITIZE_STRING);
              $this->cnie=$newstr;
        }
        public function setDate($arg){
            $this->dateDepot = $arg;
        }
        public function setType($arg){
            $newstr = filter_var($arg, FILTER_SANITIZE_STRING);
             $this->type = $newstr;
        }
        public function setDossierNumber($arg){
            if (filter_var($arg, FILTER_VALIDATE_INT)!== false) {
                $this->dossierNum = $arg;
            } else {
                return false;
            }
        }
        public function setYear($arg){
            if (filter_var($arg, FILTER_VALIDATE_INT)!== false) {
                $this->year = $arg;
            } else {
                return false;
            }
        }
        /**
         * create bultin
         * 
         */
        public function fetchData(){
            
            $sql = "
                    SELECT * FROM dossier WHERE 
                    numDossier='$this->dossierNum'
                    AND anneedossier ='$this->year'  
            ";
            $stmt = $this->pdo->query($sql);
            $row = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
            return $row;


        }

    }