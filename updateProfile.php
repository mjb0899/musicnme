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

    if($fname!=null){

        //prepared
        $stmt1 = $db->prepare("UPDATE users SET ufname=? WHERE username=?");
        $stmt1->bind_param('ss', $fname, $sess);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        header("location:home.php");




        //raw
        /*
        $sql = "UPDATE users SET ufname='$fname' Where username='$sess'";
        if(mysqli_query($db,$sql)){
        }
        else{
            echo"Error:".$sql."<br>" . mysqli_error($db);
        }
        */



    }



}

if(isset($_POST['lastname'])){
    if($lname!=null) {

        //prepared
        $stmt1 = $db->prepare("UPDATE users SET ulname=? WHERE username=?");
        $stmt1->bind_param('ss', $lname, $sess);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        header("location:home.php");





    /*
        $sql = "UPDATE users SET ulname='$lname' Where username='$sess'";
        if (mysqli_query($db, $sql)) {


        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($db);
        }

   */



    }
}

if(isset($_POST['email'])){
    if($email!=null) {

        //prepared
        $stmt1 = $db->prepare("UPDATE users SET uemail=? WHERE username=?");
        $stmt1->bind_param('ss', $email, $sess);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        header("location:home.php");
    }
}

if(isset($_POST['psw'])){
    if($pass!=null) {

        $sql = "UPDATE users SET uemail='$pass' Where username='$sess'";
        if (mysqli_query($db, $sql)) {


        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($db);
        }
    }

}

if((($pass==null))&&(($email==null))&&(($fname==null))&&(($lname==null))){
    echo 0;
}
else{
    echo 1;
}

