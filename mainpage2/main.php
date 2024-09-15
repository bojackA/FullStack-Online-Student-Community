<?php
include("config.php");
session_start();
if(!isset($_SESSION['unique_id'])){
    header("location: /../login.php");
  }
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
?>

<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,intial-scale=1.0">
        <title>Page</title>
        <link rel="stylesheet" href="./page.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    </head>
    <body>
        
      <nav>
        <div class="container">
            <a href="../Profile/Profile.php">
                <h2 class="log"><i class="fas fa-graduation-cap"></i>CollegeCom</h2>
            </a>
        </div>
      </nav>
      <main>
        <div class="container">
            <div class="left">
            <a href="../profile/profile.php" class="profile">
                <div class="profile-photo">
                <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                </div>
            
                <div class="handle">
                <h4><?php echo $row['fname']; ?></h4>
                    <p class="text-muted">
                    <?php echo $row['email']; ?>
                    </p>
                  
                </div>
            </a>
            <div class="sidebar">
                    <div class='notifications-popup'>
                    <div>
                        <div class="profile-photo">
                        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                        </div>
                        <div class="notification-body">
                            <b></b> 
                            <small class="text-muted"></small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                        </div>
                        <div class="notification-body">
                            <b></b>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                        </div>
                        <div class="notification-body">
                            <b></b> <b> </b> 
                            <small class="text-muted"></small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-photo">
                        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                        </div>
                        <div class="notification-body">
                            <b></b>
                            <small class="text-muted"></small>
                        </div>
                    </div>
                    </div>
                    <a href="../chat.php" class="menu-items">
                        <span ><i  class="uil uil-envelope-alt"></i></span><h3>Message</h3>
                        </a>
                        <a href="../AIU gpa calculator/index.php" class="menu-items">
                    <span><i class="uil uil-graduation-cap"></i></span><h3>GPA Calculeter</h3>
                    </a>
                    <a  href="../php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="menu-items">
                    <span><i class="uil uil-sign-out-alt"></i></span><h3>Logout</h3>
                </a>
            </div>
        </div>

            <div class="middle">
                    <div class="containers">
                        <div class="wrappers">
                            <section class="posts">
                                <header> Create Post</header>
                                <form action="posts.php" method="post" enctype="multipart/form-data">
                                    <div class="contents">
                                    <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                                        <div class="detailss">
                                            <p><?php echo $row['fname']; ?></p>
                                            </div>
                                        </div>
                                   <textarea name="content" placeholder="Write your post" required></textarea>
                                   <div class="ops">
                                    <p>Add to your post</p>
                                    <ul class="list">
                                        <input name="pics" type="file" id="file" accept="image/*">
                                        <label  name= "picture" for="file" id="upload"><i class="uil uil-camera"></i></label>
                                     
                                    </ul>
                                   </div>
                                   <button onclick="return confirm('Are you sure you want to post?');" name="posts">Post</button>
                                </form>
                    
                    
                            </section>   
                            </div>
                            </div>
                            <?php
$results = $conn->query("SELECT * FROM posts INNER JOIN users ON users.unique_id=posts.pid");

            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
<?php while ($data = $results->fetch_assoc()): ?>



                            <div class="post">
                                <div class="post-top">
                                    <div class="dp">
                                    <img src="../php/images/1676851948linkedin_photo_tips.jpg">
                                    </div>
                                    <div class="post-info">
                                        <p class="name"><?php echo $data['fname']; ?></p>
                                        
                                    </div>
                                    <i class="uil uil-edit"></i>
                                    <span class="uil uil-multiply"></span>
                                </div>
                
                                <div class="post-content">
                                  <?php echo $data['text']; ?>
                                </div>
                                
                                <div class="post-bottom">
                                    <div class="action">
                                        <i class=""></i>
                                        <span></span>
                                    </div>
                                    <div class="action">
                                        <i class=""></i>
                                        <span></span>
                                    </div>
                                    <div class="action">
                                        <i class=""></i>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="comment-site">
                                    <div class="profile-photo">
                                        <a href="#" id="profile-link">
                                        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="comment-input">

                                        <input type="text" placeholder="Write a comment…">
                                        <div class="comment-icon">
                                        </div>
                                        <a href="../comments/comments/comment.php?postid=<?php echo $data['psid']; ?>" >
                                        comment
</a>
                                    </div>
                                </div>
                                <div class="com">
                                    <div class="com-top">
                                        <div class="cc">
                                        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                                        </div>
                                        <div class="comm-info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            
<?php endwhile;?>


<?php
$results = $conn->query(" SELECT * FROM users INNER JOIN post_img ON users.unique_id=post_img.id");
if(mysqli_num_rows($results) > 0){
    $row = mysqli_fetch_assoc($results);
}
?>
<?php while ($data = $results->fetch_assoc()): ?>
    <div class="post">
                                <div class="post-top">
                                    <div class="dp">
                                    <img src="../php/images/1676851347photo_2022-09-04_18-27-05.jpg">
                                    </div>
                                    <div class="post-info">
                                       
                                        <p class="name"><?php echo $data['fname']; ?></p>
                                    </div>
                                    <i class="uil uil-edit"></i>
                                    <span class="uil uil-multiply"></span>
                                </div>
                

                                    <div class="post-content">
                                    <?php echo $data['text']; ?>
                                    <img src="./posts/os1.jpg " /><br>
                                    
                                </div>
                                
                                
                                <div class="post-bottom">
                                    <div class="action">
                                        <i class=""></i>
                                        <span></span>
                                    </div>
                                    <div class="action">
                                        <i class=""></i>
                                        <span></span>
                                    </div>
                                    <div class="action">
                                        <i class=""></i>
                                    </div>
                                </div>
                                <div class="comment-site">
                                    <div class="profile-photo">
                                        <a href="#" id="profile-link">
                                        <img src="/../php/images/<?php echo $row['img']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="comment-input">
                                        <input type="text" placeholder="Write a comment…">
                                      
                                        <div class="comment-icon">
                                        </div>
                                        <a href="../comments/comments/commentimg.php?pstimg=<?php echo $data['pstid']; ?>" >
                                        Comment
</a>
                                    </div>
                                </div>
                                <div class="com">
                                    <div class="com-top">
                                        <div class="cc">
                                        <img src="../php/images/<?php echo $row['img']; ?>" alt="">
                                        </div>
                                        <div class="comm-info">
                                            <p class="names"><?php echo $data['fname']; ?></p>
                                            <span class="comm"></span>
                                        </div>
                                    </div>
                                </div>
            
                                          
                
            </div>
            <?php endwhile;
    ?>
           
            </div>
            
         
            
            <div class="right">
                <div class="sidebar">
                    <a href="../download and up/html/course-2.php" class="menu-items">
                        <span><i class="uil uil-book-alt"></i></span><h3>Courses</h3>
                        </a>
                        <a href="../download and up/html/library.php" class="menu-items">
                            <span><i class="uil uil-cloud-bookmark"></i></span><h3>My Library</h3>
                            </a>
             
                            <a href="../calender/index.php"class="menu-items">
                <span><i class="uil uil-calender"></i></span><h3>Calender</h3>
                </a>
        </div>
      </main>
    
    </body>
   

</html>