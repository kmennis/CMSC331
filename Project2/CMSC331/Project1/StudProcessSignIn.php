<?php
session_start();
//Only student ID is created as a session variable
include('../../CommonMethods.php');
$debug = false;
$Common = new Common($debug);

$_SESSION["studID"] = strtoupper($_POST["studID"]);
$studID1 = $_SESSION["studID"];


$sql = "SELECT * FROM `Proj2Students` WHERE `StudentID` = '$studID1'";
$rs = $Common->executeQuery($sql, "Advising Appointments");
$row = mysql_fetch_row($rs);
if($row){
    header('Location: 02StudHome.php');
}
else{
    $first = $_POST["firstN"];
    $last = $_POST["lastN"];
    $studID = $_SESSION["studID"];
    $email = $_POST["email"];
    $major= $_POST["major"];
//Else insert into the database!
    $sql = "INSERT INTO `Proj2Students`(`FirstName`, `LastName`, `StudentID`, `Email`, `Major`)
  			VALUES ('$first', '$last', '$studID', '$email','$major')";
    //echo ("<h3>$first $last<h3>");
    $rs = $Common->executeQuery($sql, "Advising Appointments");

    header('Location: 02StudHome.php');
}


?>