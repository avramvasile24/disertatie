
<?php
 session_start();
 $idUnitate=$_SESSION['idUnitate'];
 
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {

    redirect("index.php");
}

include 'headerlogged.php';

$username=$_SESSION["username"];


    $error="";
	$cod_activare=$_POST['cod'];
	$curs=$_POST['curs'];
	$clasa=$_POST['number'];
	$specialitate=$_POST['specialitate'];
	if($specialitate==1)
	{
		$materie="Romana";
	}
	else if( $specialitate==2)
	{
		$materie="Matematica";
	}
	else if( $specialitate==3)
	{
		$materie="Informatica";
	}
	else if ($specialitate==4)
	{
		$materie="Fizica";
	}
	else if($specialitate==5)
	{
		$materie="Geografie";
	}
	else if($specialitate==6)
	{
		$materie="Chimie";
	}
	else if($specialitate==7)
	{
		$materie="Istorie";
	}
	else {$materie="Alte discipline";}
	
	$host="localhost";
    $dbusername="root";
	$dbpassword="";
    $dbname="disertatie";
	$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
	$db=mysqli_select_db($conn,"disertatie");
			if(mysqli_connect_error()){
				die($error="Eroare de autentificare('.mysqli_connect_errno().')'.mysqli_connect_error()");
			}
			$result=mysqli_query($conn,"select * from cursuri");
			$row=mysqli_num_rows($result);
			while ($row = mysqli_fetch_assoc($result)) {
			$id=$row['id'];}
			$id=$id+1;
			$sql="INSERT INTO cursuri ( specialitate, curs, profesor, clasa, cod_activare,id,idUnitate) VALUES ( '$materie','$curs', '$username', '$clasa', '$cod_activare','$id','$idUnitate')";
			if($conn->query($sql)){
				header("Location:  func4.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			$conn->close();
	
	

?>