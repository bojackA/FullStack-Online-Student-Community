<?php

include('../aeduser/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM posts WHERE postid  = '$id'  ");
    header("Location: ../aeduser/deletepost.php");
}








/*
if(isset($_POST['delete'])){
    

    $sql = "DELETE FROM posts WHERE pid='" . $_GET['pid'] . "'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result))
    {
  

    if($result){
        echo "<script> alert('deleted successfully'); </script>";
    }
    else{
        echo "failed to post";
    }
}
}
*/