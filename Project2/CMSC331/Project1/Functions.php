<?php
/**
 * Created by PhpStorm.
 * User: kristen
 * Time: 9:39 PM
 */

/*
 * These were specifically chosen for the repetetiveness of their nature
 */
/**********************************************/
//For 10StudConfirmSch.php
if ( ! function_exists( 'getAdvisorInfo' ) ) {
    function getAdvisorInfo($advisorID)
    {
        global $debug;
        global $COMMON;
        $sql2 = "select * from Proj2Advisors where `id` = '$advisorID'";
        $rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
        $row2 = mysql_fetch_row($rs2);
        $advisorName = $row2[1] . " " . $row2[2];

        return $advisorName;
    }
}
/**********************************************/
//for 14StudNextAvailApp.php OR 04StudViewApp.php Get name AND office
if ( ! function_exists( 'getAdvisorNameAndOffice' ) ) {
    function getAdvisorNameAndOffice($advisorID)
    {
        global $debug;
        global $COMMON;
        $sql2 = "select * from Proj2Advisors where `id` = '$advisorID'";
        $rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
        $row2 = mysql_fetch_row($rs2);
        $advisorName = $row2[1] . " " . $row2[2];
        $office = $row2[5];

        return array($advisorName, $office);

    }
}
/**********************************************/
//AdminSearchResults.php Get advisor name from row used x3
if ( ! function_exists( 'getAdvisorNameFromRow' ) ) {
    function getAdvisorNameFromRow($row)
    {
        global $debug;
        global $COMMON;
        $sql2 = "select * from Proj2Advisors where `id` = '$row[2]'";
        $rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
        $row2 = mysql_fetch_row($rs2);
        $advName = $row2[1] . " " . $row2[2];

        return $advName;

    }
}
/**********************************************/
//AdminEditInd.php 1 and 2 used x2
if ( ! function_exists( 'getAdvisorRowByID' ) ) {
    function getAdvisorRowByID($row)
    {
        global $debug;
        global $COMMON;
        $secsql = "SELECT `FirstName`, `LastName` FROM `Proj2Advisors` WHERE `id` = '$row[2]'";
        $secrs = $COMMON->executeQuery($secsql, "Advising Appointments");
        $secrow = mysql_fetch_row($secrs);

        return $secrow;

    }
}
/**********************************************/
if ( ! function_exists( 'getStudentRowByID' ) ) {
    function getStudentRowByID($row)
    {
        global $debug;
        global $COMMON;
        $trdsql = "SELECT `FirstName`, `LastName` FROM `Proj2Students` WHERE `StudentID` = '$row[4]'";
        $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
        $trdrow = mysql_fetch_row($trdrs);

        return $trdrow;
    }
}
/**********************************************/
//Student First Name
 if ( ! function_exists( 'getStudentFirstNameByID' ) ) {
     function getStudentFirstNameByID($id)
     {
         global $debug;
         $Common = new Common($debug);
         $trdsql = "SELECT `FirstName` FROM `Proj2Students` WHERE `StudentID` = '$id'";
         $trdrs = $Common->executeQuery($trdsql, "Advising Appointments");
         $trdname = mysql_fetch_row($trdrs);

         return $trdname[0];
     }
 }
/**********************************************/
//Studen Last Name
if ( ! function_exists( 'getStudentLastNameByID' ) ) {
    function getStudentLastNameByID($id)
    {
        global $debug;
        global $COMMON;
        $trdsql = "SELECT `LastName` FROM `Proj2Students` WHERE `StudentID` = '$id'";
        $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
        $trdname = mysql_fetch_row($trdrs);

        return $trdname[0];
    }
}
/**********************************************/
//Student Email
if ( ! function_exists( 'getStudentEmailByID' ) ) {
    function getStudentEmailByID($id)
    {
        global $debug;
        global $COMMON;
        $trdsql = "SELECT `Email` FROM `Proj2Students` WHERE `StudentID` = '$id'";
        $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
        $trdname = mysql_fetch_row($trdrs);

        return $trdname[0];
    }
}
/**********************************************/
//Student MAjor
if ( ! function_exists( 'getStudentMajorByID' ) ) {
    function getStudentMajorByID($id)
    {
        global $debug;
        $Common = new Common($debug);
        $trdsql = "SELECT `Major` FROM `Proj2Students` WHERE `StudentID` = '$id'";
        $trdrs = $Common->executeQuery($trdsql, "Advising Appointments");
        $trdname = mysql_fetch_row($trdrs);

        return $trdname[0];
    }
}
/**********************************************/

/**********************************************/
//Advisor FirstName
if ( ! function_exists( 'getAdvisorFirstName' ) ) {
    function getAdvisorFirstName($username)
    {
        global $debug;
        $Common = new Common($debug);
        $sql2 = "select * from Proj2Advisors where `Username` = '$username'";
        $rs2 = $Common->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
        $row2 = mysql_fetch_row($rs2);
        $advisorName = $row2[1];

        return $advisorName;
    }
}
/**********************************************/

/**********************************************/
//Advisor LastName
if ( ! function_exists( 'getAdvisorLastName' ) ) {
    function getAdvisorLastName($username)
    {
        global $debug;
        global $COMMON;
        $sql2 = "select * from Proj2Advisors where `Username` = '$username'";
        $rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
        $row2 = mysql_fetch_row($rs2);
        $advisorName = $row2[2];

        return $advisorName;
    }
}
/**********************************************/
/**********************************************/
//Advisor Office
if ( ! function_exists( 'getAdvisorOffice' ) ) {
    function getAdvisorOffice($username)
    {
        global $debug;
        global $COMMON;
        $sql2 = "select * from Proj2Advisors where `Username` = '$username'";
        $rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
        $row2 = mysql_fetch_row($rs2);
        $advisorName = $row2[5];

        return $advisorName;
    }
}
/**********************************************/
/**********************************************/
//Advisor password
if ( ! function_exists( 'getAdvisorPassword' ) ) {
    function getAdvisorPassword($username)
    {
        global $debug;
        $Common = new Common($debug);
        $sql2 = "select * from Proj2Advisors where `Username` = '$username'";
        $rs2 = $Common->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
        $row2 = mysql_fetch_row($rs2);
        $advisorName = $row2[4];

        return $advisorName;
    }
}
/**********************************************/