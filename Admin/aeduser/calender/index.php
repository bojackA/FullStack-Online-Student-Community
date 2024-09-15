<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

<style>
body {
    /* margin-top: 50px; */
    text-align: center;
    font-size: 12px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}

#calendar {
    width: 700px;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
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

.header .navbar ul li:hover ul {
  display: block;
}

.header .navbar ul li a {
  padding: 2rem;
  display: block;
  font-size: 1.2rem;
  color: #000000;
  text-decoration: none;
}

/* .header .navbar ul li a:hover {
  background: #fa1d86;
} */

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
        
			<ul class="nav navbar-nav">
            <li class="active"><a href="../home.php">Home</a></li>
            <li><a href="../seeposts.php">Posts</a></li>
            <li><a href="../news.php">News</a></li>
             <li><a href="index.php">Calender</a></li>
            <li><a href="/../../php/logout.php">Log Out</a></li>
			</ul>
        </div>
    </div>
</nav>
</header>
    <h2>CollegeCom Calender</h2>

    <div class="response"></div>
    <div id='calendar'></div>
</body>


</html>