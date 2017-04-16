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
$_SESSION['top']=$tid;

$sql_query = "Select uid from users WHERE username='$sess'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $uid = $row['uid'];
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
            include 'hitGen.php';
            echo "0";
        }

    }
}