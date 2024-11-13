<?php
	require_once("_process.php");

	if(isset($_POST["userID"]) && isset($_POST["status"])){
    	$userID = $_POST["userID"];
    	$status = $_POST["status"];

    	if($status=="accepted"){
    		$statusID = 2;
    	}else if($status=="pending"){
    		$statusID = 1;
    	}else if($status=="rejected"){
    		$statusID = 3;
    	}else{

    	}

        if( $_SESSION["userTypeID"]==2){
            $jobStatusData = $process->getOrganizerKulliyyah($userID,$statusID);

            $result = '';
            $result .='
            <table class="table tablelayout display nowrap" width="100%" id="mytable">
            <thead>
                <tr>
                    <th>Tarikh & Masa</th>
                    <th>Penceramah</th>              
                    <th>Topik</th>
                    <th>Kehadiran</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>';

            $loop=0;
            $count = count($jobStatusData);

            if($count!=0){
                while($loop<$count){
                        $kulliyyahDate = date("Y-m-d",strtotime($jobStatusData[$loop]["start"]));
                        $result .='
                        <tr>
                            <td>'.$kulliyyahDate.': '.$jobStatusData[$loop]["period"].'</td>
                            <td><a href="" data-toggle="modal" data-target="#modal-exp" class="exp-modal" expertID='.$jobStatusData[$loop]["expertLoginID"].'>'.$jobStatusData[$loop]["expertName"].'</a></td>             
                            <td>'.$jobStatusData[$loop]["topic"].'</td>
                            <td>'.$jobStatusData[$loop]["attendance"].' orang</td>
                            <td>'.$jobStatusData[$loop]["note"].'</td>
                        </tr>';
                    $loop++;
                }
            }

            $result .='</tbody></table>';

        }else if( $_SESSION["userTypeID"] == 3){
            $jobStatusData = $process->getExpertKulliyyah($userID,$statusID);

            $result = '';
            $result .='
            <table class="table tablelayout display nowrap" width="100%" id="mytable">
            <thead>
                    <tr>
                        <th>Tarikh & Masa</th>
                        <th>Penganjur</th>              
                        <th>Topik</th>
                        <th>Kehadiran</th>
                        <th>Nota</th>
                    </tr>
            </thead>
            <tbody>';

            $loop=0;
            $count = count($jobStatusData);

            if($count!=0){
                while($loop<$count){
                        $kulliyyahDate = date("Y-m-d",strtotime($jobStatusData[$loop]["start"]));
                        $result .='
                        <tr>
                            <td>'.$kulliyyahDate.': '.$jobStatusData[$loop]["period"].'</td>
                            <td><a href="" data-toggle="modal" data-target="#modal-org" class="org-modal" organizerID='.$jobStatusData[$loop]["organizerLoginID"].'>'.$jobStatusData[$loop]["organizerName"].'</a></td>             
                            <td>'.$jobStatusData[$loop]["topic"].'</td>
                            <td>'.$jobStatusData[$loop]["attendance"].' orang</td>
                            <td>'.$jobStatusData[$loop]["note"].'</td>
                        </tr>';
                    $loop++;

                }
            }

            $result .='</tbody></table>';
        }
    }        

    echo $result;
?>