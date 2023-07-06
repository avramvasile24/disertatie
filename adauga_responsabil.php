<?php
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $cod_activare = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $cod_activare[] = $alphabet[$n];
    }
    return implode($cod_activare); //turn the array into a string
}
    $cod_activare=randomPassword();
	$telefon=$_POST['telefon'];
	$email=$_POST['email'];
	$adresa=$_POST['adresa'];
	$nume=$_POST['nume'];
	$telefon=$_POST['telefon'];
	$responsabil=$_POST['responsabil'];
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="licenta";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"licenta");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
				$sql="INSERT INTO parteneri (cod_activare,contact_email,contact_telefon,nume_partener, adresa_partener,responsabil_unitate)
				values ('$cod_activare','$email','$telefon','$nume' ,'$adresa', '$responsabil')";
			if($conn->query($sql)){
				header("Location: func1.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			
			$conn->close();
?>