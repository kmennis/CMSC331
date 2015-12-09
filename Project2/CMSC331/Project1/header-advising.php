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
?>
<div id="header">
    <div class="header-holder">
        <div class="logo"><img src="images/umbcpng.png"></div>
        <div class="welcome advising">Welcome, <?php echo getAdvisorFirstName($_SESSION["UserN"]); ?></div>
    </div>
</div>
<div class="banner">
    <div class="banner-holder">
        <div class="image">
            <img src="images/umbcbanner.jpg">
        </div>
    </div>
</div>
<?php     ?>