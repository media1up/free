<?php
ob_start();
session_start();
include 'functions/gFunction.php';
include 'classes/database.php';
if(isset($_GET['ref'])){
    $con = new database();
    if($con->isExists("users","username",$_GET['ref'])){
        $_SESSION['ref'] = Remove_er_sql($_GET['ref']);
    }
}
Redirect("../../home");
?>