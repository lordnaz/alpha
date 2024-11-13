<?php
	require_once("_process.php");

	$state = $_POST["state"];
    $area = $_POST["area"];
    $from = $_POST["from"];
    $to = $_POST["to"];

    // $state = 12;
    // $area = 145;
    // $from = new DateTime("13-04-2017");
    // $to = new DateTime("13-07-2017");

   

    // echo "state: ".$state."<br />";
    // echo "area: ".$area."<br />";
    // echo "***from: ";
    // echo $from;
    // echo "***to: ";
    // echo $to;

    // echo "***FROM***: ";
    $from = date("Y-m-d H:i:s", strtotime($from));

    // echo "***TO***: ";
    // $to = date("Y-m-d H:i:s", strtotime($to));
    $to = date("Y-m-d H:i:s",strtotime("+1 day",strtotime($to)));

	
	$result = '';
	$kulliyyah = array();
	$kulliyyah = $process->searchKulliyyah($state,$area,$from,$to);
	// $kulliyyahDate = date("Y-m-d",strtotime($kulliyyah[0]["start"]));
	// var_dump($kulliyyahDate);
	// print_r($kulliyyah);

	$result .='
	<table class="table tablelayout display nowrap" width="100%" id="mytable">
	<thead>
			<tr>
				<th>Tarikh & Masa</th>
				<th>Penganjur</th>				
				<th>Topik</th>
				<th>Penceramah</th>
			</tr>
	</thead><tbody>';
	$loop=0;
    $count = count($kulliyyah);


	if($count!=0){
		while($loop<$count){
				$kulliyyahDate = date("Y-m-d",strtotime($kulliyyah[$loop]["start"]));
				$result .='
				<tr>
				<td>'.$kulliyyahDate.': '.$kulliyyah[$loop]["period"].'</td>
				<td><a href="" data-toggle="modal" data-target="#modal-org" class="org-modal" organizerID='.$kulliyyah[$loop]["organizerLoginID"].'>'.$kulliyyah[$loop]["organizerName"].'</a></td>				
				<td>'.$kulliyyah[$loop]["topic"].'</td>
				<td><a href="" data-toggle="modal" data-target="#modal-exp" class="exp-modal" expertID='.$kulliyyah[$loop]["expertLoginID"].'>'.$kulliyyah[$loop]["title"].' '.$kulliyyah[$loop]["expertName"].'</a></td>
				</tr>';
			$loop++;

		}
	}

	// $result .='
	// <table class="table tablelayout display nowrap" width="100%" id="mytable">
	// <thead>
	// 		<tr>
	// 			<th>Tarikh & Masa</th>
	// 			<th>Penganjur</th>				
	// 			<th>Topik</th>
	// 			<th>Penceramah</th>
	// 			<th></th>
	// 		</tr>
	// </thead><tbody>';
	// $loop=0;
 //    $count = count($kulliyyah);


	// if($count!=0){
	// 	while($loop<$count){
	// 			$kulliyyahDate = date("Y-m-d",strtotime($kulliyyah[$loop]["start"]));
	// 			$result .='
	// 			<tr>
	// 			<td>'.$kulliyyahDate.': '.$kulliyyah[$loop]["period"].'</td>
	// 			<td><a href="" data-toggle="modal" data-target="#modal-org" class="org-modal" organizerID='.$kulliyyah[$loop]["organizerLoginID"].'>'.$kulliyyah[$loop]["organizerName"].'</a></td>				
	// 			<td>'.$kulliyyah[$loop]["topic"].'</td>
	// 			<td><a href="" data-toggle="modal" data-target="#modal-exp" class="exp-modal" expertID='.$kulliyyah[$loop]["expertLoginID"].'>'.$kulliyyah[$loop]["title"].' '.$kulliyyah[$loop]["expertName"].'</a></td>
	// 			<td><center><button class="btn btn-primary btn-sm">Letak di Kalendar</button></center></td>
	// 			</tr>';
	// 		$loop++;

	// 	}
	// }
  

	$result .='</tbody></table>';

	echo $result;


?>