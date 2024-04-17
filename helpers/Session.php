<?php

    class Session{
        /**
         * check if the session exist
         */
        public static function check($id){
            return (isset($_SESSION[$id])) ? true : false;
        }
        /**
         * add new session
         */

        public static function add($attr, $value){
            return $_SESSION[$attr] = $value;
        }
        /**
         * remove session
         */
        public static function remove($attr){
            if(self::check($attr)){
                unset($_SESSION[$attr]);
            }
        }



    }


?>