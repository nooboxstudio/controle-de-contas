<?php require_once('config/connection.php');?>
<!--
Author: NooBox Web Host & Design
Author URL: http://noobox.org
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Controle de Contas</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="images/icon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<!--//end-animate-->
<!----webfonts--->
<!---//webfonts---> 
<!-- Meters graphs -->
<script src="js/jquery.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 

<body class="sign-in-up">
<section>
<div id="page-wrapper" class="sign-in-wrapper">
<div class="graphs">
<div class="sign-in-form">
<div class="sign-in-form-top">
<p>Contas 1.0</p>
</div>
<div class="signin">
<div class="signin-rit">
</div>
<form action="login.php" method="post">
<div class="log-input">
<div>
<input name="email" type="text" class="user" id="email" placeholder="Seu email" />
</div>
<div class="clearfix"> </div>
</div>
<div class="log-input">
<div>
<input name="password" type="password" class="lock" id="password" placeholder="Sua senha" />
</div>
<div style="display:none;"><input type="checkbox" name="re" id="re" value="on"> <label for="re">Mantenha Conectado</label></div>
<div class="clearfix"> </div>
</div>
<center><input type="submit" name="login" value="Acessar"></center>
</form>
<?php
    if(isset($_POST['login'])){
        $username = $_POST['email'];
        $password = $_POST['password'];
         
        if(empty($username) OR empty($password)){
            echo "Fill in all the fields";
            exit();
        }
 
        //check remeber me button is set or not
        if(isset($_POST['re'])){
            $re = "on";
        }else{
            $re = "on";
        }
 
        //check username and pass
        $query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email_user='$username' AND password='$password'");
 
        if(mysqli_num_rows($query) == 1){
 
            //login the user in
            if($re == "on"){ //remember me checked
                setcookie("username",$username,time() + (86400  * 10));
            }else{ //remember me not checked
                session_start();
                $_SESSIO['username'] = $username;
            }
 
            echo "user logedin";
            header("Location: ./");
            exit();
        }
 
        echo "Invalid username and password";
        exit();
 
    }
?>	 
</div>

</div>
</div>
</div>
<!--footer section start-->
<footer>
<p>&copy 2016 Contas 1.0 . All Rights Reserved | Developer by <a href="http://noobox.org/" target="_blank">NooBox.</a></p>
</footer>
<!--footer section end-->
</section>

<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>