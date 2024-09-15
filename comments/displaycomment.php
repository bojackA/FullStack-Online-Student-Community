


<?php
session_start();
include_once "config.php";



if(isset($_POST['comment'])){
    $text = $_POST['content'];
    $uid=$_SESSION['unique_id'];
    
    

    
    

    $sql = "INSERT INTO msg(uid,msg) 
    VALUES('$uid','$text')";
    
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: allcomments.php");
    }
    else{
        echo "failed to post";
    }
}
?>
<tr>
    
    <th> Name: </th>
    <th> Post: </th>
</tr><br>

<?php

$sqls = "SELECT * FROM msg INNER JOIN users ON users.unique_id=msg.uid";
$results = mysqli_query($conn,$sqls);
?>
<?php if(mysqli_num_rows($results) > 0)
{
    while ($row = mysqli_fetch_array($results))
    {

     ?>

<tr>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row['msg'];  ?> </td>
</tr>
<?php
    }
 } 
 ?>