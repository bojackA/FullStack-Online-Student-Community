<?php
$conn = mysqli_connect("localhost","root","","file_upload") ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>