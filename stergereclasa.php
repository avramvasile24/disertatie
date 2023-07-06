<?php
session_start();
$membru=$_POST['clasa'];
$k=$_SESSION['idUnitate'];
 $conn = mysqli_connect('localhost', 'root', '', 'disertatie');
$sql="DELETE FROM cys WHERE cys='$membru' AND idUnitate='$k'";
if($conn->query($sql)){
				header("Location: dashboard.php");
			}
			else{
				echo"Error: ".$sql ."<br>".$conn->error;
			}
			
			$conn->close();
?>