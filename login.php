<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: ./mainpage2/main.php");
  }
?>

<head>

    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   </head>
<body>
  <header class="header">

    <a  class="logo"> <i class="fas fa-graduation-cap"></i>CollegCom</a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="../landing page/html/landingpage.html">Start up page</a></li>
            </li>   
                    <li><a href="/FAQs Page/FAQs.php">FAQs</a></li>
                </ul>
            </li>
        </ul>
    </nav>

</header>
  <div class="wrappers">
    <div class="logos"></div>
    <div class="title">Log In</div>
    <div class="sub-title">Welcome To Our Community</div>
    <section class="form login">
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field-inputse">
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field-inputse">
          <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login2.js"></script>

</body>
</html>
