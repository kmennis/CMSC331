<?php 
session_start();
$debug = false;

if($debug) { echo("Session variables-> ".var_dump($_SESSION)); }

include('../../CommonMethods.php');
include('Functions.php');
$COMMON = new Common($debug);
$_SESSION["PassCon"] = false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Home</title>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php include('header-advising.php');  ?>
    <div id="login">
      <div id="form">
        <div class="top">

	<?php

	if(!isset($_SESSION["UserN"])) // someone landed this page by accident
	{
		return;
	}		

		$User = $_SESSION["UserN"];

		$Pass = getAdvisorPassword($_SESSION["UserN"]);

		$sql = "SELECT `firstName` FROM `Proj2Advisors` 
			WHERE `Username` = '$User' 
			and `Password` = '$Pass'";

		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		$row = mysql_fetch_row($rs);
		//echo $row[0];
	?>


            <div class="selections">
	<form action="AdminProcessUI.php" method="post" name="UI">
  
		<button type="submit" name="next" class="button-fancy large selection pencil-square" value="Schedule appointments"><span>Schedule Appointments</span></button><br>
		<button type="submit" name="next" class="button-fancy large selection printer" value="Print schedule for a day"><span>Print Schedule</span></button><br>
		<button type="submit" name="next" class="button-fancy large selection cog-lots" value="Edit appointments"><span>Edit Appointments</span></button><br>
		<button type="submit" name="next" class="button-fancy large selection binoculars" value="Search for an appointment"><span>Search for an Appointment</span></button><br>
		<button type="submit" name="next" class="button-fancy large selection users" value="Create new Admin Account"><span>Create New Admin</span></button><br>
	
	</form>
                </div>
	<br>

	<form method="link" action="Logout.php">
		<input type="submit" name="next" class="button large go" value="Log Out">
	</form>
          
        </div>
        <div class="field">
          
        <?php include('footer.php'); ?>
	<?php //include('./workOrder/workButton.php'); ?>


