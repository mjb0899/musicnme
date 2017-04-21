<?php
include ("dbConnect.php");
$_SESSION['errmsg']=0;

if(($_POST["username"]=='admin')&&($_POST["password"]=='admin')){
    $_SESSION["dev"]='on';
    header("location:ad_site/ad_login.html?admin=1&you=fuckoff");
    exit();
}

if(empty($_POST["username"])||empty($_POST["password"])){
    echo "both fields required";
}
else{
    $username=$_POST["username"];
    $password=md5($_POST["password"]);
}




$stmt= $db->prepare("SELECT utype FROM users WHERE username= ? and upassword = ?");
$stmt->bind_param('ss',$username,$password);
$stmt-> execute();
$stmt-> store_result();
$stmt->bind_result($col1);

while ($stmt->fetch()) {

   $user_type=$col1;
    session_start();

    $_SESSION['name']=$username;
    header("refresh:5; url=index.php");

    if($user_type==="user"){
        $_SESSION['user'] = $user_type;
    }
    elseif ($user_type==="artist"){
        $_SESSION['artist']=$user_type;
    }
}

if(isset($_SESSION['name'])){
    header("location:home.php");
}
else{
    session_start();
    $_SESSION['errmsg']='INVALID CREDENTIALS';
    header("location:index.php");
}



