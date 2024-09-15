<?php include 'filesLogicenm.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENM</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/file.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a  class="logo"> <i class="fas fa-graduation-cap"></i>CollegCom</a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
    <ul>
        <li><a href="/../mainpage2/main.php">home</a></li>
        <li><a href="/../download and up/html/course-2.php">courses</a>
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
    <h3>ENM</h3>
    <p> <a href="./course-2.php">Courses >></a> ENM </p>
</section>
<div class="wrapper">
    <header>File Uploader</header>
    <form action="enm.php" method="post" enctype="multipart/form-data" >
      <input class="file-input" type="file" id="file" name="myfile" hidden>
      <i class="fas fa-cloud-upload-alt"></i>
      <label for="file">Browse File and click upload to Uploaded</label>
      <button type="submit" name="save">upload</button>
    </form>
     </div> 
</div>
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
      <td><a href="enm.php?file_id=<?php echo 
      $file['id'] ?>">Download</a></td>
    </tr>
    <?php endforeach;?>

</tbody>
    </body>
  </html>
  
    