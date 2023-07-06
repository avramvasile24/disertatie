<?php
    session_start();
	$clasa=$_POST['clasa'];
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="disertatie";
			$k=$_SESSION['idUnitate'];
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"disertatie");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
				$sql="INSERT INTO cys (cys,idUnitate)
				values ('$clasa','$k')";
			if($conn->query($sql)){
				header("Location: f4.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			
			$conn->close();
?>