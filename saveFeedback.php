<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 16/04/2017
 * Time: 15:31
 */
session_start();
$sess=$_SESSION['name'];
$desc=$_POST['matter'];
$subject=$_POST['subject'];
include ("dbConnect.php");

try{
    $stmt1=$db->prepare("Select uid from users where username=?");
    $stmt1->bind_param('s',$sess);
    $stmt1-> execute();
    $stmt1-> store_result();
    $stmt1->bind_result($col1);
    while ($stmt1->fetch()) {
        $uid = $col1;
    }


    $stmt2=$db->prepare("INSERT INTO user_issue(subject,description,uid) VALUES (?,?,?)");
    $stmt2->bind_param('ssi',$subject,$desc,$uid);
    $stmt2-> execute();
    $stmt2-> store_result();
    $stmt2->bind_result($col1);
    header("location:contactUs.php");
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}



/*
$sql="INSERT INTO user_issue (subject,description,uid) VALUES ('$subject','$desc','$uid')";

if(mysqli_query($db,$sql)){

}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
header("location:contactUs.php");

*/