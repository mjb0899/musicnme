<?php
include ("dbConnect.php");

if(empty($_POST["username"])||empty($_POST["password"])){
    echo "both fields required";
}
else{
    $username=$_POST["username"];
    $password=$_POST["password"];
}

$sql="SELECT uid FROM users WHERE username='$username'and upassword='$password'";

$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
    header("location:home.php");
}
else{
    echo "Incorrect Username";
}