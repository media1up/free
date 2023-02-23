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
    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new user();
        $debug = $user->login($username,$password);
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
    <title><?php echo UPPER_1ST_ELEMENT("login");?></title>
    <link href="<?php echo $settings["favicon"]?>" type="image/x-icon" rel="icon" />
  </head>
  <body>
    
    <section class="login-content">
     
      <div class="login-box" style="margin-top: -10%;height:430px">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i><?php echo $lang['sign_in']?></h3>
          <div class="form-group">
            <label class="control-label"><?php echo $lang['username']?></label>
            <input class="form-control" type="text" placeholder="Username" name="username" >
            
          </div>
          

          <div class="form-group">
            <label class="control-label"><?php echo $lang['password']?></label>
            <input class="form-control" type="password" placeholder="Password" name="password" >
            
          </div>
          
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text"><?php echo $lang['stay_signed_in']?></span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="forgot-password" data-toggle="flip"><?php echo $lang['forgot_password?']?></a></p>
            </div>
            
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name ="login" id="error"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN<?php echo $lang['sign_in']?></button>
          </div>
          <br>
          <center><p class="semibold-text mb-2"><a href="register" data-toggle="flip"><?php echo $lang['register_new']?></a></p></center>
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
  </body>
</html>