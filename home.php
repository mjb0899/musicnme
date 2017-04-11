<?php
session_start();
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PageOutline</title>
    <!--AUDIO CSS-->

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/audio.css">

    <!--MENUBAR CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">

    <style>


    </style>




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
                    <li class="active"><a href="home.php">Home</a></li>
                    <li><a href="#">Share Music</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="audio.html">Get In Touch</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li  <?php if(isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#"><span class="glyphicon glyphicon-user" ></span> Sign Up</a></li>
                    <li <?php if(isset($sess)) { ?>style="display:none;"<?php } ?>><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
    <div class="out-wrapper">
        <div class="out">
            <div class="one">
                <h1>morris</h1>
            </div>
            <div class="two">
                <div class="share">
                    <div class="share_align">
                        <div class="container">
                            <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#home">Create a Post</a></li>
                                <li><a data-toggle="pill" href="#menu1">Share Image</a></li>
                                <?php if(isset($sess,$artist)){ echo ' <li><a data-toggle="pill" href="#menu2">Share Music</a></li>';}?>
                                <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <form method="post" action="savepost.php">

                                        <textarea class="form-control" rows="2" id="comment" name="status" placeholder="What's on your mind?"></textarea>
                                        <button type="sumbit" class="btn btn-default" id="button_col">Post</button>

                                    </form>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="2" id="comment" name="description_text"  placeholder="Say something about your post"></textarea>
                                            <label for="exampleInputFile" >File input</label>
                                            <input type="file" id="exampleInputFile" name="file" >
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>

                                        <button type="submit" class="btn btn-default" id="button_col" name="submit">Post</button>
                                    </form>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">Title</span>
                                                <input id="msg" type="text" class="form-control " name="songtitle"  placeholder="Give a title for your music">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">Artist</span>
                                                <input id="msg" type="text" class="form-control" name="songartist"  placeholder="Give the Artist name">
                                            </div>
                                            <textarea class="form-control" rows="2" id="comment" name="description_text" placeholder="Say something about your post"></textarea>
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile" name="file">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <button type="submit" class="btn btn-default" id="button_col" name="submit">Post</button>
                                    </form>
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <h3>Menu 3</h3>
                                    <audio controls>
                                        <source src="http://www.w3schools.com/html/horse.ogg" type="audio/ogg" />
                                        <source src="http://www.w3schools.com/html/horse.mp3" type="audio/mpeg" />
                                        <a href="http://www.w3schools.com/html/horse.mp3">horse</a>
                                    </audio>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="feed">
                    <h1><?php echo $sess; ?></h1>
                    <h1><?php echo $user; ?></h1>
                    <h1><?php echo $artist; ?></h1>

                    <?php

                    include('dbConnect.php');

                    $sql_query = "Select * from post_info ORDER BY dateposted DESC ";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()){
                        $post_owner= $row['username'];
                        $status= $row['description'];
                        $file_name= $row['file_name'];
                        $file_path=$row['path'];
                        $file_title=$row['title'];
                        $file_type=$row['file_type'];
                        $profile_pic=$row['profile_image'];



                        echo $post_owner;
                        echo $file_title;
                        echo $file_path;
                        echo $profile_pic;

                        //upload status
                        if($file_title==="status"){
                            echo "<div style='border-bottom: 2px solid red;'>
                                <div class=\"media\">
                                        <div class=\"media-left\">
                                            <img src='.$profile_pic.' class=\"media-object\" style=\"width:60px\">
                                        </div>
                                        <div class=\"media-body\">
                                             <h4 class=\"media-heading\">$post_owner</h4>
                                               <p>$status</p>
                                         </div>
                                 </div>
                              </div>";
                        }
                        $allowed_image = array('jpg','jpeg','png');
                        $allowed_media = array('mp4','mp3');

                        //upload music
                        if($file_title==="upload") {
                            if(in_array($file_type,$allowed_image)) {
                                echo "IN IMAGE LOOP";
                                echo "<div style='border-bottom: 2px solid red;'>
                                <p><strong>{$post_owner}</strong><br>
                              <strong>{$status}</strong><br>
                              <strong>{$file_name}</strong><br></p>
                              </div>";







                            }elseif(in_array($file_type,$allowed_media)){
                                echo "IN MEDIA LOOP";
                                echo "<div style='border-bottom: 2px solid red;'>
                              <p><strong>{$post_owner}</strong><br>
                              <strong>{$status}</strong><br>
                              <strong>{$file_name}</strong><br></p>
                              
                              
                              <audio controls>
                                         <source src=\"$file_path\" type=\"audio/mpeg\">
                                </audio>
                              
                              
                              
                              
                              </div>";
                            }
                        }





                    }




                    ?>























                </div>

            </div>
        </div>
    </div>

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
