<?php
	require_once("_process.php");

	$userData =array();

	if(isset($_POST["userID"])){
		$userTypeID = $process->getUserTypeID($_POST["userID"]);

		if($userTypeID==2){
			$userData = $process->getOrganizationData($_POST["userID"]);

			echo "1|".$userData['loginID']."|".$userData['fullname']."|".$userData['image']."|".$userData['address']."|".$userData['postcode']."|".$userData['state']."|".$userData['phone']."|".$userData['email']."|";
			// .$userData['other_link']."|".$userData['facebook_link']."|".$userData['youtube_link']."|".$userData['instagram_link']."|";

		}else if($userTypeID==3){
			$userData = $process->getExpertData($_POST["userID"]);

			echo "1|".$userData['loginID']."|".$userData['title']."|".$userData['fullname']."|".$userData['image']."|".$userData['education']."|".$userData['area']."|".$userData['state']."|";
			// .$userData['other_link']."|".$userData['facebook_link']."|".$userData['youtube_link']."|".$userData['instagram_link']."|";

			// if($userServices=$process->getExpertServices($_POST["userID"])){
			// 	$total = count($userServices);
			// 	if($total!=0){
			// 		echo $total."|";
			// 		foreach ($userServices as $value) {
			// 			echo $value["service"]."|";
			// 		}
			// 	}else{
			// 		echo $total."|";
			// 	}
			// }
		}
	}else{

	}
?>