<?php
/**
 * Created by PhpStorm.
 * User: kristen
 * Date: 12/2/2015
 * Time: 10:30 AM
 */
?>
<?php
session_start();
include('Functions.php');
$studID =$_SESSION["studID"];
?>
<div id="header">
    <div class="header-holder">
        <div class="logo"><img src="images/umbcpng.png"></div>
        <div class="welcome">Welcome, <?php echo getStudentFirstNameByID($_SESSION["studID"]); ?></div>
    </div>
</div>
<div class="banner">
    <div class="banner-holder">
        <div class="image">
            <img src="images/umbcbanner.jpg">
        </div>
    </div>
</div>
<div class="nextApp">
    <div class="nextApp-holder">
<?php
if($_SESSION["studID"] != null){

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
                ?>
                <div class="warning">
                <p>Your Next appointment is at <?php echo date('l, F d, Y g:i A', $datephp);  ?> in <?php echo $row[7];  ?></p>
                </div>

        <?php
            }
            else // something is up, and there DB table needs to be fixed
            { ?>
                <div class="check">
                <p> No Current Appointment</p>
                </div>

        <?php
            }}





                ?>
</div>
</div>