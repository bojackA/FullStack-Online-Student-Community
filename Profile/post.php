<?php
session_start();
include_once "../php/config.php";



if(isset($_POST['posts'])){
    $text = $_POST['content'];
    $id=$_SESSION['unique_id'];
    $pic = $_POST['pic'];
    $ran_id = rand(time(), 100000000);


    if (empty($pic)) {


        $sql = "INSERT INTO posts(psid,pid,text) 
    VALUES('$ran_id','$id','$text')";

        $result = mysqli_query($conn, $sql);
        

        if ($result) {
            
            header("Location: ../Profile/Profile.php");
        } else {
            
            header("Location: ../Profile/Profile.php");
        }
    }
    else {
        $sql2 = "INSERT INTO post_img(id,text,img) 
    VALUES('$id','$text','$pic')";
    
    $result2 = mysqli_query($conn, $sql2);
    

    if ($result2) {
        echo "<script> alert('posted successfully'); </script>";
    } else {
        echo "failed to post";
    }

    }
}