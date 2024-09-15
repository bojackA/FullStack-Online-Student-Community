<?php
session_start();

include_once "config.php";



if(isset($_POST['posts'])){
    $text = $_POST['content'];
    $id=$_SESSION['unique_id'];
    $ran_id = rand(time(), 100000000);
    $ran = rand(time(), 100000000);

        $imgFile = $_FILES['pics']['name'];
		$tmp_dir = $_FILES['pics']['tmp_name'];
		$imgSize = $_FILES['pics']['size'];
    
    
   if(empty($imgFile)){
        $sql = "INSERT INTO posts(psid,pid,text) 
    VALUES('$ran_id','$id','$text')";
    

        $result = mysqli_query($conn, $sql);

        if ($result) {
            
            header("Location: ../mainpage2/main.php");
        } else {
           
            header("Location: ../mainpage2/main.php");
        }
    }
    
    else
    {
        $upload_dir = 'posts/';
        $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','jfif');
        $img = rand(1000,1000000).".".$imgExt;
        if(in_array($imgExt, $valid_extensions)){
            if($imgSize < 5000000)				{
                move_uploaded_file($tmp_dir,$upload_dir.$img);
            }
            else{
                $errMSG = "Sorry, Your File Is Too Large To Upload. It Should Be Less Than 5MB.";
            }
        }
        else{
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF Extension Files Are Allowed.";		
        }
    }

    if(!isset($errMSG))
    {
        $stmt = $DB_con->prepare('INSERT INTO post_img(pstid,id,text,img)
			 VALUES(:pstid,:id,:txt,:img)');
              $stmt->bindParam(':pstid',$ran);

             $stmt->bindParam(':id',$id);
		
			$stmt->bindParam(':txt',$text);
            
			$stmt->bindParam(':img',$img);

            if($stmt->execute())
			{
            $successMSG = "Successfully Posted.";
            header("Location: ../mainpage2/main.php");
        }
        else
        {
            $errMSG = "Error.";
            header("Location: ../mainpage2/main.php");
        }
    }
}
?>