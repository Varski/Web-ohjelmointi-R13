<?php
$json=isset($_POST["palaute"]) ? $_POST["palaute"] : "";
if (!($palaute=tarkistaJson($json))){
    print "Fill all fields please.";
    exit;
}

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    $yhteys=mysqli_connect("db", "root", "password", "taxidata");
}
catch(Exception $e){
    echo "Yhteysvirhe";
    exit;
}
if (isset($palaute)){
$sql="insert into form (fname, lname, ccard, subject) values (?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'ssss', $palaute->fname, $palaute->lname, $palaute->ccard, $palaute->subject);
}
mysqli_stmt_execute($stmt);
mysqli_close($yhteys);
print "ok";
?>

<?php
function tarkistaJson($json){
    if (empty($json)){
        return false;
    }
    $palaute=json_decode($json, false);
    if (empty($palaute->fname) || empty($palaute->lname) || empty($palaute->ccard) || empty($palaute->subject) ){
        return false;
    }
    return $palaute;
}
?>