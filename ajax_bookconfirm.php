<?php
	require_once("_process.php");

	$name = $_POST["nameustaz"]; // not used by both module
	$state = $_POST["state2"]; // module 2 // module 3
	$area = $_POST["area2"];  // module 2  // module 3
    // Hazwan - Change to service_id to avoid overwrite $service in _process
	$service_id = $_POST["service2"];  // module 2  // module 3
	$tarikh = $_POST["tarikh2"]; // module 2
    $tarikh_2 = $_POST["tarikh3"]; // module 3
	$period = $_POST["period2"]; // module 2  // module 3
	$kadar = $_POST["kadar"];  // module 2  // module 3
	$kedatangan = $_POST["kedatangan"];  // module 2  // module 3
	$topik = $_POST["topik"];  // module 2  // module 3
	$tambahan = $_POST["tambahan"];  // module 2  // module 3

    if(!isset($_POST["optionsRadios"])){
        
    }else{
        $pilihan = $_POST["optionsRadios"]; // module 3
    }

    // $radio = $_POST["optionsRadios"]; //test whether this page has radio value/not

	$ustaz_id = $_SESSION["expert_id"]; //user ID once click from page1

	$period_split = $process->getPeriod($period);

	//split dapatkan start and end time for Sesi
    $periodstart	= 	$period_split["start"]; 
    $periodend		=	$period_split["end"];

    //Combine tarikh chosen with period split start/end
    $datestart	=	date("Y-m-d H:i:s", strtotime($tarikh.$periodstart));
    $dateend 	=	date("Y-m-d H:i:s", strtotime($tarikh.$periodend));

    $datestart2 =   date("Y-m-d H:i:s", strtotime($tarikh_2.$periodstart));
    $dateend2   =   date("Y-m-d H:i:s", strtotime($tarikh_2.$periodend));

    $organizer_id = $_SESSION["loginID"];
    $level_id = "2"; // grab the value from usertype(to test organizer)
    

    if(isset($organizer_id)){
    	if($level_id == "2" || $level_id == "3"){

            $config_collid = '_coll_id_book_event';

            if(!isset($pilihan)){
                //module 2 create event will use this process

                $pilihan = 2;

                $insertevent = $process->InsertEvent($ustaz_id,$organizer_id,$area,$period,$datestart,$dateend,$service_id,$kadar,$kedatangan,$topik,$tambahan,$pilihan);

                // if ($insertevent)
                //     echo "Success Insert Event of ".$ustaz_id;
                // else
                //     echo "Problem Insert Event of ".$ustaz_id;

                $config_collid = '_coll_id_book_event_with_expert';
            }
            else{

                $ustaz_id = 0;

                $insertevent = $process->InsertEventModule3($ustaz_id,$organizer_id,$area,$period,$datestart2,$dateend2,$service_id,$kadar,$kedatangan,$topik,$tambahan,$pilihan);

            }

            // Hazwan - Entering Billplz Code
            if ($insertevent['result']) {
                $organizer = $process->getOrganizationData($organizer_id);
                if (isset($ustaz_id)) $expert = $process->getExpertData($ustaz_id);
                
                // Find the services based on key
                foreach ($service as $curservice) {
                    // print_r("curservice: ID = ".$curservice["id"].", Service: ".$curservice["service"]);
                    if ($curservice["id"] == $service_id) {
                        $selectedservice = $curservice["service"];
                        break;
                    }
                }
                // $selectedservice = $service[$service_id];

                require_once("_libraries/Billplz.php");

                // Billplz amount by cent (100 = RM 1.00)
                $amount_in_cent = $kadar."00";
                $callback_url = $baseURL.'ajax_afterpayment.php';
                $redirect_url= $baseURL.'ajax_afterpayment.php';
                
                $organizer_email = $organizer["email"];
                $organizer_name = $organizer["fullname"];

                $description = "Bayaran Tempahan";
                if (isset($expert)) $description .= " ".$expert["title"]." ".$expert["fullname"];
                $description .= " untuk ".$selectedservice." - ".$topik;
                $description .= " pada ".$tarikh;

                $purpose_code = "BOOK";
                $curdate = date('ymd');
                    
                do {
                    $loop = false;
                    $uid = substr(uniqid('', true), -4);
                    $refno = $purpose_code.'-'.$curdate.'-'.$uid;
                    
                    if ($process->isPaymentRefNoExisted($refno)) $loop = true;
                    
                } while ($loop);

                $billplz = new Billplz();

                $response = $billplz->createBill($config_collid, $organizer_email, $organizer_name, $amount_in_cent, $callback_url, $description, $redirect_url, $refno);
                if ($response) {
                    $jsonres = json_decode($response);
                    if ($jsonres->id) {
                        $bill_id = $jsonres->id;
                        $dataepay['payment_channel'] = 'billplz';
                        $dataepay['payment_refno'] = $refno;
                        $dataepay['payment_desc'] = $description;
                        $dataepay['payment_bill_id'] = $bill_id;
                        $dataepay['payment_status'] = '5'; // New

                        $status = $process->createPaymentForEventKulliyah($dataepay, $insertevent['event_id']);
                        
                        if ($status) {
                            $url = $jsonres->url;
                            
                            // redirect($url, 'refresh');
                            // Set expired 
                            // header("Expires: ".gmdate('D, d M Y H:i:s', time()-3600).' GMT');
                            // header("Cache-Control: no-cache");
                            // header("Pragma: no-cache");
                            // header("Location: ".$url);

                            header('Content-Type: application/json');
                            echo json_encode(array('url' => $url));
                        }
                    }
                }
                else {
                    echo "Billplz no response error!";
                }
            }
            
    	}
    	else{
    		echo "You are an Expert listed in our system, Can`t book an Expert";
    	}

    }
    else{
    	echo "You are not Logged In";
    }

 //    echo "Organizer ID: ".$organizer_id."<br/>";

 //    echo "Ustaz Choosen ID: ".$ustaz_id."<br/>";

 //    echo "Period Split: ".$periodstart."|".$periodend."<br/>";

 //    echo "Date: ".$datestart."|".$dateend."<br/>";

	// echo "1|".$name."|".$state."|".$area."|".$service_id."|".$tarikh."|".$period."|".$kadar."|".$kedatangan."|".$topik."|".$tambahan;

?>