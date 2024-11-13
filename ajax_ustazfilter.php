<?php
	require_once("_process.php");

	$state = $_POST["state"];
    $area = $_POST["area"];
    // $service = $_POST["service"];
    $service = 9;
    $period = $_POST["period"];
    $tarikh = $_POST["tarikh"];

    $period_split = $process->getPeriod($period);

    $periodstart	= 	$period_split["start"]; 
    $periodend		=	$period_split["end"];

    $datestart	=	date("Y-m-d H:i:s", strtotime($tarikh.$periodstart));
    $dateend 	=	date("Y-m-d H:i:s", strtotime($tarikh.$periodend));

    $result	=	'';
    $ustazlist	=	array();
    $ustazlist	=	$process->filterUstaz($area,$datestart,$dateend);

    $result .='
	<table class="table tablelayout display nowrap newtable" cellspacing="0" width="100%" id="newtable">
	<thead class="thead">
        <tr>            
            <th><center>Penceramah</center></th>
            <th><center>Profil</center></th>            
            <th><center>Daerah</center></th>
            <th><center>Tempah</center></th>
            <th><center>Jadikan kegemaran</center></th>
        </tr>
    </thead>
    <tbody class="tbody">';

	$loop=0;
    $count = count($ustazlist);

	if($count!=0){
		while($loop<$count){
				// echo "test: ".$count;
				$result .='

				<tr>
				<td style="color:#337ab7; font-weight: bold">'.$ustazlist[$loop]["fullname"].'</td>
				<td>
                	<center>
                		<button name="profil" class="btn btn-primary btn-sm profil" style="background-color:#445ae3; border-color:#445ae3">Lihat lagi..</button>
                	</center>
                </td>		
				<td>'.$ustazlist[$loop]["area"].'</td>								
				<td>
					<center>
                        <button userid='.$ustazlist[$loop]["login_id"].' type="submit" class="btn btn-primary btn-sm book" name="book" style="background-color:#445ae3; border-color:#445ae3">Book</button>
                	</center>
				</td>
				<td>
					<center>
		                <input type="checkbox" class="chk" value='.$ustazlist[$loop]["login_id"].'/>
                    </center>
                </td>
				</tr>';
			$loop++;

		}
	}
  

	$result .='</tbody></table>';

	echo $result;

    // var_dump($ustazlist);

    // echo "<br/><br/>".$datestart."|".$dateend."<br/>";

    // echo "<br/>".$state."|".$area."|".$service."|".$tarikh."|".$period;





?>