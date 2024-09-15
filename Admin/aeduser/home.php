<?php
	require_once 'dbcon.php';
	if(isset($_GET['delete_id']))
	{
		$stmt_select = $DB_con->prepare('SELECT img FROM users WHERE user_id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userprofile']);
		$stmt_delete = $DB_con->prepare('DELETE FROM users WHERE user_id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();	
		header("Location: home.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>CollegeCom Admin Panel</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">CollegeCom</a>
			<ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="seeposts.php">Posts</a></li>
            <li><a href="news.php">News</a></li>
             <li><a href="calender/index.php">Calender</a></li>
            <li><a href="../../php/logout.php">Log Out</a></li>
			</ul>
        </div>
    </div>
</nav>
<div class="container">
<h1 align="center">CollegeCom Admin Panel</h1>
	<div class="page-header">
    	<h1 class="h2">&nbsp; List of Users<a class="btn btn-success" href="addmember.php" style="margin-left: 770px;"><span class="glyphicon glyphicon-user"></span>&nbsp; Add Member</a></h1><hr>
    </div>
<div class="row">
<?php
	$stmt = $DB_con->prepare('SELECT user_id,unique_id,fname,lname,email,img,status FROM users ORDER BY user_id DESC');
	$stmt->execute();
if($stmt->rowCount() > 0)
{
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		extract($row);
		?>
		<div class="col-xs-3">
			<h3 class="page-header" style="background-color:cadetblue" align="center"><?php echo $fname."<br>".$email; ?></h3>
			<img src="../../php/images/<?php echo $row['img']; ?>" class="img-rounded" width="250px" height="250px" /><hr>
			<p class="page-header" align="center">
			
			<a class="btn btn-warning" href="?delete_id=<?php echo $row['user_id']; ?>" title="click for delete" onclick="return confirm('Are You Sure You Want To Delete This User?')"><span class="glyphicon glyphicon-trash"></span> Delete</a>
			</span>
			</p>
		</div>       
		<?php
	}
}
else
{
	?>
	<div class="col-xs-12">
		<div class="alert alert-warning">
			<span class="glyphicon glyphicon-info-sign"></span>&nbsp; No Data Found.
		</div>
	</div>
	<?php
}
?>
</div>
</div>
</body>
</html>