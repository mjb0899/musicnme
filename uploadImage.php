<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 13/04/2017
 * Time: 18:27
 */
session_start();
$sess=$_SESSION['name'];
$user=$_SESSION['user'];
$artist=$_SESSION['artist'];

include("dbConnect.php");

if(isset($_POST['submit'])){
    //file variables
    $file = $_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
    $fileExt= explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));


    //allowed images
    $allowed_image = array('jpg','jpeg','png');


    if(in_array($fileActualExt,$allowed_image)){
        if($fileError===0){
            if($fileSize<3097152){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination='uploads/images/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                //insert
                //get uid
                $sql_query = "UPDATE users SET profile_image='$fileDestination' Where username='$sess'";
                $result = $db -> query($sql_query);
                if(mysqli_query($db,$sql)){

                }
                else{
                    echo"Error:".$sql."<br>" . mysqli_error($db);
                }
                header("Location:userprofile.php");

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