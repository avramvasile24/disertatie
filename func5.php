<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>CURSURI</title><?php
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
                session_start();
				$clasa=$_SESSION['clasa'];

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

    <div class="panel-cursuri">
	<center><div class='buton-triforce' style="margin-bottom: 40px; color: #FF00FF; font-weight: bold;"><a href='func4.php'><i class='fa fa-back'></i> REVENITI LA CURSURI</a></div>
	<center><div class='buton-triforce' style="margin-bottom: 40px; color: #FF00FF; font-weight: bold;"><a href='dashboard.php'><i class='fa fa-back'></i> REVENITI LA PAGINA PRINCIPALA</a></div>
      <?php
      $verificare1 = $_POST['search1'];
	  $verificare = $_POST['search'];
      if($verificare1==null and $verificare==null)
	  {
		  	if (isset($_GET['v2'])) {
			$verificare1 = $_GET['v2'];}
		  	if (isset($_GET['v1'])) {
    $verificare = $_GET['v1'];

	  }}
      echo "<form action='adauga-curs.php' method='POST'>  
                <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/></form>
            ";

      $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');

      if (!$conectare) {
        die(mysqli_connect_error());
      }

      $sql = "SELECT * FROM cursuri WHERE 1";
      $result = mysqli_query($conectare, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['profesor'] == $username and $row['curs'] == $verificare and $row['clasa'] == $verificare1) {
          echo "<div class='sectiune-curs'>";

          echo "<div class='materie-clasa'>", $row['curs'], " - ", $row['clasa'], "</div>
		  <form action='adauga-curs.php' method='POST'>
		                    <input type='hidden' id='searchfield' name='search' value='", $row['curs'], "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $row['clasa'], "'/>";
          echo "<input class='buton-adauga-continut' type='submit' name='submit' value='Adauga Continut'></form>
                  <input type='hidden' id='searchfield' name='search' value='", $row['curs'], "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $row['clasa'], "'/>
          <a href='sterge-curs.php'><button type='button' class='buton-stergere-curs' onclick='myFunction()' type='submit'>Stergere curs</button></form>
                  <script>
                      function myFunction() {
                        alert('Aceasta actiune va sterge cursul, continuati?');
                      }
                  </script>
                </a>
                <form action='editeaza-curs.php' method='POST'>  
                <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/>
                <input class='buton-adauga-continut' type='submit' name='submit' value='Editeaza Continut'></form>";
          echo "</div>";
        } else if ($username == "admin" ) {
			$ok=0;
			while ($row = mysqli_fetch_assoc($result) and $ok==0) {
        if ( $row['curs'] == $verificare and $row['clasa'] == $verificare1) {$ok=$ok+1;
          echo "<div class='sectiune-curs'>";
          echo "<div class='materie-clasa'>", $row['curs'], " - ", $row['clasa'], "</div>
		  <form action='adauga-curs.php' method='POST'>
		                    <input type='hidden' id='searchfield' name='search' value='", $row['curs'], "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $row['clasa'], "'/>";
          echo "<input class='buton-adauga-continut' type='submit' name='submit' value='Adauga Continut'></form>
             <form action='sterge-curs.php' method='POST'>  
                  <input type='hidden' id='searchfield' name='search' value='", $row['curs'], "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $row['clasa'], "'/>
          <a href='sterge-curs.php'><button type='submit' class='buton-stergere-curs' onclick='myFunction()' type='submit'>Stergere curs</button></form>
            <script>
                function myFunction() {
                  alert('Aceasta actiune va sterge cursul, continuati?');
                }
            </script>
          </a>
<form action='editeaza-curs.php' method='POST'>  
                  <input type='hidden' id='searchfield' name='search' value='", $row['curs'], "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $row['clasa'], "'/>
          <input class='buton-triforce' type='submit' name='submit' value='Editeaza Continut'></form>";
          echo "</div>";
        }
	  }}}
      ?>
