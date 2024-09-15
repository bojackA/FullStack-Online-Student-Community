<?php
session_start();
include('../../php/config.php');

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-UA-Compatible" content="IE=edg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comment</title>
        <link rel="stylesheet" href="./comment.css">
        <link rel="stylesheet" href="./file.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body>
        <header class="header">

            <a  class="logo"> <i class="fas fa-graduation-cap"></i>CollegeCom</a>
        
            <div id="menu-btn" class="fas fa-bars"></div>
        
            <nav class="navbar">
                <ul>
                    <li><a href="../../mainpage2/main.php">Home</a></li>
                </ul>
            </nav>
        
        </header>
        <section class="heading">
            <h3>Comments</h3>
            <p> <a href="#">News >></a> Comments </p>
        </section>
        <?php 
        if(isset($_GET['postid'])){
            $id = $_GET['postid'];
        
         
       
        if(isset($_POST['comment'])){
    $text = $_POST['content'];
    $uid=$_SESSION['unique_id'];
    $ran_id = rand(time(), 100000000);
   
    
    
    
    
   
    $sql = "INSERT INTO msg(ptid,uid,msg) 
    VALUES('$id','$uid','$text')";
    
    
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script> alert('Comment Added') </script> ";

    }
    else{
        echo "<script> alert('Could not add comment') </script>";
    }
}
        
 
?>

<?php
$sqls = "SELECT
*
FROM
posts p
INNER JOIN
users u
ON
u.unique_id=p.pid
LEFT JOIN
msg c
ON
p.psid=c.ptid
INNER JOIN
users uu
ON
c.uid=uu.unique_id WHERE c.ptid = $id ";
        
        
$results = mysqli_query($conn,$sqls);

?>
<?php if(mysqli_num_rows($results) > 0)
{
    while ($row = mysqli_fetch_array($results))
    {

     ?>






        <div class="comment-session">
            <div class="post-comment">
                <div class="list">
                    <div class="user">
                    <div class="user-image">  <img src="/../../php/images/<?php echo $row['img']; ?>" alt="">
                            <div class="user-meta">
                                <div class="name"><?php echo $row['fname']; ?></div>
                            
                        </div>
                    </div>
                    <div class="comment-post"><?php echo $row['msg']; ?></div>

                </div>
            </div>
            <?php
    }
 }
}
 ?>
           
            <div class="comment-box">
                <div class="user">
                    
                </div>
                <form action="" method="post">
                    <textarea name="content" id="" rows="10" placeholder="write a comment"></textarea>
                    <button name="comment" class="comment-submit">Comment</button>
                </form>
            </div>

        </div>
    </body>
</html>
