<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Ask Question </title>  
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
    <center> <h1> Send comment </h1> </center>   
    <form action="../comments/displaycomment.php" method="post">  
        <div class="container">   
            <label>Enter Comment: </label>   
            <input type="text" placeholder="Insert Comment" name="content" required>  
            
           
            <button name="comment" type="submit">submit</button>   
            
            
        </div>   
    </form>     
</body>     
</html>  