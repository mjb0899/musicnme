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

$stmt1=$db->prepare("Select uid from users where username=?");
$stmt1->bind_param('s',$sess);
$stmt1-> execute();
$stmt1-> store_result();
$stmt1->bind_result($col1);
while ($stmt1->fetch()) {
    $uid = $col1;
}











$sql="INSERT INTO events (uid,ename,edesc,edate,etime) VALUES ('$uid','$ename','$edesc','$date','$time')";

if(mysqli_query($db,$sql)){

}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
header("location:createEvent.php");
