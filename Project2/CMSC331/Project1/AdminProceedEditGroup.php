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
    <div id="login">
      <div id="form">
        <div class="top">
          <h1>Edit Group Appointment</h1>
		  <div class="field fancy-form">
          <?php


            $group = $_SESSION["GroupApp"];
            parse_str($group);

            echo("<form action=\"AdminConfirmEditGroup.php\" method=\"post\" name=\"Edit\">");
            echo("Time: ". date('l, F d, Y g:i A', strtotime($row[0])). "<br>");
            echo("Majors included: ");
            if($row[1]){
              echo("$row[1]<br>"); 
            }
            else{
              echo("Available to all majors<br>"); 
            }
            echo("Number of students enrolled: $row[2] <br>");
            echo("Student limit: ");
            echo("<input type=\"number\" id=\"stepper\" name=\"stepper\" min=\"$row[2]\" max=\"$row[3]\" value=\"$row[3]\" />");

            echo("<br><br>");
          ?>
              <div class="field fancy-form">
                  <label for="location">Appointment Location</label>
                  <input id="location" size="30" maxlength="50" type="text" name="location" required autofocus>
              </div>
              <?php

            echo("<div class=\"nextButton\">");
            echo("<input type=\"submit\" name=\"next\" class=\"button large go\" value=\"Submit\">");
            echo("</div>");
            echo("</div>");
            echo("<div class=\"bottom\">");
            if($row[2] > 0){
              echo "<p style='color:red'>Note: There are currently $row[2] students enrolled in this appointment. <br>
                    The student limit cannot be changed to be under this amount.</p>";
            }
            echo("</div>");
          ?>
		  </div>

  </form>

            <?php  include('footer.php'); ?>>
