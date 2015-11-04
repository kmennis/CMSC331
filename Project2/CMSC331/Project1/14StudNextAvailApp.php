<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
include('Functions.php');
$COMMON = new Common($debug);

$major = $_SESSION["major"];
?>

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Next Available Appointment</title>
    <link rel='stylesheet' type='text/css' href='css/standard.css'/>
</head>
<body>
<div id="login">
    <form id="form">
        <div class="top">
            <h1>Next Available Appointment</h1>
            <div class="field">
                <?php
                //Set Query: soonest to date appointment that corresponds with users Major
                $sql = "select * from Proj2Appointments where (Time > now() and Major like '%$major%') order by Time asc limit 1";
                $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
                // if for some reason there really isn't a match, (something got messed up, tell them there really isn't one there)
                $num_rows = mysql_num_rows($rs);

                if($num_rows > 0) {
                    $row = mysql_fetch_row($rs); // get legit data
                    $advisorID = $row[2];
                    $datephp = strtotime($row[1]);
                    $majorsList = $row[3];

                    //if it is not a group advising, get the advisor info
                    if ($advisorID != 0) {
                       /* $sql2 = "select * from Proj2Advisors where `id` = '$advisorID'";
                        $rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
                        $row2 = mysql_fetch_row($rs2); */
                        $newInfo = getAdvisorNameAndOffice($advisorID);
                        /*
                        $advisorName = $row2[1] . " " . $row2[2];
                        $office = $row2[5];
                        */
                        $advisorName = $newInfo[0];
                        $office = $newInfo[1];
                    } else {
                        //else it is a group advising session
                        $advisorName = "Group";
                    }
                    //Print details about the Next Available Appointment
                    echo "<label for='info'>";
                    echo "Advisor: ", $advisorName, "<br>";
                    echo "Appointment: ", date('l, F d, Y g:i A', $datephp), "<br>";
                    echo "Location of Appointment: " . $office ."<br>" ;
                    echo "Major's Allowed: " . $majorsList . "<br>" ;
                    echo "Your Major: " .$major . "</label>";
                }
                else // something is up, and there DB table needs to be fixed OR no more stuff
                {
                    echo("No next appointment is available. Contact the Advisor office.");

                }


                ?>
            </div>

            <!-- GO BACK HOME -->
            <div class="finishButton">
                <form>
                    <INPUT value="Return To Home" TYPE="button" class="button large go" onClick="parent.location='02StudHome.php'">
                </form>

            </div>

        </div>
    </form>
</body>
</html>