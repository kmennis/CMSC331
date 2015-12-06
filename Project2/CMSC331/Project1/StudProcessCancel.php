<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);

//Include functions
include "Functions.php";

if($_POST["cancel"] == 'Cancel'){

	//Changed to function calls
	$firstn = getStudentFirstNameByID($_SESSION["studID"]);
	$lastn = getStudentLastNameByID($_SESSION["studID"]);
	$studid = $_SESSION["studID"];
	$major = getStudentMajorByID($_SESSION["studID"]);
	$email = getStudentEmailByID($_SESSION["studID"]);
	
	//remove stud from EnrolledID
	$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studid%'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);
	$oldAdvisorID = $row[2];
	$oldAppTime = $row[1];
	$newIDs = str_replace($studid, "", $row[4]);
	
	$sql = "update `Proj2Appointments` set `EnrolledNum` = EnrolledNum-1, `EnrolledID` = '$newIDs' where `AdvisorID` = '$oldAdvisorID' and `Time` = '$oldAppTime'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	
	//update stud status to noApp
	$sql = "update `Proj2Students` set `Status` = 'N' where `StudentID` = '$studid'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	
	$_SESSION["status"] = "cancel";
}
else{
	$_SESSION["status"] = "keep";
}
header('Location: 12StudExit.php');
?>