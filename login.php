<?php
include ("dbConnect.php");

if(empty($_POST["username"])||empty($_POST["password"])){
    echo "both fields required";
}
else{
    $username=$_POST["username"];
    $password=$_POST["password"];
}

$sql="SELECT uid,utype FROM users WHERE username= ? "."and upassword = ?";
$stmt=$db->prepare($sql);
$stmt->bind_param('ss',$username,$password);
$stmt-> execute();
$stmt->bind_result($uid);
if($row = $stmt->fetch()){
    $usertype= $row['utype'];
    session_start();
    $_SESSION['name']=$username;
    echo $usertype;

    if($usertype==="user"){
        $_SESSION['user'] = $usertype;
    }
    elseif ($usertype==="artist"){
        $_SESSION['artist']=$usertype;
    }
   // header("location:home.php");
    header( "refresh:5; url=index.php" );

}else{
    session_start();
    $_SESSION['errmsg']="Invalid Credentials";
    header("location:index.php");

}


/*$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
    header("location:home.php");
}
else{
    echo "Incorrect Username";
    echo $username . $password;
}*/