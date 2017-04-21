<?php
session_start();
if(!isset($_SESSION['name'])){
    header("location:index.php");
}
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];


//match content and user
$_SESSION['match']=null;

echo $_POST['owner'];

if(isset($_GET['owner'])){

    include("dbConnect.php");
    $stmt= $db->prepare("SELECT uid FROM users WHERE username= ?");
    $stmt->bind_param('s',$owner);
    $stmt-> execute();
    $stmt-> store_result();
    $stmt->bind_result($col1);

    while($stmt->fetch()) {

        echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('This Username Exists!')
                        window.location.href='pageNotFound.html';
                    </SCRIPT>");
        exit();
    }


    $owner=$_GET['owner'];
}else{
    $owner=$sess;
}
if(strcmp($sess,$owner)==0){
    $_SESSION['match']=1;
}
//check user





?>
