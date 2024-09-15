<?php 
  session_start();
  include_once "../../php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: ../../login.php");
  }
?>

<?php include 'fileLogiclibrary.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/../css/file2.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a class="logo"> <i class="fas fa-graduation-cap"></i>CollegCom</a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
    <ul>
            <li><a href="/../mainpage2/main.php">Home</a></li>
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
<section class="heading">
    <h3>Library</h3>
    <p> <a href="/../mainpage2/main.php">Home>></a></p>
    
</section>
<table>
<thead>
    <th>Filename</th>
    <th>size (in mb)</th>
    <th>Downloads</th>
    <th>Action</th>
</thead>
<tbody>
  <?php foreach ($files as $file): ?>
    <tr>
      <td><?php echo $file['name']; ?></td>
      <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
      <td><?php echo $file['downloads']; ?></td>
      <td><a href="library.php?file_id=<?php echo 
      $file['id'] ?>">Download</a></td>
    </tr>
    <?php endforeach;?>

</tbody>
    </body>
  </html>
  
    