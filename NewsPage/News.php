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





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news2.css">
    <title>NEWS</title>
</head>
<body>
    <div class="container">
        <header>
        <a href ="../mainpage2/main.php ">Back to Home</a>
            <h1 class="heading-1">Arab International University</h1>
            <div class="sub-heading">
                <p>Saturday ,<span>June 26,2022</span></p>
                <p class="important">your rigt to know</p>
            </div>
        </header>
        <div class="main">
            <div class="home">
                <div class="left">
                    <img src="img/rank.jpg" class="home-img" alt="1">
                    <!-- <h2 class="heading-2">
                        The Arab International University Ranked First On The Syrian Private Universities 
                        In July 2022 Edition Of Transparent Index Related To Scientific Research According To Ranking WEB Of University
                    </h2> -->
                </div>
                <div class="right">
                    
                    <h3 class="heading-3">Latest News</h3>

                    <div class="lists">
                    
                        
                        <?php
$results = $conn->query("SELECT * FROM news");
?>
<?php while ($data = $results->fetch_assoc()): ?>


      
                         <div class="list">
                             <img src="img/aiu.jpg" alt="1">
                            <p> <?php echo $data['news']; ?></p>
                         </div>
                            
                        
                            <?php endwhile;?>
                          
                            
                            </div> 
                            
                   </div> 
                            </div>

                        

                        


                    

                 


                <!--         <div class="list">
                            
                            <img src="E:/Web Project/News Page/img/aiu.jpg" alt="1">
                            <p> News </p>
                        </div>
                        <div class="list">
                            <img src="E:/Web Project/News Page/img/aiu.jpg" alt="2">
                            <p> News </p>
                        </div>  
                        <div class="list">
                            <img src="E:/Web Project/News Page/img/aiu.jpg" alt="3">
                            <p>News </p>
                        </div>  
                        <div class="list">
                            <img src="E:/Web Project/News Page/img/aiu.jpg" alt="4">
                            <p>News </p>
                        </div>  
                        
                    </div>
                </div>
                
            </div>
             <article>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Possimus quo obcaecati quidem deserunt tenetur, 
                     incidunt nam velit accusamus quas eum, modi sequi dolorum qui,
                      
                        </p>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                     Saepe unde dolorem voluptatem soluta ab et quod alias 
              
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
    
                   
                       </p>
            </article> 
        </div>
    </div>
     <blockquote>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
         Saepe ducimus perferendis nemo distinctio quod, dolores 
       
    </blockquote>
    <div class="cards">
        <div class="card">
            <h4 class="heading-4">Title</h4>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                
            </p>
    
        </div>
        <div class="card">
            <h4 class="heading-4">Title</h4>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                 Dolores quibusdam omnis tenetur ipsam sint nisi autem consequatur,
               
            </p>
    
        </div>
        <div class="card">
            <h4 class="heading-4">Title</h4>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Praesentium soluta officiis eveniet, deserunt fugiat aliquid! Sunt 
              
            </p>
    
        </div> 
    </div> -->
</body>
</html>