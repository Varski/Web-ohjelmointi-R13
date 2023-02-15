<?php

$muokattava=isset($_GET["muokattava"]) ? $_GET["muokattava"] : "";

if (empty($muokattava)){
    header("Location:./muokkaa.php");
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
$sql="select * from form where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'i', $muokattava);
mysqli_stmt_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);
if ($rivi=mysqli_fetch_object($tulos)){
    echo("Tietokannasta noudetut tiedot");
    ?>

    <form action='./paivita.php' method='post'>
    Id:<input type='text' name='id' value='<?php print $rivi->id;?>' readonly><br>
    First name:<input type='text' name='fname' value='<?php print $rivi->fname;?>'><br>
    Last name:<input type='text' name='lname' value='<?php print $rivi->lname;?>'><br>
    Credit card number:<input type='int' name='ccard' value='<?php print $rivi->ccard;?>'><br>
    Subject:<input type='text' name='subject' value='<?php print $rivi->subject;?>'><br>

    <input type='submit' name='ok' value='OK'><br>
    </form>

    <?php
}
mysqli_close($yhteys);
?>