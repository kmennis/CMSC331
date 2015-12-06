<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Exit Message</title>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  </head>
  <body>
<?php include('header.php');  ?>
    <div id="login">
      <div id="form">
        <div class="top">
	    <div class="statusMessage">
	    <?php
            //Exit out of cancelling, changing, or updating data. or just exit.

			$_SESSION["resch"] = false;			
			if($_SESSION["status"] == "complete"){
				echo "You have completed your sign-up for an advising appointment.";
			}
			elseif($_SESSION["status"] == "none"){
				echo "You did not sign up for an advising appointment.";
			}
			if($_SESSION["status"] == "cancel"){
				echo "You have cancelled your advising appointment.";
			}
			if($_SESSION["status"] == "resch"){
				echo "You have changed your advising appointment.";
			}
			if($_SESSION["status"] == "keep"){
				echo "No changes have been made to your advising appointment.";
			}
		?>
        </div>
		<form action="02StudHome.php" method="post" name="complete">
	    <div class="returnButton">
			<input type="submit" name="return" class="button large go" value="Return to Home">
	    </div>
		</form>
		</div>

<!--Include footer-->
<?php include('footer.php'); ?>