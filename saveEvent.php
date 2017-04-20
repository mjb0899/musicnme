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

$stmt1=prepare("Select uid from users where username=?");
$stmt->bind_param('s',$sess);
$stmt-> execute();
$stmt-> store_result();
$stmt->bind_result($col1);
while ($stmt->fetch()) {
    $uid = $col1;
}







$sql="INSERT INTO events (uid,ename,edesc,edate,etime) VALUES ('$uid','$ename','$edesc','$date','$time')";

if(mysqli_query($db,$sql)){
echo 1;
echo $date;
}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
header("location:createEvent.php");
