<?php
include("_process.php");
// include("moduleheader.php");

if(!isset($_SESSION["login"])||$_SESSION["login"]==0){
	header("Location: ".$baseURL); /* Redirect browser */
    exit();
}else if(isset($_GET["service"])){
	$activeService = $_GET["service"];
	if($activeService!="bookustaz"&&$activeService!="postsearchjobs"){
		header("Location: ".$baseURL); /* Redirect browser */
    	exit();
	}
}else{
	header("Location: ".$baseURL); /* Redirect browser */
    exit();
}

$title  = $process->getAllTitles();
$state  = $process->getAllStates();
$area   = $process->getAllAreas();
$service = $process->getAllServices();
$bank   = $process->getAllBanks();
$period = $process->getAllPeriod();
$ustazlist = $process->getAllUstaz();

$_SESSION["period"] = $period;
$_SESSION["title"]  = $title;
$_SESSION["area"]   = $area;
$_SESSION["state"]  = $state;
$_SESSION["service"] = $service;
$_SESSION["bank"]   = $bank;
$_SESSION["ustazlist"] = $ustazlist;

$outerLoop = 0;
$loop = 0;
$expertListOfServices = array();
$expertServices = array();
foreach ($ustazlist as $key => $value[$outerLoop]) {
  # code...
    $temp = ($value[$key]["id"]);
    $expertServices = $process->getExpertServices($value[$key]['id']);
    
    foreach ($expertServices as $value){
        $expertListOfServices[$temp][$loop]["serviceID"] = $value["service_id"];
        $expertListOfServices[$temp][$loop]["service"] = $value["service"];
        $loop++;
    }
    
    $outerLoop++;

}

?>

<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 9]><!--> 

<html lang="en" itemscope itemtype="http://schema.org/Product">
    <head>
    	<base href="<?php echo $baseURL; ?>" target="_blank" />

		<meta charset="utf-8" />

		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
				 More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Qhootbah</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="SauceCode Studio" />

		<link rel="shortcut icon" href="favicon.png" type="images/x-icon" />

		<!-- Facebook Metadata /-->
		<meta property="fb:page_id" content="" />
		<meta property="og:image" content="" />
		<meta property="og:description" content=""/>
		<meta property="og:title" content=""/>

		<!-- Google+ Metadata /-->
		<meta itemprop="name" content="" />
		<meta itemprop="description" content="" />
		<meta itemprop="image" content="" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />

		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link rel="stylesheet" href="css/jquery-ui.css" />		
		<link rel="stylesheet" href="css/bootstrap-3.3.7.css" />
		<link rel="stylesheet" href="css/jquery.selectBoxIt.css" />
		<link rel="stylesheet" href="css/datatables.css" />
		<link rel="stylesheet" href="css/croppie.css" />
		<link rel="stylesheet" href="css/bootstrap-datepicker3.standalone.css" />		
		<link rel="stylesheet" href="css/style.css?v=1.0002" />
		<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less?v=1.0066" /> -->
    </head>

    <body>
    	<section class="landing-dashboard-wrapper">
			<!-- the gradient overlay color -->
			<div class="gradient-overlay-dashboard">

			</div>

			<nav class="navbar navbar-inverse">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbarNavDropdown" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php" target="_self">Qhootbah</a>
					</div>					
					<div class="collapse navbar-collapse navbarNavDropdown" id="navbarNavDropdown">
						<ul class="nav navbar-nav navbar-right">
							<!-- <li class="nav-item">
								<a href="javascript:;" class="nav-link tr lang" key="languange" lang="en" toggle="my">
									
								</a>
							</li> -->
<?php
    if($_SESSION["login"]==0){
?>
                            <li class="nav-item">
								<a href="javascript:;" class="nav-link tr" key="login" data-toggle="modal" data-target=".login-modal">
									
								</a>
							</li>    
<?php
    }else{
?>
							<li class="nav-item">
								<a class="nav-link nav-logout tr" key="logout" href="javascript:;">
									
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link tr" key="profile" href="personal.php" target="_self">
									
								</a>
							</li>						
<?php
	}
?>
							<li class="nav-item">
								<a href="index.php#how" target="_self" class="nav-link go-to tr" key="how" go-to="how">
									
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="javascript:;" class="nav-link tr" key="faq">
									
								</a>
							</li> -->
							<li class="index.php#contact">
								<a href="javascript:;" target="_self" class="nav-link go-to tr" key="contact" go-to="contact">
									
								</a>
							</li>
						</ul>
					</div>
					
				    <div class="row statusOptionWrapper header-option-wrapper" active-service="<?php echo $activeService; ?>">
				        <div class="col-sm-4">
				            <a href="javascript:;">
				                <span class="statusOptionButton kulliyyahfinder active tr" key="tabonelarge" status="kulliyyah-finder">
				                    
				                </span>
				            </a>
				        </div>
				        <div class="col-sm-4">
				            <a href="javascript:;">
				                <span class="statusOptionButton bookustaz tr" key="tabtwolarge" status="book-speaker">
				                    
				                </span>
				            </a>
				        </div>
				        <div class="col-sm-4">
				            <a href="javascript:;">
				                <span class="statusOptionButton postsearchjobs tr" key="tabthreelarge" status="post-search-jobs">
				                    
				                </span>
				            </a>
				        </div>
				    </div>
				</div>
			</nav>
		</section>

	<!-- <div class="page_wrap"> -->

