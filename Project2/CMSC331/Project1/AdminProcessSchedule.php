<?php
session_start();
//Procceed to Individual or Group scheduling
if ($_POST["next"] == "Group"){
	$_SESSION["advisor"] = $_POST["next"];
	header('Location: AdminScheduleGroup.php');
}
elseif ($_POST["next"] == "Individual"){
	header('Location: AdminScheduleInd.php');
}

?>