    <?php
    $servername = "localhost";
    $databasename = "eindopdracht";
    $username = "Bashar";
    $password = "Bashar98200";
    $conn = new mysqli($servername,$username,$password,$databasename);
    if ($conn->connect_error) {
      die("connection failed:" . $conn->connect_error);
    }
    if (isset($_POST['create'])) {
      $voornaam=$_POST['voornaam'];
      $achternaam= $_POST['achternaam'];
      $geboortedatum=$_POST['geboortedatum'];
      $query ="INSERT into eindopdracht (voornaam,achternaam,geboortedatum)
              values ('$voornaam','$achternaam','$geboortedatum')";

      if ( $conn->query($query)) {
        echo "data is created";
        header('location: ./EindOpdracht.php');

      }
      else
      {
        echo mysqli_error($conn);
      }
      }


     ?>
