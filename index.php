<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>PageOutline</title>
    <!--MENUBAR CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <!--INTERNAL-->
    <link rel="stylesheet" type="text/css" href="css/logincss.css">
    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>
<style>

</style>
<body>
<header>
    <!--Menu bar-->
    <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
        <div class="container-fluid" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Music&Me</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li <?php if(!isset($sess)) { ?>style="display:none;"<?php } ?>><a href="home.php">Home</a></li>
                    <li <?php if(!isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#">Share Music</a></li>
                    <li <?php if(!isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#">Events</a></li>
                    <li><a href="#">Get In Touch</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--MAIN PAGE-->
<main >
    <div class="wrapper">
        <div class="welcometext">
            <h1> Welcome</h1>
        </div>
        <div id="ack">
            <p style="color: red;"> <?php if(!empty($_SESSION['errmsg'])) { echo $_SESSION['errmsg']; } ?></p>
        </div>
        <?php unset($_SESSION['errmsg']); ?>
        <form action="login.php" method="post">
            <div class="rad" style="text-align: center;">
            <label class="radio-inline">
                <input type="radio" name="utype" checked value="user">User
            </label>
            <label class="radio-inline">
                <input type="radio" name="utype" value="artist">Artist
            </label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
            <div class="buttonholder">
                <input type="submit" class="btn btn-default" id="loginbtn" value="Login">
            </div>
        </form>
    </div>
</main>
<!--FOOTER-->
<footer class="foot">
    <div class="footer_left" >
        <h1>Music&Me</h1>
    </div>
    <div class="footer_right" >
        <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/PLACEHOLDER"><img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png" border=0></a>
        <a target="_blank" title="follow me on Twitter" href="http://www.twitter.com/PLACEHOLDER"><img alt="follow me on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter30x30.png" border=0></a>
        <a target="_blank" title="follow me on instagram" href="http://www.instagram.com/PLACEHOLDER"><img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png" border=0></a>
    </div>
    <div class="footer_below" >
        <h5>Copyright &copy; 2017 &bull; All rights reserved &bull; Music&me.com</h5>
    </div>
</footer>
<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/03/2017
 * Time: 15:51
 */?>
</body>
</html>

