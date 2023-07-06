
<?php
    
	$clasa=$_POST['clasa'];
	$materie=$_POST['materie'];
	$tip=$_POST['tip'];
	echo $materie;
	echo $clasa;
	if($tip=="Lectie"){
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="disertatie";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"disertatie");
			$titlu=$_POST['titlu'];
			$continut=$_POST['continut'];
			$saptamana=$_POST['saptamana'];
			$sql = "SELECT * FROM cursuri WHERE 1";
            $result = mysqli_query($conn, $sql);
            $ok = 0;

            while ($row = mysqli_fetch_assoc($result) and $ok==0) {
			if($row['clasa']==$clasa and $row['curs']==$materie){ $idCurs=$row['id'];$ok=$ok+1;}}
			$sql = "SELECT * FROM continut WHERE 1";
            $result = mysqli_query($conn, $sql);
            $ok = 0;
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
				$sql="INSERT INTO continut (titlu,continut, saptamana,idCurs, activitate)
				values ('$titlu','$continut','$saptamana','$idCurs','$tip')";
			if($conn->query($sql)){
				header("Location: func4.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			
			$conn->close();
	}
	else
	{
		$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="disertatie";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"disertatie");
			$titlu=$_POST['titlu'];
			$continut=$_POST['continut'];
			$saptamana=$_POST['saptamana'];

			$date=$_POST['date'];
			$sql = "SELECT * FROM cursuri WHERE 1";
            $result = mysqli_query($conn, $sql);
            $ok = 0;
			
			

            while ($row = mysqli_fetch_assoc($result) and $ok==0) {
			if($row['clasa']==$clasa and $row['curs']==$materie){ $idCurs=$row['id'];$ok=$ok+1; echo $idCurs;}}
			$sql = "SELECT * FROM teme WHERE 1";
            $result = mysqli_query($conn, $sql);
            $ok = 0;
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
				$sql="INSERT INTO teme (titlu,continut, saptamana,idCurs, data_final)
				values ('$titlu','$continut','$saptamana','$idCurs','$date')";
			if($conn->query($sql)){
				header("Location: func4.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			
			$conn->close();
	}
?>