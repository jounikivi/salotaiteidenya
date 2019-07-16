<?php
$servername = "localhost";
$username = "admin";
$password = "Q2werty";
$dbname = "taiteidenya";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$x1=$_GET['TapahtumaID'];
$x2=$_GET['Järjestäjän_nimi'];
$x3=$_GET['Tapahtuman_nimi'];
$x4=$_GET['Kategorian_nimi'];
$x5=$_GET['Aloitus_Aika'];
$x6=$_GET['Päätymis_Aika'];
$x7=$_GET['Osoite'];
//$x8=$_GET['latitude'];
//$x9=$_GET['longitude'];
$x10=$_GET['Yhteystiedot'];
$x11=$_GET['Järjestäjän_nettisivut'];
$x12=$_GET['Tapahtumankuvaus'];
$x13=$_GET['tapahtumainfo'];

$sql = "INSERT INTO tapahtumat (Järjestäjän_nimi, Tapahtuman_nimi, Kategoria, Aloitusaika, päättymisaika, Osoite, Yhteystiedot, Järjestäjännettisivut, Tapahtumankuvaus, tapahtumainfo) VALUES ('$x2','$x3','$x4','$x5','$x6','$x7','$x10','$x11','$x12','$x13');";

if ($conn->query($sql) === TRUE) {
    echo "Tapahtuma lisätty";
} else {
    echo "Tapahtuman lisäys ei onnistunut: " . $conn->error;
}

$conn->close();
?>

<br>

<button onclick="goBack()">Takaisin</button>

<script>
function goBack() {
   window.history.back();
 }
</script>

<button onclick="gohome()">Palaa etusivulle</button>

<script>
function gohome()
{
window.location.href="../index.html"
}
</script>

