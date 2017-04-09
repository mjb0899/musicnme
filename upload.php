<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 09/04/2017
 * Time: 16:13
 */
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
            if($fileSize<1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination='uploads/images/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location:index.php");
            }else{
                echo "File too big";
            }
        }else{
            echo "Something went wrong with your file";
        }
    }elseif(in_array($fileActualExt,$allowed_media)) {
        //upload for music
        if($fileError===0){
            if($fileSize<1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination='uploads/images/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location:index.php");
            }else{
                echo "File too big";
            }
        }else{
            echo "Something went wrong with your file";
        }

    }
    else{
        echo $fileName."-";
        echo $fileActualExt."+";
        echo $fileExt;
        echo "you cannot upload files of this type";
    }


}