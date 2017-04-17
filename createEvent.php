<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 16/04/2017
 * Time: 15:25
 */
session_start();
$sess=$_SESSION['name'];
$acc=$_SESSION['acctype'];
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/event.css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script type="text/javascript" src="timeLib/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="timeLib/jquery.timepicker.css" />

    <script type="text/javascript" src="timeLib/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="timeLib/bootstrap-datepicker.css" />



    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>
    <script>
        $("#ajaxform").submit(function(e)
        {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax(
                {
                    url : formURL,
                    type: "POST",
                    data : postData,
                    success:function(data)
                    {
                        if(data>0){
                            alert("Event Saved!")
                        }
                    },
                    error: function(data<1){
                        alert("Event Not Saved!")

                    }
                });
            e.preventDefault();	//STOP default action
        });


    </script>


    <style>


    </style>
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
                    <li <?php if(!isset($sess)) { ?>style="display:none;"<?php } ?>><a href="home.php">Home</a></li>
                    <li <?php if(!isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#">Events</a></li>
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
<!--MAIN CODE-->
<main>
            <div class="wrapper">
                    <div class="wrapper_head">
                        <h2>Start Event:</h2>
                    </div>
                    <div class="wrapper_form">
                    <form name="ajaxform" id="ajaxform" action="saveEvent.php" method="POST">
                        <div class="form-group">
                        <label for="datepicker">Select Date:</label>
                        <input type="text" id="datepicker" name="date"><br>
                        </div>


                        <div class="demo form-group">
                            <label for="basicExample">Select Time:</label>
                            <input id="basicExample" type="text" class="time" name="time"/>
                        </div>

                        <script>
                            $(function() {
                                $('#basicExample').timepicker();
                            });
                        </script>



                        <div class="form-group">
                            <label for="name">Event Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Subject" name="eventName" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Tell People What's It About:</label>
                            <textarea  class="form-control" id="desc" placeholder="Give a short Description" name="eventDesc" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
                        <div id="alert" >Thank you for getting in touch! Our team will get back to you via email!</div>
                    </form>
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

