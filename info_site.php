<?php

        
        $db = new database();
        $p = new Pages();
        
        if(isset($_SESSION['app_2']['reports'])){
            $_SESSION['app_2']['info'] = true;
            $p->setSettings();
            $p->addReports();
        }
        else{
            //$p = new Pages();
            $dr          = array();
            $settingName = array();
            $plans       = array();
    
            $j = 0;
            
            $result = $db->Query("SELECT * FROM setting");
            while($data = mysqli_fetch_array($result))  
            {  
                $dr[] = $data["settingvalue"];
                $settingName[] = $data["settingName"];
            }  
    
            for($i=0;$i<count($settingName);$i++){
                $index = $settingName[$i];
                $_SESSION['app_2'][$index] = $dr[$i];
            }
    
            $result_plan = $db->Query("SELECT * FROM membership_plan WHERE status='on' ORDER BY id ASC");
            while($data_plan = mysqli_fetch_array($result_plan))  
            {  
                $plans[$j]["month"]         = $data_plan["month"];
                $plans[$j]["year"]          = $data_plan["year"];
                $plans[$j]["max_size"]      = $data_plan["max_size"];
                $plans[$j]["cpm"]           = $data_plan["cpm"];
                $plans[$j]["delete_files"]  = $data_plan["delete_files"];
                $plans[$j]["remove_ads"]    = $data_plan["remove_ads"];
                $plans[$j]["download_delay"]= $data_plan["download_delay"];
                $plans[$j]["captcha"]       = $data_plan["captcha"];
                $j++;
            }  
    
            $_SESSION['app_2']['plans'] = $plans;
    
            $_SESSION['app_2']['tFiles'] = $p->TotalFiles();
            $_SESSION['app_2']['tDownloads'] = $p->TotalDownloads();
            $_SESSION['app_2']['tUsers'] = $p->TotalUsers();
            $_SESSION['app_2']['tPaid']  = getTotal_Status($db->con,"payments","amount","Complete");
    
            
            $_SESSION['j'] = 0;
            $_SESSION['app_2']['demo'] = false;
            $_SESSION['app_2']['reports'] = true;
    
            // add in settings
            $_SESSION['app_2']['currency_code'] = "USD";
            $_SESSION['app_2']['extensions']    = array('apk','txt','doc','docx','rtf','ppt','xls','pdf','jpeg','jpg','gif','png','tif','bmp',
                                                            'avi','mpeg','mpg','mov','rm','3gp','flv','mp4','zip','rar','mp3','wav','wma');

        }

       
        
?>