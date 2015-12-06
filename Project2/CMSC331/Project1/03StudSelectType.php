<?php
session_start();
include('../../CommonMethods.php');
$COMMON = new Common($debug);
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Select Advising Type</title>

      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
<?php include('header.php');  ?>
    <div id="login">
      <div id="form">
        <div class="top">
		<h1>Schedule Appointment</h1>
		<h3>What kind of advising appointment would you like?</h3><br>
            <!--SELECT group OR single appt. and move on to next step in appt. -->
	<form action="StudProcessType.php" method="post" name="SelectType">
	<div class="nextButton">
		<input type="submit" name="type" class="button large go" value="Individual">
		<input type="submit" name="type" class="button large go" value="Group" style="float: right;">
	    </div>
		</div>
		</form>


<br>
<br>
		<div>
            <!--Or go home instead -->
		<form method="link" action="02StudHome.php">
		<input type="submit" name="home" class="button large" value="Cancel">
		</form>
		</div>

<!--Included footer-->
          <?php include('footer.php') ?>