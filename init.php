<?php
    require 'vendor/autoload.php';
    spl_autoload_register(function($className){
        require 'helpers/'.$className.'.php';
    });
//    / error_reporting(E_ALL ^ E_NOTICE);  

?>