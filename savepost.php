<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/04/2017
 * Time: 23:18
 */
session_start();
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];
$status=$_POST["status"];


try{
    if($status!=null) {
        include("dbConnect.php");
        //prepared
        $stmt1 = $db->prepare("Select uid from users where username=?");
        $stmt1->bind_param('s', $sess);
        $stmt1->execute();
        $stmt1->store_result();
        $stmt1->bind_result($col1);
        while ($stmt1->fetch()) {
            $userID = $col1;
        }
    }

    $stmt2=$db->prepare("INSERT INTO topic(description,uid,dateposted) VALUES (?,?,?)");
    $stmt2->bind_param('sis',$status,$userID,$date);
    $stmt2-> execute();
    $stmt2-> store_result();
    $stmt2->bind_result($col1);
    header("location:home.php");
}
catch(PDOException $e)
{
    if($status==null){
        echo "status Empty";
    }else{
        echo "Error: " . $e->getMessage();

    }
}










/*
if($status!=null){
                        include ("dbConnect.php");


                        //get uid of user
                        $sql_query = "Select uid from users Where username='$sess'";
                        $result = $db -> query($sql_query);
                        while($row = $result -> fetch_array()){
                                    $userID= $row['uid'];
                            }

            //prepared
                    $stmt1=$db->prepare("INSERT INTO topic(description,uid,dateposted) VALUES (?,?,?)");
                    $stmt1->bind_param(sis,'$status','$userID','$date');
                    $stmt1-> execute();
                    $stmt1-> store_result();
                    $stmt1->bind_result($col1);





             //date
                $date = date('Y-m-d H:i:s');

                            //reflect changes
                                $sql="INSERT INTO topic(description,uid,dateposted) VALUES ('$status','$userID','$date')";

                                if(mysqli_query($db,$sql)){
                                }
                                else{
                                    echo"Error:".$sql."<br>" . mysqli_error($db);
                                }
                                header("location:home.php");







    }
                    else{
                        echo "Empty Post";
                    }

*/