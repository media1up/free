<?php
 include 'init.php';
 $page = isset($_GET['page']) ? $_GET['page'] : "Error";
 include 'header.php';
    if(file_exists("../page/classes/config.php") && !isset($_SESSION['istall'])){
        if($db->isExists("admin","id","1")){
            header("location:../../home");
        }
    }
    else
    if(!isset($_SESSION['istall']))  $_SESSION['istall'] = 0 ;

    if($_SESSION['istall'] == 0) $page = "start";
    elseif($_SESSION['istall'] == 1) $page = "database";
    elseif($_SESSION['istall'] == 2) $page = "build";
    elseif($_SESSION['istall'] == 3) $page = "admin";
    elseif($_SESSION['istall'] == 4){
        RedirectAdmin($_SESSION['var'],$_SESSION['hash'],"2");
        $page = "finish";
    } 

    if(isset($_POST['start'])){
        $_SESSION['istall'] = 1;
        header("location:database");
    }
    elseif(isset($_POST['database'])){
        if(!empty($_POST['host']) && !empty($_POST['user']) && !empty($_POST['name'])){
            $host = $_POST['host'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $name = $_POST['name'];
        
            $myfile = fopen("../page/classes/config.php", "w") or die("Unable to open file!");
            $txt = "<?php $";
            $txt .= 'db_="'.$host.'";$';
            $txt .= 'user_="'.$user.'";$';
            $txt .= 'pass_="'.$pass.'";$';
            $txt .= 'name_="'.$name.'";';
            $txt .= '?>';
            fwrite($myfile, $txt);
            fclose($myfile);
            copy("../page/classes/config.php","../update/config.php");
            $_SESSION['istall'] = 2;
            header("location:build");
        }
    }
    elseif(isset($_POST['build'])){
        include '../page/activation.php';
        $_SESSION['istall'] = 3;
        header("location:admin");
    }
    
    elseif(isset($_POST['admin'])){
        echo '<script>alter("Start Create admin account")</script>';
        $hash = allowFormat($_POST['usernameP']);
        $admin = Remove_er_sql(strtolower($_POST['username']));
        $email = Remove_er_sql(strtolower($_POST['email']));
        $pass1 = Remove_er_sql(strtolower($_POST['pass1']));
        $pass2 = Remove_er_sql(strtolower($_POST['pass2']));
            

        $debug = array();
        if(empty($admin) || strlen($admin) < 5) array_push($debug,"Username is Required And Minimum Length 5");
        if(empty($pass1) || strlen($pass1) < 5) array_push($debug,"Password is Required And Minimum Length 5");
        if($pass1 != $pass2) array_push($debug,"The two passwords do not match");
            
        if(count($debug) == 0){
            $pass1 = md5($pass1);
            $var = $email;
            $date_reg = date("Y-m-d");
            $col = array("name","password","email","reg_day","lvl");
            $val = array($admin,$pass1,$email,$date_reg,"0");
            $db->Insert("admin",$col,$val);
            $db->Insert("items",array("title","item1"),array("script_hash",$hash));
            $_SESSION['var'] = $var;
            $_SESSION['hash'] = $hash;
            $_SESSION['istall'] = 4;
            echo '<script>window.location.href="finish"</script>';
        }else{
            for($i=0;$i<count($debug);$i++){
                Alert($debug[$i],"100%");
            }
        }


        
    }

    
    // pages of members
    $ar_page = array("start" => "start",
                    "database" => "database",
                    "build" => "build",
                    "admin" => "admin",
                    "finish" => "finish"
    );

    if(array_key_exists($page,$ar_page)){
        include $ar_page[$page].'.php';
    }

 include 'script.php';

?>