<div class="container-fluid">
	<div class="book-ustaz-tabs-wrapper">

		<section class="book-ustaz">
		    <div class="row">
		        <div class="col-sm-12 text-center">
		            <h1 class="tr" key="book1">
		                Cari &amp; Tempah Ustaz
		            </h1>      
		        </div>
		    </div>
		</section>

		<section class="table-module-1">
		<div class="">
			<form enctype='multipart/form-data' action="ustazfinder.php" method='post' onsubmit="return true"  accept-charset='UTF-8' name="key-landing" class="ustaz-finder">
			
				<div class="row">
	                <div class="col-sm-2">
	                    <select name="state" class="form-control state">
	                                
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                    <select name="area" class="form-control area">
	                                
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                    <select name="service" class="form-control service">
	                                
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                    <input type="text" name="tarikh" class="form-control new-style tarikh" key="tarikh" placeholder="Tarikh" autocomplete="off" readonly />
	                </div>
	                <div class="col-sm-2">
	                    <select name="period" class="form-control period">
	                                
	                    </select>
	                </div>
	                <div class="col-sm-2">
	                	<input type="submit" name="search" value="search" class="btn btn-block btn-primary form-control button tr filter_ustaz" key="search" />
	                </div>
	            </div>
	        
			</form>

			<div class="row module-1-title">
				
			</div>
			<div class="row">
				<div class="col-md-12 filter-ustaz">
					<table class="table tablelayout display nowrap" cellspacing="0" width="100%" id="newtable">


					</table>
				</div>
			</div>
		</div>
		</section>


		<section>
			
			<div class="page1" style="margin:35px auto;">
		    	
		            <table class="table tablelayout display nowrap mytable" cellspacing="0" width="100%" id="mytable">
		                <thead class="thead">
		                    <tr>            
		                        <th><center>Penceramah</center></th>
	                            <th><center>Daerah</center></th>
		                        <th><center></center></th>		                        
		                        <th><center></center></th>
		                        <th><center>Kegemaran</center></th>
		                    </tr>
		                </thead>
		                <tbody class="tbody">

		                <?php
		                    $max = count($ustazlist);
		                    $count = 0;
		                    
		                    while ($count<$max) {
		                ?>

		                    <tr>      
		                        <td data-toggle="modal" data-target="#modalmasjid" class="expModal bookHover" expertid="<?php echo $ustazlist[$count]['login_id']; ?>" style="color:#337ab7; font-weight: bold">
		                            <?php echo $ustazlist[$count]["fullname"]." (".$ustazlist[$count]["title"].")";?>
		                        </td>
	                            <td id="kelik3" class="kelik3">
	                                <center>
	                                    <?php echo $ustazlist[$count]["area"].", ".$ustazlist[$count]["state"];?>
	                                </center>
	                            </td>
		                        <td>
		                        	<center>
	                                    <a href="" data-toggle="modal" data-target="#modal-exp" class="exp-modal" expertID="<?php echo $ustazlist[$count]['login_id']; ?>">
		                        		    <button name="profil" class="btn btn-primary btn-sm profil" style="background-color:#445ae3; border-color:#445ae3">Profil Lengkap</button>
	                                    </a>
		                        	</center>
		                        </td>		                        
		                        <td>
		                            <center>
		                                <button userid="<?php echo $ustazlist[$count]['login_id']; ?>" type="submit" class="btn btn-primary btn-sm book" name="book" style="background-color:#445ae3; border-color:#445ae3">Tempah</button>
		                            </center>
		                        </td>
		                        <td>
		                        <center>
		                        	<input type="checkbox" class="chk" value="<?php echo $ustazlist[$count]['login_id']; ?>" 
		                            <?php 
		                              if ( isset($log_id) && $favcheck[$count]['status_bool'] == 8){ 
		                                 
		                                    echo 'checked';
		                                }
		                            ?> 
		                            />
		                        </center>
		                            
		                        </td>
		                    </tr>

		                <?php
		                        $count++;
		                    }
		                ?>

		                </tbody>
		            </table>
		        
		    </div>
		</section>


		<form enctype="multipart/form-data" method="post" onsubmit="return false" accept-charset='UTF-8' name="book_form" class="form-horizontal book_ustaz">
		<div class="section page2" id="page2">
	    
	        <div class=" ">
	            <div class="row" id="post">
	                <div class="col-md-12">
	                    <h3 class="text-center">Butiran Tugasan
	                        <br>
	                        <br>
	                    </h3>
	                    
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Nama Penceramah</label>
	                        </div>
	                        <div class="col-sm-10" style="margin-top: 7px;">
	                            <!-- <label class="nameustaz"></label> -->
	                            <input type="text" name="nameustaz" class="form-control nameustaz" key="nameustaz" placeholder="" autocomplete="off" readonly />  
	                            
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Maklumat Majlis</label>
	                        </div>
	                        <div class="col-sm-2">
	                            <select name="state2" class="form-control state2" required>
	                                
	                            </select>
	                        </div>
	                        <div class="col-sm-2">
	                            <select name="area2" class=" area2" required>

	                            </select>
	                        </div>                            
	                        <div class="col-sm-2">

	                            <select name="service2" class="service2" required>                                
	                              
	                            </select>  

	                        </div>
	                        <div class="col-sm-2">
	                            <input type="text" name="tarikh2" class="form-control new-style tarikh2" key="tarikh2" id="tarikh2" placeholder="Tarikh" autocomplete="off" readonly />                           
	                        </div>
	                        <div class="col-sm-2">
	                            <select name="period2" class="form-control period2">
	                              
	                            </select>
	                        </div>
	                    </div>
	                    <hr>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Saguhati</label>
	                        </div>
	                        <div class="col-sm-3">
	                            <input type="text" name="kadar" class="form-control kadar">
	                        </div>
	                        <div class="col-sm-3">
	                            <label class="control-label">Anggaran Kedatangan</label>
	                        </div>
	                        <div class="col-sm-3">
	                            <input type="text" name="kedatangan" class="form-control kedatangan">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Keadah Pembayaran</label>
	                        </div>
	                        <div class="col-sm-3" style="margin-top: 7px;">
	                            <input type="text" name="kaedah" class="form-control kaedah" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
	                        </div>
	                        <div class="col-sm-3">
	                            <label class="control-label">Tajuk (untuk Ceramah)</label>
	                        </div>
	                        <div class="col-sm-3">
	                            <input type="text" name="topik" class="form-control topik">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Maklumat Tambahan</label>
	                        </div>
	                        <div class="col-sm-9">
	                            <textarea class="form-control tambahan" id="tambahan" name="tambahan" rows="5" cols="50"></textarea>
	                        </div>
	                    </div>
	                    
	                    <div class="row">
	                        <div class="col-md-offset-4">
	                            <div class="col-md-3">
	                            	<br/>
	                                <input type="button" class="btn btn-block btn-primary goBackPage1" value="Kembali">
	                                <br/>
	                            </div>
	                            <div class="col-md-3">
	                                <!-- <button type="submit" class="btn btn-block btn-primary">Seterusnya</button> -->
	                                <br/>
	                                <input type="button" value="Seterusnya" class="btn btn-block btn-primary send_button">
	                                <br/>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    
		</div>

		<div class="section page3" id="page3">
	    
	        <div class=" ">
	            <div class="row" id="post">
	                <div class="col-md-12">
	                    <h3 class="text-center">Butiran Tugasan
	                        <br>
	                        <br>
	                    </h3>
	                    
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Nama Penceramah</label>
	                        </div>
	                        <div class="col-sm-10" style="margin-top: 7px;">
	                            <!-- <label class="nameustaz"></label> -->
	                            <input type="text" name="nameustaz2" class="form-control nameustaz2" key="nameustaz" placeholder="" autocomplete="off" readonly />  
	                            
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Maklumat Majlis</label>
	                        </div>
	                        <div class="col-sm-2">
	                            <input type="text" name="state3" class="form-control state3" key="state3" placeholder="" autocomplete="off" readonly /> 
	                        </div>
	                        <div class="col-sm-2">
	                            <input type="text" name="area3" class="form-control area3" key="area3" placeholder="" autocomplete="off" readonly /> 
	                        </div>                            
	                        <div class="col-sm-2">

	                            <input type="text" name="service3" class="form-control service3" key="service3" placeholder="" autocomplete="off" readonly /> 

	                        </div>
	                        <div class="col-sm-2">
	                            <input type="text" name="tarikh3" class="form-control new-style tarikh3" key="tarikh3" placeholder="Tarikh" autocomplete="off" readonly />                           
	                        </div>
	                        <div class="col-sm-2">
	                            <input type="text" name="period3" class="form-control period3" key="period3" placeholder="" autocomplete="off" readonly />
	                        </div>
	                    </div>
	                    <hr>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Saguhati</label>
	                        </div>
	                        <div class="col-sm-3">
	                            <input type="text" name="kadar2" class="form-control kadar2" key="kadar2" placeholder="" autocomplete="off" readonly />
	                        </div>
	                        <div class="col-sm-3">
	                            <label class="control-label">Anggaran Kedatangan</label>
	                        </div>
	                        <div class="col-sm-3">
	                            <input type="text" name="kedatangan2" class="form-control kedatangan2" key="kedatangan2" placeholder="" autocomplete="off" readonly />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Keadah Pembayaran</label>
	                        </div>
	                        <div class="col-sm-3" style="margin-top: 7px;">
	                            <input type="text" name="kaedah" class="form-control kaedah" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
	                        </div>
	                        <div class="col-sm-3">
	                            <label class="control-label">Tajuk (untuk Ceramah)</label>
	                        </div>
	                        <div class="col-sm-3">
	                            <input type="text" name="topik2" class="form-control topik2" key="topik2" placeholder="" autocomplete="off" readonly />
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-sm-2">
	                            <label class="control-label">Maklumat Tambahan</label>
	                        </div>
	                        <div class="col-sm-9">
	                            <input type="text" name="tambahan2" class="form-control tambahan2" key="tambahan2" placeholder="" autocomplete="off" readonly />
	                        </div>
	                    </div>
	                    
	                    <div class="row">
	                        <div class="col-md-offset-4">
	                            <div class="col-md-3">
	                            	<br/>
	                                <input type="button" value="Kembali" class="btn btn-block btn-primary back_button">
	                                <br/>
	                            </div>
	                            <div class="col-md-3">
	                                <!-- <button type="submit" class="btn btn-block btn-primary">Seterusnya</button> -->
	                                <br/>
	                                <button type="submit" class="btn btn-block btn-primary confirm">Hantar</button>
	                                <br/>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    
		</div>

		</form>

		<div class="section page4">
	        <div class=" ">
	            <div class="row">
	                <div class="col-md-12">
	                <br/>
	                    <p class="text-center">
	                        <b>Tempahan anda telah di hantar ke dalam sistem.</b>
	                    </p>
	                    <p class="text-center margin">Anda akan diberitahu sekiranya tempahan tersebut di terima atau di tolak.</p>
	                </div>
	            </div>
	            <div class="row text-center">
	                <div class="col-md-12 margin">
	                    <a class="btn btn-primary view-posted-job" href="javascript:;">Lihat Tugasan</a>
	                </div>
	                <br/>
	            </div>
	        </div>
	    </div>
	</div>

	<!-- ***************************************************************************************************** -->
    <div class="post-search-jobs-tabs-wrapper">

		<form enctype="multipart/form-data" method="post" onsubmit="return false" accept-charset='UTF-8' name="book_form" class="form-horizontal create_event">
		<div class="section page2" id="page2">
        
            <div class=" ">
                <div class="row" id="post">
                    <div class="col-md-12">
                        <h3 class="text-center">Butiran Kuliah
                            <br>
                            <br>
                        </h3>
                       
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Maklumat Majlis</label>
                            </div>
                            <div class="col-sm-2">
                                <select name="state2" class="form-control state2" required>
                                    
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select name="area2" class=" area2" required>

                                </select>
                            </div>                            
                            <!-- <div class="col-sm-2">

                                <select name="service2" class="service2" required>                                
                                  
                                </select>  

                            </div> -->
                            <div class="col-sm-2">
                                <input type="text" name="tarikh3" class="form-control new-style tarikh3" key="tarikh3" id="tarikh3" placeholder="Tarikh" autocomplete="off" readonly />                           
                            </div>
                            <div class="col-sm-2">
                                <select name="period2" class="form-control period2">
                                  
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Kadar Tempahan Minimum</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kadar" class="form-control kadar">
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Anggaran Kedatangan</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kedatangan" class="form-control kedatangan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Keadah Pembayaran</label>
                            </div>
                            <div class="col-sm-3" style="margin-top: 7px;">
                                <input type="text" name="kaedah" class="form-control kaedah" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Tajuk (untuk Ceramah)</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="topik" class="form-control topik">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Maklumat Tambahan</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control tambahan" id="tambahan" name="tambahan" rows="5" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Jenis Tempahan</label>
                            </div>
                            <div class="radio">
                                <div class="col-sm-5">
                                    <input type="radio" placeholder="Terbuka" name="optionsRadios" value="1" unchecked="">
                                    <b>Terbuka</b>- Semua penceramah boleh tuntut tawaran kerja.
                                </div>
                                <div class="col-sm-5">
                                    <input type="radio" name="optionsRadios" value="2" unchecked="">
                                    <b>Pilihan</b>- Tuntutan akan dipilih oleh organisasi atau individu
                                </div>
                            </div>
                        </div>
                  
                        <div class="row">
                            <div class="col-md-offset-4">
                                <div class="col-md-3">
                                	<br/>
                                    <input type="button" class="btn btn-block btn-primary goBackPage1" value="Kembali">
                                    <br/>
                                </div>
                                <div class="col-md-3">
                                    <!-- <button type="submit" class="btn btn-block btn-primary">Seterusnya</button> -->
                                    <br/>
                                    <input type="button" value="Seterusnya" class="btn btn-block btn-primary send_button">
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    	</div>

    	<div class="section page3" id="page3">
        
            <div class="container">
                <div class="row" id="post">
                    <div class="col-md-12">
                        <h3 class="text-center">Butiran Tugasan
                            <br>
                            <br>
                        </h3>
                       
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Maklumat Majlis</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="state3" class="form-control state3" key="state3" placeholder="" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="area3" class="form-control area3" key="area3" placeholder="" autocomplete="off" readonly /> 
                            </div>                            
                            <div class="col-sm-2">

                                <input type="text" name="service3" class="form-control service3" key="service3" placeholder="" autocomplete="off" readonly /> 

                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="tarikh3" class="form-control tarikh3" key="tarikh3" placeholder="" autocomplete="off" readonly />                           
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="period3" class="form-control period3" key="period3" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Saguhati</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kadar2" class="form-control kadar2" key="kadar2" placeholder="" autocomplete="off" readonly />
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Anggaran Kedatangan</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kedatangan2" class="form-control kedatangan2" key="kedatangan2" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Keadah Pembayaran</label>
                            </div>
                            <div class="col-sm-3" style="margin-top: 7px;">
                                <input type="text" name="kaedah" class="form-control kaedah" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Tajuk</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="topik2" class="form-control topik2" key="topik2" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Maklumat Tambahan</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="tambahan2" class="form-control tambahan2" key="tambahan2" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Jenis Tempahan:</label>
                                </div>
                                <div class="radio2">
                                    <div class="col-sm-5">
                                        <input type="radio" name="optionsRadios" value="1" readonly="">
                                        <b>Terbuka</b>- Semua penceramah boleh tuntut tawaran kerja.
                                    </div>
                                <div class="col-sm-5">
                                        <input type="radio" name="optionsRadios" value="2" readonly="">
                                        <b>Pilihan</b>- Tuntutan akan dipilih oleh organisasi atau individu
                                    </div>
                                </div>
                         </div>
                        
                        <div class="row">
                            <div class="col-md-offset-4">
                                <div class="col-md-3">
                                	<br/>
                                    <input type="button" value="Kembali" class="btn btn-block btn-primary back_button">
                                    <br/>
                                </div>
                                <div class="col-md-3">
                                    <!-- <button type="submit" class="btn btn-block btn-primary">Seterusnya</button> -->
                                    <br/>
                                    <button type="submit" class="btn btn-block btn-primary confirm">Hantar</button>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    	</div>

    	</form>

    	<div class="section page4">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                <br/>
	                    <p class="text-center">
	                        <b>Tempahan anda telah di hantar ke dalam sistem.</b>
	                    </p>
	                    <p class="text-center margin">Anda akan diberitahu sekiranya tempahan tersebut di terima atau di tolak.</p>
	                </div>
	            </div>
	            <div class="row text-center">
	                <div class="col-md-12 margin">
	                    <a class="btn btn-primary" href="">Lihat Tugasan</a>
	                    <br/>
	                    <br/>
	                </div>
	                
	            </div>
	        </div>
	    </div>

	    <div class="modal fade" id="modalsearch">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header2">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h3 class="modal-title text-center" contenteditable="false">
                    <b>Tuntutan</b>
                  </h3>
                </div>
                <div class="modal-body2">
                  <div class="row">
                    <div class="col-md-12 text-center">
                    <h3>Anda telah menuntut tugasan ini, pihak penganjur akan menerima notis tuntutan ini.</h3>
                                      
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

    </div>
