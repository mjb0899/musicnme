<?php

/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 09/04/2017
 * Time: 16:13
 */
session_start();
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];
$description=$_POST['description_text'];
$songartist=$_POST['songartist'];
$songtitle=$_POST['songtitle'];


$upload="upload";
$date = date('Y-m-d H:i:s');

include("dbConnect.php");

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
    $fileExt= explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed_image = array('jpg','jpeg','png');
    $allowed_media = array('mp4','mp3','txt');
    //upload for images
    if(in_array($fileActualExt,$allowed_image)){
        if($fileError===0){
            if($fileSize<3097152){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination='uploads/images/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                //insert
                //get uid
                $sql_query = "Select uid from users Where username='$sess'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()){
                    $userID= $row['uid'];
                }


                $upload="upload";
                $date = date('Y-m-d H:i:s');
                //insert into topic
                $sql="INSERT INTO topic(description,uid,dateposted,title,file_type,path,file_name) VALUES ('$description','$userID','$date','$upload','$fileActualExt','$fileDestination','$fileNameNew')";
                if(mysqli_query($db,$sql)){

                }
                else{
                    echo"Error:".$sql."<br>" . mysqli_error($db);
                }

                header("Location:home.php");







                header("Location:home.php");
            }else{
                echo "File too big";
            }
        }else{
            echo "Something went wrong with your file";
        }
    }elseif(in_array($fileActualExt,$allowed_media)) {
        //upload for music
        if($fileError===0){
            if($fileSize<12097152){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination='uploads/media/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                //insert
                //get uid
                $sql_query = "Select uid from users Where username='$sess'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()){
                    $userID= $row['uid'];
                }

                //insert into topic
                $sql="INSERT INTO topic(description,uid,dateposted,title,file_type,path) VALUES ('$description','$userID','$date','$upload','$fileNameNew','$fileDestination')";
                if(mysqli_query($db,$sql)){

                }
                else{
                    echo"Error:".$sql."<br>" . mysqli_error($db);
                }
                //insert into music
                $sql2="INSERT INTO music(music_name,artist,file_name) VALUES ('$$songtitle','$songartist','$fileNameNew')";
                if(mysqli_query($db,$sql2)){

                }
                else{
                    echo"Error:".$sql."<br>" . mysqli_error($db);
                }

                header("Location:home.php");

            }else{
                echo "File too big";
            }
        }else{
            echo "Something went wrong with your file";
        }

    }
    else{

        echo "You cannot upload files of this type";
    }


}