</center></center>
      <?php
      $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
      if (!$conectare) {
        die(mysqli_connect_error());
      }
      $sql1 = "SELECT * FROM cursuri WHERE 1";
      $result1 = mysqli_query($conectare, $sql1);$ok=0;
      while ($row1 = mysqli_fetch_assoc($result1) and $ok==0) {
        if ($row1['profesor'] == $username and $row1['curs'] == $verificare and $row1['clasa']==$verificare1) {$ok=$ok+1;
			 $id=$row1['id'];
			 $row1['curs'];
		$sql2 = "SELECT * FROM continut WHERE idCurs='$id' ORDER BY saptamana";
      $result2 = mysqli_query($conectare, $sql2);
	  $okk=0;
	  	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">LECTII</div>';
		  $saptamana=1;
		  $lectie='LECTIE';
      while ($row2 = mysqli_fetch_assoc($result2)) {
		  if($saptamana==$row2['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><br><div class="buton-triforce" style="margin-bottom: 40px;">SAPTAMANA:',$row2['saptamana'],'</center></div>';}
		   if($saptamana!=$row2['saptamana']) {$okk=0; $saptamana=$row2['saptamana'];}
		  
		  echo "<center> <form action='curs-vizibil.php' method='POST'>  
		  <input type='hidden' id='searchfield' name='tip' value='", $lectie, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/>
				   <input type='hidden' id='searchfield' name='titlu' value='", $row2['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row2['titlu'],"'/>
                </form></center>";
		

        }
	$sql3 = "SELECT * FROM teme WHERE idCurs='$id' ORDER BY saptamana";
      $result3 = mysqli_query($conectare, $sql3);
	  $okk=0;
	  		  $saptamana=1;
	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">TEME</div>';
	  $teme='TEME';
      while ($row3 = mysqli_fetch_assoc($result3)) {
		  if($saptamana==$row3['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><br><div class="buton-triforce" style="margin-bottom: 40px;">SAPTAMANA:',$row3['saptamana'],'</div><br>';}
		   if($saptamana!=$row3['saptamana']) {$okk=0; $saptamana=$row3['saptamana'];}
		  echo "<center> <form action='curs-vizibil.php' method='POST'>  
		  <input type='hidden' id='searchfield' name='tip' value='", $teme, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/>
				                    <input type='hidden' id='searchfield' name='titlu' value='", $row3['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row3['titlu'],"'/>
				  				  <h4><b>TERMEN pana in: ",$row3['data_final'], "</b></h4></center>
                </form>";
		

        }
		}
		
        else if ($row1['clasa'] == $verificare1 and $row1['curs'] == $verificare) {
            			$id=$row1['id'];
		$sql2 = "SELECT * FROM continut WHERE idCurs='$id' ORDER BY saptamana";
      $result2 = mysqli_query($conectare, $sql2);
	  $okk=0;
	  	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">LECTII</div>';
		  $saptamana=1;
		  $lectie="LECTIE";
      while ($row2 = mysqli_fetch_assoc($result2)) {
		  if($saptamana==$row2['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><br><div class="buton-triforce" style="margin-bottom: 40px;">SAPTAMANA:',$row2['saptamana'],'</div>';}
		   if($saptamana!=$row2['saptamana']) {$okk=0; $saptamana=$row2['saptamana'];}
		  $lectie="LECTIE";
		  echo " <center><form action='curs-vizibil.php' method='POST'>  
		  <input type='hidden' id='tip' name='tip' value='", $lectie, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/>
				   <input type='hidden' id='searchfield' name='titlu' value='", $row2['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row2['titlu'],"'/>
                </form>";
		

        }
	$sql3 = "SELECT * FROM teme WHERE idCurs='$id' ORDER BY saptamana";
      $result3 = mysqli_query($conectare, $sql3);
	  $okk=0;
	  		  $saptamana=1;
			  $teme="TEME";
	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">TEME</div>';
      while ($row3 = mysqli_fetch_assoc($result3)) {
		  if($saptamana==$row3['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><br><div class="buton-triforce" style="margin-bottom: 40px;"><center>SAPTAMANA:',$row3['saptamana'],'</div>';}
		   if($saptamana!=$row3['saptamana']) {$okk=0; $saptamana=$row3['saptamana'];}
		  echo " <center><form action='curs-vizibil.php' method='POST'>  
		   <center><input type='hidden' id='searchfield' name='tip' value='", $teme, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='",$verificare1, "'/>
				  <input type='hidden' id='searchfield' name='titlu' value='", $row3['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row3['titlu'],"'/>
				  				  <h4><b>TERMEN pana in: ",$row3['data_final'], "</b></h4></center>
                </form>";
		

        }
		}
		else if($username=="admin" and $row1['curs'] == $verificare and $row1['clasa']==$verificare1){$ok=$ok+1;		$sql2 = "SELECT * FROM continut WHERE idCurs='$id' ORDER BY saptamana";
      $result2 = mysqli_query($conectare, $sql2);
	  $okk=0;
	  	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">LECTII</div>';
		  $saptamana=1;
		  $lectie='LECTIE';
      while ($row2 = mysqli_fetch_assoc($result2)) {$lectie="LECTIE";
		  if($saptamana==$row2['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><br><div class="buton-triforce" style="margin-bottom: 40px;">SAPTAMANA:',$row2['saptamana'],'</div>';}
		   if($saptamana!=$row2['saptamana']) {$okk=0; $saptamana=$row2['saptamana'];}
		  echo " <center><form action='curs-vizibil.php' method='POST'>  
		  <input type='hidden' id='tip' name='tip' value='", $lectie, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/>
				   <input type='hidden' id='searchfield' name='titlu' value='", $row2['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row2['titlu'],"'/>
                </form>";
        }
	$sql3 = "SELECT * FROM teme WHERE idCurs='$id' ORDER BY saptamana";
      $result3 = mysqli_query($conectare, $sql3);
	  $okk=0;
	  		  $saptamana=1;
	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">TEME</div>';
	  $teme='TEME';
      while ($row3 = mysqli_fetch_assoc($result3)) {
		  if($saptamana==$row3['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><br><div class="buton-triforce" style="margin-bottom: 40px;"><center>SAPTAMANA:',$row3['saptamana'],'</div><br>';}
		   if($saptamana!=$row3['saptamana']) {$okk=0; $saptamana=$row3['saptamana'];} 
		  echo " <center><form action='curs-vizibil.php' method='POST'>  
		  <input type='hidden' id='tip' name='tip' value='", $teme, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/>
				                    <input type='hidden' id='searchfield' name='titlu' value='", $row3['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row3['titlu'],"'/>
				  				  <center><h4><b>TERMEN pana in: ",$row3['data_final'], "</b></h4></center>
                </form>";
		

        }
		}
        else if ($row1['clasa'] == $clasa and $row1['curs'] == $verificare) {
            			$id=$row1['id'];
		$sql2 = "SELECT * FROM continut WHERE idCurs='$id' ORDER BY saptamana";
      $result2 = mysqli_query($conectare, $sql2);
	  $okk=0;
	  	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">LECTII</div>';
		  $saptamana=1;
      while ($row2 = mysqli_fetch_assoc($result2)) {$lectie="LECTIE";
		  if($saptamana==$row2['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><br><div class="buton-triforce" style="margin-bottom: 40px;">SAPTAMANA:',$row2['saptamana'],'</div>';}
		   if($saptamana!=$row2['saptamana']) {$okk=0; $saptamana=$row2['saptamana'];} ?> <br><br> <?php
		  echo " <center><form action='curs-vizibil.php' method='POST'>  
		  <input type='hidden' id='tip' name='tip' value='", $lectie, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='", $verificare1, "'/>
				   <input type='hidden' id='searchfield' name='titlu' value='", $row2['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row2['titlu'],"'/>
                </form>";
		

        }
	$sql3 = "SELECT * FROM teme WHERE idCurs='$id' ORDER BY saptamana";
      $result3 = mysqli_query($conectare, $sql3);
	  $okk=0;
	  		  $saptamana=1;
	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">TEME</div>';
      while ($row3 = mysqli_fetch_assoc($result3)) { $teme="TEME";
		  if($saptamana==$row3['saptamana'] and $okk==0 ){ $okk=$okk+1;
		   echo '<center><center><br><div class="buton-triforce" style="margin-bottom: 40px;"><center>SAPTAMANA:',$row3['saptamana'],'</div>';}
		   if($saptamana!=$row3['saptamana']) {$okk=0; $saptamana=$row3['saptamana'];}
		  echo " <center><form action='curs-vizibil.php' method='POST'>  
				  <input type='hidden' id='tip' name='tip' value='", $teme, "'/>
                  <input type='hidden' id='searchfield' name='search' value='", $verificare, "'/>
                  <input type='hidden' id='searchfield' name='search1' value='",$verificare1, "'/>
				  <input type='hidden' id='searchfield' name='titlu' value='", $row3['titlu'], "'/>
                  <input class='buton-triforce' type='submit' name='submit' value='", $row3['titlu'],"'/>
				  				  <center><h4><b>TERMEN pana in: ",$row3['data_final'], "</b></h4></center>
                </form>";
		

        }}
		}
        
      
	  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disertatie";

// Crearea conexiunii
$conn10 = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn10->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}
// ID-ul profesorului și ID-ul cursului
$idProfesor = $_SESSION['username']; // înlocuiește cu ID-ul profesorului dorit
$idCurs = $id; // înlocuiește cu ID-ul cursului dorit

// Interogarea SQL pentru a selecta întrunirile
$sql10 = "SELECT * FROM intalniri WHERE idCurs = '$idCurs'";
$result10 = $conn10->query($sql10);
	  echo '      <div class="header-pagina" style="margin-bottom: 40px;">ÎNTĂRNIRII</div>';

// Verificarea rezultatelor
if ($result10->num_rows > 0) {
    // Extragerea și afișarea datelor într-un loop
    while ($row10 = $result10->fetch_assoc()) {
        echo  "<center><form action='http://localhost:3000' method=''>  
                  <input class='buton-triforce' type='submit' name='submit' value='", $row10['nume'] ,' ', $row10['data'] ,' ', $row10['time'] ,"'/>";
        // și alte informații dorite
        echo "<br>";
    }
} else {
    echo "Nu s-au găsit întruniri pentru profesorul și cursul specificate.";
}?>
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

</body>

</html>