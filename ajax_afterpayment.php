<?php
	require_once("_process.php");

	require_once("_libraries/Billplz.php");

	$paramarr = $_GET["billplz"];
	
	if ($paramarr) {
		$billplz_id = $paramarr['id'];
		$billplz_paid = $paramarr['paid'];
		$billplz_paid_at = $paramarr['paid_at'];
		$billplz_x_signature = $paramarr['x_signature'];
		
		$billplz = new Billplz();
		$result = $billplz->checkBillStatus($billplz_id, $billplz_paid, $billplz_paid_at, $billplz_x_signature);
		$status = 5; // New
		if ($result['paid']) {
			$status = 1; // Pending
			$process->updatePaymentStatusAndExpertEvent($billplz_id, $status);
			// if ($process->updatePaymentStatusAndExpertEvent($billplz_id, $status)) {
				
			// }
			// else {
			// 	print_r("Update payment failed!");
			// }
		}
		$_SESSION['payment'] = $status;
		$url = $baseURL.'personal.php';

		// Set expired 
        header("Expires: ".gmdate('D, d M Y H:i:s', time()-3600).' GMT');
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");
        header("Location: ".$url);
	}
	else {
		print_r("Invalid Billplz Response!");
	}
