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

    if($status!=null){
                        include ("dbConnect.php");
                        //get uid of user
                        $sql_query = "Select uid from users Where username='$sess'";
                        $result = $db -> query($sql_query);
                        while($row = $result -> fetch_array()){
                                    $userID= $row['uid'];
                            }

                            $date = date('Y-m-d H:i:s');

                            //reflect changes
                                $sql="INSERT INTO topic(description,uid,dateposted) VALUES ('$status','$userID','$date')";

                                if(mysqli_query($db,$sql)){
                                }
                                else{
                                    echo"Error:".$sql."<br>" . mysqli_error($db);
                                }

                                echo 1;

                    }
                    else{
                        echo "Empty Post";
                    }

