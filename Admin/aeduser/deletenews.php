<?php

include('../aeduser/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM news WHERE nid  = '$id'  ");
    header("Location: ../aeduser/news.php");
}



