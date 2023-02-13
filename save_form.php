<?php
$fname=isset($_POST["fname"]) ? $_POST["fname"] : "";
$lname=isset($_POST["lname"]) ? $_POST["lname"] : ""; 
$ccard=isset($_POST["ccard"]) ? $_POST["ccard"] : "";
$subject=isset($_POST["subject"]) ? $_POST["subject"] : "";

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);

try{
    $yhteys=mysqli_connect("db", "root", "password", "taxidata");
}
catch(Exception $e){
    echo "Yhteysvirhe";
    exit;
}

if(!empty($fname) && !empty($lname) && !empty($ccard)){ 
$sql="insert into form (fname, lname, ccard, subject) values (?, ?, ?, ?)"; 


$stmt=mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param($stmt, 'ssis', $fname, $lname, $ccard, $subject);

mysqli_stmt_execute($stmt);

$last_id = mysqli_insert_id($yhteys);

mysqli_close($yhteys);

}
header("Location:contact.html");
exit;


