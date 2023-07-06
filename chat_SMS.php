<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['sender'])) {
$sender = $_GET['sender'];}

                require_once("connection.php");

              if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

                redirect("index.php");
              }
			  session_start();
// Informațiile de conectare la baza de date
$hostname = 'localhost'; // Adresa serverului de baze de date
$username = 'root'; // Numele de utilizator pentru baza de date
$password = ''; // Parola pentru baza de date
$database = 'disertatie'; // Numele bazei de date
// Realizăm conexiunea la baza de date
$conectare = mysqli_connect($hostname, $username, $password, $database);
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.right {
  float: right;
  color: #00000;
}

.left {
  float: left;
  color: #999;
}
</style>
</head>
<body>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Platforma Educationala</title>

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
			  session_start();

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

                <?php include 'footer.php'; ?>
            </li>
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
            <a data-toggle="dropdown" class="dropdown-toggle" href="">
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
			  $username=$_SESSION['username'];
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
            <a data-toggle="dropdown" class="dropdown-toggle" href="">
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
<br><br><br><br><br><br><center>
<h2>Chat Messages</h2>
  <?php
// Informațiile de conectare la baza de date
$hostname = 'localhost'; // Adresa serverului de baze de date
$username = 'root'; // Numele de utilizator pentru baza de date
$password = ''; // Parola pentru baza de date
$database = 'disertatie'; // Numele bazei de date

// Realizăm conexiunea la baza de date
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die('Conexiunea la baza de date a eșuat: ' . mysqli_connect_error());
}

// Obținem mesajele din baza de date și le ordonăm după data și timp
$query = "SELECT * FROM messenger ORDER BY data_si_timp ASC";
$result = mysqli_query($conn, $query);

// Verificăm dacă există mesaje în baza de date
if (mysqli_num_rows($result) > 0) {
    // Afisam mesajele
    while ($row = mysqli_fetch_assoc($result)) {
        $usernameInitial = $row['username_initial'];
        $usernameFinal = $row['username_final'];
        $content = $row['continut'];
        $dateTime = $row['data_si_timp'];
		?>

      <?php  if ($usernameInitial === $_SESSION['username'] && $usernameFinal === $sender) {
            // Dacă ești tu expeditorul și destinatarul, afișează mesajul invers
?><div class="container"><span class="left"><h4><?php echo $usernameInitial; ?></h4>
  <span class="left"><p><?php echo $content; ?></p>
  <span class="time-left"><?php echo $dateTime; ?></span>
</div>
<?php } elseif ($usernameFinal === $_SESSION['username'] && $usernameInitial === $sender) { ?>
<div class="container"><span class="right"><h4><?php echo $usernameInitial; ?></h4>
  <span class="right"><p><?php echo $content; ?></p>
  <span class="time-right"><?php echo $dateTime; ?></span>
</div>
<?php } 
}} 

// Închidem conexiunea la baza de date
mysqli_close($conn);
?>

<?php
// Informațiile de conectare la baza de date a mesageriei
$hostname = 'localhost'; // Adresa serverului de baze de date
$username1 = 'root'; // Numele de utilizator pentru baza de date a mesageriei
$password = ''; // Parola pentru baza de date a mesageriei
$database = 'disertatie'; // Numele bazei de date a mesageriei

// Informațiile de conectare la baza de date de utilizatori
$hostname_user = 'localhost'; // Adresa serverului de baze de date de utilizatori
$username_user = 'root'; // Numele de utilizator pentru baza de date de utilizatori
$password_user = ''; // Parola pentru baza de date de utilizatori
$database_user = 'disertatie'; // Numele bazei de date de utilizatori

// Informațiile de conectare la baza de date de utilizatori
$hostname_user = 'localhost'; // Adresa serverului de baze de date de utilizatori
$username_user = 'root'; // Numele de utilizator pentru baza de date de utilizatori
$password_user = ''; // Parola pentru baza de date de utilizatori
$database_user = 'disertatie'; // Numele bazei de date de utilizatori

