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

    //seuraava tulostaa tietokannasta jsonia

    echo "{\"Tapahtumat\":[";
    $sql = "SELECT * FROM tapahtumat";
    $result = $conn->query($sql);

    $i=$result->num_rows;
    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
          echo "{\"Järjestäjän_nimi\":\" " . $row["Järjestäjän_nimi"] . "\",";
          echo "\"Tapahtuman_nimi\":\" " . $row["Tapahtuman_nimi"] . "\"";
          echo "}";
          

          $i--;
          if($i>0) echo ",";

          echo "\n ";
      }
  }
   else {
      echo "0 results";
  }
  echo "]}";

    $conn->close();
?>
