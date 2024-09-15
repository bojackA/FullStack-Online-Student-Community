<?php
session_start();
include_once "../php/config.php";

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
        
            

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Edit.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="box">
	<form method="post" enctype="multipart/form-data" action="" >
	
	<p> <img src="../php/images/<?php echo $row['img']; ?>" alt=""></p>
        <input type="file" name="nimg" id="file" accept="image/*">
        <label for="file">Change </label>
       
        <input type="text" name="nname" placeholder="New Name" required>
        <!-- <label for="text">Name </label> -->
        <input type="email" name="nemail" placeholder="New Email" required>
        <input type="password" name="npass" placeholder="New Password" required>

       
       
        <button  name="Update" style="float :left;margin:20% 0 0 36.2%;">Update</button>
</form>
        <!-- <button style="float :right;margin:10% 15.2% 0;">LogOut</button> -->
        
    </div>
</body>
</html>
<?php

 if(isset($_POST['Update']))
 {
    $id=$_SESSION['unique_id'];
    $fname=$_POST['nname'];
    $password=$_POST['npass'];
    $email=$_POST['nemail'];

		$imgFile = $_FILES['nimg']['name'];
		$tmp_dir = $_FILES['nimg']['tmp_name'];
		$imgSize = $_FILES['nimg']['size'];
		if($imgFile)
		{
			$upload_dir = '../php/images/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			$userprofile = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize <  5000000)
				{
					
					move_uploaded_file($tmp_dir,$upload_dir.$userprofile);
				}
				else
				{
					$errMSG = "Sorry, Your File Is Too Large To Upload. It Should Be Less Than 5MB.";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF Extension Files Are Allowed.";		
			}	
		}
		else
		{
			$userprofile = $edit_row['img'];
		}




    $select= "select * from users where unique_id='$id'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['unique_id'];
    if($res === $id)
    {
   
       $update = "UPDATE users SET  fname='$fname',email='$email',password='$password', img='$userprofile' where unique_id='$id'";
       $sql2=mysqli_query($conn,$update);
if($sql2)
       { 
           /*Successful*/
		   echo "<script> alert('successfully changed'); </script>";
           header('location:profile.php');
       }
       else
       {
			echo "<script> alert('there is an error'); </script>";
           /*sorry your profile is not update*/
           header('location:Edit.php');
       }
    }
    else
    {
        /*sorry your id is not match*/
		echo "<script> alert('id does not match'); </script>";
        header('location:Edit.php');
    }
 }
?>