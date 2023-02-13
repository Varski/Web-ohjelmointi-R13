<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<div>
        <ul class="menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="pricing.html">Pricing</a></li>
            <li><a href="info.html">Info</a></li>
            <li><a href="contact.html">contact us</a></li>
            <li class="logo" style="float: right;"> Fake Taxi: Totally legit service</li>
        </ul>
    </div>
    <h1>Laskuri</h1>
    <form action="./matka.php" method="get">
        Matka: <input type="number" step="0.1" name="matka"> km.<br>
        <input type="radio" name="aika" value="1"/>1-4 henkeä arkena (myös lauantai) klo 06–18<br>
        <input type="radio" name="aika" value="2"/>1-4 henkeä iltaisin klo 18–06 sekä pyhänä<br>
        <input type="radio" name="aika" value="3"/>5-8 henkeä kaikkina aikoina<br>
        <input type="submit"> <input type="reset">
    </form>
<?php
$matka=$_GET["matka"];
$aika=$_GET["aika"];

//lahtohinta 1 arki, 2 ilta, 3 5-8hlo
if ($aika == 1) {
    $lahtotaksa = 4.1;
    $hinta = 1.05;
}
else if ($aika == 2) {
    $lahtotaksa = 7.9;
    $hinta = 1.65;
}
else {
    $lahtotaksa = 7.9;
    $hinta = 1.1;
}
//lasketaan matkan hinta
$summa=$matka * $hinta;
//lisataan lahtotaksa summaan
$summa = $summa + $lahtotaksa;
//jos summa alle 10e muuta summa 10e
if ($summa < 10) {
$summa = 10;
}
//tulosta summa
print "Hinta $summa Euroa.";
?>