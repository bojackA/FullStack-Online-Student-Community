<?php 
  session_start();
  include_once "../../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: ../../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courses</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/course.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a class="logo"> <i class="fas fa-graduation-cap"></i>CollegCom</a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="../../mainpage2/main.php">Home</a></li>
            <li><a href="./course-2.php">courses</a>
            </li>
            <li><a>pages </a>
                <ul>
                    <li><a href="/../AIU gpa calculator/index.php">GPA Calculeter</a></li>
                    <li><a href="/../Faqs page/FAQs.php">FAQ</a></li>
                </ul>
            </li>
        </ul>
    </nav>

</header>

<!-- header section ends -->

<section class="heading">
    <h3>courses</h3>
    <p> <a href="../../mainpage2/main.php">Home >></a> courses </p>
</section>

<!-- course-2 section starts  -->

<section class="course-2">

    <div class="box">
        <div class="image">
            <img src="../images/20221226_152402-removebg-preview.png" alt="">
        </div>
        <div class="content">
            <span>IR</span>
            <h3>learning is what makes you perfect</h3>
            <p>It is an introduction to the science of robotics presented by Dr.khaled Dak Al-Bab </Al-B></p>
            <a href="./ir.php" class="btn">Learn more</a>
            <div class="icons">
                <a > <i class="fas fa-book"></i> 5 chapter </a>
                <a > <i class="fas fa-clock"></i> 2 hours </a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="../images/sw2.png" alt="">
        </div>
        <div class="content">
            <span>SW2</span>
            <h3>learning is what makes you perfect</h3>
            <p>Advanced Software Engineering presented by Dr.Talal Shehabi</p>
            <a href="./sw2.php" class="btn">Learn more</a>
            <div class="icons">
                <a > <i class="fas fa-book"></i> 7 chapter </a>
                <a> <i class="fas fa-clock"></i> 3 hours </a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="../images/exp.png" alt="">
        </div>
        <div class="content">
            <span>Exp</span>
            <h3>learning is what makes you perfect</h3>
            <p>It is An Expert Systems presented by Dr.Nada Ghneem</p>
            <a href="./exp.php" class="btn">Learn more</a>
            <div class="icons">
                <a> <i class="fas fa-book"></i> 12 modules </a>
                <a> <i class="fas fa-clock"></i> 6 hours </a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="../images/Enm.png" alt="">
        </div>
        <div class="content">
            <span>ENM</span>
            <h3>learning is what makes you perfect</h3>
            <p>It is An Engineering Management presented by Dr.khaled Dak Al-Bab </p>
            <a href="./enm.php" class="btn">Learn more</a>
            <div class="icons">
                <a> <i class="fas fa-book"></i> 9 chapter </a>
                <a> <i class="fas fa-clock"></i> 2 hours </a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="../images/pl.png" alt="">
        </div>
        <div class="content">
            <span>PL</span>
            <h3>learning is what makes you perfect</h3>
            <p>It is An Programming Languages presented by Dr.Mhd Tarek Almalek</p>
            <a href="./pl.php" class="btn">Learn more</a>
            <div class="icons">
                <a> <i class="fas fa-book"></i> 6 chapter </a>
                <a> <i class="fas fa-clock"></i> 3 hours </a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="../images/os1.png" alt="">
        </div>
        <div class="content">
            <span>Os1</span>
            <h3>learning is what makes you perfect</h3>
            <p>It is An Operating System presented by Dr.Rami Yared</p>
            <a href="./os1.php" class="btn">Learn more</a>
            <div class="icons">
                <a> <i class="fas fa-book"></i> 5 chapter </a>
                <a> <i class="fas fa-clock"></i> 4 hours </a>
            </div>
        </div>
    </div>

</section>

<!-- course-2 section ends -->














<!-- footer section starts  -->




</body>
</html>