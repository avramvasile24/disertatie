<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Calendar</title>

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
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container">

    <header class="header green-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">

          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="icon-task-l"></i>
            <span class="badge bg-important"></span>
          </a>
          <ul class="dropdown-menu extended tasks-bar">
            <div></div>


            <?php

            require_once("connection.php");

            if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

              redirect("index.php");
            }

            include 'headerlogged.php';
            $username = $_SESSION['username'];
            $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
            if (!$conectare) {
              die(mysqli_connect_error());
            }
            $sql = "SELECT * FROM profil WHERE 1";
            $result = mysqli_query($conectare, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              if ($row['username'] == $username) {
                $ok = $row['nume'];
              }
            }
            $verificare = $_POST['search'];
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


            <?php include 'footer.php'; ?></li>
        </div>
        </li>
      </div>
      <!--logo start-->
      <a href="dashboard.php" class="logo">MENIU <span class="lite"><?php echo $_SESSION['name']; ?></span></a>
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

              <li>

                <?php

                require_once("connection.php");

                if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

                  redirect("index.php");
                }

                include 'headerlogged.php';
                $username = $_SESSION["username"];

                $sql = "SELECT * FROM users WHERE 1";
                $result = mysqli_query($conectare, $sql);
                $ok = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                  if ($row['username'] == $username)
                    $clasa = $row['clasa'];
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

                <?php include 'footer.php'; ?>
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
				$sql = "SELECT * FROM noutati WHERE 1";
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
              <span class="username"><?php echo $_SESSION["name"] ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
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

    <!--sidebar start-->

    <div id="frm">

      <?php

      require_once "connection1.php";
      $username = $_SESSION['username'];
      session_start();
      if (isset($_REQUEST['btn_insert'])) {
        try {
          $magazin = $_REQUEST['magazin'];
          $nume_unitate = $magazin;
          $telefon = $_REQUEST['telefon'];
          $email = $_REQUEST['email'];
          $adresa = $_REQUEST['adresa'];
          $persoana = $_REQUEST['persoana'];
          $name  = $_REQUEST['txt_name'];  //textbox name "txt_name"
          $_SESSION['test'] = $magazin;
          $image_file  = $_FILES["txt_file"]["name"];
          $type    = $_FILES["txt_file"]["type"];  //file name "txt_file"	
          $size    = $_FILES["txt_file"]["size"];
          $temp    = $_FILES["txt_file"]["tmp_name"];

          $path = "upload/" . $image_file; //set upload folder path

          if (empty($name)) {
            $errorMsg = "Please Enter Name";
          } else if (empty($image_file)) {
            $errorMsg = "Please Select Image";
          } else if (!empty($image_file)) //check file extension
          {
            if (!file_exists($path)) //check file not exist in your upload folder path
            {
              if ($size < 5000000) //check file size 5MB
              {
                move_uploaded_file($temp, "upload/" . $image_file); //move upload file temperory directory to your upload folder
              } else {
                $errorMsg = "Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
              }
            } else {
              $errorMsg = "File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
            }
          } else {
            $errorMsg = "Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //error message file extension
          }
          $sql = "SELECT * FROM parteneri WHERE 1";
          $result = mysqli_query($conectare, $sql);
          $ok = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
          }
          $id = $id + 1;
          echo $id;
          function password_generate($chars)
          {
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($data), 0, $chars);
          }
          function password_generate1($chars)
          {
            $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($data), 0, $chars);
          }
          $code = password_generate(8);
          $code1 = password_generate1(8);
          if (!isset($errorMsg)) {
            $insert_stmt = $db->prepare('INSERT INTO parteneri (nume_stema,nume_partener,stema,adresa_partener,responsabil_unitate,contact_telefon,contact_email,id,cod_activare,cod_activare_profesor, stare_unitate) VALUES(:fmagazin,:fn,:fimage,:fadresa,:fpersoana,:ftelefon,:femail,:fid,:fcode, :fcode1,"ACTIV")'); //sql insert query					
            $insert_stmt->bindParam(':fmagazin', $magazin);
            $insert_stmt->bindParam(':fid', $id);
            $insert_stmt->bindParam(':fn', $nume_unitate);
            $insert_stmt->bindParam(':ftelefon', $telefon);
            $insert_stmt->bindParam(':femail', $email);
            $insert_stmt->bindParam(':fpersoana', $persoana);
            $insert_stmt->bindParam(':fadresa', $adresa);
            $insert_stmt->bindParam(':fcode', $code);
            $insert_stmt->bindParam(':fcode1', $code1);
            $insert_stmt->bindParam(':fimage', $image_file);    //bind all parameter 
            $insert_stmt->bindParam(':fmagazin', $image_file);
            if ($insert_stmt->execute()) {
              $insertMsg = "File Upload Successfully........"; //execute query success message
            }
          }
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      }

      ?>

    </div>

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

  <div style="padding: 50px;"></div>

  <div class="panel-calendar">

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
            var title = prompt("Introduceti numele evenimentului:");
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
            var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
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
                alert("Event Updated");
              }
            });
          },

          eventClick: function(event) {
            if (confirm("Sunteti siguri ca doriti sa stergeti acest eveniment?")) {
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

    <h2 class="calendar-heading" align="center" style='color: #FF00FF; font-weight: bold;'>CALENDAR</h2>

    <div class="container">
      <div id="calendar"></div>
    </div>

  </div>

  <script>
    function displayMessage(message) {
      $(".response").html("<div align='center' style='padding:20px;font-size:18px;color:#3539EA' class='success'>" + message

        +
        "</div>");
      setInterval(function() {
        $(".success").fadeOut();
      }, 2000);
    }
  </script>

</body>

</html>