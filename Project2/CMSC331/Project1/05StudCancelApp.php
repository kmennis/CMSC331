<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);

//Include functions
include "Functions.php";
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cancel Appointment</title>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php include('header.php');  ?>
    <div id="login">
      <div id="form">
        <div class="top">
		<h1>Cancel Appointment</h1>
	    <div class="field">
	    <?php

	        //Added function calls
			$firstn = getStudentFirstNameByID($_SESSION["studID"]);
			$lastn = getStudentLastNameByID($_SESSION["studID"]);
			$studid = $_SESSION["studID"];
			$major = getStudentMajorByID($_SESSION["studID"]);
			$email = getStudentEmailByID($_SESSION["studID"]);

            //Select the current appointment for user
			$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studid%'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			$row = mysql_fetch_row($rs);
			$oldAdvisorID = $row[2];
			$oldDatephp = strtotime($row[1]);				

            //if it is group advising.... get this data
			if($oldAdvisorID != 0){
				$sql2 = "select * from Proj2Advisors where `id` = '$oldAdvisorID'";
				$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
				$row2 = mysql_fetch_row($rs2);					
				$oldAdvisorName = $row2[1] . " " . $row2[2];
			}
			else{$oldAdvisorName = "Group";}

            //Display current Appointment
			echo "<h3>Current Appointment</h3>";
			echo "<label for='info'>";
			echo "Advisor: ", $oldAdvisorName, "<br>";
			echo "Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "</label><br>";
		?>		
        </div>
            <!-- Cancel apppointment, Keep it, or Go Home -->
	    <div class="finishButton">
			<form action = "StudProcessCancel.php" method = "post" name = "Cancel">
			<input type="submit" name="cancel" class="button large go" value="Cancel">
			<input type="submit" name="cancel" class="button large" value="Keep">
			</form>
	    </div>
		</div>
		<div class="bottom">
			<p>Click "Cancel" to cancel appointment. Click "Keep" to keep appointment.</p>
		</div>
		</form>

<!--Include footer-->
<?php   include('footer.php'); ?>