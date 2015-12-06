<?php
session_start();


$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Student Advising Home</title>
	<link rel='stylesheet' type='text/css' href='css/standard.css'/>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


  </head>
  <body>
  <?php include('header.php');  ?>
    <div id="login">
      <div id="form">
        <div class="top">
		<h2>
		<?php
			echo $_SESSION["firstN"];
            echo $_SESSION["Major"];
		?>
        </h2>
            <?php
            //Long if odd, short if even
            $widthCounter = 1;
                    $widthName = "thewidth";
            ?>
	    <div class="selections">
		<form action="StudProcessHome.php" method="post" name="Home">
         <!-- Confirm if a student exists, if they have app. or if admin has cancelled   -->
	    <?php

			
			$_SESSION["studExist"] = false;
			$adminCancel = false;
			$noApp = false;
			$studid = $_SESSION["studID"];

			$sql = "select * from Proj2Students where `StudentID` = '$studid'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			$row = mysql_fetch_row($rs);
			
			if (!empty($row)){
				$_SESSION["studExist"] = true;
				if($row[6] == 'C'){
					$adminCancel = true;
				}
				if($row[6] == 'N'){
					$noApp = true;
				}
			}
            //If any of the following are false, only show Signup for an appt.
			if ($_SESSION["studExist"] == false || $adminCancel == true || $noApp == true){
				if($adminCancel == true){
					echo "<p style='color:red'>The advisor has cancelled your appointment! Please schedule a new appointment.</p>";
				}
				echo "<button type='submit' value='Signup' name='selection' class='large selection button-fancy pencil " . $widthName . $widthCounter ."  ><span>Signup for an appointment</span></button><br>";
                $widthCounter++;
			}
			else{
				echo "<button type='submit' name='selection' class='large button-fancy button-fancy eye " . $widthName . $widthCounter ."' value='View'><span>View my appointment</span></button><br>";
                $widthCounter++;
				echo "<button type='submit' name='selection' class=' large selection button-fancy redo " . $widthName . $widthCounter ."' value='Reschedule'><span>Reschedule my appointment</span></button><br>";
                $widthCounter++;
				echo "<button type='submit' name='selection' class=' large selection button-fancy ban " . $widthName . $widthCounter ."' value='Cancel'><span>Cancel my appointment</span></button><br>";
                $widthCounter++;
			}
            //Always show these options
			echo "<button type='submit' name='selection' class=' large selection button-fancy mag-glass " . $widthName . $widthCounter ."' value='Search'><span>Search for appointment<span></button><br>";
        $widthCounter++;
			echo "<button type='submit' name='selection' class='gear large selection button-fancy cog " . $widthName . $widthCounter ."' value='Edit'><span>Edit student information</span></button><br>";
        $widthCounter++;
            echo "<button type='submit' name='selection' class=' large selection button-fancy calendar " . $widthName . $widthCounter ."' value='NextApp'><span>View Next Appt. Available</span></button><br>";
        $widthCounter++;

        ?>
		</form>
        </div>
		<form action="Logout.php" method="post" name="Logout">
	    <div class="logoutButton">
			<input type="submit" name="logout" class="button large go" value="Logout">
	    </div>
		</div>
		</form>
  </body>
</html>