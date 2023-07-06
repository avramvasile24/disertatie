	<?php

    $title = "Validare cod";
	// Informațiile de conectare la baza de date "parteneri"
$hostname = 'localhost'; // Adresa serverului de baze de date
$username = 'root'; // Numele de utilizator pentru baza de date "parteneri"
$password = ''; // Parola pentru baza de date "parteneri"
$database = 'disertatie'; // Numele bazei de date "parteneri"

// Realizăm conexiunea la baza de date "parteneri"
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die('Conexiunea la baza de date "parteneri" a eșuat: ' . mysqli_connect_error());
}

// Verificăm dacă formularul a fost trimis
if (isset($_POST['submit'])) {
    $codActivare = $_POST['cod']; // Codul de activare introdus în formular
    // Verificăm dacă codul de activare corespunde cu "cod_activare", "cod_activare_profesor" sau "cod_activare_elev"
    $query = "SELECT nume_partener,id FROM parteneri WHERE cod_activare_profesor = '$codActivare' OR cod_activare_parinti = '$codActivare' OR cod_activare_elevi = '$codActivare'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Codul de activare este corect, extragem numele partenerului
        $row = mysqli_fetch_assoc($result);
        $numePartener = $row['nume_partener'];
		$idUnitate=$row['id'];
		
        echo "Numele partenerului: " . $numePartener;
	}
    // Verificăm codul de activare în baza de date "parteneri"
    $queryProfesor = "SELECT * FROM parteneri WHERE cod_activare_profesor = '$codActivare'";
    $queryElevi = "SELECT * FROM parteneri WHERE cod_activare_elevi = '$codActivare'";
    $queryParinti = "SELECT * FROM parteneri WHERE cod_activare_parinti = '$codActivare'";

    $resultProfesor = mysqli_query($conn, $queryProfesor);
    $resultElevi = mysqli_query($conn, $queryElevi);
    $resultParinti = mysqli_query($conn, $queryParinti);

    if (mysqli_num_rows($resultProfesor) > 0) {
		
        // Codul de activare aparține profesorului
        // Redirecționăm utilizatorul către pagina profesorului
        header("Location: pagina_profesor.php");
		session_start();
		$_SESSION['cod']=$codActivare;
		$_SESSION['nume']=$numePartener;
		$_SESSION['idUnitate']=$idUnitate;
        exit();
    } elseif (mysqli_num_rows($resultElevi) > 0) {
        // Codul de activare aparține elevului
        // Redirecționăm utilizatorul către pagina elevului
        header("Location: pagina_elev.php");
				session_start();
		$_SESSION['cod']=$codActivare;
		$_SESSION['nume']=$numePartener;
		$_SESSION['idUnitate']=$idUnitate;
        exit();
    } elseif (mysqli_num_rows($resultParinti) > 0) {
        // Codul de activare aparține părintelui
        // Redirecționăm utilizatorul către pagina părintelui
        header("Location: pagina_parinte.php");
				session_start();
		$_SESSION['cod']=$codActivare;
		$_SESSION['nume']=$numePartener;
		$_SESSION['idUnitate']=$idUnitate;
        exit();
    } else {
        // Codul de activare nu aparține niciunei categorii valide
        echo 'Codul de activare introdus este invalid.';
    }
}

// Închidem conexiunea la baza de date "parteneri"
mysqli_close($conn);
?>


	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />
	    <title><?php echo $title ?></title>
	    <link href="css/styles.css" rel="stylesheet" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>

	<body class="bg-primary">
	    <main>
	        <div class="container">
	            <div class="row justify-content-center">
	                <div class="col-lg-5">
	                    <div class="card shadow-lg border-0 rounded-lg mt-5">
	                        <div class="card-header">
	                            <h3 class="text-center titlu-sign-in-up font-weight-light my-4"><?php echo $title ?></h3>
	                        </div>
	                        <div class="card-body">
	                            <div id="frm">
	                                <div class="page-header">
	                                </div>
	                                <form name="contact_form" id="contact_form" method="post" action="">

	                                    <title>Creeaza cont nou</title>
	                                    <main>
	                                        <div id="frm">
	                                            <form action="crearecont.php" method="POST">
	                                                <p>
	                                                    <center><label>Cod_activare:</label></center>
	                                                    <center><input type="text" id="cod" name="cod" /></center>
	                                                </p>
	                                                <p>
	                                                    <center><input type="submit" class="buton-sign-in-up" id="btn" name="submit" value="PASUL URMATOR" /></center>
	                                                </p>
	                                            </form>
	                                        </div>
	                            </div>
	                            <div class="card-footer text-center">
	                                <div class="small"><a href="index.php">Autentificare</a><br>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </main>
	    </div>
	    </div>
	    </form>
	    </div>
	    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	    <script src="js/scripts.js"></script>
	</body>

	</html>


	</div>
	<?php include 'footer.php'; ?>
	<?php include 'footer.php'; ?>