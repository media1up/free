<?php
ob_start();
session_start();
    include 'functions/gFunction.php';
    include 'classes/class.user.php';
    include 'classes/database.php';
    include 'classes/class.page.php';

    if(!isset($_SESSION['app_2']['info'])) include 'info_site.php';
    include '../res/lang.php';
    $lang = $_SESSION['app_2']['lang'];

    $css="includes/css/";
    $js="includes/js/";
    $debug = array();
    $succe = array();
    if(isset($_POST['register']) && isset($_POST['check'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        $ip = Get_ip();

        $user = new user();
        $debug = $user->register($username,$email,$password,$re_password,$ip);
        if(count($debug) == 0) $user->addFirstReport(Remove_er_sql($username));
        $succe[0] = "qds";
    }

  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- main.css.php-->
    <link rel="stylesheet" type="text/css" href="<?php echo $css."main.css.php";?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $css."zero.css";?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo UPPER_1ST_ELEMENT("Register");?></title>
    <link href="<?php echo $settings["favicon"]?>" type="image/x-icon" rel="icon" />
  </head>
  <body>
    
    <section class="login-content">
     
      <div class="login-box" style="margin-top: 0px;height:620px">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i><?php echo $lang['sign_up']?></h3>
          <div class="form-group">
            <label class="control-label"><?php echo $lang['username']?></label>
            <input class="form-control" type="text" placeholder="<?php echo $lang['username']?>" name="username">
            
          </div>
          <div class="form-group">
            <label class="control-label"><?php echo $lang['email']?></label>
            <input class="form-control" type="email" placeholder="Email" name="email">
            
          </div>
          <div class="form-group">
            <label class="control-label"><?php echo $lang['password']?></label>
            <input class="form-control" type="password" placeholder="Password" name="password">
            

          </div>
          <div class="form-group">
            <label class="control-label"><?php echo $lang['password']?></label>
            <input class="form-control" type="password" placeholder="Re-Password" name="re_password">
            
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox" name="check" checked><span class="label-text"><?php echo $lang['i_agree']?> <a class="semibold-text mb-2" href="../terms" target="_blank">Terms of Service</a> <?php echo $lang['and']?> <a class="semibold-text mb-2" href="../privacy" target="_blank">Privacy Policy<a></span>
                </label>
              </div>
              
            </div>
            
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="register"><i class="fa fa-sign-in fa-lg fa-fw"></i><?php echo $lang['sign_up']?></button>
          </div>
          <br>
          <center><p class="semibold-text mb-2"><a href="login" data-toggle="flip"><?php echo $lang['already_membership']?></a></p></center>
        </form>
       
      </div>
    </section>
    <!-- Essential javascripts for application to work-->

    <script src="<?php echo $js."jquery-3.2.1.min.js";?>"></script>
    <script src="<?php echo $js."popper.min.js";?>"></script>
    <script src="<?php echo $js."bootstrap.min.js";?>"></script>
    <script src="<?php echo $js."main.js";?>"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo $js."plugins/pace.min.js";?>"></script>
    <!-- Page specific javascripts-->
    <script src="<?php echo $js."plugins/bootstrap-notify.min.js";?>"></script>
    <script src="<?php echo $js."plugins/sweetalert.min.js";?>"></script>
    
    <?php
      if(count($debug) !=0 ){
    ?>
    <script type="text/javascript">
      $('#error').ready(function(){
      	$.notify({
      		title: " Sorry ! you have errors :",
          message: "<?php
          for($i=0;$i<count($debug);$i++){
            echo "<br><span style='padding-left:20px;'>".$debug[$i]."<span>";
          }
          ?>",
      		icon: 'fa fa-exclamation-triangle' 
      	},{
      		type: "danger"
      	});
      });
      </script>
    <?php } ?>

    <?php
      if(count($succe) !=0 && count($debug) == 0){
    ?>
    <script type="text/javascript">
      $('#error').ready(function(){
      	$.notify({
      		title: " Your registration has been successful",
          message: ""
          ,
      		icon: 'fa fa-check' 
      	},{
      		type: "success"
      	});
      });
      </script>
    <?php } ?>
   
  </body>
</html>