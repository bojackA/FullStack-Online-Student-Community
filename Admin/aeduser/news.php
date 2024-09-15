
<!DOCTYPE html>
<html lang="en">
<head>
<title>News</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="News.css">

 <style>
    body
{
    margin: 0;
    padding: 0;
    background-size: cover;
    font-family: sans-serif;
    display: grid;
    place-items: center;
}
  h3{
    border: #111;

  }
  button a{
    text-decoration: none;
    color: white;
    
}
button{
    cursor: pointer;
    height: 53px;
    width: 100px;
    font-size: 18px;
    font-weight: 500;
    border-radius: 7px;
    color:rgb(208, 211, 212 );
    background: rgb(40, 55, 71 );
    margin-bottom: 5px;
    
}
  .box{
  position: relative;
    width:100%;
    /* left: 2%; */
    top: 4%;

}
form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
.boxx{
    width: 1270px;
  
    display:flex;
    justify-content:center;
    align-items: center;
    background-color: rgb(174, 182, 191 );
    margin: 30px;
    
    border: 5px solid black;
}

textarea{
    margin-top: 20px;
    padding: 1.4rem;
    background: transparent;
    border: 3px solid black;
    height: 4rem;
}
input[type="submit"]{
    cursor: pointer;
    height: 53px;
    width: 100px;
    font-size: 18px;
    font-weight: 500;
    border-radius: 7px;
  color: black;
  background: rgb(88, 214, 141);
    

}

.header {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          
  padding: 0 9%;
  background: #fff;
}

.header .logo {
  font-size: 2rem;
  font-weight: bolder;
  color: #000000;
}

.header .logo i {
  color: #fa1d86;
}

.header .navbar ul {
  list-style: none;
}

.header .navbar ul li {
  position: relative;
  float: left;
}

/* .header .navbar ul li:hover ul {
  display: block;
} */

.header .navbar ul li a {
  padding: 2rem;
  display: block;
  font-size: 1.2rem;
  color: #000000;
  text-decoration: none;
}

.header .navbar ul li a:hover {
  background: #fff;
}

/* .header .navbar ul li ul {
  position: absolute;
  left: 0;
  width: 20rem;
  background: #224bcf;
  display: none;
} */

.header .navbar ul li ul li {
  width: 100%;
}

#menu-btn {
  cursor: pointer;
  color: #fff;
  font-size: 2.5rem;
  display: none;
}


    </style>
 </head>
 
<body>
<header class="header">

<a class="logo"> <i class="fas fa-graduation-cap"></i>CollegCom</a>

<div id="menu-btn" class="fas fa-bars"></div>
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
</header>



<main role="main">
 
  
  <section class="panel important">
    <form action="" method="post">
    <h2>Write News</h2>
     
    Content:<br/>    
<textarea name="news" rows="15" cols="165"></textarea><br/>
       

      </div>

    
          

        <div>
          <input onclick="return confirm('Are You Sure You Want To Post This?')" type="submit" name="submitnews" value="Post" />
         
        </div>
      </div>
    </form>
  </section>
 


</main>
<?php
include_once "config.php";

if(isset($_POST['submitnews'])){
    $news = $_POST['news'];
    $_SESSION['news'] = $news;


    $sql = "INSERT INTO news(news) VALUES('$news')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script> alert('posted successfully'); </script>";
        header("Location: news.php");
    }
    else{
        echo "failed to post";
    }
}
?>

 <!-- <div class="container">
<form >
<textarea name="News" placeholder="News" id="" cols="140" rows="3"></textarea>
<button type="submit">Add News</button>
</form> -->



<?php

include('config.php');
$results = $conn->query("SELECT * FROM news");
?>

<?php if(mysqli_num_rows($results) > 0)
{
    while ($row = mysqli_fetch_array($results))
    {
        ?>
        <div class="boxx">
        <h3><?php echo $row['news'];  ?></h3>  <br>
         </div>
        <a onclick="return confirm('Are You Sure You Want To Delete This?')"  href="deletenews.php?id=<?php echo $row['nid']; ?>" ><button style="margin:-8% 0 0 0;" >   Delete</button> </a>


      
  


<?php
    }
}


?>
    </div>
    </body>
</html>         
                          
      