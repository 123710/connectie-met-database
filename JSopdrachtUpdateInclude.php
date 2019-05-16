<?php
$servername = "localhost";
$databasename = "bashar_db_level2_opdr1";
$username = "Bashar";
$password = "Bashar98200";
$conn = new mysqli($servername,$username,$password,$databasename);
if ($conn->connect_error) {
  die("connection failed:" . $conn->connect_error);
}

  if(isset($_POST['Update'])) {
    $sql = "UPDATE songs SET artist='$_POST[artist]',title='$_POST[title]' where ID='$_POST[ID]'";
    $rs  = $conn->query($sql);
    if ( $rs) {
      header('location: ./oefenopdracht4.php');
    }
    else
    {
      echo mysqli_error($conn);
    }
  }

 ?>
