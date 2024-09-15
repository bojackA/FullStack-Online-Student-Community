<?php
session_start();
include('config.php');



$sqls = "SELECT * FROM posts INNER JOIN users ON users.unique_id=posts.pid 
and unique_id = {$_SESSION['unique_id']}
INNER JOIN msg ON posts.pid=msg.uid
";


        $results = mysqli_query($conn,$sqls);



?>
<?php if(mysqli_num_rows($results) > 0)
{
    while ($row = mysqli_fetch_array($results))
    {
        

     ?>
      <div style="margin-left:20px ; margin-top: 10px;">
                        <div style="font-weight: bold;margin-left:-15px ; margin-top: -5px; ">
                        <label for="text"><?php echo $row['fname']; ?></label> </div>
                        
                        <a href="../comments/index.php" style="  text-decoration:underline;">Comment</a>   . <a href="" style=" text-decoration:underline;">Save</a> <br>
                        <p> <?php echo $row['msg'] ?> </p>
                        
                      
                    </div>
                </div>


<?php
    }
 } 
 ?>
                   

 