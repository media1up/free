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
    if(isset($_POST['reset-password'])){

        $username = $_POST['username'];
        $email = $_POST['email'];

        $user = new user();
        $debug = $user->ResetPassword($username,$email);
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
    <title><?php echo UPPER_1ST_ELEMENT($lang['forgot_password']);?></title>
  </head>
  <body>
    
    <section class="login-content">
     
      <div class="login-box" style="margin-top: -10%;height:430px">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i><?php echo $lang['forgot_password']?></h3>
          <div class="form-group">
            <label class="control-label"><?php echo $lang['username']?></label>
            <input class="form-control" type="text" placeholder="Username" name="username" >
            
          </div>
          

          <div class="form-group">
            <label class="control-label"><?php echo $lang['email']?></label>
            <input class="form-control" type="email" placeholder="Email" name="email" >
            
          </div>
          
         <br>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name ="reset-password" id="error"><i class="fa fa-sign-in fa-lg fa-fw"></i><?php echo $lang['reset_password']?></button>
          </div>
          <br>
          <center><p class="semibold-text mb-2"><a href="login" data-toggle="flip"><?php echo $lang['back_login']?></a></p></center>
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
      		title: " Your password was submitted to your e-mail address. <br> <center>If it’s not in your inbox, check your spam folder.</center>",
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