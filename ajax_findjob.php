<?php
	require_once("_process.php");

	$state = $_POST["state"];
    $area = $_POST["area"];
    $service = $_POST["service"];
    $from = $_POST["from"];
    $to = $_POST["to"];


    $from = date("Y-m-d H:i:s", strtotime($from));

    $to = date("Y-m-d H:i:s",strtotime("+1 day",strtotime($to)));

    $result = '';
    $searchjob = array();
	$searchjob = $process->searchJob($area,$service,$from,$to);


	$result .='
	<table class="table tablelayout display nowrap newtable" cellspacing="0" width="100%" id="mytable">
	<thead class="thead">
		<tr>
					<th>Negeri</th>
	                <th>Daerah</th>
	                <th>Penganjur</th>
	                <th>Tarikh/Sesi</th>
	                <th>Topik</th>
	                <th>Jenis Tugasan</th>
	                <th></th>
		</tr>
	</thead>
	<tbody class="tbody">';
	$loop=0;
    $count = count($searchjob);
	//$rowCount = $query->num_rows;

	// print_r($kuliah);

	if($count!=0){
	while($loop<$count){
			// echo "test: ".$count;
			$result .='
			<tr>
				<td>'.$searchjob[$loop]["state"].'</td>
	            
	            <td>'.$searchjob[$loop]["area"].'</td>    
	            <td><b><a href="" data-toggle="modal" data-target="#modalsearch" style="font-size: 14px">'.$searchjob[$loop]["org_name"].'</a></b></td>                  
	            <td>'.$searchjob[$loop]["start"]." ".$searchjob[$loop]["period"].'</td>
	            <td>'.$searchjob[$loop]["topic"].'</td>
	            <td><b>'.$searchjob[$loop]["post"].'</b></td>
	            <td class="vert-align">
	                <a data-toggle="modal" data-target="#modalsearch" jobtype='.$searchjob[$loop]["post_id"].' event_id='.$searchjob[$loop]["event_id"].' class="btn btn-primary btn-biru claim remove">Tuntut</a>
	            </td>
			</tr>';
		$loop++;

		}
	}

	$result .='</tbody></table><br/>';

	echo $result;

    // echo "1.|".$state."|".$area."|".$service."|".$from."|".$to;

?>