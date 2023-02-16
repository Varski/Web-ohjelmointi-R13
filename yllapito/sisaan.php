<?php
session_start();
// käyttäjien tunnukset ja salasanat salattuna listalla
$kayttajat = array("ylijumala" => '$2y$12$AfdxZYERDUUVoNRkg0fXsux.haE5lXykvnn3poGYu3ma8uUvlHWxC');
//kirjautumissivulta tulleet tunnus ja salasana
$tunnus = $_POST["tunnus"];
$salasana = $_POST["salasana"];
// käyttäjää ei ole listassa
if (!isset($kayttajat[$tunnus])) {
    die("Virheellinen tunnus tai salasana!");
}
//haetaan salattu salasana listalta kayttajan nimella
$hashed_password = $kayttajat[$tunnus];
// jos annettu salasana tasmaa salatun salasanan kansssa, annetaan session tunnus
if(password_verify($salasana, $hashed_password)) {
    $_SESSION["tunnus"] = $tunnus;
    header("Location: sala.php");
    //echo "kirjautuminen toimii";
}
else {
    //jos salasana ei toimi
    die("Virheellinen tunnus tai salasana!");
}
?>