<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 19/04/2017
 * Time: 04:05
 */

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$email=$_POST['email'];
$pass=$_POST['psw'];

session_start();
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];

include("dbConnect.php");

if(isset($_POST['firstname'])){

    if($fname=!null){

        $sql = "UPDATE users SET ufname='$fname' Where username='$sess'";
        if(mysqli_query($db,$sql)){

        }
        else{
            echo"Error:".$sql."<br>" . mysqli_error($db);
        }
    }



}

if(isset($_POST['lastname'])){
    if($fname=!null) {

        $sql = "UPDATE users SET ulname='$lname' Where username='$sess'";
        if (mysqli_query($db, $sql)) {

            echo "Your changes have been Saved.";
        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($db);
        }
    }
}

if(isset($_POST['email'])){
    if($fname=!null) {

        $sql = "UPDATE users SET uemail='$email' Where username='$sess'";
        if (mysqli_query($db, $sql)) {

            echo "Your changes have been Saved.";
        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($db);
        }
    }

}

if(isset($_POST['psw'])){
    if($fname=!null) {

        $sql = "UPDATE users SET uemail='$pass' Where username='$sess'";
        if (mysqli_query($db, $sql)) {

            echo "Your changes have been Saved.";
        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($db);
        }
    }

}
