<?php
//tarkistetaan kayttaja
session_start();
$tunnus = $_SESSION["tunnus"];
// käyttäjä ei ole kirjautunut sisään
if ($tunnus == "") {
    header("Location: sisaan.html");
    die();
}
try{
    $yhteys=mysqli_connect("db", "root", "password", "taxidata");
}
catch(Exception $e){
    header("location:../html/yhteysvirhe.html");
    exit;
}
?>
<?php
//header html liittaminen sivuun
include "header.html";
echo "<ul><li><a href=\"ulos.php\">Kirjaudu ulos</a></li><li><a href=\"sala.php\">Pääsivulle</a></li></ul>";
//printtaa taulukon tietokannasta
print "<table border='1'>";
$tulos=mysqli_query($yhteys, "select * from form");
while ($rivi=mysqli_fetch_object($tulos)){
    print "<tr><td>$rivi->fname <td>$rivi->lname <td>$rivi->id".
    "<td><a href='./muokkaa.php?muokattava=$rivi->id'>Muokkaa</a>.
    <td><a href='./poista.php?poistettava=$rivi->id'>Poista</a>.
     <td><a href='./palaute.php?palaute=$rivi->id'>Palaute</a>";

}
print "</table>";
//suljetaan tietokantayhteys
mysqli_close($yhteys);
?>

</form>
   
</body>
</html>
