<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Search for Appointment</title>
      <link rel='stylesheet' type='text/css' href='css/standard.css'/>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
		<h1>Search Results</h1>
		<h3>Showing open appointments only</h3>
	    <div class="field">
			<p>Showing results for: </p>
			<?php

                //Showing the resuts for the date, time and advisor selected during the process
				$date = $_POST["date"];
				$times = $_POST["time"];
				$advisor = $_POST["advisor"];
				$results = array();
				
				if($date == ''){ echo "Date: All"; }
				else{ 
					echo "Date: ",$date;
					$date = date('Y-m-d', strtotime($date));
				}
				echo "<br>";
				if(empty($times)){ echo "Time: All"; }
				else{
					$i = 0;
					echo "Time: ";
					foreach($times as $t){
						echo ++$i, ") ", date('g:i A', strtotime($t)), " ";
					}
				}
				echo "<br>";
				if($advisor == ''){ echo "Advisor: All appointments"; }
				elseif($advisor == 'I'){ echo "Advisor: All individual appointments"; }
				elseif($advisor == '0'){ echo "Advisor: All group appointments"; }
				else{
					$sql = "select * from Proj2Advisors where `id` = '$advisor'";
					$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					while($row = mysql_fetch_row($rs)){
						echo "Advisor: ", $row[1], " ", $row[2];
					}
				}
				?>
				<br><br><label>
				<?php
                //Show if No times are selected
				if(empty($times)){
                    //Show NO TIME SELECTED and INDIVIDUAL
					if($advisor == 'I'){
						$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `AdvisorID` != 0 and `EnrolledNum` = 0 order by `Time` ASC";
						$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					}
					else{
						$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `AdvisorID` like '%$advisor%' and `EnrolledNum` = 0 order by `Time` ASC";
						$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					}
					$row = mysql_fetch_row($rs);
					$rsA = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
					if($row){
                        //Show Groups that are available
						while($row = mysql_fetch_row($rsA)){
							if($row[2] == 0){
								$advName = "Group";
							}
							else{
								$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
								$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
								$row2 = mysql_fetch_row($rs2);
								$advName = $row2[1] ." ". $row2[2];
							}
							
							$found = "Time: ". date('l, F d, Y g:i A', strtotime($row[1])).
									"<br>Advisor: ". $advName. 
									"<br>Major: ". $row[3]. "<br><br>";
							array_push($results, $found);
						}
					}
				}
				else{
					if($advisor == 'I'){
                        //Show Individual with times selected
						foreach($times as $t){
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and `AdvisorID` != 0 and `EnrolledNum` = 0 order by `Time` ASC";
							$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							$row = mysql_fetch_row($rs);
							$rsA = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							if($row){
								while($row = mysql_fetch_row($rsA)){
									if($row[2] == 0){
										$advName = "Group";
									}
									else{
										$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
										$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
										$row2 = mysql_fetch_row($rs2);
										$advName = $row2[1] ." ". $row2[2];
									}
									$found = "Time: ". date('l, F d, Y g:i A', strtotime($row[1])).
											"<br>Advisor: ". $advName. 
											"<br>Major: ". $row[3]. "<br><br>";
									array_push($results, $found);
								}
							}
						}
					}
					else{
						foreach($times as $t){
							$sql = "select * from Proj2Appointments where `Time` like '%$date%' and `Time` like '%$t%' and `AdvisorID` like '%$advisor%' and `EnrolledNum` = 0 order by `Time` ASC";
							$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
							$row = mysql_fetch_row($rs);
							if($row){
								while($row = mysql_fetch_row($rs)){
									if($row[2] == 0){
										$advName = "Group";
									}
									else{
										$sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
										$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
										$row2 = mysql_fetch_row($rs2);
										$advName = $row2[1] ." ". $row2[2];
									}
									$found = "Time: ". date('l, F d, Y g:i A', strtotime($row[1])).
											"<br>Advisor: ". $advName. 
											"<br>Major: ". $row[3]. "<br><br>";
									array_push($results, $found);
								}
							}
						}
					}
				}
				if(empty($results)){
					echo "No results found.<br><br>";
				}
				else{
					foreach($results as $r){
					echo $r;
					}
				}
			?>
			</label>
        </div>
		<form action="02StudHome.php" method="link">
	    <div class="nextButton">
			<input type="submit" name="done" class="button large go" value="Done">
	    </div>
		</form>
		</div>
		<div class="bottom">
		<p>If the Major category is followed by a blank, then it is open for all majors.</p>
		</div>
  </body>
</html>