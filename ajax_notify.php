<?php
	require_once("_process.php");

	if(isset($_POST["userID"])){
		$notification = array();
	    $notification = $process->getNewNotification($_POST["userID"]);
	    $totalNotification = count($notification);
	}

	$_SESSION["userNotification"] = $notification;
	// var_dump($notification);

	echo json_encode($notification);
?>