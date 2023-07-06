<?php
    	error_reporting(0);

	$error="";
	$cod_activare=$_POST['cod'];
	$test=$cod_activare;
	$username=$_POST['user'];
	$password=$_POST['pass'];
	$nume=$_POST['nume'];
	$email=$_POST['email'];
	$magazin=$_POST['number'];
	if(!empty($username)){
		if(!empty($password)){
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="disertatie";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"disertatie");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
		}
		$result=mysqli_query($conn,"select * from parteneri where 1");
		$row=mysqli_num_rows($result);
		while ($row = mysqli_fetch_assoc($result)){
			if($row['cod_activare']==$cod_activare){
		$id1=$row1['id1']+1;
		$idU=$row['id'];
		$cod1=$row['cod_activare']; 		$unitate=$row['nume_partener'];}
		else if($row['cod_activare_profesor']==$cod_activare){ $idU=$row['id']; $id1=$row1['id1']+1;
		$cod2=$row['cod_activare_profesor']; 		$unitate=$row['nume_partener'];}
		else if($row['cod_activare_elevi']==$cod_activare){$idU=$row['id']; $id1=$row1['id1']+1;
		$cod3=$row['cod_activare_elevi']; 		$unitate=$row['nume_partener'];}
		else if($row['cod_activare_parinti']==$cod_activare){ $idU=$row['id']; $id1=$row1['id1']+1;
		$cod4=$row['cod_activare_parinti']; 		$unitate=$row['nume_partener'];}}
		$id1=$id1+1;
		$result1=mysqli_query($conn,"select * from users where 1");
		$row1=mysqli_num_rows($result1);
		while ($row1 = mysqli_fetch_assoc($result1)) {
		$id1=$row1['id1']+2;}
		$cod_activare=$test;
        $codrezerva=$cod3;
		$clasa=$_POST['clasa'];
        echo $cod_activare; echo $test; echo $cod3; echo $id1;
		if($test==$cod2){
			             $sql="INSERT INTO users (nume, username, password, type,type_partener,unitate, id, functie,nume_unitate,id1,diriginte, idUnitate,email) values ('$nume', '$username', '$password', '1','1','1','2','PROFESOR','$unitate','$id1', '$clasa','$idU', '$email')";
			}
		if($test==$codrezerva){$sql="INSERT INTO users (nume, username, password, type,type_partener,unitate, id, functie,nume_unitate,id1, clasa,idUnitate, email) values ('$nume', '$username', '$password', '3','2','2','3','ELEV','$unitate','$id1','$clasa','$idU', '$email')";
		}
		if($test==$cod1){$sql="INSERT INTO users (nume, username, password, type,type_partener,unitate, id, functie,nume_unitate,id1, idUnitate, email) values ('$nume', '$username', '$password', '3','2','2','3','SECRETARIAT','$unitate','$id1','$idU', '$email')";
		}
	    if($test==$cod4){$sql="INSERT INTO users (nume, username, password, type,type_partener,unitate, id,functie, nume_unitate,id1, idUnitate, email) values ('$nume', '$username', '$password', '4','3','3','4','PARINTE','$unitate','$id1','$idU', '$email')";}
	
			if($conn->query($sql)){
				header("Location:  index.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			$conn->close();
		
	}

?>