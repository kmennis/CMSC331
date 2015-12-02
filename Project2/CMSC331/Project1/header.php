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
?>
<div id="header">
    <div class="header-holder">
        <div class="logo"><img src="images/umbcpng.png"></div>
        <div class="welcome">Welcome, <?php echo $_SESSION["firstN"] ?></div>
    </div>
</div>
<?php     ?>