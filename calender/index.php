<!DOCTYPE html> 
<html> 
 
<head> 
 
<meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Calender</title> 
    <!-- custom css file link  --> 
    <link rel="stylesheet" href=""> 
    <link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
<script src="fullcalendar/lib/jquery.min.js"></script> 
<script src="fullcalendar/lib/moment.min.js"></script> 
<script src="fullcalendar/fullcalendar.min.js"></script> 
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
                    <li><a href="../AIU gpa calculator/index.php">GPA Calculeter</a></li>
                    <li><a href="../Faqs page/FAQs.php">FAQ</a></li>
                </ul>
    </nav> 
 
</header> 
<script> 
 
$(document).ready(function () { 
    var calendar = $('#calendar').fullCalendar({ 
        
        events: "fetch-event.php", 
        displayEventTime: false, 
        eventRender: function (event, element, view) { 
            if (event.allDay === 'true') { 
                event.allDay = true; 
            } else { 
                event.allDay = false; 
            } 
        }, 
        
        selectHelper: true, 
         
         
         
         
 
    }); 
}); 
 
</script> 
 
<style> 
    * { 
    font-family: 'Poppins', sans-serif; 
    margin: 0; 
    padding: 0; 
    -webkit-box-sizing: border-box; 
            box-sizing: border-box; 
    text-transform: capitalize; 
    text-decoration: none; 
    outline: none; 
    border: none; 
    -webkit-transition: all .2s linear; 
    transition: all .2s linear; 
  } 
    html { 
    font-size: 62.5%; 
    overflow-x: hidden; 
  } 
   
  section { 
    padding: 3rem 9%; 
  } 
   
 
   
  .heading { 
    background: url(../images/heading-bg.png) no-repeat; 
    background-size: cover; 
    background-position: center; 
  } 
   
  .heading h3 { 
    font-size: 3.5rem; 
    color: #302851; 
  } 
   
  .heading p { 
    font-size: 1.6rem; 
    color: #666; 
    padding-top: .5rem; 
  } 
   
  .heading p a { 
    padding-right: .5rem; 
    color: #fa1d86; 
  } 
   
  .heading p a:hover { 
    color: #224bcf; 
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
            justify-content: space-between; 
    padding: 0 9%; 
    background: #224bcf; 
  } 
  body{ 
    background-image:url(../background/png_20230217_222310_0000.png); 
  } 
   
  .header .logo { 
    font-size: 2.5rem; 
    font-weight: bolder; 
    color: #fff; 
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
   
  .header .navbar ul li:hover ul { 
    display: block; 
  }
.header .navbar ul li a { 
    padding: 2rem; 
    display: block; 
    font-size: 1.7rem; 
    color: #fff; 
  } 
   
  .header .navbar ul li a:hover { 
    background: #fa1d86; 
  } 
   
  .header .navbar ul li ul { 
    position: absolute; 
    left: 0; 
    width: 20rem; 
    background: #224bcf; 
    display: none; 
  } 
   
  .header .navbar ul li ul li { 
    width: 100%; 
  } 
  #menu-btn { 
    cursor: pointer; 
    color: #fff; 
    font-size: 2.5rem; 
    display: none; 
  } 
 
h3 { 
    margin-top: 35px; 
    text-align: center; 
    font-size: 40px; 
    color:#695CFE; 
 
} 
h2{ 
    color:#224bcf; 
} 
#calendar { 
    width: 670px; 
    margin: 0 auto; 
    height: 100px; 
} 
 
.response { 
    height: 60px; 
} 
 
.success { 
 
    padding: 10px 60px; 
    border: #224bcf 4px solid; 
    display: inline-block; 
    color:blue; 
} 
</style> 
</head> 
<body> 
    <h3>CollegeCom Calender</h3> 
 
    <div class="response"></div> 
    <div id='calendar'></div> 
</body> 
 
 
</html>