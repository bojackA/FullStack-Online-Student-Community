<?php
$conn = mysqli_connect("localhost", "root", "", "file_upload");
$sql = "SELECT * FROM files";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_POST['save']))
{
    $filename= $_FILES['myfile']['name'];
    $destination ="uploads/" ;
    $extension = pathinfo($filename,PATHINFO_EXTENSION);
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    $movefile=move_uploaded_file ($file,$destination . $filename);
    if(!in_array($extension,['zip','pdf','png'])){ ?>
<script>
  function showAlert() {
    alert (" Your file extenstion mush be .zip .pdf .png");
    }
  </script><body onload="showAlert()">
  
   <?php } 
elseif($_FILES['myfile']['size'] >1000000)
{
    ?>
<script>
  function showAlert() {
    alert (" Your file is to large");
    }
  </script><body onload="showAlert()">
  
   <?php } 
else
{
    if($movefile)
    {
    
       $sql = "INSERT IGNORE INTO `files`(`name`, `size`, `downloads`,`idf`)
        VALUES ('$filename','$size',0,0)
        ";
        if(mysqli_query($conn,$sql)){?>
        <script>
          function showAlert() {
            alert ("file uploaded");
            }
          </script><body onload="showAlert()">
          
           <?php } 
    else {?>
        <script>
          function showAlert() {
            alert ("failed to upload file");
            }
          </script><body onload="showAlert()">
          
           <?php } 

     
    }
}   
} 



if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
 
   
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);
 
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];
 
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' .
         basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);
 
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        $updateQuery = "UPDATE files SET idf=1 WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}




?>