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

$topic=$_GET['topic'];
$topic_array=explode('_',$topic);
$tid=$topic_array[0];

$sql_query = "Select uid from users WHERE username='$sess'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $uid = $row['uid'];
}



if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $db->real_escape_string($_POST['rate']);

// check if user has already rated
    $sql = "SELECT rid FROM tbl_rating WHERE username='$sess' AND tid='$tid'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['rid'];
    } else {

        $sql = "INSERT INTO tbl_rating (rate) VALUES ('$rate'); ";
        if (mysqli_query($db, $sql)) {
            echo "0";
        }
    }
}