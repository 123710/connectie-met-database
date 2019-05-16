<?php
$servername = "localhost";
$databasename = "bashar_db_level2_opdr1";
$username = "Bashar";
$password = "Bashar98200";
$conn = new mysqli($servername,$username,$password,$databasename);
if ($conn->connect_error) {
  die("connection failed:" . $conn->connect_error);
}
echo "connected successfully";
echo "<br />";
$sql = "SELECT * FROM songs /*where artist='ZAYN' */";

$rs  = $conn->query($sql);
//toon het antwoord op het scherm:
//var_dump($rs);

//$rs->fetch_assoc()
/* fetch associative array */
  while ($row = $rs->fetch_assoc()) {
      echo $row['ID']." ".$row['artist']." ".$row['title']."<br>";
    //echo "{$row['ID']} {$row['artist']} {$row['title']} <br />\n";
  }
  //aantal results te tonen
  echo 'Total results: ' . $rs->num_rows;

  //aantal updates te tonen
  echo "<br>".'Total rows updated: ' . $conn->affected_rows;
  $conn->close();

 ?>
