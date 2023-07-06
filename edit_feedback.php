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
    $sender = $_GET['sender'];
    echo "Sender: " . $sender;}
	if (isset($_GET['sender1'])) {
    $sender1 = $_GET['sender1'];
    echo "Sender: " . $sender1;
}
	if (isset($_GET['v1'])) {
    $v1 = $_GET['v1'];
    echo "Sender: " . $sender1;
}
	if (isset($_GET['v2'])) {
    $v2 = $_GET['v2'];
    echo "Sender: " . $sender1;
}

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
        $sql = "UPDATE feedback_tema SET feedback='$nota', comentariu='$comentariu', username_examinator='$user' WHERE idTema='$sender' and username_predat='$sender1'";

        if ($conn->query($sql) === TRUE) {
            header("Location: func4.php");
        } else {
            header("Location: index.php");
        }

        $conn->close();
    }
    ?>