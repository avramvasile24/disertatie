<?php
    $id=rand(10,20398);
	$titlu=$_POST['titlu'];
	$continut=$_POST['continut'];
	$categorie=$_POST['date'];
	$autor=$_POST['autor'];
	echo $titlu, $continut, $categorie;
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="disertatie";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"disertatie");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
				$sql="INSERT INTO noutati(id,noutati_titlu,noutati_continut,autor,data_inceput)
				values ('$id','$titlu','$continut','$autor','$categorie')";
			if($conn->query($sql)){
				header("Location:dashboard.php");
				echo $titlu, $continut, $categorie;
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			
			$conn->close();
?>