
  <?php
                require_once("connection.php");

              if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

                redirect("index.php");
              }
			  session_start();

              include 'headerlogged.php';
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

        // Verificăm cine este expeditorul și destinatarul mesajului
        if ($usernameInitial === $_SESSION['username'] && $usernameFinal === $_SESSION['username']) {
            // Dacă ești tu expeditorul și destinatarul, afișează mesajul invers
            echo '<strong>' . $usernameFinal . '</strong>: ' . $content . ' - ' . $dateTime . '<br>';
        } elseif ($usernameInitial === $_SESSION['username']) {
            // Dacă ești tu expeditorul, afișează mesajul trimis către destinatar
            echo '<strong>' . $usernameFinal . '</strong>: ' . $content . ' - ' . $dateTime . '<br>';
        } elseif ($usernameFinal === $_SESSION['username']) {
            // Dacă ești tu destinatarul, afișează mesajul primit de la expeditor
            echo '<strong>' . $usernameInitial . '</strong>: ' . $content . ' - ' . $dateTime . '<br>';
        }
    }
} else {
    echo 'Nu există mesaje în baza de date.';
}

// Închidem conexiunea la baza de date
mysqli_close($conn);
?>
