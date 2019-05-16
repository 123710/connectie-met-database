    <?php
    $servername = "localhost";
    $databasename = "eindopdracht";
    $username = "Bashar";
    $password = "Bashar98200";
    $conn = new mysqli($servername,$username,$password,$databasename);
    if ($conn->connect_error) {
      die("connection failed:" . $conn->connect_error);
    }

    if(isset($_GET['id'])) {

      $sql = "DELETE FROM eindopdracht WHERE ID='".$_GET['id']."'";
      $rs  = $conn->query($sql);
      if ( !$rs) {
        echo mysqli_error($conn);
      }
    }
    header('location: ./EindOpdracht.php');

     ?>
