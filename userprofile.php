<?php
session_start();
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];

$owner=$_GET['owner'];

if(strcmp($sess,$owner)==0){
    $_SESSION['match']=1;
}
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
<style>
    .btn-place{
        margin: auto;
    }
    .container{
        padding: 1rem;
    }
</style>

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
                <?php

                include("dbConnect.php");
                $sql_query = "Select profile_image from users Where username='$owner'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()){
                  $profile_path=$row['profile_image'];
                  //upload profile picture
                  echo "  <img src=\"$profile_path\" id=\"pic\">
                           ";
                }
                ?>
                <!--Modal For Profile Pic Upload-->

                <div class="container">

                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn-place" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil">Edit</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Select File</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="uploadImage.php">
                                        <input type="file" name="file" id="exampleInputFile">
                                        <button type="submit" class="btn btn-default btn-sm"> <span class="glyphicon glyphicon-pencil">Upload</span></button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
        <div  class="wrapper_details">

            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'info')" id="defaultOpen">Info</button>
                <button class="tablinks" onclick="openCity(event, 'status')">Status</button>
                <button class="tablinks" onclick="openCity(event, 'uploads')">Uploads</button>
                <button class="tablinks" onclick="openCity(event, 'test')">TestTab</button>

            </div>

            <div id="info" class="tabcontent">
                <?php
                include("dbConnect.php");
                $sql_query = "Select ufname,ulname,uemail from users Where username='$sess'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()){
                    $firstname= $row['ufname'];
                    $lastname= $row['ulname'];
                    $email= $row['uemail'];
                    echo "<h2>$firstname"." "."$lastname$owner </h2>";
                }
                ?>
            </div>

            <div id="status" class="tabcontent">
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

                    // retrieve profile else default pic
                    if($profile_pic!=null){

                    }else{
                        $profile_pic="images/default_profile.png";
                    }


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

            <div id="uploads" class="tabcontent">
                <?php
                include("dbConnect.php");
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

                    // retrieve profile else default pic
                    if($profile_pic!=null){

                    }else{
                        $profile_pic="images/default_profile.png";
                    }

                    $allowed_image = array('jpg','jpeg','png');


                    //uploads image and music
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
                     </div>
                     <div style='height: 300px; width: 400px; background-color: #212121;margin: auto'>
                      <img style='height: 100%; width: 100%; object-fit: contain' src=".$file_path.">      
                    </div>                     
                     <hr>";
                        }
                    }
                }//end while
                ?>

            </div>
            <div id="test" class="tabcontent">
                <h1><?php  echo $sess ?></h1>
                <h1><?php echo $owner ?></h1>
                <h1><?php echo $_SESSION['match'] ?></h1>


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



