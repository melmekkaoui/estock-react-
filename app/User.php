<?php
    namespace App;
    
    class User{
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
         * Insert new user to users table
         * 
         */
        public function InsertUser($args){
            try{
                $Fname = $args['nomComplet'];
                $Uname = $args['nomUtilisateur'];
                $pwd   = $args['motDePasse'];
                $sql = "INSERT INTO user(nomComplet,nomUtilisateur,motDePasse)VALUES('$Fname','$Uname','$pwd')";
                $stmt = $this->pdo->exec($sql) or die(print_r($this->pdo->errorInfo(), true));
                return $stmt; 
            }
            catch(Exception $e){
                echo 'Caught exception: ' . $e->getMessage();
            }
        }
        public function fetchUser(){
            $stmt = $this->pdo->query('SELECT  * FROM user');
                $user = [];
                $row = $stmt->fetchAll(\PDO::FETCH_ASSOC); 
                return $row;
        }
        public function Login($username){
            $stmt = $this->pdo->query("SELECT  * FROM user WHERE nomUtilisateur = '$username'");
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            if($result >= 1){
                
                return $result;
            }
        }

    }
    
?>