<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 16/04/2017
 * Time: 23:22
 */
session_start();
$sess=$_SESSION['name'];
$date=$_POST['date'];
$time=$_POST['time'];
$ename=$_POST['eventName'];
$edesc=$_POST['eventDesc'];
include ("dbConnect.php");

$sql="Select uid from users where username='$sess'";
$result = $db -> query($sql);
while($row = $result -> fetch_array()){
    $uid= $row['uid'];
}

$sql="INSERT INTO events (uid,ename,edesc,edate,etime) VALUES ('$uid','$ename','$edesc','$date','$time')";

if(mysqli_query($db,$sql)){
echo 1;
}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
