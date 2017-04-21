<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 17/04/2017
 * Time: 16:13
 */
if(isset($_POST))
$username=$_POST["username"];
$password=$_POST["password"];

if(($username=='lucifer')&&($password=='xxxx')){
    session_start();
    header("location:ad_home.php");
    exit();
}
else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('Invalid credentials!')
                        window.location.href='ad_login.php';
                    </SCRIPT>");
    exit();
    header("location:ad_login.php");

}
