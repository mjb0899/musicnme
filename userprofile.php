<?php
session_start();
$sess=$_SESSION['name'];
$acc=$_SESSION['acctype'];

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


    <link rel="stylesheet" type="text/css" href="css/user.css">
    <script src="js/artistjs.js"></script>


    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">


</head>
<body>

<header>
    <!--Menu bar-->
    <nav class="navbar navbar-inverse navbar-custom">
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
                    <li class="active"><a href="home.php">Home</a></li>
                    <li><a href="#">Share Music</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Get In Touch</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if(isset($sess)) { ?>style="display:none;"<?php } ?>><a href="registration.php"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
                    <li <?php if(isset($sess)) { ?>style="display:none;"<?php } ?>><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php if(isset($sess,$user)){ echo '<li ><a href="userprofile.php"><span class="glyphicon glyphicon-headphones"></span>'.$sess.'</a></li>';}?>
                    <?php if(isset($sess,$artist)){ echo '<li ><a href="artistprofile.php"><span class="glyphicon glyphicon-headphones"></span>'.$sess.'</a></li>';}?>
                    <li <?php if(!isset($sess)) { ?>style="display:none;"<?php } ?> ><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!--MAIN PAGE-->
<main>
    <div class="wrapper">
        <div class="wrapper_pic">
            <div class="propic" id="profile_pic">
                <img src="images/ed.jpg" id="pic">
            </div>
        </div>
        <div  class="wrapper_details">

            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'info')" id="defaultOpen">Info</button>
                <button class="tablinks" onclick="openCity(event, 'likes')">Likes</button>
                <button class="tablinks" onclick="openCity(event, 'saved')">Saved Music</button>
            </div>

            <div id="info" class="tabcontent">
                <h3>London</h3>
                <p>London is the capital city of England.</p>
            </div>

            <div id="likes" class="tabcontent">
                <h3>Paris</h3>
                <p>Paris is the capital of France.</p>
            </div>

            <div id="saved" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
        </div>


    </div>
</main>

<!--FOOTER-->

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
<script>
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

</script>

<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/03/2017
 * Time: 15:51
 */?>
</body>
</html>



