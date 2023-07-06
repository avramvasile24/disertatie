<?php
	$clasa=$_POST['clasa'];
	$materie=$_POST['materie'];

			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="licenta";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"licenta");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
		
		$sql="DELETE FROM cursuri  WHERE (curs = '$materie' AND clasa = '$clasa');";
		
			if($conn->query($sql)){
				header("Location:  func4.php");
				return $elev;
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			$conn->close();
		
	

?>