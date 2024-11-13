<?php
	if(session_id() == "" || !isset($_SESSION)) {
	    //session isn't started
	    session_start();
	}

// if (isset($_SESSION['refresh'])) {
//    echo '<script type="text/javascript">
//       function loadalert ()
//       {alert("Incorrect security code, please try again.")}
//    </script>';}

	$GLOBAL_DATETIME = "Asia/Kuala_Lumpur";
	date_default_timezone_set($GLOBAL_DATETIME);

	// $DBSERVER = "localhost";
	// $DBUSER = "sembangt_demo";	
 //    $DBPASS = "demoQh00tb@h";
	// $DBNAME = "sembangt_demo";

	$DBSERVER = "localhost";
	$DBUSER = "root";	
    $DBPASS = "";
	$DBNAME = "saucecod_qhootbah";

	// $baseURL = "http://www.qhootbah.com/_alpha/";
	$baseURL = "http://localhost/_alpha/";

	// include_once "_language.php";
	// include_once "_FBconfig.php";
	
	 // Path to the system directory (Temp)
	define('BASEPATH', $baseURL);
?>
