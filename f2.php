<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Orar</title>

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

           <b> <?php include 'footer.php'; ?></li>
        </div>
        </li>
      </div>
      <!--logo start-->
      <a href="dashboard.php" class="logo">MENIU <span class="lite"><?php echo $_SESSION['name']; ?></span></a>
      <!--logo end--></b>



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
                <?php
                require_once("connection1.php");
                if (isset($_REQUEST['delete_id'])) {
                  // select image from db to delete
                  $id = $_REQUEST['delete_id'];  //get delete_id and store in $id variable

                  $select_stmt = $db->prepare('SELECT * FROM orar_pdf WHERE id =:id');  //sql select query
                  $select_stmt->bindParam(':id', $id);
                  $select_stmt->execute();
                  $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                  unlink("upload/" . $row['image']); //unlink function permanently remove your file

                  //delete an orignal record from db
                  $delete_stmt = $db->prepare('DELETE FROM orar_pdf WHERE id =:id');
                  $delete_stmt->bindParam(':id', $id);
                  $delete_stmt->execute();
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

             <b>  <?php include 'footer.php'; ?></b>
              </li>
            </ul>
          </li>
          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
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
  </section>

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
  <!--sidebar start-->

  <div style="padding-top: 100px;"></div>

  <div id="frm" class="panel-parteneri">
    <div class="titlu-parteneri">ORAR</div>

    <div class="col-lg-12">
      <div class="col-lg-12">
        <?php $sql3 = "SELECT * FROM users WHERE 1";
        $result3 = mysqli_query($conectare, $sql3);
        $ok = 0;

        while ($row2 = mysqli_fetch_assoc($result3) and $ok == 0) {
          if ($row2['functie'] == "SECRETARIAT" and $username==$row2['username']) {
            echo '<div class="buton-triforce"><a href="orar.php"><i class="fa fa-plus"></i> ADAUGA ORAR</a></div>';
            $ok = 1;
          } else if ($row2['functie'] == "ADMIN" and $username==$row2['username']) {
            echo '<div class="buton-triforce"><a href="orar.php"><i class="fa fa-plus"></i> ADAUGA ORAR</a></div>';
            $ok = 1;
          }
        }
        ?>

        <div style="margin-bottom: 30px;"></div>

        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>CLASA:</th>
                  <th>ORAR</th><?php $sql4 = "SELECT * FROM users WHERE 1";
                                $result4 = mysqli_query($conectare, $sql4);
                                $ok = 0;
                                while ($row4 = mysqli_fetch_assoc($result4) and $ok == 0) {
                                  if ($row4['functie'] == "SECRETARIAT" and $username==$row4['username']) {
                                    echo '
                                            <th>STERGE</th>';
                                    $ok = 1;
                                  } else				 if ($row4['functie'] == "ADMIN" and $username==$row4['username']) {
                                    echo '
                                            <th>STERGE</th>';
                                    $ok = 1;
                                  }
                                }
                                ?>
                </tr>
              </thead>
              <tbody>
                <?php
                $select_stmt = $db->prepare("SELECT * FROM orar_pdf WHERE 1");  //sql select query
                $select_stmt->execute();
                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                  if ($row != 1) {
                    if ($username != null) {
                ?>
                      <tr>
                        <td><?php echo $row['clasa']; ?></td>
                        <td><embed src="upload/<?php echo $row['orar']; ?>" height="600px" /></td>
                        <?php $sql = "SELECT * FROM users WHERE 1";
                        $result = mysqli_query($conectare, $sql);
                        $ok = 0;
                        while ($row1 = mysqli_fetch_assoc($result) and $ok == 0) {
                          if ($row1['functie'] == "SECRETARIAT" and $username==$row1['username']) {
                            echo '<td><a href="?delete_id='; echo $row["id"];  echo '<a class="btn btn-danger">STERGE</a></td>';
                            $ok = 1;
                          } else				 if ($row1['functie'] == "ADMIN" and $username==$row1['username']) {
  echo '<td><a href="?delete_id='; echo $row["id"];  echo ' <a class="btn btn-danger">STERGE</a></td>';                            $ok = 1;
                          }
                        }
                        ?>

                      </tr>
                <?php
                    } else {
                      $ok = 0;
                    }
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>

  </div>

  </div>

</body>

</html>