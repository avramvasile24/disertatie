<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Creare Curs Nou</title>

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

              <?php

              require_once("connection.php");

              if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

                redirect("index.php");
              }

              include 'headerlogged.php';
              $username = $_SESSION["username"];
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
        </div>
        </li>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo">MENIU <span class="lite"><?php echo $_SESSION['name']; ?></span></a>
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
              <span class="badge bg-important"></span>
            </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>

              <li>
                <a href="#">NICIUN MESAJ</a>
              </li>
            </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

              <i class="icon-bell-l"></i>
              <span class="badge bg-important"></span>
            </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>


              <li>
                <a href="#">NICIO NOTIFICARE</a>
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
                <a href="profil.php"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
              </li>
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li>
              <li>

              <li><a href="logout.php"><i class="icon_key_alt"></i>Logout</a></li>
              </a>
          </li>
          <li>
            <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
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

    <div class="panel-creare-curs">
      <div class="header-pagina">CREEAZA CURS</div>
      <div class="panel-body">
        <div class="padd">

          <div class="form quick-post">
            <!-- Edit profile form (not working)-->
            <form class="form-horizontal" action="creearecurs.php" method="POST">
              <!-- Title -->
              <div class="form-group">
                <label class="control-label col-lg-2" for="curs">Denumire curs</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="curs" name="curs">
                </div>
              </div>
              <!-- Content -->
              <div class="form-group">
                <label class="control-label col-lg-2" for="cod">Cod-activare</label>
                <div class="col-lg-10">
                  <textarea class="form-control" id="cod" name="cod"></textarea>
                </div>
              </div>
              <!-- Cateogry -->
              <div class="form-group">
                <label class="control-label col-lg-2">Specialitate</label>
                <div class="col-lg-10">
                  <select class="form-control">
                    <option value="">- Choose Category -</option>
                    <option value="1">Romana</option>
                    <option value="2">Matematica</option>
                    <option value="3">Informatica</option>
                    <option value="4">Fizica</option>
                    <option value="5">Geografie</option>
                    <option value="6">Chimie</option>
                    <option value="7">Istorie</option>
                    <option value="8">Altele</option>
                  </select>
                </div>
              </div>
              <!-- Tags -->
              <div class="form-group">
                <label class="control-label col-lg-2" for="number">Clasa</label>
                <div class="col-lg-10">
                  <select name="number">
                    <?php
					$idUnitate=$_SESSION['idUnitate'];
					$sql = "SELECT * FROM cys WHERE 1";
                    $result = mysqli_query($conectare, $sql);
                    $ok = 0;
                    while ($row = mysqli_fetch_assoc($result)) {if($row['idUnitate']==$idUnitate){ ?>
                      <option><?php echo $clasa = $row['cys']; ?> </option>
                    <?php }} ?>
                  </select>
                </div>
              </div>

              <!-- Buttons -->
              <div class="form-group">
                <!-- Buttons -->
                <div class="col-lg-offset-2 col-lg-9">
                  <button type="submit" class="buton-publica-anunt">CREEAZA</button>

                  <button type="reset" class="buton-reset-anunt">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="panel-cursuri">
      <?php
      $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
      if (!$conectare) {
        die(mysqli_connect_error());
      }
      $sql = "SELECT * FROM cursuri WHERE 1";
      $result = mysqli_query($conectare, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['profesor'] == $username) {
          echo "<div class='sectiune-curs'>
                <div class='materie-clasa'>", $row['curs'], " - ", $row['clasa'], "</div>
                <form action='func5.php' method='POST'>  
                  <input type='hidden' id='searchfield' name='search' value='", $row['curs'], "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $row['clasa'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='ACCESEAZA CURS'/>
                </form>
            </div>";
        }
      }
      ?>
    </div>

    </div>
    <div class="row">
      <!--sidebar end-->

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

</body>

</html>