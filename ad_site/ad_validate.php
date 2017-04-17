<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 17/04/2017
 * Time: 16:13
 */

$username=$_POST["username"];
$password=$_POST["password"];

if(($username=='lucifer')&&($password=='xxxx')){
    session_start();
    $_SESSION["ad_access"]=1;
    header("location:ad_site/ad_home.html");
    exit();
}