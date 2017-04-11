<?php
include ("dbConnect.php");

if(empty($_POST["username"])||empty($_POST["password"])){
    echo "both fields required";
}
else{
    $username=$_POST["username"];
    $password=$_POST["password"];
}

$stmt= $db->prepare("SELECT utype FROM users WHERE username= ? and upassword = ?");
$stmt->bind_param('ss',$username,$password);
$stmt-> execute();
$stmt-> store_result();
$stmt->bind_result($utype);
while ($stmt->fetch()) {
    echo $user_type;
    echo "<--";
    header("refresh:5; url=index.php");
}


/*


/*
$sql_query = "SELECT utype FROM users WHERE username='$username' and upassword='$password' ";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()){
$utype= $row['utype'];
echo $utype;
C
}


















/* session_start();
$_SESSION['name']=$username;

if($user_type==="user"){
$_SESSION['user'] = $user_type;
}
elseif ($user_type==="artist"){
$_SESSION['artist']=$user_type;
}
header("location:home.php");
header( "refresh:5; url=index.php" );

}else{
session_start();
$_SESSION['errmsg']="Invalid Credentials";
header("location:index.php");
}*/


/*$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
    header("location:home.php");
}
else{
    echo "Incorrect Username";
    echo $username . $password;
}