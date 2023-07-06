<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Platforma Educationala</title><?php
  session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disertatie";
$ok1=$_SESSION['username'];
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}
$ok=$_SESSION['username'];
// Actualizare valoare "online" în tabela "users"
$sql = "UPDATE users SET online = 'ON' WHERE username = '$ok1'";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Eroare la actualizare: " . $conn->error;
}
?>
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header green-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">

          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="icon-task-l"></i>
            <span class="badge bg-important"></span>
          </a>
          <ul class="dropdown-menu extended tasks-bar">
            <div></div>

            <li>
<b>
              <?php

              require_once("connection.php");

              if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

                redirect("index.php");
              }
			  session_start();

              include 'headerlogged.php';
              $username = $_SESSION['username'];
			  $ok=$username;
              $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
              if (!$conectare) {
                die(mysqli_connect_error());
			  }
              $sql = "SELECT * FROM users WHERE 1";
			  $ok=0;
              $result = mysqli_query($conectare, $sql);
              while ($row = mysqli_fetch_assoc($result) and $ok==0) { 
                    if ($row['username'] == $username) {$ok=$ok+1;
                        $nume = $row['nume'];
                    }
			    }
                                                                                  ?>

                <div class="row">

                  <div>
                    <?php echo $_SESSION["titlu"] ?>
                  </div>
                  <div>
                    <?php echo $_SESSION["continut"] ?>
                  </div>
                  <div>
                    Salut!!!
                  </div>
                </div>

                <ul>
                  <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>

                </ul>

                <?php include 'footer.php'; ?></b>
            </li>
        </div>
        </li>
      </div>
      <!--logo start-->
      <a href="dashboard.php" class="logo"><b>MENIU <span class="lite"><?php echo $_SESSION['name']; ?></span></a></b>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <li id="task_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-task-l"></i>
              <span class="badge bg-important"></span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-blue"></div>

              <li><b>

                <?php

                require_once("connection.php");

                if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

                  redirect("index.php");
                }

                include 'headerlogged.php';


                ?>

                <div class="row">

                  <div>
                    <?php echo $_SESSION["titlu"] ?>
                  </div>
                  <div>
                    <?php echo $_SESSION["continut"] ?>
                  </div>
                  <div>
                    Salut!!!
                  </div>
                </div>

                <ul>
                  <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>

                </ul>

                <?php include 'footer.php'; ?></b>
              </li>
            </ul>
          </li>
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
          <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-envelope-l"></i>
              <span class="badge bg-important"><?php  
				$date=$username;
				$sql = "SELECT * FROM messenger WHERE 1";
                $result = mysqli_query($conectare, $sql); 
				$ok=0;
				while ($row = mysqli_fetch_assoc($result) and $ok==0)
					if ($date==$row['username_initial']){ echo '1'; $ok=$ok+1;}
				if($ok==0) {echo '0';}
				?></span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>

              <li>
                <a href="messenger.php"><?php  
				$date=$username;
				$sql = "SELECT * FROM messenger WHERE 1";
                $result = mysqli_query($conectare, $sql); 
				$ok=0;
				while ($row = mysqli_fetch_assoc($result) and $ok==0)
					if ($date==$row['username_initial']){ echo 'MESAJE NOI'; $ok=$ok+1;}
				if($ok==0) {echo 'NICIUN MESAJ NOU';}
				?></a>
              </li>
            </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

              <i class="icon-bell-l"></i>
              <span class="badge bg-important"><?php $date=date('y-m-d');
				$date='20'.$date;
				$sql = "SELECT * FROM noutati ORDER BY data_inceput";
                $result = mysqli_query($conectare, $sql); 
				$ok=0;
				while ($row = mysqli_fetch_assoc($result) and $ok==0)
					if ($date==$row['data_inceput']){ echo '1'; $ok=$ok+1;}
				if($ok==0) {echo '0';}
				?></span>
            </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>


              <li>
                <a href="anunt.php"><?php  
				$date=date('y-m-d');
				$date='20'.$date;
				$sql = "SELECT * FROM noutati WHERE 1";
                $result = mysqli_query($conectare, $sql); 
				$ok=0;
				while ($row = mysqli_fetch_assoc($result) and $ok==0)
					if ($date==$row['data_inceput']){ echo 'NOUTATI NOI'; $ok=$ok+1;}
				if($ok==0) {echo 'NICIO NOTIFICARE';}
				?></a>
              </li>
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="">
              </span>
              <b><span class="username"><?php echo $_SESSION["name"] ?></span></b>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top"><b>
                <a href="profil.php"><i class="icon_profile"></i> Profilul meu</a>
              </li>
              <li>
                <a href="calendar.php"><i class="icon_mail_alt"></i> Calendar</a>
              </li>
              <li>
                <a href="anunt.php"><i class="icon_clock_alt"></i>Anunturi</a>
              </li>
              <li>
                <a href="mesagerie.php"><i class="icon_chat_alt"></i> Mesagerie</a>
              </li>
              <li>

              <li><a href="logout.php"><i class="icon_key_alt"></i>Logout</a></li>
              </a>
          </li>
          <li>
            <a href="add.php"><i class="icon_key_alt"></i> Documentele mele</a>
          </li>
          <li>
            <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
          </li>
        </ul>
        </li>
        <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <div style="padding-top: 100px;"></div>

    <!--sidebar start-->
    <?php
                $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');

                echo "<center><div class='buton-triforce'><a href='add.php'><i class='fa fa-plus'></i> ADAUGA DOCUMENTE</a></div></center><br/><br/><br/>";
                $startDate = strtotime("20-06-2023"); // Data de început (20 iunie a anului curent)
