

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <!--MENUBAR CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <!--PAGE CSS-->
    <link rel="stylesheet" type="text/css" href="css/registration.css">
    <script type="text/javascript" src="menubar.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="jquerynew.js"></script>
    <script src="js/index.js"></script>
</head>
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
<main>
    <div class="wrapper">

    <form action="insertuser.php" method="post">
        <div class="container">
            <h2>  Join Our Family </h2>

            <div class="rad" style="text-align: center;">
                <label class="radio-inline">
                    <input type="radio" name="utype" checked value="user">User
                </label>
                <label class="radio-inline">
                    <input type="radio" name="utype" value="artist">Artist
                </label>
            </div>
            <label><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fname" required>
            <label><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lname" required>
            <label><b>Select a username</b></label>
            <input type="text" placeholder="Select a username" name="username" required>
            <label><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
            <label><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            <input type="checkbox" checked="checked"> Remember me
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>

    </div>
</main>
<footer>
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
</body>
</html>

