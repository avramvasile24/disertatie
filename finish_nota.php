<?php
session_start();
    $error="";
	$clasa=$_POST['clasa'];
	$nume=$_POST['elev'];
	$nota=$_POST['nota'];
	$data=$_POST['data'];
	$absenta=$_POST['data1'];
	$materie=$_POST['materie'];
    $username=$_SESSION['name'];
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="disertatie";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"disertatie");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
	            $sql1 = "SELECT * FROM users WHERE 1";
                $result1 = mysqli_query($conn, $sql1); 
				$ok=0;
				while ($row1 = mysqli_fetch_assoc($result1)){
					if($nume==$row1['nume']){
						$elev=$row1['username'];
				}}
		if($absenta==null){
		$sql="INSERT INTO catalog ( user, clasa, nota_materie,profesor,data,materie) values ( '$elev', '$clasa', '$nota','$username','$data','$materie')";}
		else if ($nota==null){$sql="INSERT INTO catalog ( user, clasa, profesor, absenta,materie) values ( '$elev', '$clasa', '$username','$absenta','$materie')";}
	
		
			if($conn->query($sql)){
				header("Location:  funct5.php");
				return $elev;
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			$conn->close();
		
	

?>