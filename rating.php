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
$topic_id=$_POST['id'];
$tid_array = explode('_',$topic_id);
$tid=15;




include ("dbConnect.php");


$sql_query = "Select uid from users WHERE username='$sess'";
$result = $db -> query($sql_query);
while($row = $result -> fetch_array()) {
    $uid = $row['uid'];

}



if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $db->real_escape_string($_POST['rate']);

// check if user has already rated
    $sql = "SELECT rid,tid FROM tbl_rating WHERE user_id='" . $uid . "'";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['rid'];
    } else {

        $sql = "INSERT INTO tbl_rating ( rate,tid,uid) VALUES ('$rate','$tid','$uid'); ";
        if (mysqli_query($db, $sql)) {
            echo "0";
        }
    }
}