<?php

    namespace App;
    
    use App\Agregation;

    class Dossier{
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
         * function to insert Dossier into db
         * 
         */
        public function insertDossier($args){
                try{
                    $attr = implode(', ' ,array_keys($args));
                    $values = "'" .implode("','" ,array_values($args))."'";
                    $sql = "INSERT INTO dossier($attr)VALUES($values)";
                    $stmt = $this->pdo->exec($sql) or die(print_r($this->pdo->errorInfo(), true));
                    return $stmt; 
                }
                catch(Exception $e){
                    echo 'Caught exception: ' . $e->getMessage();
                }
            }
        /**
         * function to fetch Dossiers
         * 
         */
        public function fetchDossier(){
                $stmt = $this->pdo->query('SELECT  * FROM dossier');
                $row = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
                return $row;

        }
        /**
         * fetch data  by using id
         */
        public function fetchSingleByid($id){
            $stmt = $this->pdo->query("SELECT  * FROM dossier WHERE id='$id'");
                $row = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
                return $row;
        }
        /**
         * update data by using id
         */
        public function updateSingleByid($id,$args){
            
            $cols = array();
            foreach($args as $key=>$val) {
                $cols[] = "$key = '$val'";
            }
            $sql = "UPDATE dossier SET " . implode(', ', $cols) . " WHERE id=$id";
            //$sql="UPDATE dossier WHERE id=$id SET $implodeArray";
            $stmt = $this->pdo->exec($sql) or die(print_r($this->pdo->errorInfo(), true));
            return $stmt; 
        }
        /**
         * funtion to delete Dossier using id
         * 
         */
        public function delete($id){
            
            $sql="DELETE FROM dossier WHERE id='$id'";
            $stmt = $this->pdo->exec($sql) or die(print_r($this->pdo->errorInfo(), true));
            return $stmt;


        }
        public function countRow($field,$value){
            return Agregation::count($this->pdo,$field,$value);
        }
        
    }