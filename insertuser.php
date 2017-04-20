<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 03/04/2017
 * Time: 13:10
 */
include ("dbConnect.php");

$username=$_POST["username"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$type=$_POST['utype'];
$pass = md5($_POST["pass"]);
$allowed_utype = array('user','artist');
if(in_array($type,$allowed_utype)) {
}else{
    $type='user';
}


$stmt2 = $db->prepare("INSERT INTO users(username,upassword,uemail,ufname,ulname,utype) VALUES (?,?,?,?,?,?)");
$stmt2->bind_param('ssssss', $username,$pass,$email,$fname,$lname,$type);
$stmt2->execute();
$stmt2->store_result();
$stmt2->bind_result($col1);



try{
session_start();

    $_SESSION['name']=$username;


    if($type==="user"){
        $_SESSION['user'] = $user_type;
    }
    elseif ($type==="artist"){
        $_SESSION['artist']=$user_type;
    }else{
        header("location:index.php");

    }

    header("location:home.php");

}catch(PDOException $e)
{           header("location:index.php");
    echo "Error: " . $e->getMessage();
}

/*
$sql="INSERT INTO users(username,upassword,uemail,ufname,ulname,utype) VALUES ('$username','$pass','$email','$fname','$lname','$type')";

if(mysqli_query($db,$sql)){

}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
header("location:index.php");
?>
*/