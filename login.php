<?php
include ("dbConnect.php");

if(empty($_GET["username"])||empty($_GET["password"])){
    echo "both fields required";
}
else{
    $username=$_GET["username"];
    $password=$_GET["password"];
}

$sql="SELECT uid FROM users WHERE username='$username'and upassword='$password'";

$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
    header("location:home.php");
}
else{
    echo "Incorrect Username";
    echo $username . $password;
}