<?php
require_once("_process.php");

$log_id = $_SESSION["loginID"];
$event_id = $_POST["event_id"];
$job_type = $_POST["jobtype"];

$check_claim = $process->CheckUserJobClaim($log_id,$event_id);

if(isset($log_id)){

	if($check_claim!=0){

		echo "You have claim this job before!";
	}
	else{

		$terbuka = $process->ClaimPilihan($log_id,$event_id);
	}

}
else{

	echo "You are not Log In, Please Log to Claim";

}

?>