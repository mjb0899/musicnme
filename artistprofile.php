<?php
session_start();
$sess=$_SESSION['name'];
$owner=$_GET['owner'];
?>
<!DOCTYPE html>
<html>
<head>
    <!--MENUBAR CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <link rel="stylesheet" type="text/css" href="css/artist.css">
    <script src="js/artistjs.js"></script>
    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <!-- js-->
    <script type="text/javascript" src="js/artistjs.js"></script>
    <script src="js/artistjs.js"></script>
    <script>
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
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
<main>
  <!--  <div class="wrapper">
        <div class="wrapper_pic">
            <div class="propic" id="profile_pic">
                <img src="images/ed.jpg" id="pic">
            </div>
        </div>
        <div  class="wrapper_details">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'uploads')" id="defaultOpen">Uploads</button>
                <button class="tablinks" onclick="openCity(event, 'about')">About</button>
                <button class="tablinks" onclick="openCity(event, 'events')">Events</button>
                <button class="tablinks" onclick="openCity(event, 'followme')">Follow Me</button>
            </div>
            <div id="uploads" class="tabcontent">

            <h1>test</h1>







            </div>
            <div id="about" class="tabcontent">
                <?php
                include("dbConnect.php");
                $sql_query = "Select ufname,ulname,uemail from users Where username='$sess'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()){
                    $firstname= $row['ufname'];
                    $lastname= $row['ulname'];
                    $email= $row['uemail'];
                    echo "<h2>$firstname"." "."$lastname$owner</h2>";
                }
                ?>
                <h3>Paris</h3>
                <p>Paris is the capital of France.</p>
            </div>
            <div id="events" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
            <div id="followme" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
        </div>

    </div>-->

    <div style="width: 700px;margin-top: 100px; ">
        <?php
        $sql_query = "Select * from post_info WHERE username='$owner' ORDER BY dateposted DESC ";
        $result = $db -> query($sql_query);
        while($row = $result -> fetch_array()) {
            $post_owner = $row['username'];
            $status = $row['description'];
            $file_name = $row['file_name'];
            $file_path = $row['path'];
            $file_title = $row['title'];
            $file_type = $row['file_type'];
            $profile_pic = $row['profile_image'];
            $post_owner_type=$row['utype'];

            //upload status
            if($file_title==="status"){
                echo "<div class=\"media\">
                                         <div class=\"media-left\">
                                             <img src=\"$profile_pic\" class=\"media-object\" style=\"width:60px\">
                                         </div>
                                         <div class=\"media-body\">
                                          <h4 class=\"media-heading\">".$post_owner."</h4>
                                                <p>$status</p>
                                          </div>
                                  </div>
                                    <hr>";
            }


        }//end while





        ?>
    </div>
</main>
<script>
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
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

