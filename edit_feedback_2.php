<!DOCTYPE html>
<html>
<head>
    <title>Actualizare feedback</title>
</head>
<body>
    <?php
		session_start();
	$user=$_SESSION['username'];
        $nota = $_POST["nota"];
	$comentariu = $_POST["comentariu"];
	if (isset($_GET['sender'])) {
    $sender = $_GET['sender'];}
	if (isset($_GET['sender1'])) {
    $sender1 = $_GET['sender1'];
	}
    $data_curenta = date('Y-m-d');
    // Verifică dacă formularul a fost trimis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Preiați valorile trimise prin formular
        $nota = $_POST["nota"];
        $comentariu = $_POST["comentariu"];

        // Conectați-vă la baza de date
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "disertatie";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificați conexiunea
        if ($conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
        }

        // Actualizați înregistrarea în baza de date
        $sql = "INSERT INTO feedback (nota,material,elev,profesor,feedback, data) VALUES ('$nota','$sender1','$user','$sender','$comentariu','$data_curenta')";

        if ($conn->query($sql) === TRUE) {
            header("Location: dashboard.php");
        } else {
            header("Location: index.php");
        }

        $conn->close();
    }
    ?>