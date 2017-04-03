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
$pass=$_POST["pass"];

$sql="INSERT INTO users(username,upassword,uemail,ufname,ulname) VALUES ('$username','$pass','$email','$fname','$lname')";

if(mysqli_query($db,$sql)){

}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
header("location:index.php");
?>