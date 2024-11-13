<?php
	require_once("_process.php");

	$fullnameid = $_SESSION["loginID"];
	$status = $_POST["status"];
	$event_id = $_POST["event_id"];
	
	$result = $process->updateEventStatus($status,$event_id);

	echo $result;

	// echo "1.|".$bookustaz["fullname"]."|".$state["state"]."|".$area["area"]."|".$start."|".$end."|".$service["service"]."|".$kadar."|".$kedatangan."|".$topik."|".$tambahan."|";

?>