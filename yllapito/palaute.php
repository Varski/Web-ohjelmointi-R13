<?php
//tarkistetaan kayttaja
session_start();
$tunnus = $_SESSION["tunnus"];
// käyttäjä ei ole kirjautunut sisään
if ($tunnus == "") {
    header("Location: sisaan.html");
    die();
}
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "taxidata");
}
catch(Exception $e){
    header("Location:../html/yhteysvirhe.html");
    exit;
}
//header html liittaminen sivuun
include "header.html";
echo "<ul><li><a href=\"ulos.php\">Kirjaudu ulos</a></li></ul>";
$tulos=mysqli_query($yhteys, "select * from form ");
print"<table border='1'>";
while ($rivi=mysqli_fetch_object($tulos)){
print"<tr>";
print "<td>$rivi->subject";
}
print"</table>";
mysqli_close($yhteys);;
?>