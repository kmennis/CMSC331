<?php
session_start();
$_SESSION["appTime"] = $_POST["appTime"]; // radio button selection from previous form
$debug = false;
include('../../CommonMethods.php');
include('Functions.php');
$COMMON = new Common($debug);
//Include functions
include "Functions.php";
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Confirm Appointment</title>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <body>
  <?php include('header.php');  ?>
	<div id="login">
      <div id="form">
        <div class="top">
		<h1>Confirm Appointment</h1>
	    <div class="field">
		<form action = "StudProcessSch.php" method = "post" name = "SelectTime">
	    <?php

			
			//Changed to function calls
			$firstn = getStudentFirstNameByID($_SESSION["firstN"]);
			$lastn = getStudentLastNameByID($_SESSION["lastN"]);
			$studid = $_SESSION["studID"];
			$major = getStudentMajorByID($_SESSION["major"]);
			$email = getStudentEmailByID($_SESSION["email"]);
			
			//Get user appointment
			if($_SESSION["resch"] == true){
				$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studid%'";
				$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
				$row = mysql_fetch_row($rs);
				$oldAdvisorID = $row[2];
				$oldDatephp = strtotime($row[1]);
				//Get adviser name
				if($oldAdvisorID != 0){
                    /*
					$sql2 = "select * from Proj2Advisors where `id` = '$oldAdvisorID'";
					$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
					$row2 = mysql_fetch_row($rs2);
					$oldAdvisorName = $row2[1] . " " . $row2[2];*/
                    $oldAdvisorName = getAdvisorInfo($oldAdvisorID);
				}
				else{$oldAdvisorName = "Group";}
				//Display previous appointment
				echo "<h3>Previous Appointment</h3>";
				echo "<label for='info'>";
				echo "Advisor: ", $oldAdvisorName, "<br>";
				echo "Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "</label><br>";
			}
			
			$currentAdvisorName;
			$currentAdvisorID = $_SESSION["advisor"];
			$currentDatephp = strtotime($_SESSION["appTime"]);
			if($currentAdvisorID != 0){
                /*
				$sql2 = "select * from Proj2Advisors where `id` = '$currentAdvisorID'";
				$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
				$row2 = mysql_fetch_row($rs2);
				$currentAdvisorName = $row2[1] . " " . $row2[2];*/

               $currentAdvisorName = getAdvisorInfo($currentAdvisorID);
			}
			else{$currentAdvisorName = "Group";}
			//This is your new appointment
			echo "<h3>Current Appointment</h3>";
			echo "<label for='newinfo'>";
			echo "Advisor: ",$currentAdvisorName,"<br>";
			echo "Appointment: ",date('l, F d, Y g:i A', $currentDatephp),"</label>";
		?>
        </div>
	    <div class="nextButton">
		<?php
            //Reschedule
			if($_SESSION["resch"] == true){
				echo "<input type='submit' name='finish' class='button large go' value='Reschedule'>";
			}
			else{//submit
				echo "<input type='submit' name='finish' class='button large go' value='Submit'>";
			}
		?><!-- Cancel -->
			<input style="margin-left: 50px" type="submit" name="finish" class="button large" value="Cancel">
	    </div>
		</form>
		</div>
<!--Include footer-->
<?php include('footer.php'); ?>

