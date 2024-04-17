<?php 
    
    class Validator{
        

        /**
         * function to validate the email
         */
        public static function validateEmail($Uemail){
            // sanitize the email and remove all ellegal chars
            $newEmail = filter_var($Uemail, FILTER_SANITIZE_EMAIL);
            //validating the email
            if(filter_var($newEmail, FILTER_VALIDATE_EMAIL)){
                return $newEmail;
            }
            else{
                echo "invalide email !";
            }

        }
        /**
         * validate names
         * 
         */
        public static function validateName($Uname){
            $newUname = filter_var($Uname,FILTER_SANITIZE_STRING);
          
               return $newUname;
           
        }
        /**
         * validate the numbers
         */
        public static function validateNumber($Unumber)
        {
            if (!preg_match ("/^[0-9]*$/", $Unumber) ){  
                $ErrMsg = "just les numeros autorisée";  
                echo $ErrMsg;  
            } else {  
                return $Unumber;  
            }  
        }

    }


   

?>
