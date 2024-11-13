<?php
	require_once("_process.php");

	$_SESSION["expert_id"] = $_POST["userid"];

	$expert_id = $_SESSION["expert_id"];

	$log_id = $_SESSION["loginID"];

	// $getustaz = array();

	if(isset($log_id)){

	$getustaz = $process->getProfileData($expert_id);

		echo "1|".$getustaz["login_id"]."|".$getustaz["title_id"]."|".$getustaz["fullname"]."|".$getustaz["area_id"]."|".$getustaz["area"]."|".$getustaz["state"]."|".$getustaz["title"];

		// var_dump($getustaz);
	}
	else{
		echo "You are not Loged In, Please Login to proceed";
	}

	// echo "Expert ID: ".$expert_id."<br/>";
	// echo "Login ID: ".$log_id;

	// $area = array();	
	// $area = $process->getAllAreas();

	// echo "1|".$area
?>