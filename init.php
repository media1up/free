<?php
//session 
ob_start();
session_start();
    //includes 
    include 'functions/gFunction.php';
    include 'classes/class.user.php';
    include 'classes/database.php';
    include 'classes/class.upload.php';
    include 'classes/class.page.php';
    include 'classes/class.ads.php';


    if(!isset($_SESSION['app_2']['info'])) include 'info_site.php';
    $settings = $_SESSION['app_2'];
    $lang = $_SESSION['app_2']['lang'];

    // check user connected
    if(!isset($_SESSION['app_2']['username'])){
        header("location: ../login");
        exit;
    }else{
        $username = $settings['username'];
        $balance = $settings['balance'];
        $balance_ref = $settings['balance_ref'];
        $balance_today = $settings['balance_today'];
        $balance_month = $settings['balance_month'];
        $pending_payment = $settings['pending_payment'];
        $total_payment = $settings['total_payment'];
        $upgrade = $settings['upgrade'];
        $max_upload_size = $settings['plans'][$upgrade]['max_size'];
        if($upgrade == 0){
            $upgrade_name = $lang['up_3'];
            $uprage_date = $lang['up_7'];
        }elseif($upgrade == 1){
            $upgrade_name = $lang['up_5'];
            $uprage_date = $settings['upgrade_finish'];
        }elseif($upgrade == 2){
            $upgrade_name = $lang['up_6'];
            $uprage_date = $settings['upgrade_finish'];
        }
    }

    


    // path folder
    $css = "../includes/css/";
    $js = "../includes/js/";
    $img = "../image/";

    //create object 
    $user = new user();
    $p = new Pages();
    $ads = new ads();

    $p->setSettings();

    //genrator banner
    $banner = $ads->GeneratorAds_link_Member();

    if(!isset($_SESSION['member_ads']))$_SESSION["member_ads"]=0;
    else $_SESSION["member_ads"]++;
    

    // Settings 
    ini_set('display_errors','off');

    // Update Dashboard
    $t = time();
    if($t > $_SESSION['time'] + 300){
        $user->GetDataUser($username);
        $dataset = $user->getDataSet($username);
	    $pieChart = $user->getTypeTraffic($username);
    }    
    

?>