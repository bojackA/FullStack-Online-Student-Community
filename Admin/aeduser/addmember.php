<?php
	error_reporting( ~E_NOTICE );
	require_once 'dbcon.php';

	if(isset($_POST['btnsave']))
	{
		$ran_id = rand(time(), 100000000);
		$email = $_POST['email'];
		$lname = $_POST['lname'];
		$fname = $_POST['fname'];
		$password = $_POST['password'];
		$status = $_POST['status'];
		


		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		if(empty($fname)){
			$errMSG = "Please Enter Username.";
		}
		else if(empty($lname)){
			$errMSG = "Please Enter Your last name.";
		}
		else if(empty($email)){
			$errMSG = "Please Enter email";

	} else if (empty($password)) {
		$errMSG = "Please Enter password.";
	} else if (empty($imgFile)) {
		$errMSG = "Please Select Image File.";
	} else if (empty($status)) {
		$errMSG = "Please Enter status.";
	}
		else
		{
			$upload_dir = '../../php/images/';
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
			$stmt = $DB_con->prepare('INSERT INTO users(unique_id,fname,lname,email,password,img,status)
			 VALUES(:unid,:ufm, :ulnm, :uemail,:upass,:uimg,:ustat)');
			 $stmt->bindParam(':unid',$ran_id);
			 
			$stmt->bindParam(':ufm',$fname);
			$stmt->bindParam(':ulnm',$lname);
			$stmt->bindParam(':uemail',$email);
			$stmt->bindParam(':upass',$password);
			
			$stmt->bindParam(':uimg',$img);	
			$stmt->bindParam(':ustat',$status);
			

			if($stmt->execute())
			{
				$successMSG = "Successfully Added A New Member.";
				header("refresh:1;home.php");
			}
			else
			{
				$errMSG = "Error While Creating.";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP/MySQL Add, Edit, Delete, With User Profile.</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">Collegecom</a>
			<ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            
            <li><a href="../../php/logout.php">Log Out</a></li>
			</ul>
        </div>
    </div>
</nav>
<div class="container">
	<div>
	<h1 class="h2">&nbsp; Add New User<a class="btn btn-success" href="home.php" style="margin-left: 850px"><span class="glyphicon glyphicon-home"></span>&nbsp; Back</a></h1><hr>
    </div>
	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin: 0 300px 0 300px;border: solid 1px;border-radius:4px">
	<table class="table table-responsive">
	
    <tr>
    	<td><label class="control-label">first name</label></td>
        <td><input class="form-control" type="text" name="fname" placeholder="First Name" value="<?php echo $fname; ?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">last name</label></td>
        <td><input class="form-control" type="text" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>" /></td>
    </tr>
	
	
    <tr>
    	<td><label class="control-label">email</label></td>
        <td><input class="form-control" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Password</label></td>
        <td><input class="form-control" type="text" name="password" placeholder="Passwird" value="<?php echo $password; ?>" /></td>
    </tr>
	<tr>
    	<td><label class="control-label">Profile Picture</label></td>
        <td>
        	
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
	<tr>
    	<td><label class="control-label">status</label></td>
        <td><input class="form-control" type="text" name="status" placeholder="status" value="<?php echo $status; ?>" /></td>
    </tr>

    <tr>
        <td colspan="2" align="center"><button type="submit" name="btnsave" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp; Save</button>
        </td>
    </tr>
    </table>
</form>
</div>
</body>
</html>