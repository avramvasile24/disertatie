
<?php
require "database.php";

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$materie = $_POST['materie'];
$clasa = $_POST['clasa'];
$bonus = $start;
$bonus1= $end;
$conectare = mysqli_connect('localhost', 'root', '', 'disertatie');
              if (!$conectare) {
                die(mysqli_connect_error());
			  }
              $sql = "SELECT * FROM table_events WHERE 1";
			  $ok=0;
			  $id=0;
              $result = mysqli_query($conectare, $sql);
              while ($row = mysqli_fetch_assoc($result) ) { 
                    if ($row['id'] == $id){
						$id=$id+2;
					}
			  }
$sqlInsert = "INSERT INTO table_events (id,title,start,end,clasa,materie) VALUES ('$id','$title','$start','$end','$clasa','$materie')";

$bonus = $start;
$bonus1= $end;
$result = mysqli_query($conn, $sqlInsert);

if (! $result) {
    $result = mysqli_error($conn);
}
?>
