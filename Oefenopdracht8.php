<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $databasename = "bashar_opdracht8";
    $username = "Bashar";
    $password = "Bashar98200";
    $conn = new mysqli($servername,$username,$password,$databasename);
    if ($conn->connect_error) {
      die("connection failed:" . $conn->connect_error);
    }
    echo "<br />";

    ?>
    <div style="display: inline-block;float:left;font-size:17px;">
      omschrijving: <br><br>
      €:<br><br>
      winkelnaam:<br><br>
      webadres:<br><br>
    </div>
    <div style="display: inline-block;">
    <form action="CreateIncludeOpdr8" method="post">
       <input type="text" name="omschrijving" value="" required><br><br>
       <input type="text" name="prijs" value="" required><br><br>
       <input type="text" name="winkelnaam" value="" required><br><br>
       <input type="text" name="webadres" value="" required>
      <input type="submit" name="create" value="create"><br><br>
    </div>
    </form>
    <table>
      <tr>
        <th>ID</th>
        <th style="padding-left:140px;}">omschrijving</th>
        <th style="padding-left:70px;}">prijs </th>
        <th style="padding-left:120px;}">winkelnaam</th>
        <th style="padding-left:80px;}">webadres </th>
      </tr>
    </table>

    <?php
    $sql = "SELECT * FROM bashar_opdracht8";
    $rs  = $conn->query($sql);
    while ($row = $rs->fetch_assoc()) {
        include ("CreateIncludeopdr8.php");
        include ("UpdateIncludeopdr8.php");
        include ("deleteIncludeopdr8.php");
      echo "<tr><form method=post>";
      echo "<td><input type=text name=ID value='".$row['ID']."'>";
      echo "<td><input type=text name=omschrijving value='".$row['omschrijving']."'>";
      echo "<td><input type=text name=prijs value='".$row['prijs']."'>";
      echo "<td><input type=text name=winkelnaam value='".$row['winkelnaam']."'>";
      echo "<td><input type=text name=webadres value='".$row['webadres']."'>";
      echo "<td> <input type=submit name=Update value=update> ";
      echo "<td><input type=submit name=delete value=delete>";
      echo "</form></tr>";
      //echo $row['ID']." ".$row['omschrijving']." ".$row['prijs']." ".$row['winkelnaam']." ".$row['webadres']."<br>";
    }
     ?>
    <!--<form class="" action="CreateIncludeOpdr8.php" method="post">
      omscrijving: <input type="text" name="omschrijving"><br><br>
      prijs: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="prijs"><br><br>
      winkelnaam: <input type="text" name="winkelnaam"><br><br>
      webadres: &nbsp; &nbsp; <input type="text" name="webadres"><br><br>
      <input type="submit" name="create" value="create">&nbsp;
      &nbsp;<input type="submit" name="read" value="read">&nbsp;
      &nbsp;<input type="submit" name="update" value="update">&nbsp;
      &nbsp;<input type="submit" name="delete" value="delete">
    </form>
  -->

  </body>
</html>
