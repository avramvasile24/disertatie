
<!DOCTYPE html>
<html lang="en">
<?php $temele=0; ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>CURSURI</title>

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
                require_once("connection1.php");
                if (isset($_REQUEST['delete_id'])) {
                  // select image from db to delete
                  $id = $_REQUEST['delete_id'];  //get delete_id and store in $id variable

                  $select_stmt = $db->prepare('SELECT * FROM feedback_tema WHERE id =:id');  //sql select query
                  $select_stmt->bindParam(':id', $id);
                  $select_stmt->execute();
                  $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
                  unlink("upload/" . $row['image']); //unlink function permanently remove your file

                  //delete an orignal record from db
                  $delete_stmt = $db->prepare('DELETE FROM feedback_tema WHERE id =:id');
                  $delete_stmt->bindParam(':id', $id);
                  $delete_stmt->execute();
				  error_reporting(0);
				  header("Location: ./func4.php");
                }

                ?>

            <?php

            require_once("connection.php");

            if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

              redirect("index.php");
            }

            include 'headerlogged.php';
            $username = $_SESSION['username'];
			$prioritate=$_SESSION['functie'];
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


           <b> <?php include 'footer.php'; ?></li></b>
        </div>
        </li>
      </div>
      <!--logo start-->
      <b><a href="dashboard.php" class="logo">MENIU <span class="lite"><?php echo $_SESSION['name']; ?></span></a></b>
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

               <b> <?php include 'footer.php'; ?></b>
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
	
    <!--header end-->

    <div style="padding-top: 100px;"></div>

    <div class="panel-cursuri">
	<center><div class='buton-triforce' style="margin-bottom: 40px; color: #FF00FF; font-weight: bold;"><a href='func4.php'><i class='fa fa-back'></i> REVENITI LA CURSURI</a></div>
	<center><div class='buton-triforce' style="margin-bottom: 40px; color: #FF00FF; font-weight: bold;"><a href='dashboard.php'><i class='fa fa-back'></i> REVENITI LA PAGINA PRINCIPALA</a></div>
      <?php

       $tip=$_POST['tip'];
	    $materie=$_POST['search'];
	    $clasa=$_POST['search1'];

	   $titlu=$_POST['titlu'];

	   $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
      if (!$conectare) {
        die(mysqli_connect_error());
      }
      $sql = "SELECT * FROM cursuri WHERE 1";
      $result = mysqli_query($conectare, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
		  if($materie==$row['curs'] and $clasa==$row['clasa']){
			  $id=$row['id'];
		  }
	  }?>

	  <div class='panel-noutati'>
                          <div class='noutati-heading'style="color: #FF00FF;"><?php echo $materie;echo '-'; echo $clasa; ?></div>
                          <table class='tabel-noutati'> <?php
	   $conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
      if (!$conectare) {
        die(mysqli_connect_error());
      }
	  if($tip=="LECTIE"){
      $sql2 = "SELECT * FROM continut WHERE idCurs='$id'";
      $result2 = mysqli_query($conectare, $sql2);
	  
      while ($row2 = mysqli_fetch_assoc($result2)) {
		  if($titlu==$row2['titlu']){echo $row2['titlu'];
			  echo "<tr><td>",
			  "Saptamana: <b class='titlu-noutate'>", $row2['saptamana'], "</b><br/>",
                  "Titlu: <b class='titlu-noutate'>", $row2['titlu'], "</b><br/>",

                  "CONTINUT: <b style='color: #ff00ff;'>", $row2['continut'], "</b></br>",
                  "</td></tr>";

	  }}} else {
		        $sql1 = "SELECT * FROM teme WHERE idCurs='$id'";

      $result1 = mysqli_query($conectare, $sql1);
      while ($row1 = mysqli_fetch_assoc($result1)) {
		  if($titlu==$row1['titlu']){
			  $ok=$row1['titlu'];
			  echo "<tr><td>",
			  "Saptamana: <b class='titlu-noutate'>", $row1['saptamana'], "</b><br/>",
                  "Titlu: <b class='titlu-noutate'>", $row1['titlu'], "</b><br/>",

                  "Continut:<br> <b style='color: #ff00ff;'>", $row1['continut'], "</b></br>",
                  "Termen limita: <b>", $row1['data_final'], "</b> <br/><br/>",
                  
                  "</td></tr>";
	  $a=$row1['saptamana'];}}
	$conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
      if (!$conectare) {
        die(mysqli_connect_error());
      }
      $sql10 = "SELECT id FROM teme WHERE saptamana='$a' and idCurs='$id'";
      $result10 = mysqli_query($conectare, $sql10);
      while ($row10 = mysqli_fetch_assoc($result10)) {
			  $c=$row10['id'];
	  }
			$conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
?>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
          <thead>
          </thead>
          <tbody>

            <?php
            include 'connection1.php';
            $select_stmt = $db->prepare("SELECT * FROM feedback_tema WHERE idTema='$c'");  //sql select query
            $select_stmt->execute();

            while ($row12 = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
              if ($row12 != 1) { 
                    }
                  }
                      ?>

	         <div style="padding-top: 100px;"></div>

      <div id="frm" class="panel-parteneri">
        <div class="panel-body">
          <div class="table-responsive">

            <div class="titlu-parteneri">TEMELE INCARCATE</div>

            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>USERNAME</th>
                  <th>DOCUMENTE</th>
				  <th>COMENTARIU</th>
				  <th>FEEDBACK</th>
				  <th>COMENTARIU PROFESOR</th>
				  <?php if($_SESSION['functie']=='PROFESOR'){?>
				  <th>EDITEAZA</th> <?php } ?>
                  <th>STERGE</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select_stmt = $db->prepare("SELECT * FROM feedback_tema WHERE idTema='$c'");  //sql select query
                $select_stmt->execute();
                while ($row13 = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                      <tr>
					     <form method="POST" action="edit_feedback.php?sender=<?php echo $c;?>&sender1=<?php echo $row13['username_predat']; ?>">
                        <td><?php echo $row13['username_predat']; ?></td>
                        <td><embed src="upload/<?php echo $row13['document_incarcat']; ?>" height="200px" /></td>
						<td><?php echo $row13['comentariu_elev']; ?></td>
						<?php if($_SESSION['functie']=='PROFESOR'){?>
						<td><input type="number" name="nota" value="<?php echo $row13['feedback'];?>"> </td>
						<td><input type="text" name="comentariu" value="<?php echo $row13['comentariu'];?>"></td>
                        <td><input type="submit" class="btn btn-warning" value=' ADAUGA'></td><?php } else {?>
						<td><?php  echo $row13['feedback']; ?></td>
						<td><?php echo $row13['comentariu']?></td><?php } ?>
                        <td><a href="?delete_id=<?php echo $row13['id']; ?>" class="btn btn-danger">STERGE</a></td>
                      </tr>
                <?php
                }
                ?>
              </tbody>
            </table>


          </div>
        </div>
      </div>

    </div><?php
		  }  
		if($prioritate =='ELEV' and $tip!='LECTIE'){
			
				     ?> 
	
		<div class="panel-cursuri"><table class='tabel-noutati'><h4>Încarcă Temă</h4>
    <form action="upload_tema.php" method="POST" enctype="multipart/form-data">
        <label for="nume_tema">Nume Temă:</label>
        <input type="text" name="nume_tema" required value="<?php echo $ok; ?>" readonly><br>

        <label for="document_tema">Document Temă:</label>
        <input type="file" name="document_tema" required><br>

        <label for="comentariu_elev">Comentariu Elev:</label>
        <textarea name="comentariu_elev"></textarea><br>

        <input type="submit" value="Încarcă Temă">
    </form>
		<?php }
		else if($prioritate=='PROFESOR'){
			
	  } ?>
	  <?php error_reporting(0); ?>