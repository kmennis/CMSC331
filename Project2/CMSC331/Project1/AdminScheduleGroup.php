<?php
session_start();
$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php include('header-advising.php');  ?>
    <div id="login">
      <div id="form">
        <div class="top">
		<h1>Schedule Group Appointments</h1>
<b><font color="red" size="3">Please note only <u>one</u> staff member needs to schedule the GROUP session since it involves all of you. Please identify which advisor will enter this type meeting before continuing.</font></b>

        <form action="AdminConfirmScheGroupApp.php" method="post" name="Confirm">
	    <div class="field fancy-form">
	      <label for="Date">Date</label>

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

<!-- I have to change this every semester!! Lupoli - 8/18/15 -->

<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->

	      <input id="Date" type="date" name="Date" placeholder="mm/dd/yyyy" min="2015-08-01" max="2015-12-30" required autofocus> (mm/dd/yyyy)
	    </div>

      <div class="field fancy-form">
        <label for="Time">Times</label>
        <input type="checkbox" name="time[]" value="08:00:00"> 8:00AM - 8:30AM <br>
        <input type="checkbox" name="time[]" value="08:30:00"> 8:30AM - 9:00AM <br>
        <input type="checkbox" name="time[]" value="09:00:00"> 9:00AM - 9:30AM <br>
        <input type="checkbox" name="time[]" value="09:30:00"> 9:30AM - 10:00AM <br>
        <input type="checkbox" name="time[]" value="10:00:00"> 10:00AM - 10:30AM <br>
        <input type="checkbox" name="time[]" value="10:30:00"> 10:30AM - 11:00AM <br> 
        <input type="checkbox" name="time[]" value="11:00:00"> 11:00AM - 11:30AM <br>
        <input type="checkbox" name="time[]" value="11:30:00"> 11:30AM - 12:00PM <br>
        <input type="checkbox" name="time[]" value="12:00:00"> 12:00PM - 12:30PM <br>
        <input type="checkbox" name="time[]" value="12:30:00"> 12:30PM - 1:00PM <br>
        <input type="checkbox" name="time[]" value="13:00:00"> 1:00PM - 1:30PM <br>
        <input type="checkbox" name="time[]" value="13:30:00"> 1:30PM - 2:00PM <br>
        <input type="checkbox" name="time[]" value="14:00:00"> 2:00PM - 2:30PM <br>
        <input type="checkbox" name="time[]" value="14:30:00"> 2:30PM - 3:00PM <br>
        <input type="checkbox" name="time[]" value="15:00:00"> 3:00PM - 3:30PM <br>
        <input type="checkbox" name="time[]" value="15:30:00"> 3:30PM - 4:00PM <br>
       
      </div>

      <div class="field fancy-form">
        <label for="Majors">Majors</label>
          <input value="CMPE" type="checkbox" name="major[]" value="Computer Engineering" checked>Computer Engineering
          <input value="CMSC" type="checkbox" name="major[]" value="Computer Science" checked>Computer Science
          <input value="MENG" type="checkbox" name="major[]" value="Mechanical Engineering" checked>Mechanical Engineering
          <input  value="CENG" type="checkbox" name="major[]" value="Chemical Engineering" checked>Chemical Engineering
      </div>

        <div class="field fancy-form">
            <label for="Repeat">Repeat Weekly</label>
            <input type="checkbox" name="repeat[]" value="Monday">Monday
            <input type="checkbox" name="repeat[]" value="Tuesday">Tuesday
            <input type="checkbox" name="repeat[]" value="Wednesday">Wednesday
            <input type="checkbox" name="repeat[]" value="Thursday">Thursday
            <input type="checkbox" name="repeat[]" value="Friday">Friday
        </div>

        <div class="field fancy-form">
        	<h3>Repeat for
        	<input type="number" id="stepper" name="stepper" min="0" max="4" value="0" />
		more week(s)</h3>
        </div>

	<div class="field  fancy-form">
        	<h3>Student limit: 
        	<input type="number" id="stepper1" name="stepper1" min="1" max="10" value="10" /></h3>
        </div>
            <div class="field fancy-form">
                <label for="location">Appointment Location</label>
                <input id="location" size="30" maxlength="50" type="text" name="location" required autofocus>
            </div>
	<div class="nextButton">
		<input type="submit" name="next" class="button large go" value="Create">

	</form>
            <form method="link" action="AdminUI.php" name="home">
                <input type="submit" name="next" class="button large" value="Cancel">
            </form>

	<?php //include('./workOrder/workButton.php'); ?>

<?php include('footer.php'); ?>

