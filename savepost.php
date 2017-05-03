<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/04/2017
 * Time: 23:18
 */
session_start();
$sess=$_SESSION['name'];

if($sess==null){
    header("location:pageNotFound.html");
}



$user=$_SESSION['user'];

$artist=$_SESSION['artist'];
$status=$_POST["status"];

$status_san=htmlspecialchars($status);


try{
    if($status!=null) {
        include("dbConnect.php");
        //prepared
        $stmt1 = $db->prepare("Select uid from users where username=?");
        $stmt1->bind_param('s', $sess);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        while ($stmt1->fetch()) {
            $userID = $col1;
        }
    }
    //get date
    $date = date('Y-m-d H:i:s');


    $stmt2=$db->prepare("INSERT INTO topic(description,uid,dateposted) VALUES (?,?,?)");
    $stmt2->bind_param('sis',$status_san,$userID,$date);
    $stmt2-> execute();
    $stmt2-> store_result();
    $stmt2->bind_result($col1);
    header("location:home.php");
}
catch(PDOException $e)
{
    if($status==null){

        echo "status Empty";

    }else{
        echo "Error: " . $e->getMessage();

    }
}





