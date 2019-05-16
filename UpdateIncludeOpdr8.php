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

      if(isset($_POST['Update'])) {
        $sql = "UPDATE bashar_opdracht8 SET omschrijving='$_POST[omschrijving]',prijs='$_POST[prijs]',winkelnaam='$_POST[winkelnaam]',webadres='$_POST[webadres]' where ID='$_POST[ID]'";
        $rs  = $conn->query($sql);
        if ( $rs) {
          header('location: ./Oefenopdracht8.php');
        }
        else
        {
          echo mysqli_error($conn);
        }
      }

     ?>


  </body>
</html>
