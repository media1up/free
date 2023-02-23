<?php
//session 
ob_start();
session_start();
    //includes 
    include '../page/functions/gFunction.php';
    if(file_exists("../page/classes/config.php")){
        include '../page/classes/database.php';
        $db= new database();
    }



    

    
    

?>