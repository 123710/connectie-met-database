    <?php
    $servername = "localhost";
    $databasename = "eindopdracht";
    $username = "Bashar";
    $password = "Bashar98200";
    $conn = new mysqli($servername,$username,$password,$databasename);
    if ($conn->connect_error) {
      die("connection failed:" . $conn->connect_error);
    }
//hier gegevens ophalen aan de hand van $_GET['id']
?>
<html>
<body>
<form method="post">
<?php
if (isset($_GET['id'])) {
$sql = "SELECT * FROM eindopdracht WHERE ID='".$_GET['id']."'";
$rs  = $conn->query($sql);
while ($row = $rs->fetch_assoc()) {
  echo "<tr>";
  echo "<td>".$row['ID']."<input type=hidden name=ID value = ".$row['ID']."></td>";
  echo "<td>Voornaam: <input type=text name=voornaam value='".$row['voornaam']."'></td>";
  echo "<td><input type=text name=achternaam value='".$row['achternaam']."'></td>";
  echo "<td><input type=text name=geboortedatum value='".$row['geboortedatum']."'></td>";
  echo "<td><input type=submit name=ok value=ok></td>";
}
}
 ?>
</form>
</body>
</html>
<?php
      if(isset($_POST['ok'])) {
        $sql = "UPDATE eindopdracht SET voornaam='".$_POST['voornaam']."' ,achternaam='".$_POST['achternaam']."',geboortedatum='".$_POST['geboortedatum']."' where ID='".$_POST['ID']."'";
//echo $sql;
        $rs  = $conn->query($sql);
        if ( $rs) {
          header('location: ./EindOpdracht.php');
        }
        else
        {
          echo mysqli_error($conn);
        }
      }

     ?>
