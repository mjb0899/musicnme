<?php
include ("dbConnect.php");

if(empty($_POST["username"])||empty($_POST["password"])){
    echo "both fields required";
}
else{
    $username=$_POST["username"];
    $password=$_POST["password"];
}

$sql="SELECT uid FROM users WHERE username= ? "."and upassword = ?";
$stmt=$db->prepare($sql);
$stmt->bind_param('ss',$username,$password);
$stmt-> execute();
$stmt->bind_result($uid);
if($row = $stmt->fetch()){
    header("location:home.php");
}else{
    echo "Incorrect Username";
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