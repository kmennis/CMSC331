<?php
session_start();

$_SESSION["GroupApp"] = $_POST["GroupApp"];
$_SESSION["location"] = $_POST["location"];
$_SESSION["Delete"] = false;
//Proceed to EDIT or DELETE appointment
if ($_POST["next"] == "Delete Appointment"){
	$_SESSION["Delete"] = true;
	$_SESSION["advisor"] = $_POST["next"];
	header('Location: AdminConfirmEditGroup.php');
}
elseif ($_POST["next"] == "Edit Appointment"){
	header('Location: AdminProceedEditGroup.php');
}

?>