<?php
// Configurarea bazei de date
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "disertatie";
$username_elev=$_SESSION['username'];
// Conectarea la baza de date
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conectare eșuată: " . $conn->connect_error);
}

// Obținerea datelor din formular
$nume_tema = $_POST['nume_tema'];
$comentariu_elev = $_POST['comentariu_elev'];
$document_tema = $_FILES['document_tema']['name'];
$document_tema_tmp = $_FILES['document_tema']['tmp_name'];
$sql1="SELECT id FROM teme WHERE titlu = '$nume_tema' ";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // Extrage id-ul temei
    $row = $result->fetch_assoc();
    $id_tema = $row["id"];
}
// Încărcarea documentului temă în directorul specific
$target_directory = "upload/";
$target_file = $target_directory . basename($document_tema);
move_uploaded_file($document_tema_tmp, $target_file);

// Salvarea informațiilor în baza de date
$sql = "INSERT INTO feedback_tema (idTema, username_predat, comentariu_elev, document_incarcat) 
        VALUES ('$id_tema', '$username_elev', '$comentariu_elev', '$document_tema')";
if ($conn->query($sql) === TRUE) {
    echo "Tema a fost încărcată cu succes!";
	header('Location: ./func4.php');
} else {
    echo "Eroare: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
