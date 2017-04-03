<?php
session_start();
$sess=$_SESSION['name'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PageOutline</title>

    <!--MENUBAR CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">






</head>

<body>

<header>
    <!--Menu bar-->
    <nav class="navbar navbar-inverse navbar-custom navbar-fixed-top">
        <div class="container-fluid">
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
                    <li><a href="aboutus.php">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if(isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
                    <li <?php if(isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li <?php if(isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--MAIN PAGE-->
<main>
    <div class="out-wrapper">
        <div class="out">
            <div class="one">
                <div class="one-content">
                    one content
                </div>
            </div>
            <div class="two">
                <div class="share">
                    <div class="share_align">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Check me out
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default" id="submit_btn" >Post</button>
                        </form>
                    </div>
                </div>
                <div class="feed">
                    <h1><?php echo $sess; ?></h1>
                    <h1></h1>
                    <h1> text</h1>
                    <input type="text" value="<?php echo $sess; ?>" >



                </div>

            </div>
            <div class="three">
                <div class="three-content">
                    three content
                </div>
            </div>
        </div>
    </div>
</main>

<!--FOOTER-->
<footer>

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
