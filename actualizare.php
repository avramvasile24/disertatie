<?php
	$username=$_POST['username'];
	$nume=$_POST['nume'];
	$prenume=$_POST['prenume'];
	$data_nasteri=$_POST['data_nasteri'];
	$clasa=$_POST['clasa'];
	$diriginte=$_POST['diriginte'];
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="licenta";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"licenta");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
			$result=mysqli_query($conn,"select * from profil");
			$row=mysqli_num_rows($result);
		if($row!=0){
			if($username!=NULL){
			$sql=mysqli_query($conn,"UPDATE profil SET username = '$username' WHERE username = '$username'");}
		    if($nume!=NULL){
			$sql=mysqli_query($conn,"UPDATE profil SET `nume` = '$nume' WHERE profil.`username` = '$username'");}
		    if($prenume!=NULL){
			$sql=mysqli_query($conn,"UPDATE profil SET `prenume` = '$prenume' WHERE profil.`username` = '$username'");}
			if($clasa!=NULL){
			$sql=mysqli_query($conn,"UPDATE profil SET `clasa` = '$clasa' WHERE profil.`username` = '$username'");}
			if($data_nasteri!=NULL){
			$sql=mysqli_query($conn,"UPDATE profil SET `data_nasteri` = '$data_nasteri' WHERE profil.`username` = '$username'");}
			if($diriginte!=NULL){
			$sql=mysqli_query($conn,"UPDATE profil SET `diriginte` = '$diriginte' WHERE profil.`username` = '$username'");}
			header("Location: profil.php");

		}
		else{
				ECHO"PROBLEME";
			
		}
		
?>