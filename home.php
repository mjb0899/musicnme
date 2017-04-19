<?php

session_start();
if(!isset($_SESSION['name'])){

    header("location:index.php");

}
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];
?>
<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <!--AUDIO CSS-->

    <!--MENUBAR CSS-->
    <title>MusicAndMe</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/menubar.css">
    <!--FOOTER CSS-->
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
    <!-- Rating script and files -->
    <link rel="stylesheet" type="text/css" href="css/rating.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".demo1 .stars").click(function () {

                $.post('rating.php',{rate:$(this).val(),topic:$(this).attr('id')},function(d){
                    if(d>0)
                    {
                        alert('You already rated');
                    }else{
                        alert('Thanks For Rating');
                    }
                });
                $(this).attr("checked");
            });
        });
    </script>
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
                    <li><a href="createEvent.php">Events</a></li>
                    <li><a href="contactUs.php">Get In Touch</a></li>
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
            <div class="one">
               <div class="propic" id="profile_pic">
                   <?php

                   include("dbConnect.php");
                   $sql_query = "Select profile_image,uemail,ufname,ulname from users Where username='$sess'";
                   $result = $db -> query($sql_query);
                   while($row = $result -> fetch_array()){
                       $profile_path=$row['profile_image'];
                       $userEmail=$row['uemail'];
                       $firstName=$row['ufname'];
                       $lastName=$row['ulname'];

                       //upload profile picture
                       echo "  <img src=\"$profile_path\" id=\"pic\">
                           ";
                   }
                   ?>

               </div>
                <div class="user_display">
                    <a href="userprofile.php"><h2><?php echo $sess  ?></h2></a>
                </div>
                <div class="profile_data">
                    <!--Collapse 1-->
                    <div class="container">

                        <button type="button" class="btn btn-info" data-toggle="collapse"  data-target="#demo">Profile Details</button>
                        <div id="demo" class="collapse">
                            <div class="data_box">
                                <h4><?php echo $firstName ?></h4>
                                <h4><?php echo $lastName ?></h4>
                                <h4><?php echo $userEmail ?></h4>


                                <?php
                                    //determine type of user to redirect
                                    if(isset($user)){
                                        $red='userprofile.php';
                                    }else if(isset($artist)){
                                        $red='artistprofile.php';

                                    }

                                ?>




                             <a href="<?php echo $red?>"><span class="glyphicon glyphicon-pencil">Edit</a>


                            </div>





                        </div>
                    </div>

                    <!--Collapse 2-->
                    <div class="container collapse2">


                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Your Last Status</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <?php

                                        include("dbConnect.php");

                                        $sql_query = 'SELECT description from statuses where username='.$sess.' && title="status" ORDER BY dateposted DESC LIMIT 1';
                                        $result = $db -> query($sql_query);
                                        while($row = $result -> fetch_array()) {
                                            $description=$row['description'];
                                            echo $description;
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Rate Meter:</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Check out latest Artists</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <?php

                                        include("dbConnect.php");

                                        $sql_query = 'SELECT username from users where utype="artist" LIMIT 5';
                                        $result = $db -> query($sql_query);
                                        while($row = $result -> fetch_array()) {
                                            $new_user=$row['username'];
                                            echo '<span class="glyphicon glyphicon-headphones">'.' '.$new_user.'</span><br><br>';

                                        }



                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                    <!--End collapse 2-->

                </div>
            </div>
            <div class="two">

                    <div class="share_align">
                        <div class="container">
                            <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#home">Create a Post</a></li>
                                <li><a data-toggle="pill" href="#menu1">Share Image</a></li>
                                <?php if(isset($sess,$artist)){ echo ' <li><a data-toggle="pill" href="#menu2">Share Music</a></li>';}?>
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
                            </div>
                        </div>
                    </div>

                <div class="feed">
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
                        $post_owner_type=$row['utype'];
                        $topic_id=$row['tid'];
                        $post_hits=$row['hits'];
                        $votes=$row['votes'];

                        if($profile_pic!=null){

                        }else{
                            $profile_pic="images/default_profile.png";
                        }






                        $try="default_profile.png";

                        //check post_owner account type (user or artist)

                        if($post_owner_type==="user"){
                            $redirect="userprofile.php";
                        }elseif ($post_owner_type==="artist"){
                            $redirect="artistprofile.php";
                        }else{
                            $redirect= "www.google.com";//need check
                        }





                        //Display status post
                        if($file_title==="status"){
                            echo "<div class=\"media\">
                                            <div class=\"media-left\">
                                             <img src=\"$profile_pic\" class=\"media-object\" style=\"width:60px\">
                                         </div>
                                            <div class=\"media-body\">
                                           <a href=\"$redirect?owner=$post_owner\"><h4 class=\"media-heading\">".$post_owner."</h4></a>
                                                <p>$status</p>
                                          </div>
                                          
                                                 <div class=\"rater\" style='clear:both'>
                                                     <div style='float:left'>
                                                    <h4><span class=\"glyphicon glyphicon-heart\"></span>$post_hits</h4><h4><span class=\"glyphicon glyphicon-user\"></span>$votes</h4>
                                                     </div>
                                                  
                                                    <div class=\"ratingDiv\" style=\"float:right\">
                                                    <fieldset  class=\"rating demo1 \">
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star5\" name=\"rating\" value=\"5\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star5\" title=\"Awesome - 5 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star4\" name=\"rating\" value=\"4\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star4\" title=\"Pretty good - 4 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star3\" name=\"rating\" value=\"3\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star3\" title=\"Meh - 3 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star2\" name=\"rating\" value=\"2\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star2\" title=\"Kinda bad - 2 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star1\" name=\"rating\" value=\"1\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star1\" title=\"Sucks big time - 1 star\"></label>
                                                    </fieldset>
                                                  </div>
                                          
                                             </div> 
                                          
                                          
                                          
                                          
                                  </div>";

                        }
                        $allowed_image = array('jpg','jpeg','png');
                        $allowed_media = array('mp4','mp3');

                        //upload music
                        if($file_title==="upload") {
                            if(in_array($file_type,$allowed_image)) {
                                echo "<div class=\"media\">
                                             <div class=\"media-left\">
                                                <img src=\"$profile_pic\" class=\"media-object\" style=\"width:60px\">
                                             </div>
                                              <div class=\"media-body\">
                                                 <h4 class=\"media-heading\">$post_owner</h4>
                                                 <p>$status</p>
                                              </div>
                                    
                                             <div style='height: 100%; width: 80%; background-color: #212121;margin: auto'>
                                             <img style='height: 100%; width: 100%; object-fit: contain' src=".$file_path.">      
                                             </div>
                                             
                                              <div class=\"rater\" style='clear:both'>
                                                     <div style='float:left'>
                                                    <h4><span class=\"glyphicon glyphicon-heart\"></span>$post_hits</h4><h4><span class=\"glyphicon glyphicon-user\"></span>$votes</h4>
                                                     </div>
                                                  
                                                    <div class=\"ratingDiv\" style=\"float:right\">
                                                    <fieldset  class=\"rating demo1 \">
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star5\" name=\"rating\" value=\"5\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star5\" title=\"Awesome - 5 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star4\" name=\"rating\" value=\"4\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star4\" title=\"Pretty good - 4 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star3\" name=\"rating\" value=\"3\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star3\" title=\"Meh - 3 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star2\" name=\"rating\" value=\"2\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star2\" title=\"Kinda bad - 2 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star1\" name=\"rating\" value=\"1\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star1\" title=\"Sucks big time - 1 star\"></label>
                                                    </fieldset>
                                                  </div>
                                          
                                             </div> 
                                         
                                            
                                     </div>";//end media







                            }elseif(in_array($file_type,$allowed_media)){
                                echo "<div class=\"media\">
                                             <div class=\"media-left\">
                                                 <img src=\"$profile_pic\" class=\"media-object\" style=\"width:60px\">
                                             </div>
                                              <div class=\"media-body\">
                                                 <h4 class=\"media-heading\">$post_owner</h4>
                                                 <p>$status</p>
                                             </div>
                                  
                                             <div style='border-left:2px solid #ff3333; padding: 1rem; margin-top: 1rem;margin-left: 1rem'>
                                                  <audio controls style='width: 100%;'>
                                                  <source src=\"$file_path\" type=\"audio/mpeg\">
                                                  </audio>
                                              </div>
                                              
                                               <div class=\"rater\" style='clear:both'>
                                                     <div style='float:left'>
                                                    <h4><span class=\"glyphicon glyphicon-heart\"></span>$post_hits</h4><h4><span class=\"glyphicon glyphicon-user\"></span>$votes</h4>
                                                     </div>
                                                  
                                                    <div class=\"ratingDiv\" style=\"float:right\">
                                                    <fieldset  class=\"rating demo1 \">
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star5\" name=\"rating\" value=\"5\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star5\" title=\"Awesome - 5 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star4\" name=\"rating\" value=\"4\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star4\" title=\"Pretty good - 4 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star3\" name=\"rating\" value=\"3\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star3\" title=\"Meh - 3 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star2\" name=\"rating\" value=\"2\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star2\" title=\"Kinda bad - 2 stars\"></label>
                                                        <input class=\"stars\" type=\"radio\" id=\"$topic_id"."_star1\" name=\"rating\" value=\"1\" />
                                                        <label class = \"full\" for=\"$topic_id"."_star1\" title=\"Sucks big time - 1 star\"></label>
                                                    </fieldset>
                                                  </div>
                                          
                                             </div> 
                     
                                        </div>";//end media
                            }
                        }





                    }




                    ?>
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

