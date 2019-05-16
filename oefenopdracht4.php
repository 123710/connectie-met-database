<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $servername = "localhost";
    $databasename = "bashar_db_level2_opdr1";
    $username = "Bashar";
    $password = "Bashar98200";
    $conn = new mysqli($servername,$username,$password,$databasename);
    if ($conn->connect_error) {
      die("connection failed:" . $conn->connect_error);
    }
    echo "<br />";
    if (isset($_POST['insert'])) {
      $artist=$_POST['artist'];
      $title=$_POST['title'];
      $query ="INSERT into songs (artist,title)
              values ('$artist','$title')";

      if ( $conn->query($query)) {
        echo "data is inserted";
      }
      else
      {
        echo mysqli_error($conn);
      }
      }


    ?>
    <form action="oefenopdracht4.php" method="post">
      artist name:<br>
      <input type="text" name="artist" value="" required>
      <br>
      title:<br>
      <input type="text" name="title" value="" required>
      <br><br>
      <input type="submit" name="insert" value="insert">
    </form>
    <table>
      <tr>
        <th>ID</th>
        <th style="padding-left: 140px;}">artist</th>
        <th style="padding-left: 140px;}">title </th>
      </tr>
    </table>

    <?php
    $sql = "SELECT * FROM songs /*where artist='ZAYN' */";
    $rs  = $conn->query($sql);
    //toon het antwoord op het scherm:
    //var_dump($rs);

    //$rs->fetch_assoc()
    /* fetch associative array */
     /*while ($row = $rs->fetch_assoc()) {
          echo "<tr><form action=JSopdrachtUpdateInclude.php method=post>";
          echo "<td><input type=text name=ID value='".$row['ID']."'>";
          echo "<td><input type=text name=artist value='".$row['artist']."'>";
          echo "<td><input type=text name=title value='".$row['title']."'>";
          echo "<td> <input type=submit value=update> ";
          echo "</form></tr>";
          //echo $row['ID']." ".$row['artist']." ".$row['title']."<br>";
        //echo "{$row['ID']} {$row['artist']} {$row['title']} <br />\n";
      }*/
      while ($row = $rs->fetch_assoc()) {
        include ("DBopdrachtDeleteInclude.php");
        include ("JSopdrachtUpdateInclude.php");

        echo "<tr><form method=post>";
        echo "<td><input type=text name=ID value='".$row['ID']."'>";
        echo "<td><input type=text name=artist value='".$row['artist']."'>";
        echo "<td><input type=text name=title value='".$row['title']."'>";
        echo "<td> <input type=submit name=Update value=update> ";
        echo "<td><input type=submit name=Remove value=remove>";
    //    echo "<td><input type=submit name=remove value='".$row['remove']."'><br>";
        echo "</form></tr>";
      }

      //aantal results te tonen
      echo '<br><br>Total results: ' . $rs->num_rows;

      //aantal updates te tonen
      echo "<br>".'Total rows updated: ' . $conn->affected_rows;
      $conn->close();
     ?>


  </body>
</html>
