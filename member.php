<?php
 include 'init.php';
 include '../res/lang.php';
    $lang = $_SESSION['app_2']['lang'];
 $page = isset($_GET['page']) ? $_GET['page'] : "Error";
 include 'includes/header.php';

    // pages of members
    $ar_page = array("dashboard" => "dashboard",
                    "statistics" => "link_static",
                    "create" => "link_create",
                    "links" => "link_all",
                    "reports" => "file_reports",
                    "upload" => "file_upload",
                    "sell" => "file_buy",
                    "Sfiles" => "file_all_buy",
                    "files" => "file_all",
                    "upgrade" => "upgrade",
                    "withdraw" => "withdraw",
                    "referrals" => "referrals",
                    "profile" => "profile",
                    "store" => "store",
                    "contact" => "contact",
                    "upgrade" => "upgrade",

                    "successful" => "successful",
                    "cancelled" => "cancelled",

                    
                    "notification" => "notification"
    );

    if(array_key_exists($page,$ar_page)){
        include 'includes/'.$ar_page[$page].'.php';
    }else{
        if($page == "logout"){
            $user->logout();
        }
        include 'includes/error.php';
    }
    


    
 



 include 'includes/script.php';

?>