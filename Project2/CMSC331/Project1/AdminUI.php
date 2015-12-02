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
    <title>Admin Home</title>
	<link rel='stylesheet' type='text/css' href='css/standard.css'/>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
	<h2> Hello 
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
		echo $row[0];
	?>
	</h2>
	<p>This is testing for the queries</p>
            <p>This is my First Name <?php echo getAdvisorFirstName($_SESSION["UserN"]);  ?>  </p>
            <p> My office is in <?php echo getAdvisorOffice($_SESSION["UserN"]);  ?></p>
            <p> My Last name is <?php   echo getAdvisorLastName($_SESSION["UserN"]); ?></p>
	<form action="AdminProcessUI.php" method="post" name="UI">
  
		<input type="submit" name="next" class="button large selection" value="Schedule appointments"><br>
		<input type="submit" name="next" class="button large selection" value="Print schedule for a day"><br>
		<input type="submit" name="next" class="button large selection" value="Edit appointments"><br>
		<input type="submit" name="next" class="button large selection" value="Search for an appointment"><br>
		<input type="submit" name="next" class="button large selection" value="Create new Admin Account"><br>
	
	</form>
	<br>

	<form method="link" action="Logout.php">
		<input type="submit" name="next" class="button large go" value="Log Out">
	</form>
          
        </div>
        <div class="field">
          
        <?php include('footer.php'); ?>
	<?php //include('./workOrder/workButton.php'); ?>