$endDate = strtotime("20-08-2023"); // Data de sfârșit (20 august a anului curent)
$currentDate = time(); // Data și ora curentă

if ($currentDate >= $startDate && $currentDate <= $endDate) {
	if($_SESSION['functie']=='ELEV'){
    // Suntem în perioada specificată
?><center><a class='titlu-noutate' href='feedback.php'><?php echo '! Adauga feedback profesorului tau preferat !';?></a></center><?php }}
                if (!$conectare) {
                  die(mysqli_connect_error());
                }

                $sql = "SELECT * FROM noutati WHERE 1 ORDER BY data_inceput DESC";
                $result = mysqli_query($conectare, $sql);

                echo "<div class='panel-noutati'>
                          <div class='noutati-heading' style='color: #ffff00; font-weight: bold;'>NOUTATI</div>
                          <table class='tabel-noutati'>";

                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>",
                  "<b class='titlu-noutate'>", $row['noutati_titlu'], "</b><br/>",

                  "Autor: <b style='color: #6b6a00;'>", $row['autor'], "</b></br>",
                  "Data anuntului: <b>", $row['data_inceput'], "</b> <br/><br/>",

                  $row['noutati_continut'],
                  "</td></tr>";
                }

			  echo "</table></div>";
    ?>

    <div class="row">
      <!--sidebar end-->
      <!--sidebar start--><?php
                          $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
                          if (!$conectare) {
                            die(mysqli_connect_error());
                          }

                          $sql1 = "SELECT * FROM users WHERE 1";
                          $result1 = mysqli_query($conectare, $sql1);
						  $ok=0;
                          while ($row1 = mysqli_fetch_assoc($result1) and $ok==0) {
                            if (($row1['functie']=="ADMIN" OR $row1['functie']=="PROFESOR" OR $row1['functie']=="SECRETARIAT") and $row1['username']==$username ){$ok=$ok+1; ECHO $ok;
                              echo ' 
            <div class="panel-adauga-anunturi">
              <div class="panel-adauga-anunturi-heading">ADAUGA ANUNTURI
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form">
                    <!-- Edit profile form (not working)-->
                    <form  action="anunturi.php" method="POST" >
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Titlu</label>
                        <div class="col-lg-10">
                          <input type="text"  id="titlu" name="titlu">
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="continut">Continut</label>
                        <div class="col-lg-10">
                      <input type="text"  id="continut" name="continut">
                        </div>
                      </div>
                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">Data publicari:</label>
                        <div class="col-lg-10">
						<input type="date" name="date" id="date">
                        </div>
                      </div>
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="autor">Autor</label>
                        <div class="col-lg-10">
                          <input type="text"  id="autor" name="autor" value='; echo $username; echo' >
                        </div>
                      </div>

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary">Publica</button>
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                      </div>
                    </form>
					</div></div></div><br><br><br></div>
';
                            }
                          }
                         ?>




    <!-- project team & activity end -->
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!--main content start-->

  <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js">
  </script>
  <!-- Full Google Calendar - Calendar -->
  <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
  <!--script for this page only-->
  <script src="js/calendar-custom.js"></script>
  <script src="js/jquery.rateit.min.js"></script>
  <!-- custom select -->
  <script src="js/jquery.customSelect.min.js"></script>
  <script src="assets/chart-master/Chart.js"></script>

  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <!-- custom script for this page-->
  <script src="js/sparkline-chart.js"></script>
  <script src="js/easy-pie-chart.js"></script>
  <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="js/xcharts.min.js"></script>
  <script src="js/jquery.autosize.min.js"></script>
  <script src="js/jquery.placeholder.min.js"></script>
  <script src="js/gdp-data.js"></script>
  <script src="js/morris.min.js"></script>
  <script src="js/sparklines.js"></script>
  <script src="js/charts.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
  <script>
    //knob
    $(function() {
      $(".knob").knob({
        'draw': function() {
          $(this.i).val(this.cv + '%')
        }
      })
    });

    //carousel
    $(document).ready(function() {
      $("#owl-slider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

      });
    });

    //custom select box

    $(function() {
      $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>

  <nav class="panel-calendar">

    <meta charset='utf-8' />
    <?php include 'database.php'; ?>

    <link href='fullcalendar.min.css' rel='stylesheet' />
    <link href='fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='lib/moment.min.js'></script>
    <script src='lib/jquery.min.js'></script>
    <script src='fullcalendar.min.js'></script>
    <script>
      $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
          editable: true,
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          events: 'all_events.php',
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt("Enter Event Title");

            if (title) {
              var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
              var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
              $.ajax({
                url: "add_events.php",
                type: "POST",
                data: {
                  title: title,
                  start: start,
                  end: end
                },
                success: function() {
                  calendar.fullCalendar('refetchEvents');
                  alert("Added Successfully");
                }
              })
            }
          },
          editable: true,
          eventResize: function(event) {
            var start = $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
              url: "update_events.php",
              type: "POST",
              data: {
                title: title,
                start: start,
                end: end,
                id: id
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                alert('Event Update');
              }
            })
          },

          eventDrop: function(event) {
            var start = $.fullCalendar.formatDate(event.start, "y-MM-dd HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "y-MM-dd HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
              url: "update_events.php",
              type: "POST",
              data: {
                title: title,
                start: start,
                end: end,
                id: id
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated");
              }
            });
          },

          eventClick: function(event) {
            if (confirm("Sunteti siguri ca doriti sa stergeti evenimentul?")) {
              var id = event.id;
              $.ajax({
                url: "delete_events.php",
                type: "POST",
                data: {
                  id: id
                },
                success: function() {
                  calendar.fullCalendar('refetchEvents');
                  alert("Event Removed");
                }
              })
            }
          },

        });
      });
    </script>
    </head>

    <body>
      <h2 class="calendar-heading" align="center"><a href="#">CALENDAR</a></h2>

      <div class="container">
        <div id="calendar"></div>
      </div>

    </body>
  </nav>

</html>

</script>

<style>
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }
</style>
</head>

<body>
  <script>
    function displayMessage(message) {
      $(".response").html("<div align='center' style='padding:20px;font-size:18px;color:#dd0000' class='success'>" + message

        +
        "</div>");
      setInterval(function() {
        $(".success").fadeOut();
      }, 2000);
    }
  </script>
  <script src="js/scripts.js"></script>
  <!-- custom script for this page-->
  <script src="js/sparkline-chart.js"></script>
  <script src="js/easy-pie-chart.js"></script>
  <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="js/xcharts.min.js"></script>
  <script src="js/jquery.autosize.min.js"></script>
  <script src="js/jquery.placeholder.min.js"></script>
  <script src="js/gdp-data.js"></script>
  <script src="js/morris.min.js"></script>
  <script src="js/sparklines.js"></script>
  <script src="js/charts.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
  <script>
    //knob
    $(function() {
      $(".knob").knob({
        'draw': function() {
          $(this.i).val(this.cv + '%')
        }
      })
    });

    //carousel
    $(document).ready(function() {
      $("#owl-slider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

      });
    });

    //custom select box

    $(function() {
      $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>
  </div>

</body>

</html>