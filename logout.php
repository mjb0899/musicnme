<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 03/04/2017
 * Time: 21:53
 */
session_start();
$_SESSION['name']="";
$_SESSION['user']="";
$_SESSION['match']=0;
unset($_SESSION['name']);
unset($_SESSION['user']);
unset($_SESSION['match']);
session_destroy();
header("location:index.php");