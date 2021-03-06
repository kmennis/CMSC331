<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
include('Functions.php');
$COMMON = new Common($debug);

$studID = $_SESSION["studID"];
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Appointment</title>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php include('header.php');  ?>
    <div id="login">
      <form id="form">
        <div class="top">
		<h1>View Appointment</h1>
	    <div class="field">
	    <?php
            // Select appointment that current student is enrolled in
			$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studID%'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			// if for some reason there really isn't a match, (something got messed up, tell them there really isn't one there)
			$num_rows = mysql_num_rows($rs);

			if($num_rows > 0)
			{
				$row = mysql_fetch_row($rs); // get legit data
				$advisorID = $row[2];
				$datephp = strtotime($row[1]);
                $location = $row[7];

				//if its not group advising, get the advisor details.
				if($advisorID != 0){
					/*$sql2 = "select * from Proj2Advisors where `id` = '$advisorID'";
					$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
					$row2 = mysql_fetch_row($rs2);
					$advisorName = $row2[1] . " " . $row2[2];
                    $office = $row2[5];*/
                    $newInfo = getAdvisorNameAndOffice($advisorID);
                    $advisorName = $newInfo[0];
                    $office = $newInfo[1];
				}
				else{$advisorName = "Group";}

                //Print out Info for appointment
				echo "<label class='info' for='info'>";
				echo "Advisor: ", $advisorName, "<br>";
                if($advisorName != "Group"){
                    echo "Advisor's Office: " .$office ."<br>";
                }
				echo "Appointment: ", date('l, F d, Y g:i A', $datephp) , "<br>";
                echo "Location of Appointment: " .$location .  "</label>";
			}
			else // something is up, and there DB table needs to be fixed
			{
				echo("No appointment was detected. It may have been cancelled. Please make another appointment.");
				$sql = "update `Proj2Students` set `Status` = 'N' where `StudentID` = '$studID'";
				$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			}
	

		?>
        </div>

        <!-- ET PHONE HOME! -->
	    <div class="finishButton">
            <form>
            <INPUT value="Return To Home" TYPE="button" class="button large go" onClick="parent.location='02StudHome.php'">
            </form>

        </div>

		</div>
		</form>
<!--Include footer-->
<?php include('footer.php');  ?>