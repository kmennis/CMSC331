<?php
session_start();

$debug = false;
include('../../CommonMethods.php');
$COMMON = new Common($debug);

//Include functions
include "Functions.php";

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Edit Student Information</title>
     <!---  <link rel='stylesheet' type='text/css' href='css/standard.css'/> --->
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
  <?php include('header.php');  ?>
  <!-- Current info is indicated as light gray in the initial input. Replace with wanted Data -->
    <div id="login">
      <div id="form">
			<div class="top">
			<h2>Edit Student Information<span class="login-create"></span></h2>
			<form action="StudProcessEdit.php" method="post" name="Edit">
			<div class="field fancy-form">
				<label for="firstN">First Name</label>
				<input id="firstN" size="30" maxlength="50" type="text" name="firstN" required value=<?php echo getStudentFirstNameByID($_SESSION["studID"])?>>
			</div>
			<div class="field fancy-form">
			  <label for="lastN">Last Name</label>
			  <input id="lastN" size="30" maxlength="50" type="text" name="lastN" required value=<?php echo getStudentLastNameByID($_SESSION["studID"])?>>
			</div>
			<div class="field fancy-form">
				<label for="studID">Student ID</label>
				<input id="studID" size="30" maxlength="7" type="text" pattern="[A-Za-z]{2}[0-9]{5}" title="AB12345" name="studID" disabled value=<?php echo $_SESSION["studID"]?>>
			</div>
			<div class="field fancy-form">
				<label for="email">E-mail</label>
				<input id="email" size="30" maxlength="255" type="email" name="email" required value=<?php echo getStudentEmailByID($_SESSION["studID"])?>>
			</div>
			<div class="field fancy-form">
                <!-- Change Major- Value needs to be Shortened version for database efficiency -->
				  <label for="major">Major</label>
				  <select id="major" name = "major">
					<option value="CMPE" <?php if(getStudentMajorByID($_SESSION["studID"]) == 'CMPE'){echo("selected");}?>>Computer Engineering</option>
					<option value="CMSC" <?php if(getStudentMajorByID($_SESSION["studID"]) == 'CMSC'){echo("selected");}?>>Computer Science</option>
					<option value="MENG" <?php if(getStudentMajorByID($_SESSION["studID"]) == 'MENG'){echo("selected");}?>>Mechanical Engineering</option>
					<option value="CENG" <?php if(getStudentMajorByID($_SESSION["studID"]) == 'CENG '){echo("selected");}?>>Chemical Engineering</option>
<!-- someday
					<option <?php if($_SESSION["major"] == 'Africana Studies'){echo("selected");}?>>Africana Studies</option>
					<option <?php if($_SESSION["major"] == 'American Studies'){echo("selected");}?>>American Studies</option>
					<option <?php if($_SESSION["major"] == 'Ancient Studies'){echo("selected");}?>>Ancient Studies</option>
					<option <?php if($_SESSION["major"] == 'Anthropology'){echo("selected");}?>>Anthropology</option>
					<option <?php if($_SESSION["major"] == 'Asian Studies'){echo("selected");}?>>Asian Studies</option>
					<option <?php if($_SESSION["major"] == 'Biochemistry and Molecular Biology'){echo("selected");}?>>Biochemistry and Molecular Biology</option>
					<option <?php if($_SESSION["major"] == 'Bioinformatics and Computational Biology'){echo("selected");}?>>Bioinformatics and Computational Biology</option>
					<option <?php if($_SESSION["major"] == 'Biological Sciences'){echo("selected");}?>>Biological Sciences</option>
					<option <?php if($_SESSION["major"] == 'Business Technology Administration'){echo("selected");}?>>Business Technology Administration</option>
					<option <?php if($_SESSION["major"] == 'Chemistry'){echo("selected");}?>>Chemistry</option>
					<option <?php if($_SESSION["major"] == 'Dance'){echo("selected");}?>>Dance</option>
					<option <?php if($_SESSION["major"] == 'Economics'){echo("selected");}?>>Economics</option>
					<option <?php if($_SESSION["major"] == 'Financial Economics'){echo("selected");}?>>Financial Economics</option>
					<option <?php if($_SESSION["major"] == 'Emergency Health Services'){echo("selected");}?>>Emergency Health Services</option>
					<option <?php if($_SESSION["major"] == 'English'){echo("selected");}?>>English</option>
					<option <?php if($_SESSION["major"] == 'Environmental Science and Environmental Studies'){echo("selected");}?>>Environmental Science and Environmental Studies</option>
					<option <?php if($_SESSION["major"] == 'Gender and Womens Studies'){echo("selected");}?>>Gender and Womens Studies</option>
					<option <?php if($_SESSION["major"] == 'Geography'){echo("selected");}?>>Geography</option>
					<option <?php if($_SESSION["major"] == 'Global Studies'){echo("selected");}?>>Global Studies</option>
					<option <?php if($_SESSION["major"] == 'Health Administration and Policy'){echo("selected");}?>>Health Administration and Policy</option>
					<option <?php if($_SESSION["major"] == 'History'){echo("selected");}?>>History</option>
					<option <?php if($_SESSION["major"] == 'Information Systems'){echo("selected");}?>>Information Systems</option>
					<option <?php if($_SESSION["major"] == 'Interdisciplinary Studies'){echo("selected");}?>>Interdisciplinary Studies</option>
					<option <?php if($_SESSION["major"] == 'Management of Aging Services'){echo("selected");}?>>Management of Aging Services</option>
					<option <?php if($_SESSION["major"] == 'Mathematics'){echo("selected");}?>>Mathematics</option>
					<option <?php if($_SESSION["major"] == 'Statistics'){echo("selected");}?>>Statistics</option>
					<option <?php if($_SESSION["major"] == 'Media and Communication Studies'){echo("selected");}?>>Media and Communication Studies</option>
					<option <?php if($_SESSION["major"] == 'Modern Languages, Linguistics and Intercultural Communication'){echo("selected");}?>>Modern Languages, Linguistics and Intercultural Communication</option>
					<option <?php if($_SESSION["major"] == 'Music'){echo("selected");}?>>Music</option>
					<option <?php if($_SESSION["major"] == 'Philosophy'){echo("selected");}?>>Philosophy</option>
					<option <?php if($_SESSION["major"] == 'Physics'){echo("selected");}?>>Physics</option>
					<option <?php if($_SESSION["major"] == 'Political Sciences'){echo("selected");}?>>Political Science</option>
					<option <?php if($_SESSION["major"] == 'Psychology'){echo("selected");}?>>Psychology</option>
					<option <?php if($_SESSION["major"] == 'Social Work'){echo("selected");}?>>Social Work</option>
					<option <?php if($_SESSION["major"] == 'Sociology'){echo("selected");}?>>Sociology</option>
					<option <?php if($_SESSION["major"] == 'Theatre'){echo("selected");}?>>Theatre</option>
					<option <?php if($_SESSION["major"] == 'Visual Arts'){echo("selected");}?>>Visual Arts</option>
					<option <?php if($_SESSION["major"] == 'Undecided'){echo("selected");}?>>Undecided</option>
					<option <?php if($_SESSION["major"] == 'Other'){echo("selected");}?>>Other</option>
-->
					</select>
			</div>
                <!-- Save New Data -->
			<div class="nextButton">
				<input type="submit" name="save" class="button large go" value="Save">
			</div>
			</div>
		</form>

<!--Include footer-->
<link rel="import" href="footer.php">
