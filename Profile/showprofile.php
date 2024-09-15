<?php
session_start();
include_once "../php/config.php";
if(isset($_GET['uid'])){
    $id = $_GET['uid'];

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_GET['uid']} and unique_id != {$_SESSION['unique_id']}");
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
        <img src="../php/images/ <?php echo $row['img']; ?>" alt="">    
        
        <div class="name">
        <!-- <input type="file" name="" id="file" accept="image/*"> -->
        <!-- <label for="file">EDIT </label> -->
        <!-- <input type="text" name="" placeholder="Name"> -->
       
          
        <div><label for="text"><?php echo $row['fname']; ?> </label></div>
        <!-- <input type="email" name="" placeholder="Email"> -->
        
        <!-- <input type="password" name="" placeholder="New Password"> -->
        </div> 
        <div class="email" style="margin-bottom: 20% ;">
            <label for="email"><?php echo $row['email']; ?></label>
            <div style="float :right;margin:10% 45% 0% 10%;">
            <a  href=""> <button >Chat</button></a>
        </div>
            
        </div>
       
       
       
       
        
       
                <?php

$sqls = "SELECT * FROM posts INNER JOIN users ON users.unique_id=posts.pid 
and unique_id = {$_GET['uid']}
";


        $results = mysqli_query($conn,$sqls);


        }
?>
<?php if(mysqli_num_rows($results) > 0)
{
    while ($row = mysqli_fetch_array($results))
    {
        

     ?>
                <!-- post2 -->
                <div id="post" style="margin-right:10px;" >
                
                    <div>
                        <img src="pic/profile_.jpg" alt=""style="width: 35px;height: 35px; margin-left: -8px; margin-top:10px ">
                    </div>
                   
                   

                     <div style="margin-left:15px ; margin-top: 75px;">
                        <div style="font-weight: bold; margin-top: -55px;text-decoration: none; ">
                            <label for="text"> <?php echo $row['fname']; ?></label> 
                         </div>

                         
                        <div style="margin:20px ; ">
                             <h3 ><?php echo $row['text'];  ?></h3>  <br>
                        </div>
                       
    <a href="../comments/comments/comment.php?postid=<?php echo $row['psid']; ?>" >
    <button style=" cursor: pointer;
    height: 33px;
    width: 70px;
    font-size: 12px;
    font-weight: bold;
    border-radius: 18px;
    color:rgb(208, 211, 212 );
    background: rgb(40, 55, 71 );
    margin-bottom: 5px;"> Comment</a>
</form>    

                        
                        </div>
                    
                </div>


<?php
    }
 } 
 ?>
                   

</body>
</html>