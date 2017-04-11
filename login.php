<?php
include ("dbConnect.php");

if(empty($_POST["username"])||empty($_POST["password"])){
    echo "both fields required";
}
else{
    $username=$_POST["username"];
    $password=$_POST["password"];
}
/*
$sql="SELECT utype FROM users WHERE username= ? "."and upassword = ?";
$stmt=$db->prepare($sql);
$stmt->bind_param('ss',$username,$password);
$stmt-> execute();
$stmt->bind_result($utype);
if($row = $stmt->fetch()){
    $user_type= $row['utype'];
    //$firstname=$row['ufname'];
   // echo $firstname;
    echo $user_type;
    echo "<-";

*/

    $sql_query = "SELECT utype FROM users WHERE username='$username' and upassword='$password' ";
    $result = $db -> query($sql_query);
    while($row = $result -> fetch_array()){
        $utype= $row['utype'];
       echo $utype;
        header( "refresh:5; url=index.php" );

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
}*/