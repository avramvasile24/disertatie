<?php
if (isset($_GET['sender'])) {
$sender = $_GET['sender'];}
  if (isset($_GET['sender1'])) {
  $sender1 = $_GET['sender1'];}
  session_start();
  $user=$_SESSION['username'];
// Conectarea la baza de date
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disertatie";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
    die("Conexiunea la baza de date a esuat: " . $conn->connect_error);
}
$sql = "SELECT * FROM cursuri WHERE 1";
$result = mysqli_query($conn, $sql);
            $ok = 0;

            while ($row = mysqli_fetch_assoc($result) and $ok==0) {
			if($row['clasa']==$sender1 and $row['curs']==$sender){ $idCurs=$row['id'];$ok=$ok+1;}}
// Procesarea formularului de creare a întâlnirii
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeIntalnire = $_POST["nume_intalnire"];
    $dataIntalnire = $_POST["data_intalnire"];
    $oraIntalnire = $_POST["ora_intalnire"];

    // Salvarea întâlnirii în baza de date
    $sql = "INSERT INTO intalniri (nume, data, time,idCurs, username) VALUES ('$numeIntalnire', '$dataIntalnire', '$oraIntalnire','$idCurs', '$user')";

    if ($conn->query($sql) === TRUE) {
         ?><center><?php echo  "Întâlnirea a fost creată cu succes.";
		?>
		<html>
<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />
	    <title>CREARE REUSITA!</title>
	    <link href="css/styles.css" rel="stylesheet" />
	</head>
  <script>
    var countdown = 5; // Numărătoarea inversă în secunde
    var countdownDisplay = document.getElementById("countdown");

    function redirectWithCountdown() {
      countdownDisplay.innerHTML = countdown;

      var redirectInterval = setInterval(function() {
        countdown--;
        countdownDisplay.innerHTML = countdown;

        if (countdown === 0) {
          clearInterval(redirectInterval);
          window.location.href = "index.php";
        }
      }, 1000);
    }
  </script>
	<body class="bg-primary">
	    <main>
	        <div class="container">
	            <div class="row justify-content-center">
	                <div class="col-lg-5">
	                    <div class="card shadow-lg border-0 rounded-lg mt-5">
	                        <div class="card-header">
	                            <h3 class="text-center titlu-sign-in-up font-weight-light my-4">CREARE REUSITA!<br><h5 class="text-center titlu-sign-in-up font-weight-light my-4">Porniti conferinta - ACUM!</h5>
</h3><h5 class="text-center titlu-sign-in-up font-weight-light my-4"><a href='http://localhost:3000'>PORNESTE</a></h5>
	                        </div>
							  <script>
    redirectWithCountdown();
  </script>
</head>
</html>
<?php
		
    } 
	else {
        echo "Eroare la crearea întâlnirii: " . $conn->error;
?><html>
<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />
	    <title>CREARE ESUATA</title>
	    <link href="css/styles.css" rel="stylesheet" />
	</head>
  <script>
    var countdown = 5; // Numărătoarea inversă în secunde
    var countdownDisplay = document.getElementById("countdown");

    function redirectWithCountdown() {
      countdownDisplay.innerHTML = countdown;

      var redirectInterval = setInterval(function() {
        countdown--;
        countdownDisplay.innerHTML = countdown;

        if (countdown === 0) {
          clearInterval(redirectInterval);
          window.location.href = "index.php";
        }
      }, 1000);
    }
  </script>
	<body class="bg-primary">
	    <main>
	        <div class="container">
	            <div class="row justify-content-center">
	                <div class="col-lg-5">
	                    <div class="card shadow-lg border-0 rounded-lg mt-5">
	                        <div class="card-header">
	                            <h3 class="text-center titlu-sign-in-up font-weight-light my-4">CREARE ESUATA!<br><h5 class="text-center titlu-sign-in-up font-weight-light my-4">Vei fi redirecționat în <span id="countdown">5</span> secunde...</h5>
</h3>
	                        </div>
							  <script>
    redirectWithCountdown();
  </script>
</head>
</html><?php
    }
}

// Închiderea conexiunii la baza de date
$conn->close();
?>