<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 03/04/2017
 * Time: 21:53
 */
session_start();
unset($_SESSION['dev']);
unset($_SESSION['ad_access']);
session_destroy();
header("location:/../index.php");
