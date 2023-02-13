<?php
session_start();
$tunnus = $_SESSION["tunnus"];
// käyttäjä ei ole kirjautunut sisään
if ($tunnus == "") {
    header("Location: sisaan.html");
    die();
}
echo "<h1>Salainen sivu</h1>";
echo "<p>Tunnus: $tunnus</p>";
echo "<p><a href=\"ulos.php\">Kirjaudu ulos</a></p>";
?>