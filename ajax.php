<?php
//session 
ob_start();
session_start();
include 'functions/gFunction.php';
include 'classes/class.user.php';
include 'classes/database.php';
include 'classes/class.upload.php';
include 'classes/class.admin.php';
include 'classes/class.ads.php';

$settings = $_SESSION['app_2'];
$admin = new Admin();
$ads = new ads();

if(isset($_SESSION['app_2']['username'])){
    $user = new user();
    $username = $settings['username'];
    $upgrade = $settings['upgrade'];
    $max_upload_size = $settings['plans'][$upgrade]['max_size'];
}


    // Upload files
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $file_up = new Upload();
        if(empty($_POST['input_file_url'])){
            $name =$_FILES['input-file-max-fs']['name'];
            $size =$_FILES['input-file-max-fs']['size'];
            $tmp  =$_FILES['input-file-max-fs']['tmp_name'];
            if(empty($_SESSION['app_2']['username'])){
                $username = "-";
                $upgrade = 0;
                $max_upload_size = $settings['plans'][0]['max_size'];
            }
                
            $file_up->fileUpload($name,$size,$tmp,$username,$upgrade,$max_upload_size);

        }else{
            $name = $_POST['input_file_url'];
            if(empty($_SESSION['app_2']['username'])){
                $username        = "-";
                $upgrade         = 0;
                $max_upload_size = $settings['plans'][0]['max_size'];
            }
                
            $file_up->fileUploadRemoteURL($name,$username,$upgrade,$max_upload_size);
            
        }
        
    }

    /*
    // Delete file 
    if(isset($_GET['fd']) && isset($_GET['path']) && isset($_GET['user'])){
        $file_up = new Upload();
        $file_up->delete($_GET['fd'],$_GET['user']);
        unlink("../res/rsc_upload/files/".$_GET['path']);
    }
    */

    // Report Dashboard
    if(isset($_GET['p'])){
        $user->reports($username,$_GET['p']); 
    }

    // Report Pagination
    if(isset($_GET['n'])){
        $active = array('','','');
        $active[$_GET['n']-1]="active";

        $current_page=$_GET['n'];
       
        $pages = $user->getPagesReport($username);
        $pages = ceil($pages/10);
        $max_page=5;

        $next_page=$current_page+1;
        $perv_page=$current_page-1;

        echo '<div><ul class="pagination" style="float:right">';
        echo '<li class="page-item "><button class="page-link" onclick="report(1);pagi(1)" >«</button></li>';

        for($i=1;$i<=$pages;$i++){
            if($current_page-2<= $i && $current_page+2>= $i){
                if($current_page==$i){
                    echo '<li class="page-item active"><button class="page-link" onclick="report('.$i.');pagi('.$i.')" >'.$i.'</button></li>';
                    
                }else{
                    echo '<li class="page-item"><button class="page-link" onclick="report('.$i.');pagi('.$i.')" >'.$i.'</button></li>';
                }
            }
                
        }
        echo '<li class="page-item"><button class="page-link" onclick="report('.$pages.');pagi('.$pages.')" >»</button></li>';
        echo '</ul></div>';

        
    }

    // ADMIN Report Dashboard
    if(isset($_GET['p_admin'])){
        $admin->reports($_GET['p_admin']); 
    }

    // ADMIN Report Pagination
    if(isset($_GET['n_admin'])){
        $active = array('','','');
        $active[$_GET['n_admin']-1]="active";

        $current_page=$_GET['n_admin'];
       
        $pages = count($admin->getDateReport());
        $pages = ceil($pages/10);
        $max_page=5;

        $next_page=$current_page+1;
        $perv_page=$current_page-1;

        echo '<div><ul class="pagination" style="float:right">';
        echo '<li class="page-item "><button class="page-link" onclick="report(1);pagi(1)" >«</button></li>';

        for($i=1;$i<=$pages;$i++){
            if($current_page-2<= $i && $current_page+2>= $i){
                if($current_page==$i){
                    echo '<li class="page-item active"><button class="page-link" onclick="report('.$i.');pagi('.$i.')" >'.$i.'</button></li>';
                    
                }else{
                    echo '<li class="page-item"><button class="page-link" onclick="report('.$i.');pagi('.$i.')" >'.$i.'</button></li>';
                }
            }
                
        }
        echo '<li class="page-item"><button class="page-link" onclick="report('.$pages.');pagi('.$pages.')" >»</button></li>';
        echo '</ul></div>';

        
    }

    
    
        





    // ADMIN PANEL Show Msg user
    if(isset($_GET['msg'])){
        $admin->showMsg($_GET['msg']);
    }

    // Active notice user
    if(isset($_GET['notice'])){
        $user->activeNotice($_GET['notice']);
    }

    // Active notice Admin
    if(isset($_GET['notice_admin'])){
        $admin->activeNotice_admin($_GET['notice_admin']);
    }

    if(isset($_GET['notice_admin_read'])){
        $admin->notic_read($_GET['notice_admin_read']);
    }

    if(isset($_GET['notice_admin_write'])){
        $admin->notic_write($_GET['notice_admin_write']);
    }

    if(isset($_GET['notice_apply'])){
        noticeApply($_GET['notice_apply']);
    }




    

    

    



?>