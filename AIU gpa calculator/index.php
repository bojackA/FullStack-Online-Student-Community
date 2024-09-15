<?php 
  session_start();
  include_once "../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="resources/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/quries.css">
    <script src="https://kit.fontawesome.com/7ee32e7e22.js" crossorigin="anonymous"></script>
    <title>GPA Calculator</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/../css/file.css">

</head>
<header class="header">

    <a class="logo"> <i class="fas fa-graduation-cap"></i>CollegCom</a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="../mainpage2/main.php">home</a></li>
            <li><a href="../download and up/html/course-2.php">courses</a>
            </li>
            <li><a>pages </a>
                <ul>
                    <li><a href="#">GPA Calculeter</a></li>
                    <li><a href="../Faqs page/FAQs.php">FAQ</a></li>
                </ul>
            </li>
        </ul>
    </nav>

</header>
<body>
    <header>
        <div class="row head">
            <p>Enter your marks</p>
            <div>
                <input type="text" class="sub-name" placeholder="Subject Name">
                <input type="text" class="sub-credit" placeholder="Credit">
                <input type="text" class="sub-mar" placeholder="Mark">
                <button class="sub-add">Add</button>
            </div>
        </div>
    </header>
    <section class="details">
        <div class="row">
            <h2>TOTAL SUBJECTS</h2>
            <div class="subject-head">
                <!-- <div class="subject clearfix" id="item-0">
                    <div class="sub-name-des">English</div>
                    <div class="right">80</div>
                    <div class="right cred">3</div>
                </div>
                <div class="subject clearfix" id="item-1">
                    <div class="sub-name-des">Urdu</div>
                    <div class="right">95</div>
                    <div class="right cred">4</div>
                </div>-->
            </div>
        </div>

    </section>
    <section class="calculate">
        <div class="row">
            <div>
                <button class="calculate-btn">Calculate</button>
                <button class="reset-btn">Reset</button>
            </div>
            <div class="result-area">
                <!-- <h2>YOUR GPA IS</h2>
                <p class="total-gpa">3.5</p> -->
            </div>

        </div>
    </section>
   
    <script src="resources/js/app2.js"></script>
</body>

</html>