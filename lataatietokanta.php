  <?php
  $servername = "localhost";
  $username = "admin";
  $password = "Q2werty";
  $dbname = "taiteidenya";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error)
  {
      echo "Connection error";
      die("+poistuminen");
  }
     //echo "Connection succeeded";

    echo "{\"Tapahtumat\":";
    $sql = "SELECT * FROM tapahtumat";
    $result = $conn->query($sql);

    $dbdata = array();

    while ( $row = $result->fetch_assoc())
    {
     $dbdata[]=$row;
    }
 
   echo json_encode($dbdata);

    echo "}";

    $conn->close();

    //https://www.opentechguides.com/how-to/article/php/100/mysql-to-json.html
?>
