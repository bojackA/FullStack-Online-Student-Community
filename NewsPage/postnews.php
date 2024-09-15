<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: slateblue;  
}  
button {   
       background-color: purple;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid cyan;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    
    <center> <h1> Publish News </h1> </center>   
    <form action="../NewsPage/postnews.php" method="post">  
        <div class="container">   
            <label>Enter News: </label>   
            <input type="text" placeholder="News" name="news" required>  
           
            <button name="submitnews" type="submit">submit</button>   
            
            
        </div>   
    </form>     
    <?php
include_once "../NewsPage/config.php";

if(isset($_POST['submitnews'])){
    $news = $_POST['news'];
    $_SESSION['news'] = $news;


    $sql = "INSERT INTO news(news) VALUES('$news')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script> alert('posted successfully'); </script>";
    }
    else{
        echo "failed to post";
    }
}
?>



</body>     
</html>  