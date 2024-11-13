<?php
	require_once("_process.php");

	// $statusaccept = $process->getExpKuliahAccept($_SESSION["tempID"]);
 //    $statuspending = $process->getExpKuliahPending($_SESSION["tempID"]);
 //    $statusreject = $process->getExpKuliahReject($_SESSION["tempID"]);
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

   
        if( $_SESSION["displayedUserTypeID"]==2){
            $jobStatusData = $process->getOrganizerKulliyyah($userID,$statusID);

            $result = '';

            $result .='
            <table class="table tablelayout display nowrap" width="100%" id="mytable">
            <thead>
                    <tr>
                        <th>Tarikh & Masa</th>
                        <th>Penceramah</th>              
                        <th>Topik</th>
                    </tr>
            </thead><tbody>';
            $loop=0;
            $count = count($jobStatusData);


            if($count!=0){
                while($loop<$count){
                        // echo "test: ".$count;
                        $kulliyyahDate = date("Y-m-d",strtotime($jobStatusData[$loop]["start"]));
                        $result .='
                        <tr>
                        <td>'.$kulliyyahDate.': '.$jobStatusData[$loop]["period"].'</td>
                        <td><a href="" data-toggle="modal" data-target="#modal-exp" class="exp-modal" expertID='.$jobStatusData[$loop]["expertLoginID"].'>'.$jobStatusData[$loop]["expertName"].'</a></td>             
                        <td>'.$jobStatusData[$loop]["topic"].'</td>                        
                        </tr>';
                    $loop++;

                }
            }

            // <td><center><button class="btn btn-primary btn-sm">Add to My Calendar</button></center></td>

            $result .='</tbody></table>';


        }else if( $_SESSION["displayedUserTypeID"] == 3){
            $jobStatusData = $process->getExpertKulliyyah($userID,$statusID);

            $result = '';

            $result .='
            <table class="table tablelayout display nowrap" width="100%" id="mytable">
            <thead>
                    <tr>
                        <th>Tarikh & Masa</th>
                        <th>Penganjur</th>              
                        <th>Topik</th>
                    </tr>
            </thead><tbody>';
            $loop=0;
            $count = count($jobStatusData);


            if($count!=0){
                while($loop<$count){
                        // echo "test: ".$count;
                        $kulliyyahDate = date("Y-m-d",strtotime($jobStatusData[$loop]["start"]));
                        $result .='
                        <tr>
                        <td>'.$kulliyyahDate.': '.$jobStatusData[$loop]["period"].'</td>
                        <td><a href="" data-toggle="modal" data-target="#modal-org" class="org-modal" organizerID='.$jobStatusData[$loop]["organizerLoginID"].'>'.$jobStatusData[$loop]["organizerName"].'</a></td>             
                        <td>'.$jobStatusData[$loop]["topic"].'</td>
                        </tr>';
                    $loop++;

                }
            }

            $result .='</tbody></table>';
        }
	
    	// print_r($jobStatusData);
    }

    
  

    $result .='</tbody></table>';

    echo $result;    
    // echo json_encode($jobStatusData);	

?>