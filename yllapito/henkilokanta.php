<?php
try{
    $yhteys=mysqli_connect("db", "root", "password", "taxidata");
}
catch(Exception $e){
    header("location:../html/yhteysvirhe.html");
    exit;
}
?>
<?php
//printtaa taulukon tietokannasta
print "<table border='1'>";
$tulos=mysqli_query($yhteys, "select * from form");
while ($rivi=mysqli_fetch_object($tulos)){
    print "<tr><td>$rivi->fname <td>$rivi->lname <td>$rivi->id".
    "<td><a href='./poista.php?poistettava=$rivi->id'>Poista</a>";

}
print "</table>";
//suljetaan tietokantayhteys
mysqli_close($yhteys);
?>

</form>
   
</body>
</html>
