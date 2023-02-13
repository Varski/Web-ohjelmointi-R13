<?php
session_start();
// käyttäjien tunnukset ja salasanat
$kayttajat = array("ylijumala" => "abc");
$tunnus = $_POST["tunnus"];
$salasana = $_POST["salasana"];
// käyttäjää ei ole taulukossa
if (!isset($kayttajat[$tunnus])) {
    die("Virheellinen tunnus tai salasana!");
}
// salasana ei ole oikein
if ($kayttajat[$tunnus] <> $salasana) {
    die("Virheellinen tunnus tai salasana!");
}
$_SESSION["tunnus"] = $tunnus;
header("Location: sala.php");
//echo "kirjautuminen toimii";
?>