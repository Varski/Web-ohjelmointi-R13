<?php
//tarkistetaan kayttaja
session_start();
$tunnus = $_SESSION["tunnus"];
// käyttäjä ei ole kirjautunut sisään
if ($tunnus == "") {
    header("Location: sisaan.html");
    die();
}
$id=isset($_POST["id"]) ? $_POST["id"] : "";
$fname=isset($_POST["fname"]) ? $_POST["fname"] : "";
$lname=isset($_POST["lname"]) ? $_POST["lname"] : "";
$ccard=isset($_POST["ccard"]) ? $_POST["ccard"] : "";
$subject=isset($_POST["subject"]) ? $_POST["subject"] : "";

if (empty($fname) || empty($lname) || empty($id) || empty($ccard)){
    header("Location:./paivita.php");
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    $yhteys=mysqli_connect("db", "root", "password", "taxidata");
}
catch(Exception $e){
    echo("Yhteysvirhe");
    exit;
}

$sql="update form set fname=?, lname=?, ccard=?, subject=? where id=?";

$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssisi', $fname, $lname, $ccard, $subject, $id);
mysqli_stmt_execute($stmt);
mysqli_close($yhteys);

header("Location:sala.php");
?>