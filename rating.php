<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 15/04/2017
 * Time: 13:58
 */


/*
 *  Simple Rating System using CSS, JQuery, AJAX, PHP, MySQL
 *  Downloaded from Devzone.co.in
 */

session_start();
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];
include ("dbConnect.php");

$topic=$_POST['topic'];
$topic_array=explode('_',$topic);
$tid=$topic_array[0];
$count=0;
$totalRate=0;
$sql_query = "Select uid from users WHERE username='$sess'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $uid = $row['uid'];
}   //get count values
    $sql3="select rate from uid where tid='$tid'";
    $result = $db -> query($sql3);
    while($row = $result -> fetch_array()){
        $totalRate=$totalRate+$row['rate'];
        $count=$count+1;
    }
    $hits=($totalRate/$count);
    //set count values
    $sql4="UPDATE topic SET hits=$hits where tid='$tid'";

    $result = $db -> query($sql4);
    if(mysqli_query($db,$sql)){

    }
    else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
    }





if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $db->real_escape_string($_POST['rate']);

// check if user has already rated
    $sql = "SELECT rid FROM tbl_rating WHERE uid='$uid' AND tid='$tid'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['rid'];
    } else {

        $sql2 = "INSERT INTO tbl_rating (rate,tid,uid) VALUES ('$rate','$tid','$uid')";
        if (mysqli_query($db, $sql2)) {
            echo "0";
        }

    }
}