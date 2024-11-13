<?php
	require_once("_process.php");

	echo "userID: ".$_POST["userID"];
	echo "status: ".$_POST["status"];
	if(isset($_POST["userID"]) && isset($_POST["status"])){
    	$userID = $_POST["userID"];
    	$status = $_POST["status"];

    	// echo "h/ere";
    	if($status=="accepted"){
    		// echo "here1";
    		$statusID = 2;
    	}else if($status=="pending"){
    		// echo "here2";
    		$statusID = 5;
    	}else if($status=="rejected"){
    		// echo "here3";
    		$statusID = 3;
    	}else{

    	}


        if( $_SESSION["userTypeID"]==2){
            $jobStatusData = $process->getOrganizerKulliyyah($userID,$statusID);
        }else if( $_SESSION["userTypeID"] == 3){
            $jobStatusData = $process->getExpertKulliyyah($userID,$statusID);
        }
        
    	// $jobStatusData = $process->getExpKuliah($userID,$statusID);
    	print_r($jobStatusData);
    	if (!file_exists("json/".$userID)) {
		    mkdir("json/".$userID, 0777, true);
		}

		$path = "json/".$userID."/".$status.".json";
		// $fp = (file_exists($path))? fopen($path, "a+") : fopen($path, "w+");
		// $fp = fopen("json/".$userID."/".$status."json", 'w');
		// fwrite($fp, json_encode($jobStatusData));

		if(file_exists($path)){
  			// $fp = fopen($path, 'a');
		}else{
  			$fp = fopen($path, 'a');
		}

		file_put_contents("json/".$userID."/".$status.".json", json_encode($jobStatusData));
		// fclose($fp);
    }

    echo json_encode($jobStatusData);	

?>