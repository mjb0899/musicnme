<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 16/04/2017
 * Time: 00:59
 */
include ("dbConnect.php");
session_start();
$tid=$_SESSION['top'];
$count=0;
$totalRate=0;
//get count values
$sql3="select rate from tbl_rating where tid='$tid'";
$result = $db -> query($sql3);
while($row = $result -> fetch_array()){
    $totalRate=$totalRate+$row['rate'];
    $count=$count+1;
}
$hits=($totalRate/$count);
//set count values
$sql4="UPDATE topic SET hits='$hits' where tid='$tid'";

$result = $db -> query($sql4);
if(mysqli_query($db,$sql)){

}
else{
    echo"Error:".$sql."<br>" . mysqli_error($db);
}
$_SESSION['top']=0;

