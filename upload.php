<?php

/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 09/04/2017
 * Time: 16:13
 */
session_start();
$sess        = $_SESSION['name'];
$user        = $_SESSION['user'];
$artist      = $_SESSION['artist'];


//Get data
$description = $_POST['description_text'];
$songartist  = $_POST['songartist'];
$songtitle   = $_POST['songtitle'];


$upload = "upload";
$date   = date('Y-m-d H:i:s');

include("dbConnect.php");

if (isset($_POST['submit'])) {
    $file          = $_FILES['file'];
    $fileName      = $_FILES['file']['name'];
    $fileTmpName   = $_FILES['file']['tmp_name'];
    $fileSize      = $_FILES['file']['size'];
    $fileError     = $_FILES['file']['error'];
    $fileType      = $_FILES['file']['type'];
    $fileExt       = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed_image = array(
        'jpg',
        'jpeg',
        'png'
    );
    $allowed_media = array(
        'mp4',
        'mp3',
        'txt'
    );
    //upload for images
    if (in_array($fileActualExt, $allowed_image)) {
        if ($fileError === 0) {
            if ($fileSize < 1) {
                $fileNameNew     = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);


                //get uid
                $stmt1 = $db->prepare("Select uid from users where username=?");
                $stmt1->bind_param('s', $sess);
                $stmt1->execute();
                $stmt1->store_result();
                $stmt1->bind_result($col1);
                while ($stmt1->fetch()) {
                    $userID = $col1;
                }

                $upload = "upload";

                $date = date('Y-m-d H:i:s');



                //preparing
                $stmt2 = $db->prepare("INSERT INTO topic(description,uid,dateposted,title,file_type,path,file_name) VALUES (?,?,?,?,?,?,?)");
                $stmt2->bind_param('sisssss', $description, $userID, $date, $upload, $fileActualExt, $fileDestination, $fileNameNew);
                $stmt2->execute();
                $stmt2->store_result();
                $stmt2->bind_result($col1);
                header("location:home.php");







            } else {
                try{
                    return;
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('File too big')
                        window.location.href='home.php';
                    </SCRIPT>");
                    exit();
                  }catch(PDOException $e){
                    echo "file too big";
                }


            }
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                         window.alert('Something went Wrong')
                        window.location.href='home.php';
                    </SCRIPT>");
            exit();
        }
    } elseif (in_array($fileActualExt, $allowed_media)) {
        //upload for music
        if ($fileError === 0) {
            if ($fileSize < 12097152) {
                $fileNameNew     = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/media/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                //insert





                //get uid
                //prepared
                $stmt1 = $db->prepare("Select uid from users where username=?");
                $stmt1->bind_param('s', $sess);
                $stmt1->execute();
                $stmt1->store_result();
                $stmt1->bind_result($col1);
                while ($stmt1->fetch()) {
                    $userID = $col1;
                }




                $stmt2 = $db->prepare("INSERT INTO topic(description,uid,dateposted,title,file_name,file_type,path) VALUES (?,?,?,?,?,?,?)");
                $stmt2->bind_param('sisssss', $description, $userID, $date, $upload, $fileNameNew, $fileActualExt, $fileDestination);
                $stmt2->execute();
                $stmt2->store_result();
                $stmt2->bind_result($col1);
                header("location:home.php");








                //insert into music metadata

                $stmt3 = $db->prepare("INSERT INTO music(music_name,artist,file_name) VALUES (?,?,?)");
                $stmt3->bind_param('sss', $songtitle, $songartist, $fileNameNew);
                $stmt3->execute();
                $stmt3->store_result();
                $stmt3->bind_result($col1);
                header("location:home.php");





            } else {
                echo "File too big";
            }
        } else {
            echo "Something went wrong with your file";
        }

    } else {

        echo "You cannot upload files of this type";
    }


}