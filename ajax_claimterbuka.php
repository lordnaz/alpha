<?php
require_once("_process.php");

$log_id = $_SESSION["loginID"];
$event_id = $_POST["event_id"];
$job_type = $_POST["jobtype"];

// $start = $_POST["start"];


if(isset($log_id)){

	$terbuka = $process->ClaimTerbuka($log_id,$event_id);

	$x = 1;

	echo "1.|".$x;

}

else{
	
	echo "You are not Log In, Please Log to Claim";

}

// echo "1.|".$log_id."|".$job_type."|".$event_id;

?>