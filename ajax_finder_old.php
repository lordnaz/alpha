<?php
	require_once("_process.php");

	$state = $_POST["state"];
    $area = $_POST["area"];
    $from = $_POST["from"];
    $to = $_POST["to"];

    $from = date("Y-m-d H:i:s", strtotime($from));
    $to = date("Y-m-d H:i:s",strtotime("+1 day",strtotime($to)));
	
	$result = '';
	$kulliyyah = array();
	$kulliyyah = $process->searchKulliyyah($state,$area,$from,$to);

	$result .='
	<table class="table tablelayout display nowrap" width="100%" id="mytable">
	<thead>
			<tr>
				<th>Date & Time</th>
				<th>Organizer</th>				
				<th>Topic</th>
				<th>Speaker</th>
				<th></th>
			</tr>
	</thead><tbody>';
	$loop=0;
    $count = count($kulliyyah);


	if($count!=0){
		while($loop<$count){
				// echo "test: ".$count;
				$kulliyyahDate = date("Y-m-d",strtotime($kulliyyah[$loop]["start"]));
				$result .='
				<tr>
				<td>'.$kulliyyahDate.': '.$kulliyyah[$loop]["period"].'</td>
				<td><a href="" data-toggle="modal" data-target="#modal-org" class="org-modal" organizerID='.$kulliyyah[$loop]["organizerLoginID"].'>'.$kulliyyah[$loop]["organizerName"].'</a></td>				
				<td>'.$kulliyyah[$loop]["topic"].'</td>
				<td><a href="" data-toggle="modal" data-target="#modal-exp" class="exp-modal" expertID='.$kulliyyah[$loop]["expertLoginID"].'>'.$kulliyyah[$loop]["title"].' '.$kulliyyah[$loop]["expertName"].'</a></td>
				<td><center><button class="btn btn-primary btn-sm">Add to My Calendar</button></center></td>
				</tr>';
			$loop++;

		}
	}
  

	$result .='</tbody></table>';

	echo $result;


?>