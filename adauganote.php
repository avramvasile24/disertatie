 
<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index1.php');
endif;?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>DOCUMENTE</title>

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
  <section id="container" class="">


    <header class="header dark-bg">
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
$username=$_SESSION['username'];
 $conectare=mysqli_connect('localhost','root','','licenta');
if(!$conectare)
{
die(mysqli_connect_error());
}
$sql="SELECT * FROM profil WHERE 1";
$result=mysqli_query($conectare,$sql);
while ($row = mysqli_fetch_assoc($result)) {
	if($row['username']==$username){
	$ok=$row['nume'];
	}
}
$verificare=$_POST['search'];
?>

<div class="row">

    <div>
<?php echo$_SESSION["titlu"] ?>
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
</li></div>
      <!--logo start-->
      <a href="dashboard.php" class="logo">MENIU <span class="lite"><?php  echo $ok;?></span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

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
$username=$_SESSION["username"];

$sql="SELECT * FROM users WHERE 1";
$result=mysqli_query($conectare,$sql);
$ok=0;
while ($row = mysqli_fetch_assoc($result)) {
	if($row['username']==$username)
		$clasa=$row['clasa'];
}

?>

<div class="row">

    <div>
<?php echo$_SESSION["titlu"] ?>
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
                            <span class="username"><?php echo$_SESSION["titlu"] ?></span>
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
    </header>
	<div id="frm">
<?php

require_once "connection1.php";
$username=$_SESSION['username'];
session_start();
if(isset($_REQUEST['btn_insert']))
{
	try
	{
		$profesor= $_REQUEST['magazin'];
        $clasa=$_REQUEST['clasa'];
        $elev=$_REQUEST['elev'];	
        $nota=$_REQUEST['nota'];
        $data_nota=$_REQUEST['data_nota'];
        $absenta=$_REQUEST['absenta'];		
		$name	= $_REQUEST['elev'];	//textbox name "txt_name"
			$_SESSION['test']=$magazin;
	if($_FILES["txt_file"]=='null'){$image_file	= 0;
		$type		= 0;	//file name "txt_file"	
		$size		= 0;
		$temp		= 0;
	}else{
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//file name "txt_file"	
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		
		$path="upload/".$image_file; //set upload folder path
	}
		if(!isset($errorMsg))
		{
			$insert_stmt=$db->prepare('INSERT INTO catalog (user,referinta,id,clasa, nota_materie,nume, absenta,profesor) VALUES(:fmagazin,:fimage,:fname, :fclasa,:fnota,:felev,:fabsenta,:fdata,:fusername)'); //sql insert query					
			$insert_stmt->bindParam(':fname',$magazin);	
			$insert_stmt->bindParam(':fnota',$nota);	
			$insert_stmt->bindParam(':felev',$elev);	
			$insert_stmt->bindParam(':fabsenta',$absenta);	
			$insert_stmt->bindParam(':fdata',$data);
			$insert_stmt->bindParam(':fusername',$profesor);			
			$insert_stmt->bindParam(':fimage',$image_file);	  //bind all parameter 
		$insert_stmt->bindParam(':fmagazin',$image_file);	
			if($insert_stmt->execute())
			{
				$insertMsg="File Upload Successfully........"; //execute query success message
			}
		}
	}
	catch(PDOException $e)
	{
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
  <<script src="js/fullcalendar.min.js"></script>
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
	<br><br><br><br><br>
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <br>
		  <br>
		  <br>
		  <br>
          <a class="navbar-brand" ><h3><b>ADAUGA-NOTE-ABSENTE</b></h3></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="dashboard.php">Pagina principala</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>SUCCESS ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?>   
		<?php $clasa=$_POST['clasa']; ?>
			<form  method="post" class="form-horizontal" enctype="multipart/form-data">
										<div class="form-group">
										
				<label class="col-sm-3 control-label">PROFESOR</label>
				<div class="col-sm-6">
				<select name="magazin"> 
		<option><?php echo $username; ?></option> 
	</select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">CLASA:</label>
				<div class="col-sm-6">
				<select name="clasa"> 
		<option><?php echo $clasa; ?> </option></select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">ELEV:</label>
				<div class="col-sm-6">
				<select name="elev"> 
		<?php $sql="SELECT * FROM users WHERE 1";
$result=mysqli_query($conectare,$sql);
$ok=0;
while ($row = mysqli_fetch_assoc($result)) if($clasa==$row['clasa']){?>
		<option><?php  echo $row['nume']; ?> </option>
<?php } ?></select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">MATERIE:</label>
				<div class="col-sm-6">
				<select name="materie"> 
				<?php $sql="SELECT * FROM subject WHERE 1";
$result=mysqli_query($conectare,$sql);
$ok=0;
while ($row = mysqli_fetch_assoc($result)) {?>
		<option><?php echo $clasa=$row['subject_code']; ?> </option>
<?php } ?></select>
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">NOTA</label>
				<div class="col-sm-6">
				<input type="number" name="nota" class="form-control" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">DATA NOTEI</label>
				<div class="col-sm-6">
				<input type="date" name="data_nota" class="form-control" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">ABSENTA</label>
				<div class="col-sm-6">
				<input type="date" name="absenta" class="form-control" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">REFERINTA NOTA</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" />
				</div>
				</div>
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="ADAUGA DOCUMENTE">
				<a href="index.php" class="btn btn-danger">ANULEAZA</a>
				</div>
				</div>
					
			</form>
			<center><h1><a href="func3.php">VIZIONEAZA CATALOG</a></h1></center>
		</div>
		
	</div>
</body>

</html>