</div>

<aside class="modal fade" id="modal-exp">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header new-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-center">
                    <span class="expTitle" style="font-weight: bold;">

                    </span>
                    <span class="expName" style="font-weight: bold;">

                    </span>
                </h3>
            </div>
            <div class="modal-body new-modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="personal-picture">
                                <div class="padder">
                                    <span class="personal profile-image" style="height: 219.5px; background-size: cover;">                                    
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <p>
                                <span class="expEducation" class="font-weight: bold;">

                                </span>
                            </p>
                            <p>
                                <span>Lokasi:&nbsp;</span>
                                <span class="expArea">

                                </span>
                                <span>,&nbsp;</span>
                                <span class="expState">

                                </span>
                                <span>
                                    Perkhidmatan yang ditawarkan:&nbsp;
                                </span>
                                <span class="expServices">

                                </span>
                            </p>
                            <a href=" " target="_blank" class="btn btn-primary expLink">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer new-modal-footer">
                <div class="col-md-12 text-center">
                    <span class="expLinkTitle">

                    </span>
                    <span class="expFacebookLink">

                    </span>
                    <span class="expInstagramLink">

                    </span>
                    <span class="expYoutubeLink">

                    </span>
                </div>
            </div>
        </div>
    </div>
</aside>        


<?php
include_once "footer.php";
?>
	

		<script src="js/jquery-3.2.1.js"></script>		
		<script src="js/jquery-ui.js"></script>
		<script src="js/tether.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/bootstrap-3.3.7.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/jquery.selectBoxIt.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/datatables.js"></script>
		<script src="js/croppie.js"></script>
		<script src="js/inputmask.js"></script>
		<script src="js/jquery.inputmask.js"></script>
		
		<!-- <script src="js/less.js?v=1.0003"></script> -->
		<script src="js/lang.js?v=1.0001"></script>		

		<script type="text/javascript">

	  		$(document).ready(function(){


                var lang, state, area, service, period, oTable, activeService;

				lang = $(".lang").attr("toggle");
                state   = <?php echo json_encode($_SESSION["state"]); ?>;
                area    = <?php echo json_encode($_SESSION["area"]); ?>;
                service = <?php echo json_encode($_SESSION["service"]); ?>;
                period = <?php echo json_encode($_SESSION["period"]); ?>;

				$(".page2, .page3, .page4").hide();

				function initWindowsChange(){
					windowsChange();
				}

				function windowsChange(){
					
				}

				function destroySession(){
                    $.ajax({
                        url: "ajax_destroy.php",
                        type: "post",
                        data: "sure=1", //send a value to make sure we want to destroy it.
                        success: function(data){
                            setTimeout(function() {
                                window.location.href = "index.php";
                            }, 50);
                        }
                    });
                }

                $(".nav-logout").click(function() {
                    destroySession();
                });

				activeService = $(".header-option-wrapper").attr("active-service");
				console.log(activeService);
				$(".statusOptionButton").removeClass("active");
				$("."+activeService).addClass("active");

				$(".statusOptionButton").click(function(){
					if($(this).attr("status")=="kulliyyahfinder"){
						$(".statusOptionButton").removeClass("active");
						$(this).addClass("active");
					}else{
						window.location.href = "index.php#kulliyyah-finder";
					}
				});

                $(".view-posted-job").click(function(){
                    $(".side-nav-wrapper").removeClass("side-nav-active");
                    $(".job-status-btn").addClass("side-nav-active"); 
                    $(".content").load("job_status.php", function() {
                        // location.hash = "#gohere";
                    });
                });

				$(".goBackPage1").click(function(){
	                window.location.href = "bookustaz.php";
	            });

	            $(".send_button").click(function(){
                    // var statew = $(".stateName option:selected").attr("stateName");
                    // var state = $(".stateName").attr("stateName");
                    // var area2 = $(".area2").attr("areaName");
                    var nameustaz = $(".nameustaz").val();
                    var state = $(".state2 option:selected").text();
                    var area = $(".area2 option:selected").text();
                    var service = $(".service2 option:selected").text();
                    var tarikh = $(".tarikh2").val();
                    var period = $(".period2 option:selected").text();
                    
                    // var service = $(".serviceName").attr("serviceName");
                    // var service = $(".service option:selected").text();
                    var kadar = $(".kadar").val();
                    var kedatangan = $(".kedatangan").val();
                    var topik = $(".topik").val();
                    var tambahan = $("textarea#tambahan").val();


                    $('.page1').hide();
                    $('.page2').hide();
                    $('.page3').show();

                        
                    $(".nameustaz2").val(nameustaz);
                    $(".state3").val(state);
                    $(".area3").val(area);
                    $(".service3").val(service);
                    $(".tarikh3").val(tarikh);
                    $(".period3").val(period);
                    $(".kadar2").val(kadar);
                    $(".kedatangan2").val(kedatangan);
                    $(".topik2").val(topik);
                    $(".tambahan2").val(tambahan);                     

                });


                $(".back_button").click(function(){
            		$(".page3").hide();
            		$(".page2").show();
                });


                $(".book_ustaz").validate({
		              rules:
		              {
		                  "state2":{
		                      required: true
		                  },

		                  "area2":{
		                      required: true
		                  },

		                  "tarikh2":{
		                      required: true
		                  },

		                  "period2":{
		                      required: true
		                  },

		                  "service2":{
		                      required: true
		                  },

		                  "kadar":{
		                      required: true
		                  },

		                  "kedatangan":{
		                      required: true
		                  },

		                  "topik":{
		                      required: true
		                  },

		                  "tambahan":{
		                      //required: true
		                  }
		              } ,
		              submitHandler: function()
		              {
		                  var obj = $(".book_ustaz");
		                  if(!obj.hasClass("disabled")){
		                      obj.addClass("disabled");
		                      var serializeData = obj.serialize();

		                      canceling = $.ajax({
		                          url:'ajax_bookconfirm.php',
		                          method:'POST',
		                          data: serializeData,
		                          success:function(book){
		                            console.log(book);
		                              $(".page2").hide();
		                              $(".page3").hide();
		                              $(".page4").show();

		                              obj.removeClass("disabled");

		                          }
		                      });
		                  }  

		                  else
		                  {
		                    alert("Please Select the Date");
		                  }               
		              }
		          });


				$(".mytable, .newtable, .filter-ustaz").on("click", ".book", function(){

					var userid = $(this).attr("userid");

					if(userid){
						$.ajax({
							url:"ajax_book.php",
							method:'POST',
							data:{userid},
							success:function(data){
								$(".page1").html(data);
								var response = data.split("|");
								
								if(response[0]==1){

									console.log("Success");
									$(".page1").hide();
									$(".filter-ustaz").hide();
                                    $('.ustaz-finder').hide();
									$(".page2").show();
									console.log(data);

									$(".nameustaz").val(response[7]+" "+response[3]);

									var selectBox = $("select").selectBoxIt();
									$("select.state2").selectBoxIt({ autoWidth: false });
									$("select.state2").empty();
									$("select.state2").data("selectBox-selectBoxIt").add({ value: "", text: "Negeri" });

									for (var i = 0, len = state.length; i < len; i++) {
										$("select.state2").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
									}

									$("select.area2").selectBoxIt({ autoWidth: false });
									$("select.area2").empty();
									$("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Daerah" });

									//show perkhidmatan list
									
									$("select.service2").selectBoxIt({ autoWidth: false });
									$("select.service2").empty();

									for (var i = 0, len = service.length; i < len; i++) {
				                      $("select.service2").data("selectBox-selectBoxIt").add({ value: service[i]["id"], text: service[i]["service"]});
				                    }	

									//show sesi/period list
									
									$("select.period2").selectBoxIt({ autoWidth: false });
									$("select.period2").empty();
									$("select.period2").data("selectBox-selectBoxIt").add({ value: "", text: "Sesi" });

									for (var i = 0, len = period.length; i < len; i++) {
				                      $("select.period2").data("selectBox-selectBoxIt").add({ value: period[i]["id"], text: period[i]["period"]});
				                    }

								}
								else {

								}
							}
						})
					}
				});


				$(function () {
	                $(".tarikh").datepicker({
	                    format: "dd-mm-yyyy",
					    todayBtn: "linked",
					    clearBtn: true,
					    forceParse: false,
					    startDate: new Date(),
					    endDate: "01-01-2099",
					    todayHighlight: true
	                })
	            });

	            $(function () {
	                $(".tarikh2").datepicker({
	                    format: "dd-mm-yyyy",
					    todayBtn: "linked",
					    clearBtn: true,
					    forceParse: false,
					    startDate: new Date(),
					    endDate: "01-01-2099",
					    todayHighlight: true
	                })
	            });

                $(function () {
                    $(".tarikh3").datepicker({
                        format: "dd-mm-yyyy",
                        todayBtn: "linked",
                        clearBtn: true,
                        forceParse: false,
                        startDate: new Date(),
                        endDate: "01-01-2099",
                        todayHighlight: true
                    })
                });

	            $(function(){
					var selectBox = $("select").selectBoxIt();
					$("select.state").selectBoxIt({ autoWidth: false });
					$("select.state").empty();
					$("select.state").data("selectBox-selectBoxIt").add({ value: "", text: "Negeri" });

					for (var i = 0, len = state.length; i < len; i++) {
						$("select.state").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
					}

					$("select.area").selectBoxIt({ autoWidth: false });
					$("select.area").empty();
					$("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Daerah" });

					//show perkhidmatan list
					var selectBox = $("select").selectBoxIt();
					$("select.service").selectBoxIt({ autoWidth: false });
					$("select.service").empty();
					//$("select.service").data("selectBox-selectBoxIt").add({ value: "", text: "Perkhidmatan" });

					for (var i = 0, len = service.length; i < len; i++) {
                      $("select.service").data("selectBox-selectBoxIt").add({ value: service[i]["id"], text: service[i]["service"]});
                    }

                    //show sesi/period list
					var selectBox = $("select").selectBoxIt();
					$("select.period").selectBoxIt({ autoWidth: false });
					$("select.period").empty();
					$("select.period").data("selectBox-selectBoxIt").add({ value: "", text: "Sesi" });

					for (var i = 0, len = period.length; i < len; i++) {
                      $("select.period").data("selectBox-selectBoxIt").add({ value: period[i]["id"], text: period[i]["period"]});
                    }

				});


				$(".state").change(function (){
					
					var state = $(this).val();

					$("select.area").selectBoxIt();
					$("select.area").empty();
					$("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Daerah" });

					for (var i = 0, len = area.length; i < len; i++) {
						if(area[i]["state_id"]==state){
							$("select.area").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
						}
					}

				});


				$(".state2").change(function (){
					
					var state = $(this).val();

					$("select.area2").selectBoxIt();
					$("select.area2").empty();
					$("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Daerah" });

					for (var i = 0, len = area.length; i < len; i++) {
						if(area[i]["state_id"]==state){
							$("select.area2").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
						}
					}

				});

	            $(".ustaz-finder").validate({
	                rules:
	                {
	                   // "state": {
	                   //   required:true
	                   // },
	                   // "area": {
	                   //   required: true
	                   // }
	                },
	                submitHandler: function()
	                {
	                    var obj = $(".ustaz-finder");
	                    var datatable = $("#mytable").DataTable();
	                    var table = $("#mytable");
	                    if(!obj.hasClass("disabled"))
	                    {
	                        obj.addClass("disabled");
	                        var serializeData = obj.serialize();
	                        console.log(serializeData);

	                        canceling = $.ajax({
			                    type:"POST",
			                    url: "ajax_ustazfilter.php",
			                    data: serializeData,			                    	
			                    cache:true,
			                    success:function(html){
			                    	console.log(html);
		                    		$('.filter-ustaz').html(html);
	                                console.log("success ajax")

	                                var oTable = $('#newtable').DataTable({
	                                    "aoColumnDefs": [ 
	                                    	{ "bSortable": false, "aTargets": [ 0,1,2,3,4 ] },
          									// { sWidth: "20%", aTargets: [  0,1,2,3,4 ] }, // aTargets is an array of which columns (starting at 0) to apply this definition to. 3 is the 4th column. you can specify multiple columns like [0, 1, 3, 8]
	                                    ] ,
	                                      responsive: true,
	                                });
			                        datatable.destroy();
			                        table.remove();

			                    }
			                })

							obj.removeClass("disabled");
	                        
	                    }else{
	                    	alert("Error");
	                    }

	                }
	            });

	            $('#mytable').DataTable({
            		
		            // dom: 'Alfprti',
		            alphabetSearch:{
		            //  column:0,
		            },
		            responsive: true,  
		        });

	            initWindowsChange();

				$(window).resize(function(){
					initWindowsChange();
				});


	  		});