// Realizăm conexiunea la baza de date a mesageriei
$conn_mesagerie = mysqli_connect($hostname, $username, $password, $database);
if (!$conn_mesagerie) {
    die('Conexiunea la baza de date a mesageriei a eșuat: ' . mysqli_connect_error());
}

// Realizăm conexiunea la baza de date de utilizatori
$conn_utilizatori = mysqli_connect($hostname_user, $username_user, $password_user, $database_user);
if (!$conn_utilizatori) {
    die('Conexiunea la baza de date de utilizatori a eșuat: ' . mysqli_connect_error());
}

// Obținem utilizatorii din baza de date de utilizatori
$query_user = "SELECT username FROM users";
$result_user = mysqli_query($conn_utilizatori, $query_user);

// Verificăm dacă există utilizatori în baza de date
if (mysqli_num_rows($result_user) > 0) {
    // Construim opțiunile pentru select
    $options = '';
    while ($row_user = mysqli_fetch_assoc($result_user)) {
        $username = $row_user['username'];
        $options .= '<option value="' . $username . '">' . $username . '</option>';
    }
} else {
    echo 'Nu există utilizatori în baza de date.';
}
// Realizăm conexiunea la baza de date a mesageriei
$conn_mesagerie = mysqli_connect($hostname, $username1, $password, $database);
if (!$conn_mesagerie) {
    die('Conexiunea la baza de date a mesageriei a eșuat: ' . mysqli_connect_error());
}

// Realizăm conexiunea la baza de date de utilizatori
$conn_utilizatori = mysqli_connect($hostname, $username1, $password, $database);
if (!$conn_utilizatori) {
    die('Conexiunea la baza de date de utilizatori a eșuat: ' . mysqli_connect_error());
}
$dateTime = date('Y-m-d H:i:s');
// Verificăm dacă formularul a fost trimis
if (isset($_POST['trimite'])) {
    $usernameInitial = $_SESSION['username']; // Numele tău de utilizator
    $usernameFinal = $_POST['username_final']; // Numele destinatarului
    $content = $_POST['continut']; // Conținutul mesajului
    $dateTime = date('Y-m-d H:i:s');
    // Verificăm dacă destinatarul există în baza de date de utilizatori
    $query_user = "SELECT * FROM users WHERE username = '$usernameFinal'";
    $result_user = mysqli_query($conn_utilizatori, $query_user);

    if (mysqli_num_rows($result_user) > 0) {
        // Salvăm mesajul în baza de date a mesageriei
        $query_mesaj = "INSERT INTO messenger (username_initial, username_final, continut, data_si_timp) VALUES ('$usernameInitial', '$usernameFinal', '$content','$dateTime')";
        $result_mesaj = mysqli_query($conn_mesagerie, $query_mesaj);

        if ($result_mesaj) {
            echo 'Mesajul a fost trimis cu succes!';
        } else {
            echo 'Eroare la trimiterea mesajului.';
        }
    } else {
        echo 'Destinatarul nu există în baza de date de utilizatori.';
    }
}

// Închidem conexiunea la baza de date a mesageriei
mysqli_close($conn_mesagerie);

// Închidem conexiunea la baza de date de utilizatori
mysqli_close($conn_utilizatori);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trimiteți un mesaj</title>
</head>
<body>
    <h2>Trimiteți un mesaj</h2>
    <form method="POST" action="">
        <label for="username_final">Username destinatar:</label>
        <input name="username_final" id="username_final" required value="<?php echo $sender; ?>" readonly>
        <br><br>
        <label for="continut">Conținut mesaj:</label>
        <textarea name="continut" id="continut" rows="5" required></textarea>
        <br><br>
        <input type="submit" name="trimite" value="Trimite">
    </form>
</body>
</html>

</center>
</body>

</html>