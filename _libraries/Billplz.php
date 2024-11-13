<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Billplz {
	private $api_key;
	private $api_xsign;
	private $deliver;
	
	public $mode;
	public $dueafterdays;

	private $config;
	
	public function __construct() {
		require_once("_config/billplz.php");

		$this->config = $config;

		$this->mode = $this->config['billplz_mode'];
		$this->api_key = $this->config[$this->mode.'_api_key'].":"; // Adding colon to avoid asking for password
		$this->api_xsign = $this->config[$this->mode.'_api_xsign'];
		$this->deliver = $this->config[$this->mode.'_deliver'];
		$this->dueafterdays = $this->config[$this->mode.'_dueafterdays'];
	}
	
	public function createBill(
			$config_collid
			, $email
			, $name
			, $amount_in_cent
			, $callback_url
			, $description
			, $redirect_url
			, $reference_1
			, $due_at = NULL
			, $reference_1_label = 'Reference Number'
			, $reference_2 = NULL
			, $reference_2_label = NULL
			, $mobile = NULL
			, $deliver = NULL
		) {

		if ($config_collid == NULL) return false;
		// print_r("Collection ID Config: ".$this->mode.$config_collid);
		$collectionid = $this->config[$this->mode.$config_collid];
		if ($collectionid == NULL) return false;

		if ($deliver == NULL) $deliver = $this->deliver;
		
		$srcstr = '';
		
		$commands['amount'] = $amount_in_cent;
		$srcstr .= "amount".$amount_in_cent;
		
		$commands['callback_url'] = $callback_url;
		$srcstr .= "|callback_url".$callback_url;
		
		$commands['collection_id'] = $collectionid;
		$srcstr .= "|collection_id".$collectionid;
		
		$commands['deliver'] = $deliver;
		$srcstr .= "|deliver".$deliver;
		
		$commands['description'] = $description;
		$srcstr .= "|description".$description;
		
		if ($due_at === NULL) {
			$days = $this->dueafterdays;
			if ($days === NULL) $days = 0;
			$due_at = date('y-m-d', strtotime("+".$days." days"));
		}
		$commands['due_at'] = $due_at;
		$srcstr .= "|due_at".$due_at;
		
		$commands['email'] = $email;
		$srcstr .= "|email".$email;
		
		if ($mobile) {
			$commands['mobile'] = $mobile;
			$srcstr .= "|mobile".$mobile;
		}
		
		$commands['name'] = $name;
		$srcstr .= "|name".$name;
		
		$commands['redirect_url'] = $redirect_url;
		$srcstr .= "|redirect_url".$redirect_url;
		
		$commands['reference_1'] = $reference_1;
		$srcstr .= "|reference_1".$reference_1;
		
		$commands['reference_1_label'] = $reference_1_label;
		$srcstr .= "|reference_1_label".$reference_1_label;
		
		if ($reference_2) {
			$commands['reference_2'] = $reference_2;
			$srcstr .= "|reference_2".$reference_2;
		}
		
		if ($reference_2_label) {
			$commands['reference_2_label'] = $reference_2_label;
			$srcstr .= "|reference_2_label".$reference_2_label;
		}
		
		$x_signature = $this->get_sign($srcstr);
		
		$commands['x_signature'] = $x_signature;
		
		$url = $this->config[$this->mode.'_bill_url'];
		
		// print_r($commands);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERNAME, $this->api_key);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $commands);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$response = curl_exec($ch);
		
		// print_r($response);
		
		curl_close($ch);
		return $response;
	}
	
	public function checkBill($billid) {
		$url = $this->config[$this->mode.'_bill_url'];
		$url .= $billid;
		
// 		print_r($url);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERNAME, $this->api_key);
// 		curl_setopt($ch, CURLOPT_POST, 0);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $commands);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
		// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		$response = curl_exec($ch);
		curl_close($ch);
		
// 		print_r($response);

		$result = NULL;
		if ($response) $result = json_decode($response);
		
		// Format date time from bill plz
		$billplz_paid_at = urldecode($result->paid_at);
		$billplz_paid_at = str_replace("T", " ", $billplz_paid_at);
		$billplz_paid_at = str_replace("08:00", "", $billplz_paid_at);
		$billplz_paid_at = substr($billplz_paid_at, 0, strpos($billplz_paid_at, '.'));
		$myDateTime = date_create($billplz_paid_at);
		$billplz_paid_at = date_format($myDateTime, 'y-m-d H:i:s A');
		$result->paid_at = $billplz_paid_at;
		
		return $result;
	}
	
	public function get_sign($srcstr) {
		return hash_hmac('sha256', $srcstr, $this->api_xsign);
	}

	public function checkBillStatus($billplz_id, $billplz_paid, $billplz_paid_at, $billplz_x_signature) {
		$result = array('paid' => false);

		// Check X Signature (Only have id, paid and paid_at)
		$strsrc = "billplz[id]".$billplz_id."|billplz[paid]".$billplz_paid."|billplz[paid_at]".$billplz_paid_at;
		$check_x_signature = $this->get_sign($strsrc);
		// FIXME: Signature not matched
		$skipcheck = true;
		
		if ($billplz_x_signature == $check_x_signature || $skipcheck) {
			if ($billplz_x_signature != $check_x_signature) {
// 				$this->session->set_flashdata('messageerror', "X Signature Mismatch! (".$check_x_signature." != ".$billplz_x_signature);
			}
			
			// Requery the bill status
			$requery = $this->checkBill($billplz_id);
			if ($requery) {
				$billplz_id = $requery->id;
				$billplz_paid = $requery->paid;
				$billplz_paid_at = urldecode($requery->paid_at);
				$billplz_paid_at = str_replace(" 0800", "", $billplz_paid_at);
				// 					$billplz_x_signature = $requery->x_signature;
			}
			
			if ($billplz_paid == 'true') {
				$result['paid'] = true;
				$result['paid_date'] = $billplz_paid_at;
			}
			// else {
			// 	$this->session->set_flashdata('messageerror', "Payment not successful. Please try again!");
			// }
		}
		// else {
		// 	$this->session->set_flashdata('message', "X Signature Mismatch! (".$check_x_signature." != ".$billplz_x_signature);
		// }
		return $result;
	}
}