$(document).on("click", ".exp-modal", function(event){
    var userID = $(this).attr("expertID");

    var obj = $(".exp-modal");
    if(!obj.hasClass("disabled")){

        obj.addClass("disabled");
        var serializeData = obj.serialize();

        canceling = $.ajax({
            url:'ajax_data.php',
            method:'POST',
            data: "&userID="+userID,
            success:function(data){
            console.log(data);
            var response = data.split("|");
            if(response[0]==1){

                $(".expLink").attr("href","javascript:;");
                $(".expLink").attr("href","personal.php?userID="+response[1]);

                $(".expTitle").empty();
                $(".expTitle").html(response[2]);

                $(".expName").empty();
                $(".expName").html(response[3]);

                $(".profile-image").css('background-image', 'url(' + response[4] + ')');
                $(".expImage").attr("src","");
                if(response[4]){
                    $(".expImage").attr("src",response[4]);
                }else{
                    $(".expImage").attr("src","picture/noimage.png");
                }

                $(".expEducation").empty();
                $(".expEducation").html(response[5]);

                $(".expArea").empty();
                $(".expArea").html(response[6]);

                $(".expState").empty();
                $(".expState").html(response[7]);

                // $(".expOtherLink").empty();
                // if(response[8]){
                // $(".expOtherLink").html("<a href='"+response[8]+"' target='_blank'>"+response[8]+"</a>");
                // }

                // if(response[9]||response[10]||response[11]){
                //  $(".expLinkTitle").html("Ikuti Pendakwah di:");
                // }else{
                //  $(".expLinkTitle").empty();
                // }

                // $(".expFacebookLink").empty();
                // if(response[9]){
                //  $(".expFacebookLink").html("<a href='"+response[9]+"' target='_blank'><i class='-square fa fa-2x fa-facebook-square fa-fw'></i></a>");
                // }

                // $(".expYoutubeLink").empty();
                // if(response[10]){
                //  $(".expYoutubeLink").html("<a href='"+response[10]+"' target='_blank'><i class='-play fa fa-2x fa-fw fa-youtube-play'></i></a>");
                // }

                // $(".expInstagramLink").empty();
                // if(response[11]){
                //  $(".expInstagramLink").html("<a href='"+response[11]+"' target='_blank'><i class='fa fa-2x fa-fw fa-instagram'></i></a>");
                // }

                $(".expServices").empty();

                var tempLoop = 0;
                var tempDataLoop = 12;
                var totalLoop = response[tempDataLoop];
                if(response[tempDataLoop]!=0){
                    console.log(totalLoop);
                    while(tempLoop<totalLoop){
                        console.log("before: "+tempDataLoop+" "+tempLoop);
                        tempDataLoop++;

                        if(tempLoop==0){
                            $(".expServices").append(response[tempDataLoop]);
                        }else{
                            $(".expServices").append(", "+response[tempDataLoop]);
                        }

                        tempLoop++;
                        console.log("after: "+tempDataLoop+" "+tempLoop);
                    }   
                }else{
                    $(".expServices").html("Maaf! Masih belum ditetapkan.");
                }                        

            }else{

            }
                obj.removeClass("disabled");
            }

        });
    }else{
    }
	
			});

		</script>
	  </body>
</html>
