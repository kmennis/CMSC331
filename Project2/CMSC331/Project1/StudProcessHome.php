<?php
session_start();
//Whichever button you press sends you to the according action
if($_POST["selection"] == 'Signup'){
	header('Location: 03StudSelectType.php');
}
elseif($_POST["selection"] == 'View'){
	header('Location: 04StudViewApp.php');
}
elseif($_POST["selection"] == 'Reschedule'){
	$_SESSION["resch"] = true;
	header('Location: 03StudSelectType.php');
}
elseif($_POST["selection"] == 'Cancel'){
	header('Location: 05StudCancelApp.php');
}
elseif($_POST["selection"] == 'Search'){

	header('Location: 09StudSearchApp.php');
}
elseif($_POST["selection"] == 'Edit') {
    header('Location: 06StudEditInfo.php');

}elseif($_POST["selection"] == 'NextApp'){
    header('Location: 14StudNextAvailApp.php');
}

?>