<?php
session_start();
$sess=$_SESSION['name'];
$a=0;
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>About</title>
    <!--MENUBAR CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/aboutus.css">
</head>
<body>
<!--HEADER CODE-->
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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Share Music</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Get In Touch</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--MAIN CODE-->
<main>
    <div class="wrapper">
        <div class="wrapper_one">
            <h2>-Our Mission-</h2>
            <p>
                As the world’s largest music and audio platform, SoundCloud lets people discover and enjoy the greatest selection of music from the most diverse creator community on earth. Since launching in 2008, the platform has become renowned for its unique content and features, including the ability to share music and connect directly with artists, as well as unearth breakthrough tracks, raw demos, podcasts and more. This is made possible by an open platform that directly connects creators and their fans across the globe. Music and audio creators use SoundCloud to both share and monetise their content with a global audience, as well as receive detailed stats and feedback from the Music&Me community.
            </p>
            <p>
                As the world’s largest music and audio platform, SoundCloud lets people discover and enjoy the greatest selection of music from the most diverse creator community on earth. Since launching in 2008, the platform has become renowned for its unique content and features, including the ability to share music and connect directly with artists, as well as unearth breakthrough tracks, raw demos, podcasts and more. This is made possible by an open platform that directly connects creators and their fans across the globe. Music and audio creators use SoundCloud to both share and monetise their content with a global audience, as well as receive detailed stats and feedback from the Music&Me community.
            </p>
            <h3> Don't have a free account yet?</h3>
            <div class="wrapper_signup">
                <button type="button" class="log-btn"  >Create Account</button>
                <h1><?php echo $sess; ?></h1>
                <input type="button" value="Add to Cart" <?php if(empty($sess)) { ?>style="display:none;"<?php } ?>  />

            </div>
        </div>
    </div>
</main>
<!--FOOTER CODE!!-->
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

