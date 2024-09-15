<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
         button a{
    text-decoration: none;
    color: white;
    
    
}
button{
    cursor: pointer;
    height: 53px;
    width: 100px;
    font-size: 20px;
    font-weight:bold;
    border-radius: 7px;
    color:rgb(208, 211, 212 );
    background: rgb(40, 55, 71 );
    margin-bottom: 5px;
    margin-left: 50px;
    margin-top: 0px;
    
}
        
        .name{
    
    border-radius: 5px;
    box-sizing:content-box;
    /* border: 3px solid #0C7395 ; */
    /* font-size: 20px;
    margin-top: 30px;
    margin-left: 60px;
    margin-right: 60px;
    margin-bottom: 30px; */
    margin: 5px;
    text-align:center;
    
}
   .post{
    width:80%;
    background:#C9CBCB ;
    border-radius:10px;
   
    box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    border-radius:10px;
    padding:10px;
    margin:20px;
    margin-top: 75px;
    margin-bottom: 10px;
    margin-left: 50px;
    

}

.post .post-top{
    display:flex;
    align-items: center;
   
   
}
        .post .post-top .post-info{
    margin-left:10px;    
    font-weight: bold;
   
}

.post .post-top .post-info .name{
    cursor:pointer;
    font-size:25px;
    font-weight:bold;
    color: #000000 ;
    margin-left: 20px;  

}
.post .post-content{
    font-size:20px;
    font-weight:bold;
   padding: 40px;
    margin-left: 20px;
    background: #E8EBEC ;
    border-radius:10px;
}

        </style>

    </head>
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
<body>

<?php 
	include('../aeduser/config.php');
?>
<?php
$sql = "SELECT * FROM posts INNER JOIN users ON users.unique_id=posts.pid";
$result = mysqli_query($conn,$sql);
?>
<?php if(mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_array($result))
    {
        ?>
         <div class="post">
        <!-- name -->
        <div class="post-top">
        <div class="post-info">
        <p class="name"><?php echo $row['fname'];  ?></p><br>
        </div> 
        </div>
        <!-- post -->
        <div class="post-content"> 
         <?php echo $row['text']; ?> <br>
        </div>
        </div>
        <!-- button -->
        <a  href="deletepost.php?id=<?php echo $row['postid']; ?>" onclick="return confirm('Are you sure you want to Delete  this?');"><button>Delete</button> </a>

    

     
     





    <?php
    }
 }

 ?>
  </body>
</html>         
        