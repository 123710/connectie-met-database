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

    if(isset($_POST['delete'])) {

      $sql = "DELETE FROM bashar_opdracht8 WHERE ID='$_POST[ID]'";
      $rs  = $conn->query($sql);
      if ( $rs) {
        header('location: ./Oefenopdracht8.php');
      }
      else {
        echo mysqli_error($conn);
      }
    }

     ?>


  </body>
</html>
