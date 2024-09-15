<?php
include("../php/config.php");
if(isset($_GET['did'])){
    $id = $_GET['did'];
    $delete = mysqli_query($conn, "DELETE FROM posts WHERE postid  = '$id'  ");
    header("Location: ../Profile/Profile.php");
}

?>