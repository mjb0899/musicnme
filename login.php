<?php
include ("dbConnect.php");

if(empty($_POST["username"])||empty($_POST["password"])){
    echo "both fields required";
}
else{
    $username=$_POST["username"];
    $password=$_POST["password"];
}

$sql="SELECT utype FROM users WHERE username= ? "."and upassword = ?";
$stmt=$db->prepare($sql);
$stmt->bind_param('ss',$username,$password);
$stmt-> execute();
$stmt->bind_result($uid);
if($row = $stmt->fetch()){
    $user_type= $row['utype'];

    echo $user_type;
    echo "<-";

    session_start();
    $_SESSION['name']=$username;

   /* if($user_type==="user"){
        $_SESSION['user'] = $user_type;
    }
    elseif ($user_type==="artist"){
        $_SESSION['artist']=$user_type;
    }
    header("location:home.php");*/
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