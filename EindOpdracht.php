<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $databasename = "eindopdracht";
    $username = "Bashar";
    $password = "Bashar98200";
    $conn = new mysqli($servername,$username,$password,$databasename);
    if ($conn->connect_error) {
      die("connection failed:" . $conn->connect_error);
    }
    echo "<br />";

    ?>
    <div style="display: inline-block;float:left;font-size:17px;">
      voornaam: <br><br>
      achternaam:<br><br>
      geboortedatum: <br><br>
    </div>
    <div style="display: inline-block;">
    <form action="EindOpdrachtCreate.php" method="post">
       <input type="text" name="voornaam" value="" required><br><br>
       <input type="text" name="achternaam" value="" required><br><br>
       <input type="text" name="geboortedatum" value="" required><br><br>
      <input type="submit" name="create" value="create"><br><br>
    </div>
    </form>
    <table>
      <tr>
        <th>ID</th>
        <th>voornaam</th>
        <th>achternaam </th>
        <th>geboortedatum</th>
        <th>leeftijd </th>
      </tr>

    <?php
    include ("EindOpdrachtCreate.php");
    $sql = "SELECT * FROM eindopdracht";
    $rs  = $conn->query($sql);
    while ($row = $rs->fetch_assoc()) {
      echo "<tr>";
      echo "<td>".$row['ID']."</td>";
      echo "<td>".$row['voornaam']."</td>";
      echo "<td>".$row['achternaam']."</td>";
      echo "<td>".$row['geboortedatum']."</td>";
      // echo "<td><input type=text name=ID value='".$row['ID']."'></td>";
      // echo "<td><input type=text name=voornaam value='".$row['voornaam']."'></td>";
      // echo "<td><input type=text name=achternaam value='".$row['achternaam']."'></td>";
      // echo "<td><input type=text name=geboortedatum value='".$row['geboortedatum']."'></td>";
      $bday = new DateTime($row['geboortedatum']); // Your date of birth;
      $today = new Datetime(date('m.d.y'));
      $diff = $today->diff($bday);
      echo "<td>";
      printf(' %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
      echo "</td>";
      // echo "<td><input type=submit name=Update value=update></td> ";
      // echo "<td><input type=submit name=delete value=delete></td>";
      echo '<td><a href="EindOpdrachtUpdate.php?id='.$row['ID'].'">Wijzigen</a></td>';
      echo '<td><a href="EindOpdrachtDelete.php?id='.$row['ID'].'">Verwijderen</a></td>';
      echo "</tr>";
    }
     ?>
   </table>


  </body>
</html>
