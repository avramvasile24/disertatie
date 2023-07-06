<?php $clasa=$_POST['clasa'];
	  $materie=$_POST['materie'];
	  $tip=$_POST['tip'];
	  $saptamana=$_POST['saptamana'];
	  $titlu=$_POST['titlu1'];
	  $continut=$_POST['titlu2'];
	  $date=$_POST['date'];
	  $INITIAL=$_POST['titlu'];
	  	if($tip=="Lectie"){
			$host="localhost";
			$dbusername="root";
			$dbpassword="";
			$dbname="licenta";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"licenta");
			$titlu=$_POST['titlu1'];
			$continut=$_POST['titlu2'];
			$saptamana=$_POST['saptamana'];
			$sql1 = "SELECT * FROM cursuri WHERE 1";
            $result1 = mysqli_query($conn, $sql1);
            $ok = 0;

            while ($row1 = mysqli_fetch_assoc($result1) and $ok==0) {
			if($row1['clasa']==$clasa and $row1['curs']==$materie){ $idCurs=$row1['id'];$ok=$ok+1;}}

			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
				$sql="UPDATE continut SET titlu='$titlu',continut='$continut', saptamana='$saptamana',idCurs='$idCurs', activitate='$tip' where titlu='$INITIAL'";

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
			$dbname="licenta";
			$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
			$db=mysqli_select_db($conn,"licenta");
			$titlu=$_POST['titlu1'];
			$continut=$_POST['titlu2'];
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
				$sql="UPDATE teme SET titlu='$titlu',continut='$continut', saptamana='$saptamana',idCurs='$idCurs', data_final='$date' WHERE titlu='$INITIAL'";

			if($conn->query($sql)){
				header("Location: func4.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			
			$conn->close();
	}
	  ?>