<?php

if(!file_exists("../page/classes/config.php")){
    copy("config.php","../page/classes/config.php");
    include '../page/classes/database.php';
    include '../page/functions/gFunction.php';
    include '../page/activation.php';
    
    echo "Upload-Zero has been Updated";
    session_start();
    session_destroy();
}


?>