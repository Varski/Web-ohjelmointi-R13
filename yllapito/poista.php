<?php
$poistettava = isset($_GET["poistettava"]) ? $_GET["poistettava"] : "";
if (empty($poistettava)){
    header("location:sisalto.php");
    exit;
}
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "taxidata");
}
catch(Exception $e){
    header("location:../html/yhteysvirhe.html");
    exit;
}
// poistaa datan tietokannasta   
$sql="delete from form where id=?";
//valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);
//sijotetaan muuttuja oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'i', $poistettava);
//suoritetaan sql lause
mysqli_stmt_execute($stmt);
//suljetaan sql yhteys
mysqli_close($yhteys);
header("Location:lomakelista.php");
exit;
?>