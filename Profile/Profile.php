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
    <link rel="stylesheet" href="Edit1.css">
    <title>My Profile</title>
</head>
<body>

            
    <div class="box">
    <img src="../php/images/<?php echo $row['img']; ?>" alt="">   
        
        <div class="name">
        <!-- <input type="file" name="" id="file" accept="image/*"> -->
        <!-- <label for="file">EDIT </label> -->
        <!-- <input type="text" name="" placeholder="Name"> -->
       
          
        <div><label for="text"><?php echo $row['fname']; ?> </label></div>
        <!-- <input type="email" name="" placeholder="Email"> -->
        
        <!-- <input type="password" name="" placeholder="New Password"> -->
        </div> 
        <div class="email">
            <label for="email"><?php echo $row['email']; ?></label>
        </div>
       
       
        <a href="../Profile/Edit.php"><button style="float :left;margin:5% 0 0 15%;">Edit</button></a>
       <a href="../mainpage2/main.php"> <button style="float :right;margin:5% 15% 0 0;">Home</button></a>
        <!-- post area -->
        <form action="post.php" method="post">  
        <div style="min-height: 300px ;  width: 600px; flex: 2.5;padding: 20px;padding-right: 0px;
        margin-top: 120px; ">
            <div style="border: solid thin #aaa; padding: 10px; background-color: white;margin-left: 5px;">
                <textarea name="content" cols="75" placeholder="Whats on your mind?"></textarea>
                <input onclick="return confirm('Are you sure you want to post this?');" name="posts" id="post_button" type="submit" value="Post" >
                <br>
        
            </div>
             </form>
             <!-- post -->
            <div id="post_bar"style="margin:40p;">

                <!-- post 1 -->
               
                <?php

$sqls = "SELECT * FROM posts INNER JOIN users ON users.unique_id=posts.pid 
and unique_id = {$_SESSION['unique_id']}
";


        $results = mysqli_query($conn,$sqls);



?>
<?php if(mysqli_num_rows($results) > 0)
{
    while ($row = mysqli_fetch_array($results))
    {
        

     ?>
                <!-- post2 -->
                <div id="post" style="margin-left: -2px;">
                    <div>
                    <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                    </div>
                   
                   

                     <div style="margin-left:15px ; margin-top: 75px;">
                        <div style="font-weight: bold; margin-top: -65px;text-decoration: none; ">
                            <label for="text" style ="font-size:30px; ;"> <?php echo $row['fname']; ?></label> 
                         </div>

                         
                        <div style="margin:20px ;margin-left:-5px ; font-size:22px;">
                             <h3  ><?php echo $row['text'];  ?></h3>  <br>
                        </div>
                       
                        <button onclick="location.href='../comments/comments/comment.php?postid=<?php echo $row['psid']; ?>'" type="button" 
     style=" cursor: pointer;
    height: 33px;
    width: 70px;
    font-size: 12px;
    font-weight: bold;
    border-radius: 18px;
    color:rgb(208, 211, 212 );
    background: rgb(40, 55, 71 );
    margin-bottom: 5px;"> Comment</button>

                        
<button onclick="location.href='deletepost.php?did=<?php echo $row['postid']; ?>'" type="button" onclick="return confirm('Are you sure you want to publish this item?');" style=" cursor: pointer;
    height: 33px;
    width: 70px;
    font-size: 12px;
    font-weight: bold;
    border-radius: 18px;
    color:rgb(208, 211, 212 );
    background: rgb(40, 55, 71 );
    margin-bottom: 5px;"> Delete </button> </div>
                    
                </div>


<?php
    }
 } 
 ?>
                   

</body>
</html>