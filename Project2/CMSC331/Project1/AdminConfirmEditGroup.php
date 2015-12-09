<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Group Appointment</title>
    <script type="text/javascript">
    function saveValue(target){
	var stepVal = document.getElementById(target).value;
	alert("Value: " + stepVal);
    }
    </script>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php include('header-advising.php');  ?>
    <form id="login">
      <div id="form">
        <div class="top">
		<div class="field fancy-form">
            <?php
            $delete = $_SESSION["Delete"];
            $group = $_SESSION["GroupApp"];
            parse_str($group);

          $location = $_POST["location"];

            //Show the removed appointment
            if($delete == true){
                echo("<h1>Removed Appointment</h1><br>");

                $sql = "SELECT `EnrolledID` FROM `Proj2Appointments` WHERE `Time` = '$row[0]'
              AND `AdvisorID` = '0'
              AND `Major` = '$row[1]'
              AND `EnrolledNum` = '$row[2]'
              AND `Max` = '$row[3]'";
                $rs = $COMMON->executeQuery($sql, "Advising Appointments");

                $stds = mysql_fetch_row($rs);
                echo($stds[0]);
                $stds = trim($stds[0]); // had some side white spaces sometimes
                $stds = split(" ", $stds);

                if($debug) { var_dump("\n<BR>EMAILS ARE: $stds \n<BR>"); }
                // foreach($stds as $element) { echo("->".$element."\n"); }
                //Delete everyones appointment since it is a group
                if($stds)
                {


                    foreach($stds as $element){
                        $element = trim($element);
                        $sql = "UPDATE `Proj2Students` SET `Status`='C' WHERE `StudentID` = '$element'";
                        $rs = $COMMON->executeQuery($sql, "Advising Appointments");
                        $sql = "SELECT `Email` FROM `Proj2Students` WHERE `StudentID` = '$element'";
                        $rs = $COMMON->executeQuery($sql, "Advising Appointments");
                        $ros = mysql_fetch_row($rs);
                        $eml = $ros[0];
                        $message = "The following group appointment has been deleted by the adminstration of your advisor: " . "\r\n" .
                            "Time: $row[0]" . "\r\n" .
                            "To schedule for a new appointment, please log back into the UMBC COEIT Engineering and Computer Science Advising webpage." . "\r\n" .
                            "http://coeadvising.umbc.edu  -> COEIT Advising Scheduling \r\n Reminder, this is only accessible on campus.";

                        mail($eml, "Your COE Advising Appointment Has Been Deleted", $message);
                    }
                }
                //Then at the very end delete the appointment it's self
                $sql = "DELETE FROM `Proj2Appointments` WHERE `Time` = '$row[0]'
              AND `AdvisorID` = '0'
              AND `Major` = '$row[1]'
              AND `EnrolledNum` = '$row[2]'
              AND `Max` = '$row[3]'";
                $rs = $COMMON->executeQuery($sql, "Advising Appointments");

                echo("Time: ". date('l, F d, Y g:i A', strtotime($row[0])). "<br>");
                echo("Majors included: ");

                if($row[1]){ echo("$row[1]<br>"); }
                else{ echo("Available to all majors<br>"); }

                echo("Number of students enrolled: $row[2]<br>");
                echo("Student limit: $row[3]");
                echo("<br><br>");
                ?>
                <form>
                    <INPUT value="Return To Home" TYPE="button" class="button large go" onClick="parent.location='AdminUI.php'">
                </form>
            <?php
                echo("</div>");
                echo("<div class=\"bottom\">");
                if($stds[0]){
                    echo "<p style='color:red'>Students have been notified of the cancellation.</p>";
                }
            }
            else{
                echo("<h1>Changed Appointment</h1><br>");
                echo("<h2>Previous Appointment:</h2>");
                echo("Time: ". date('l, F d, Y g:i A', strtotime($row[0])). "<br>");
                echo("Majors included: ");
                if($row[1]){
                    echo("$row[1]<br>");
                }
                else{
                    echo("Available to all majors<br>");
                }
                echo("Number of students enrolled: $row[2]<br>");
                echo("Student limit: $row[3]");
                echo("<h2>Updated Appointment:</h2>");
                $limit = $_POST["stepper"];
                echo("<b>Time: ". date('l, F d, Y g:i A', strtotime($row[0])). "</b><br>");
                echo("<b>Majors included: ");
                if($row[1]){
                    echo("$row[1]</b><br>");
                }
                else{
                    echo("Available to all majors</b><br>");
                }
                echo("<b>Number of students enrolled: $row[2] </b><br>");
                echo("<b>Student limit: $limit</b><br>");
                echo("<b>Appointment Location: $location</b>");

                $sql = "UPDATE `Proj2Appointments` SET `Max`='$limit' , `MeetingOffice`='$location' WHERE `Time` = '$row[0]'
                    AND `AdvisorID` = '$0' AND `Major` = '$row[1]'
                    AND `EnrolledNum` = '$row[2]' AND `Max` = '$row[3]'";
                $rs = $COMMON->executeQuery($sql, "Advising Appointments");

                echo("<br><br>");
                ?>

                <form>
                    <INPUT value="Return To Home" TYPE="button" class="button large go" onClick="parent.location='AdminUI.php'">
                </form>
            <?php
            }
            ?>
	</div>

	</form>

<?php  include('footer.php'); ?>
