<?php
// header("Location: StudentAdminSignIn.html");

// I changed this since most of the time students will be logging in - not admin
// Lupoli 8/18/15
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Student or Admin</title>
      <link rel='stylesheet' type='text/css' href='style.css'/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
  <div id="header" class="home">
      <div class="header-holder">
          <div class="logo"><img src="images/umbcpng.png"></div>
      </div>
  </div>
  <div class="banner">
      <div class="banner-holder">
          <div class="image">
              <img src="images/umbcbanner.jpg">
          </div>
      </div>
  </div>
    <div id="login">
      <div id="form">
        <div class="top">
            <h1>UMBC Advising</h1>
            <h3>Log in as a Student or an Advisor</h3>
        <form method="link" action="01StudSignIn.html">
	<input type="submit" name="next" class="button large go" value="Sign in as a Student">
	</form>



	<form method="link" action="AdminSignIn.html">
	<input type="submit" name="next" class="button large go" value="Sign in as an Admin">
	</form>

        </div>
       <?php include('footer.php'); ?>
<?php
//header("Location: 01StudSignIn.html");


?>