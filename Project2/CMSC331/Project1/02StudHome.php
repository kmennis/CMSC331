<?php
session_start();
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Student Advising Home</title>
	<link rel='stylesheet' type='text/css' href='css/standard.css'/>
      <link rel='stylesheet' type='text/css' href='style.css'/>


  </head>
  <body>
  <?php include('header.php');  ?>
    <div id="login">
      <div id="form">
        <div class="top">
		<h2>Hello 
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
			$debug = false;
			include('../../CommonMethods.php');
			$COMMON = new Common($debug);
			
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
				echo "<button type='submit' name='selection' class='button large selection " . $widthName . $widthCounter ."  value='Signup'>Signup for an appointment</button><br>";
                $widthCounter++;
			}
			else{
				echo "<button type='submit' name='selection' class='button large  " . $widthName . $widthCounter ."' value='View'>View my appointment</button><br>";
                $widthCounter++;
				echo "<button type='submit' name='selection' class='button large selection " . $widthName . $widthCounter ."' value='Reschedule'>Reschedule my appointment</button><br>";
                $widthCounter++;
				echo "<button type='submit' name='selection' class='button large selection " . $widthName . $widthCounter ."' value='Cancel'>Cancel my appointment</button><br>";
                $widthCounter++;
			}
            //Always show these options
			echo "<button type='submit' name='selection' class='button large selection " . $widthName . $widthCounter ."' value='Search'>Search for appointment</button><br>";
        $widthCounter++;
			echo "<button type='submit' name='selection' class='button large selection " . $widthName . $widthCounter ."' value='Edit'>Edit student information</button><br>";
        $widthCounter++;
            echo "<button type='submit' name='selection' class='button large selection " . $widthName . $widthCounter ."' value='NextApp'>View Next Appointment Available</button><br>";
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