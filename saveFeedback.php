<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 16/04/2017
 * Time: 15:31
 */
session_start();
$sess=$_SESSION['name'];
$desc=$_POST['description'];
$subject=$_POST['subject'];

$sql="Select uid from users where username='$sess'";
$result = $db -> query($sql);
while($row = $result -> fetch_array()){
    $uid= $row['uid'];
}

$sql="INSERT INTO user_issue (subject,description,uid) VALUES ('$subject','$desc','$uid')";

if(mysqli_query($db,$sql)){

}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
header("location:contactUs.php");