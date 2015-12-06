<?php
session_start();
//Only student ID is created as a session variable
$_SESSION["studID"] = strtoupper($_POST["studID"]);


header('Location: 02StudHome.php');
?>