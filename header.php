<?php
include("_process.php");

/***** check login *****/
if(!isset($_SESSION["login"])){
	$_SESSION["login"]=0;
	$_SESSION["loginID"]=0;
	$_SESSION["userTypeID"]=0;
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
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<link rel="stylesheet" href="css/jquery-ui.css" />		
		<link rel="stylesheet" href="css/bootstrap-3.3.7.css" />
		<link rel="stylesheet" href="css/jquery.selectBoxIt.css" />
		<link rel="stylesheet" href="css/datatables.css" />
		<link rel="stylesheet" href="css/bootstrap-datepicker3.standalone.css" />		
		<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less?v=1.0066" /> -->
		<link rel="stylesheet" href="css/style.css" />	
    </head>

    <body>
    	<section class="landing-dashboard-wrapper">
			<!-- the gradient overlay color -->
			<div class="gradient-overlay-dashboard">

			</div>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
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
								<a href="#" class="nav-link tr" key="login" data-toggle="modal" data-target=".login-modal">
									
								</a>
							</li>    
<?php
    }else{
?>
							<li class="nav-item">
								<a href="javascript:;" class="nav-link nav-logout tr" key="logout">
									
								</a>
							</li>
							<li class="nav-item">
								<a href="personal.php" class="nav-link tr" key="profile" target="_self">
									
								</a>
							</li>						
<?php
	}
?>
							<li class="nav-item">
								<a href="javascript:;" class="nav-link go-to tr" key="how" go-to="how">
									
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="javascript:;" class="nav-link tr" key="faq">
									
								</a>
							</li> -->
							<li class="nav-item">
								<a href="javascript:;" class="nav-link go-to tr" key="contact" go-to="contact">
									
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="container">
				<div class="row dashboard-header init">
					<div class="col-md-12 hidden-xs text-center dashboard-desc">
						<h2 class="tr" key="dashboard">
							
						</h2>
						<a href="javascript:;" class="btn btn-secondary tr go-to" key="why" go-to="why">

						</a>
					</div>

					<div class="col-md-12 hidden-sm hidden-md hidden-lg text-center dashboard-mobile">
						<h2 class="tr" key="dashboard">
							
						</h2>
						<a href="javascript:;" class="btn btn-secondary tr go-to" key="why" go-to="why">

						</a>
					</div>

					<div class="key-function">
						<div class="col-sm-12 text-center">

							<!-- Nav tabs -->
							<ul class="nav nav-tabs dashboard-tab" role="tablist">
								<li class="nav-item">
									<a href="javascript:;" class="active" data-toggle="tab" role="tab">
										<span class="hidden-xs hidden-sm tr" key="tabonelarge">
											
										</span>
										<span class="hidden-md hidden-lg tr" key="tabonesmall">
											
										</span>										
									</a>
								</li>
								<!-- <li class="nav-item nav-item-center">
									<a href="javascript:;" data-toggle="tab" role="tab" class="book-ustaz-link">
										<span class="hidden-xs hidden-sm tr" key="tabtwolarge">
											
										</span>
										<span class="hidden-md hidden-lg tr" key="tabtwosmall">
											
										</span>
									</a>
								</li>
								<li class="nav-item right-floating">
									<a href="javascript:;" data-toggle="tab" role="tab" class="search-job-link">
										<span class="hidden-xs hidden-sm tr" key="tabthreelarge">
											
										</span>
										<span class="hidden-md hidden-lg tr" key="tabthreesmall">
											
										</span>
									</a>
								</li> -->
							</ul>

							<form enctype='multipart/form-data' action="kuliahfinder.php" method='post' onsubmit="return true"  accept-charset='UTF-8' name="key-landing" class="key-landing-wrapper kulliyyah-finder">
								<div class="row padding-left-right-10">
				                    <div class="col-sm-10">
				                    	<div class="row">
					                        <div class="col-sm-3">   
			                                    <select name="state" class="form-control state">
			                                        
			                                    </select>   
					                        </div>
					                        <div class="col-sm-3">		  
			                                    <select name="area" class="form-control area">

			                                    </select>			                            
					                        </div>
					                        <div class="col-sm-3">
				                                <input type="text" name="from" class="form-control from tr" key="from" placeholder="" autocomplete="off" readonly />
					                        </div>
					                        <div class="col-sm-3">
				                                <input type="text" name="to" class="form-control to tr" key="to" placeholder="" autocomplete="off" readonly />
					                        </div>
					                    </div>
					                </div>
				                    <div class="col-sm-2">
				                    	<input type="submit" name="search" value="search" class="btn btn-block btn-primary form-control button tr" key="search" />
				                    </div>
			                    </div>
				       		</form>
				    	</div>
					</div>
				</div>
			</div>
		</section>
