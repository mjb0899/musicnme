<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 03/04/2017
 * Time: 21:53
 */
session_start();
unset($_SESSION['dev']);
session_destroy();
var_dump($_SESSION);
//header("location:index.php");