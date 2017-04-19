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

if(isset($_POST['firstname'])){

    $sql_query = "UPDATE users SET ufname='$fname'";
    if(mysqli_query($db,$sql)){

        echo "Your changes have been Saved.";
    }
    else{
        echo"Error:".$sql."<br>" . mysqli_error($db);
    }

}

if(isset($_POST['lastname'])){

    $sql_query = "UPDATE users SET ulname='$lname'";
    if(mysqli_query($db,$sql)){

        echo "Your changes have been Saved.";
    }
    else{
        echo"Error:".$sql."<br>" . mysqli_error($db);
    }

}

if(isset($_POST['email'])){

    $sql_query = "UPDATE users SET uemail='$email'";
    if(mysqli_query($db,$sql)){

        echo "Your changes have been Saved.";
    }
    else{
        echo"Error:".$sql."<br>" . mysqli_error($db);
    }

}

if(isset($_POST['psw'])){

    $sql_query = "UPDATE users SET uemail='$pass'";
    if(mysqli_query($db,$sql)){

        echo "Your changes have been Saved.";
    }
    else{
        echo"Error:".$sql."<br>" . mysqli_error($db);
    }

}
