<?php
include("_process.php");

$publicView = 0; //public view = false

//check if page is for viewing purpose
if(isset($_GET["userID"])){        

    //get the userID and userTypeID for display the page
    $displayedUserID = $_GET['userID'];
    $displayedUserTypeID = $process->getUserTypeID($displayedUserID);

    $publicView = 1;

    //check if the userID for display same as the loggedID
    if(isset($_SESSION["loginID"])){
        if($displayedUserID==$_SESSION["loginID"]){
            $displayedUserID = $_SESSION["loginID"];
            $displayedUserTypeID = $_SESSION["userTypeID"];
            $publicView = 0;
        }
    }
}else if(isset($_SESSION["loginID"])){
    //for user's own profile page
    $displayedUserID = $_SESSION["loginID"];
    $displayedUserTypeID = $_SESSION["userTypeID"];
    $publicView = 0;
}else{
    header("Location: ".$baseURL); /* Redirect browser */
    exit();
}

$_SESSION["displayedUserID"] = $displayedUserID;
$_SESSION["displayedUserTypeID"] = $displayedUserTypeID;
$_SESSION["publicView"] = $publicView;
// $_SESSION["payment"]=1;
if($publicView==0){
	if(isset($_SESSION["payment"])){
		if($_SESSION["payment"]==1){
			$_SESSION["paymentJS"] = $_SESSION["payment"];
			$_SESSION["payment"]=0;
			$_SESSION["jobStatus"]="pending";
		}else{
			$_SESSION["paymentJS"] = 0;
			$_SESSION["jobStatus"]="accepted";
		}
	}else{
		$_SESSION["paymentJS"] = 0;
		$_SESSION["jobStatus"]="accepted";
	}
}

//get the data for display
if($displayedUserTypeID==3){
	$profileData = $process->getExpertData($displayedUserID);
}else if($displayedUserTypeID==2){
	$profileData = $process->getOrganizationData($displayedUserID);
}

$ustazlist = $process->getAllUstaz();
// $expertServices = $process->getExpertServices($displayedUserID);
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
		<link rel="stylesheet" href="css/bootstrap-datepicker3.standalone.css" />
		<link rel="stylesheet" type="text/css" href="css/fullcalendar.css" />
		<link rel="stylesheet" type="text/css" href="css/calendar.css"/>	
		<link rel="stylesheet/less" type="text/css" href="css/style.less?v=1.0071" />
		<!-- <link rel="stylesheet/less" type="text/css" href="css/style.less?v=1.0066" /> -->
		<link rel="stylesheet" href="css/style.css?v=1.0001" />	
    </head>

    <body>


<?php
    if($displayedUserTypeID==2){
?>
        <section class="organization-dashboard-wrapper" style="background-image: url('<?php echo $profileData["background"]; ?>'); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover;">
			<!-- the gradient overlay color -->
			<div class="gradient-overlay-dashboard">

			</div>
<?php
    }else{
?>
		<section class="expert-dashboard-wrapper background-random">
            <!-- <div class="background-random navbar navbar-default navbar-static-top"> -->
            <div class="background-random-back1" id="random">
<?php
    }
?>


    	<!-- <section class="landing-dashboard-wrapper">
			the gradient overlay color
			<div class="gradient-overlay-dashboard">

			</div> -->

			<nav class="navbar navbar-inverse">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="container">

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

					<?php if($_SESSION["publicView"]==0){ ?>

						<li class="viewNotiWrapper nav-item">
                            <a href="javascript:;" class="viewNoti notiBadgeWrapper nav-link">
                                <span class="badge">

                                </span>
                                <span>
                                    Notifikasi
                                </span>
                            </a>

                            <?php include("notificationpopup.php"); ?>

                        </li>

                    <?php } ?>


						<!-- <li class="nav-item">
							<a class="nav-link tr lang" key="languange" href="javascript:;" lang="en" toggle="my">
								
							</a>
						</li> -->

					<?php if($_SESSION["login"]==0){ ?>

                        <li class="nav-item">
							<a href="javascript:;" class="nav-link tr" key="login" data-toggle="modal" data-target=".login-modal">
								
							</a>
						</li>   

					<?php }else{ ?>

						<li class="nav-item">
							<a class="nav-link nav-logout tr" key="logout" href="javascript:;">
								
							</a>
						</li>

					<?php } ?>

					</ul>
				</div>

				</div>
			</nav>

			<div class="container">
				<div class="row">

					<div class="col-md-3">
						<div class="personal-wrapper">
							<div class="personal-border">

							</div>
							<div class="personal-picture">
								<div class="padder">
									<span class="personal personal-profile-image" style="background: url('<?php echo $profileData["image"]; ?>') no-repeat top center; background-size: cover;">									
									</span>
								</div>
							</div>

<?php
	if($displayedUserTypeID==3){
?>							
							<span class="personal-name">
								<?php echo $profileData["title"]." ".$profileData["fullname"]; ?>
							</span>
							<span class="personal-education">
								<?php echo $profileData["education"]?>
							</span>
<?php
		if($publicView==0){
?>
							<span class="personal-contact">
								<?php echo $profileData["mobile"]; ?>
							</span>
							<span class="personal-contact">
								<?php echo $profileData["email"]; ?>
							</span>
<?php
		}
	}else if($displayedUserTypeID==2){
?>
							<span class="personal-name">
								<?php echo $profileData["fullname"]; ?>
							</span>
							<span class="personal-contact">
								<?php echo $profileData["phone"]; ?>
							</span>
							<span class="personal-contact">
								<?php echo $profileData["email"]; ?>
							</span>
<?php
	}
?>

							<span class="personal-base">
								Lokasi: <?php if($profileData["area"]!="Zon 1"){
									echo $profileData["area"].", ".$profileData["state"];
								}else{
									echo $profileData["state"];
								}?>
							</span>						
						</div>						
					</div>
					<div class="col-md-9">

<?php
	if($publicView==0){
?>	

						<div class="row">
							<div class="col-md-3 col-xs-6">
								<div class="personal-dashboard-wrapper">
									<div class="personal-dashboard-border">

									</div>
									<div class="personal-dashboard-pentagon">
										<div class="padder">
											<a href="javascript:;">
												<span class="dashboard-pentagon">
													<span class="total">
														<?php echo $profileData["kulliyyahBooked"]; ?>
													</span>
													<span class="total-desc tr" key="personaldata1">
														
													</span>
												</span>
											</a>
										</div>
									</div>					
								</div>
							</div>

						
							<div class="col-md-3 col-xs-6">
								<div class="personal-dashboard-wrapper">
									<div class="personal-dashboard-border">

									</div>
									<div class="personal-dashboard-pentagon">
										<div class="padder">
											<a href="javascript:;">
												<span class="dashboard-pentagon">
													<span class="total">
														<?php echo $profileData["myrEarnedSpent"]; ?>
													</span>
<?php
	if($_SESSION["userTypeID"]==3){
?>
													<span class="total-desc tr" key="personaldata2">
														
													</span>
<?php
	} else if($_SESSION["userTypeID"]==2){
?>
													<span class="total-desc tr" key="personaldata3">
														
													</span>
<?php
	}
?>										
												</span>
											</a>
										</div>
									</div>					
								</div>
							</div>

							<div class="col-md-3 col-xs-6">
								<div class="personal-dashboard-wrapper">
									<div class="personal-dashboard-border">

									</div>
									<div class="personal-dashboard-pentagon">
										<div class="padder">
											<a href="javascript:;">
												<span class="dashboard-pentagon">
													<span class="total">
														<?php echo $profileData["upcomingEvents"]; ?>
													</span>
													<span class="total-desc tr" key="personaldata4">
														
													</span>
												</span>
											</a>
										</div>
									</div>					
								</div>
							</div>
							<div class="col-md-3 col-xs-6">
								<div class="personal-dashboard-wrapper">	
									<div class="personal-dashboard-border">

									</div>
									<div class="personal-dashboard-pentagon">
										<div class="padder">
											<a href="javascript:;">
												<span class="dashboard-pentagon">
													<span class="total">
														<?php echo $profileData["unacceptedBookings"]; ?>
													</span>
													<span class="total-desc tr" key="personaldata5">
														
													</span>
												</span>
											</a>
										</div>
									</div>					
								</div>
							</div>
						</div>
<?php
	}
?>

<?php
	if($_SESSION["publicView"]==1||$_SESSION["userTypeID"]==3){
?>
		
						<div class="hadis_wrapper">
							<p class="text-center font-size white-color">
							<b>Rasul SAW bersabda:&nbsp;</b>
							<br />&nbsp;
							<br />أَيَّامٍإِخْوَانًا وَلا يَحِلُّ لِمُسْلِمٍ أَنْ يَهْجُرَ أَخَاهُ&nbsp;فَوْقَ ثَلاَثَةِلا تَبَاغَضُوا وَلا تَحَاسَدُوا وَلا تَدَابَرُوا وَكُونُوا عِبَادَ اللَّهِ
							<br />&nbsp; &nbsp;
							<br />"Janganlah kamu saling membenci, jangan saling iri, jangan saling bertentangan. Jadilah kamu hamba Allah yang bersaudara. Tidak halal seorang muslim meninggalkan sesamanya melebihi tiga hari."" Hr. al-Bukhari, Muslim.[2]</p>
						</div>

<?php
	}
?>

					</div>

<?php
	if($publicView==0){
?>
					<div class="col-md-12">
						<form enctype='multipart/form-data' method='post' onsubmit="return false"  accept-charset='UTF-8' name="nav-choice" class="nav-choice text-center">
							<div class="form-group hidden-lg hidden-md">
								<select class="form-control mobile-nav-choice">

<?php
	if($_SESSION["userTypeID"]==2){
?>								
									<option class="open-booking tr" key="sidenav1" value="post"></option>
									<option class="ustaz-booking tr" key="sidenav2" value="bookings"></option>
<?php
	}else if($_SESSION["userTypeID"]==3){
?>									
									<option class="search-job tr" key="sidenav6" value="search"></option>
<?php
	}
?>									
									<option class="booking-status tr" key="sidenav3" value="status"></option>
									<option class="favourite tr" key="sidenav4" value="favourite"></option>
									<option class="history tr" key="sidenav5" value="history"></option>
								</select>
							</div>
						</form>
					</div>
<?php
	}
?>					
				</div>
			</div>


				<aside class="modal fade success-modal">
					<div class="modal-dialog" role="dialog">
						<div class="modal-content">
							<div class="modal-body">
								Alhamdulillah! Pembayaran dan penempahan anda telah berjaya.
							</div>
						</div>
					</div>
				</aside>


		</section>
<?php
	if($publicView==0){
?>
		<section class="side-nav">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2 no-left-padded hidden-sm hidden-xs">

<?php
	if($_SESSION["userTypeID"]==2){
?>
						<a href="javascript:;">
							<span class="side-nav-wrapper post-job-btn top-margin-20 text-center">
								<span class="nav-icon-wrapper">
									<img src="img/post-job.png" />									
								</span>
								<span class="tr" key="sidenav1">
									
								</span>
							</span>
						</a>
						<a href="javascript:;">
							<span class="side-nav-wrapper book-speaker-btn text-center">
								<span class="nav-icon-wrapper">
									<img src="img/book-speaker.png" />									
								</span>
								<span class="tr" key="sidenav2">
									
								</span>
							</span>
						</a>
<?php
	}else if($_SESSION["userTypeID"]==3){
?>

						<a href="javascript:;">
							<span class="side-nav-wrapper search-job-btn top-margin-20 text-center">
								<span class="nav-icon-wrapper">
									<img src="img/post-job.png" />									
								</span>
								<span class="tr" key="sidenav6">
									
								</span>
							</span>
						</a>

<?php
	}
?>
						<a href="javascript:;">
							<span class="side-nav-wrapper job-status-btn text-center">
								<span class="nav-icon-wrapper">
									<img src="img/job-status.png" />									
								</span>
								<span class="tr" key="sidenav3">
									
								</span>
							</span>
						</a>
						<!-- <a href="javascript:;">
							<span class="side-nav-wrapper favourite-btn text-center">
								<span class="nav-icon-wrapper">
									<img src="img/favourite.png" />									
								</span>
								<span class="tr" key="sidenav4">
									
								</span>
							</span>
						</a>
						<a href="javascript:;">
							<span class="side-nav-wrapper history-btn bottom-margin-20 text-center">
								<span class="nav-icon-wrapper">
									<img src="img/history.png" />									
								</span>
								<span class="tr" key="sidenav5">
									
								</span>
							</span>
						</a> -->
					</div>
					<div class="col-md-10 content">

					</div>
				</div>
			</div>
		</section>
<?php
	}
?>

		<section class="public-view">
			<div class="container">
				<div class="row">
				    <div class="col-md-12 calendarAnchor">
				        <h3 class="text-center">Jadual Kuliah</h3>
				        <div class="viewCalendarWrapper">
				            <a href="javascript:;" class="publicCalendarOnClick">
				                Lihat Kalendar
				            </a>
				        </div>
				    </div>
				</div>

				<section class="jobStatusList table-module-1">
				    <div class="row module-1-title">
				        
				    </div>
				    <div class="row">
				        <div class="col-md-12 list-of-jobs">
				            <table class="table tablelayout display nowrap" cellspacing="0" width="100%" id="mynewtable">

				            </table>
				        </div>
				    </div>
				</section>

				<section class="jobStatusCalendar">
				    <div class="row">
				        <div class="col-xs-12">
				            <div class="viewJobStatusCalendar"></div>
				        </div>
				    </div>
				</section>


				<aside class="modal fade fullCalModal">
				    <div class="modal-dialog calendar-modal-dialog">
				        <div cass="row">
				            <div class="modal-content">
				                <div class="modal-header text-center">
				                    <span class="">
				                        KULIAH SUBUH
				                    </span>
				                    <button type="button" class="close" data-dismiss="modal">
				                        <span aria-hidden="true">×</span> <span class="sr-only">close</span>
				                    </button>
				                    <h4 id="modalTitle" class="modal-title"></h4>
				                </div>
				                <div id="modalBody" class="modal-body">
				                    <div class="topicWrapper">
				                        <span class="labels">
				                            Topik: 
				                        </span>
				                        <span class="title calendar-header">
				                          
				                        </span>
				                        <div class="clearfix">

				                        </div>
				                        <span class="labels">
				                            Penceramah: 
				                        </span>
				                        <span class="speaker calendar-header">
				                          
				                        </span>
				                    </div>
				                    <div class="row">
				                        <div class="col-xs-6">
				                            <div class="addressWrapper">
				                                <span class="speaker">

				                                </span><br />
				                                <span class="address">

				                                </span>
				                                <div class="btnWrapper">
				                                    <button class="btn btn-profile">
				                                        <a class="eventUrl" target="_blank">
				                                            Lihat Profil                   
				                                        </a>
				                                    </button>
				                                </div>
				                            </div>

				                        </div>
				                        <div class="col-xs-6 noLeftPadding">
				                            <div class="timeWrapper">
				                                <span class="startTime">

				                                </span>
				                                <span>
				                                  -
				                                </span><br />
				                                <span class="endTime">

				                                </span><br />
				                                <span>
				                                    Jangkaan kehadiran:             
				                                </span>
				                                <span class="attendance">

				                                </span>
				                                <span>
				                                    &nbsp;orang
				                                </span>
				                            </div>
				                        </div>

				                        <div class="clearfix">

				                        </div>

				                        <div class="col-xs-6 col-xs-offset-3">
				                            <div class="modalPhoneWrapper">
				                                <span class="centerlabel">
				                                    No. untuk dihubungi
				                                </span><br />
				                                <span class="phoneNumber centerData">

				                                </span>
				                            </div>
				                        </div>
				                    </div>

				                    <div class="jobTypeWrapper">
				                        <span class="jobTypeLabel">
				                            Pilihan paparan tugasan
				                        </span>
				                        <div class="jobTypeForm">
				                            <label class="radio control-label">
				                                <input type="radio" class="public" name="jobType" value="1" checked>
				                                Umum
				                            </label>
				                            <label class="radio control-label">
				                                <input type="radio" class="private" name="jobType" value="2">
				                                Peribadi
				                            </label>
				                        </div>
				                    </div>

				                    <div class="noteWrapper">
				                        <span class="additionalNote">
				                            Nota
				                        </span>
				                        <div class="noteBox">

				                        </div>

				                        <div class="mapWrapper">
				                            <div id="map" style="width: 100%; height: 100%;">

				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</aside>
		</section>


<aside class="modal fade" id="modal-org">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header new-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-center" contenteditable="false">
                    <span class="orgName" style="font-weight: bold;">

                    </span>
                </h3>
            </div>
            <div class="modal-body new-modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <!-- <div class="personal-border">

                            </div> -->
                            <div class="personal-picture">
                                <div class="padder">
                                    <span class="personal profile-image">                                    
                                    </span>
                                </div>
                            </div>
                            <!-- <img src=" " class="img-responsive orgImage"> -->
                        </div>
                        <div class="col-md-6 text-center" style="padding-top: 20px;">
                            <p>
                                <span class="orgAddress">

                                </span>&nbsp;
                                <span class="orgPostcode">

                                </span>&nbsp;
                                <span class="orgState">

                                </span>
                            </p>
                            <p>
                                <span class="orgOtherLink">

                                </span><br />
                                <span>Nombor Telefon: </span>
                                <span class="orgPhone">

                                </span><br />
                                <span>Emel: </span>
                                <a href=" " class="orgMailTo">
                                    <span class="orgEmail">
                                      
                                    </span>
                                </a>
                            </p>
                            <a href=" " target="_blank" class="btn btn-primary orgLink">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer new-modal-footer">
                <div class="col-md-12 text-center">
                    <span class="orgLinkTitle">

                    </span>
                    <span class="orgFacebookLink">

                    </span>
                    <span class="orgInstagramLink">

                    </span>
                    <span class="orgYoutubeLink">

                    </span>
                </div>
            </div>
        </div>
    </div>
</aside>

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
                                    <span class="personal profile-image" style="height: 219.5px; background: url('upload/1/profile.jpg') no-repeat top center; background-size: cover;">                                    
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
include_once "pop_up.php";
include_once "popup_login.php";
include_once "footer.php";
?>



		<script src="js/jquery-3.2.1.js"></script>		
		<script src="js/jquery-ui.js"></script>
		<script src="js/tether.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/bootstrap-3.3.7.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/jquery.selectBoxIt.js?v=1.0001"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/datatables.js"></script>
		<script src="js/fullcalendar.js"></script>
		<!-- <script src="js/less.js?v=1.0002"></script> -->
		<script src="js/lang.js?v=1.0001"></script>

		<script>
			$(document).ready(function(){
				
				var pentagonWidth, userTypeID, status;
				var padding = 40;

				//expert changing background
                var classes = ["background-random-back1", "background-random-back2", "background-random-back3", "background-random-back4", "background-random-back5", "background-random-back6", "background-random-back7", "background-random-back8"];
      
                $("#random").each(function(){
                    $(this).addClass(classes[~~(Math.random()*classes.length)]);
                });

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

				publicView 	= <?php echo json_encode($_SESSION["publicView"]); ?>;
				publicViewUserID 	= <?php echo json_encode($_SESSION["displayedUserID"]); ?>;				
                userTypeID 	= <?php echo json_encode($_SESSION["displayedUserTypeID"]); ?>;
                paymentJS 	= <?php echo json_encode($_SESSION["paymentJS"]); ?>;

                if(publicView==0){
	                if(userTypeID==2){
	                	if(paymentJS==1){
	                		$(".success-modal").modal("show");
	                		$(".job-status-btn").addClass("side-nav-active");
	                		$(".content").load("job_status.php", function() {
			                    
			                });
	                	}else{
		                	$(".post-job-btn").addClass("side-nav-active");
		                	$(".content").load("post_job.php", function(){

		                	});
		                }
	                }else{
	                	$(".search-status-btn").addClass("side-nav-active");
	                	$(".content").load("search_job.php", function(){

			            });
	                }
	            }
	          
	            $(".post-job-btn").click(function(){
	                $(".content").load("post_job.php", function() {
	                    // location.hash = "#gohere";
	                });
	            });

	            $(".search-job-btn").click(function(){
	                $(".content").load("search_job.php", function() {
	                    // location.hash = "#gohere";
	                });
	            });
	            	            
	            $(".book-speaker-btn").click(function(){
	                $(".content").load("book_speaker.php", function() {
	                    // location.hash = "#gohere";
	                });
	            });
	          
	            $(".job-status-btn").click(function(){
	                $(".content").load("job_status.php", function() {
	                    // location.hash = "#gohere";
	                });
	            });

	            $(".favourite-btn").click(function(){
	                $(".content").load("favourite.php", function() {
	                    // location.hash = "#gohere";
	                });
	            });
	          
	            $("history-btn").click(function(){
	                $(".content").load("history.php", function() {
	                    // location.hash = "#gohere";
	                });
	            });

	            $(".mobile-nav-choice").change(function(){   
					var choice = $(this).val();
					console.log(choice);

					if(choice=="post"){
						$(".content").load("post_job.php", function() {
		                    // location.hash = "#gohere";
		                });
					}else if(choice=="bookings"){
						$(".content").load("book_speaker.php", function() {
		                    // location.hash = "#gohere";
		                });
					}else if(choice=="search"){
						$(".content").load("search_job.php", function() {
		                    // location.hash = "#gohere";
		                });
					}else if(choice=="status"){
						$(".content").load("job_status.php", function() {
		                    // location.hash = "#gohere";
		                });
					}else if(choice=="favourite"){
						$(".content").load("favourite.php", function() {
		                    // location.hash = "#gohere";
		                });
					}else if(choice=="history"){
						$(".content").load("history.php", function() {
		                    // location.hash = "#gohere";
		                });
					}
				});

	            $(".side-nav-wrapper").click(function () {
	                $(".side-nav-wrapper").removeClass("side-nav-active");
	                $(this).addClass("side-nav-active");   
	            });

	            function initLoading(){
		            status = "accepted";
		            canceling = $.ajax({
		                type:"POST",
		                url: "ajax_publicjobs.php",
		                data: "&userID="+publicViewUserID+"&status="+status,                                  
		                cache:true,
		                success:function(html){
		                    console.log(html);
		                    $(".list-of-jobs").html(html);
		                    console.log("success ajax")

		                    var oTable = $('#mynewtable').DataTable({
		                        "aoColumnDefs": [ 
		                            { "bSortable": false, "aTargets": [ 0,1,2,3,4 ] },
		                        ] ,

		                        responsive: true
		                    });
		                }
		            })
		        }

		        var jobStatus = "accepted";
		        $(".publicCalendarOnClick").click(function(){

		            // alert("test");
		            $(".jobStatusList").toggle();
		            $(".jobStatusCalendar").toggle();

		            $('.jobStatusCalendar').fullCalendar( 'destroy' );

                    viewCalendar(publicViewUserID,jobStatus);
                    $('.jobStatusCalendar').fullCalendar('render');		           	            
		        });

		        function viewCalendar(userID,jobStatus){
		            var events = 'json/'+userID+'/'+jobStatus+'.json';
		            $('.jobStatusCalendar').fullCalendar({
		                events: events,
		                header: {
		                    left: 'prev today next',
		                    center: 'title',
		                    right: 'basicDay basicWeek month'
		                },
		                eventClick:  function(event, jsEvent, view) {

		                    $(".kulliyyah").html(event.kulliyyah);
		                    $(".title").html(event.topic);
		                    $(".speaker").html(event.speaker);
		                    $(".username").html(event.username);
		                    $(".startTime").html(event.start);
		                    $(".endTime").html(event.end);
		                    $(".attendance").html(event.attendance);
		                    $(".phoneNumber").html(event.phone);
		                    $(".eventUrl").attr("href",event.link+"?viewUserID="+event.speakerID);
		                    console.log(event.note);
		                    $(".noteBox").html(event.note);

		                    // $("input:radio[name=jobType]")[event.jobtype].checked = true;

		                    $(".fullCalModal").modal();

		                    setTimeout(function(){
		                        $(".mapWrapper").height(function(){
		                            return $(this).width();
		                        });

		                        initialize(new google.maps.LatLng(event.lat, event.long));
		                        google.maps.event.trigger(map, 'resize');
		                    }, 500); 
		                    
		                }
		            });
		        }

		        if(publicView==1){
		        	$(".public-view").show();
		        	$(".side-nav").hide();
		        	initLoading();
		        }else{
		        	$(".public-view").hide();
		        	$(".side-nav").show();
		        }				

				function initWindowsChange(){
					pentagonWidth = $(".personal").width();
					borderWidth = $(".personal-border").width();
					dashboardPentagonWidth = $(".dashboard-pentagon").width();
					dashboardBorderWidth = $(".personal-dashboard-border-border").width();

					windowsChange();
				}

				function windowsChange(){
					$(".personal").css("height",pentagonWidth);	
					$(".personal-border").css("height",borderWidth);
					$(".dashboard-pentagon").css("height",dashboardPentagonWidth+padding);	
					$(".personal-dashboard-border-border").css("height",dashboardBorderWidth);				
				}


				$('#myCarousel').carousel({
					interval: 2500
				})

				$('#myCarousel').on('slid.bs.carousel', function() {
					//alert("slid");
				});

				initWindowsChange();

				$(window).resize(function(){
					initWindowsChange();
				});

			if(publicView==0){
				var loginSession = <?php echo json_encode($_SESSION["loginID"]); ?>;
                var levelID = <?php echo json_encode($_SESSION["userTypeID"]); ?>;
                var userNotification;

				function notify(){
                    // console.log("test: "+loginSession);
                
                    $.ajax({
                            url:'ajax_notify.php',
                            method:'POST',
                            data:"&userID="+loginSession,
                            dataType: "json", // Set the data type so jQuery can parse it for you
                            success:function(data){
                                // console.log("data: ");
                                // console.log(data);
                                userNotification = data;
                                var loop = 0;

                                $(".notiInsertHere").empty();
                                // console.log("userNotification: ");
                                // console.log(userNotification);

                                if(userNotification.length==0){
                                    // console.log("OFF");
                                    $(".viewNoti").off("click");
                                }else{
                                    // console.log("ON");
                                    $(".viewNoti").on("click");
                                }

                                
                                for (var loop = 0, len = userNotification.length; loop < len; loop++) {
                                    if(levelID==3){
                                        if(userNotification[loop]["status_id"]==5){
                                            $(".notiInsertHere").append('<div class="col-sm-2"><img class="circleImage" src="'+userNotification[loop]["organizer_image"]+'"></div><div class="col-sm-10"><div class="row"><div class="col-sm-6"><span class="notiBoldFont notiBlock">Kuliah/Ceramah</span><span>'+userNotification[loop]["area"]+', '+userNotification[loop]["state"]+'</span></div><div class="col-sm-6 notiTextRight"><span class="notiGreenFont">'+userNotification[loop]["start"]+'</span></div><div class="clearfix"></div><div class="col-sm-8 notiMarginTop"><span class="notiMainOrgName">'+userNotification[loop]["organizer_name"]+'</span><span> telah menawarkan tugasan</span><span class="notiFont12 notiBlock"><span class="breakLine">Ditawarkan pada</span><span>'+userNotification[loop]["ecreated"]+'</span></div><div class="col-sm-4 notiMarginTop notiTextRight"><span class="notiMore"><a href="javascript:;" class="notiMoreLink" notiID="'+loop+'">Lanjutan ></a></span></div></div></div><div class="clearfix"></div><div class="col-sm-10 col-sm-offset-1 notiLine"></div>');
                                        }else if(userNotification[loop]["status_id"]==6){
                                            $(".notiInsertHere").append('<div class="col-sm-2"><img class="circleImage" src="'+userNotification[loop]["organizer_image"]+'"></div><div class="col-sm-10"><div class="row"><div class="col-sm-6"><span class="notiBoldFont notiBlock">Kuliah/Ceramah</span><span>'+userNotification[loop]["area"]+', '+userNotification[loop]["state"]+'</span></div><div class="col-sm-6 notiTextRight"><span class=" ">'+userNotification[loop]["start"]+'</span></div><div class="clearfix"></div><div class="col-sm-8 notiMarginTop"><span class="notiMainOrgName">'+userNotification[loop]["organizer_name"]+'</span><span> telah membatalkan tugasan ini</span><span class="notiFont12 notiBlock"><span class="breakLine">Dibatalkan pada</span><span>'+userNotification[loop]["ecreated"]+'</span></div><div class="col-sm-4 notiMarginTop notiTextRight"><span class="notiMore"><a href="javascript:;" class="notiMoreCancel" notiID="'+loop+'">Lanjutan ></a></span></div></div></div><div class="clearfix"></div><div class="col-sm-10 col-sm-offset-1 notiLine"></div>');

                                        }else{

                                        }
                                    }else if(levelID==2){
                                        if(userNotification[loop]["status_id"]==5){
                                            $(".notiInsertHere").append('<div class="col-sm-2"><img class="circleImage" src="'+userNotification[loop]["organizer_image"]+'"></div><div class="col-sm-10"><div class="row"><div class="col-sm-6"><span class="notiBoldFont notiBlock">Kuliah/Ceramah</span><span>'+userNotification[loop]["area"]+', '+userNotification[loop]["state"]+'</span></div><div class="col-sm-6 notiTextRight"><span class="notiGreenFont">'+userNotification[loop]["start"]+'</span></div><div class="clearfix"></div><div class="col-sm-8 notiMarginTop"><span class="notiMainOrgName">'+userNotification[loop]["organizer_name"]+'</span><span> telah menawarkan tugasan</span><span class="notiFont12 notiBlock"><span class="breakLine">Ditawarkan pada</span><span>'+userNotification[loop]["ecreated"]+'</span></div><div class="col-sm-4 notiMarginTop notiTextRight"><span class="notiMore"><a href="javascript:;" class="notiMoreLink" notiID="'+loop+'">Lanjutan ></a></span></div></div></div><div class="clearfix"></div><div class="col-sm-10 col-sm-offset-1 notiLine"></div>');
                                        }else if(userNotification[loop]["status_id"]==6){
                                            // console.log("HERE");
                                            $(".notiInsertHere").append('<div class="col-sm-2"><img class="circleImage" src="'+userNotification[loop]["organizer_image"]+'"></div><div class="col-sm-10"><div class="row"><div class="col-sm-6"><span class="notiBoldFont notiBlock">Kuliah/Ceramah</span><span>'+userNotification[loop]["area"]+', '+userNotification[loop]["state"]+'</span></div><div class="col-sm-6 notiTextRight"><span class=" ">'+userNotification[loop]["start"]+'</span></div><div class="clearfix"></div><div class="col-sm-8 notiMarginTop"><span class="notiMainOrgName">'+userNotification[loop]["organizer_name"]+'</span><span> telah membatalkan tugasan ini</span><span class="notiFont12 notiBlock"><span class="breakLine">Dibatalkan pada</span><span>'+userNotification[loop]["ecreated"]+'</span></div><div class="col-sm-4 notiMarginTop notiTextRight"><span class="notiMore"><a href="javascript:;" class="notiMoreCancel" notiID="'+loop+'">Lanjutan ></a></span></div></div></div><div class="clearfix"></div><div class="col-sm-10 col-sm-offset-1 notiLine"></div>');

                                        }else{

                                        }
                                    }
                                    

                                }

                                $(".notiBadgeWrapper").empty();
                                $(".notiBadgeWrapper").html('<span class="badge">'+len+'</span><span>&nbspNotifikasi</span>');

                            }
                    })
                };

                notify();

                var refreshNotification = setInterval(function(){
                    notify();
                }, 5000);  
            }

                $("[data-toggle=popover]").popover({
                    html: true, 
                    content: function() {
                        return $(".notification").html();
                    }

                });


                $(document).on("click", ".answer", function() {
                    var status = $(this).attr("status");
                    var event_id = $(this).attr("event_id")

                    if (status&&event_id) {
                        $.ajax({
                            url:'ajax_answer.php',
                            method:'POST',
                            data:"&status="+status+"&event_id="+event_id,
                            success:function(data){
                                console.log(data);
                                var response = data.split("|");

                                if(response[0]==1){
                                    console.log("success: "+response[0]);

                                    notify();
                                    $(".notiWrapper").css("max-height","500px");
                                    $(".notiWrapper").css({"height": "auto"});  

                                    $(".notiDetails").delay(100).animate({
                                        left: "400px"
                                    },function(){
                                        $(".notiDetails").css("display","none");
                                        location.reload();
                                    }); 
                                }
                            }
                        })
                    }
                });

                var tempHeight = $(".notiHeight").height();

                $(document).on("click", ".notiMoreLink", function() {

                    var notiID = $(this).attr("notiID");
                    $(".notiPosted").empty();
                    $(".notiOrgName").empty();
                    $(".notiVenue").empty();
                    $(".notiDatTimeWrapper").empty();
                    $(".notiAttendance").empty();
                    $(".notiTopic").empty();
                    $(".notiBooked").empty();
                    $(".notiRate").empty();
                    $(".notiPosted").empty();
                    $(".notiPosted").empty();

                    $(".notiPosted").html(userNotification[notiID]["created"]);
                    $(".notiOrgName").html(userNotification[notiID]["organizer_name"]);
                    $(".notiVenue").html(userNotification[notiID]["area"]+', '+userNotification[notiID]["state"]);
                    $(".notiDatTimeWrapper").html(userNotification[notiID]["start"]+' - '+userNotification[notiID]["end"]);
                    $(".notiAttendance").html(userNotification[notiID]["attendance"]);
                    $(".notiTopic").html(userNotification[notiID]["topic"]);
                    $(".notiBooked").html(userNotification[notiID]["organizer_name"]);
                    $(".notiRate").html(userNotification[notiID]["rate"]);
                    $(".notiBooked").html(userNotification[notiID]["organizer_name"]);
                    $(".notiRate").html(userNotification[notiID]["rate"]);
                    $(".answer").attr("event_id",userNotification[notiID]["event_id"]);
                    $(".notiOrgImage img").attr("src",userNotification[notiID]["organizer_image"])


                    tempHeight = $(".notiHeight").height() + 40;
                    console.log(tempHeight);

                    $(".notiWrapper").css("max-height",tempHeight);             
                    $(".notiDetails").css("display","block");

                    $(".notiWrapper").animate({
                        height: tempHeight
                    },function(){
                        $(".notiDetails").animate({
                            left: "0px"
                        },function(){                            

                        });                        
                    });
                    
                });


                $(document).on("click", ".backToNoti", function() {

                    notify();

                    $(".notiWrapper").css("max-height","500px");
                    $(".notiWrapper").css({"height": "auto"});  

                    $(".notiDetails").delay(100).animate({
                        left: "400px"
                    },function(){
                        $(".notiDetails").css("display","none");
                    }); 
                });

                $(".viewNoti").click(function() {
                    console.log("click");
                    $(".notificationPopUp").toggle();
                });






	  		});


	            var canceling;

				$(function(){
					$(".login-form").validate({
						rules:
						{
							"email": {
								required: true
							},
							"password": {
								required: true
							}
						},
						submitHandler: function()
						{
							var obj = $(".login-form");
							if(!obj.hasClass("disabled"))
							{
								obj.addClass("disabled");
								var serializeData = obj.serialize();
								
								canceling = $.ajax({
				                    type:"POST",
				                    url: "ajax_login.php",
				                    data: serializeData,				                    	
				                    cache:true,
				                    success:function(data){
				                    	console.log(data);
				                    	var response = data.split("|");
				                    	
				                    	if(response[0]==1){
											$(".logout_wrapper").show();
											$(".login_wrapper").hide();
											console.log("here");

											if(response[0]==1){
												console.log("here2");
												setTimeout(function() {
													window.location.href = "personal.php";
												}, 500);												
											}
				                        }else if(response[0]==0){
				                        	var validator = $(".login-form").validate();
											validator.showErrors({
											 	"email": "Emel ini masih belum didaftar"
											});
				                        }else if(response[0]==2){
				                        	var validator = $(".login-form").validate();
											validator.showErrors({
											 	"password": "Kata laluan anda tidak benar"
											});
				                        }else{
				                        	
					                    }

				                        obj.removeClass("disabled");
				                    }
				                })
							}
						}
					})
				})

$(document).on("click", ".org-modal", function(event){

// $("#org-modal").click(function(){
	var userID = $(this).attr("organizerID");
	// console.log(userID);

	var obj = $(".org-modal");
	if(!obj.hasClass("disabled"))
	{
		obj.addClass("disabled");
		var serializeData = obj.serialize();

		canceling = $.ajax({
			url:'ajax_data.php',
			method:'POST',
			data: "&userID="+userID,
			success:function(data){
				// console.log(data);

				var response = data.split("|");
				if(response[0]==1){

					$(".orgLink").attr("href","javascript:;");
					$(".orgLink").attr("href","personal.php?userID="+response[1]);

					$(".orgName").empty();
					$(".orgName").html(response[2]);

					$(".profile-image").css('background-image', 'url(' + response[3] + ')');

					$(".orgImage").attr("src","");
					$(".orgImage").attr("src",response[3]);

					$(".orgAddress").empty();
					$(".orgAddress").html(response[4]);

					$(".orgPostcode").empty();
					$(".orgPostcode").html(response[5]);

					$(".orgState").empty();
					$(".orgState").html(response[6]);

					$(".orgPhone").empty();
					$(".orgPhone").html(response[7]);

					$(".orgMailTo").attr("href","javascript:;");
					$(".orgMailTo").attr("href","mailto:"+response[8]);     

					$(".orgEmail").empty();                         
					$(".orgEmail").html(response[8]);

					// $(".orgOtherLink").empty();
					// if(response[9]){
					// 	$(".orgOtherLink").html("<a href='"+response[9]+"' target='_blank'>"+response[9]+"</a>");
					// }

					// if(response[10]||response[11]||response[12]){
					// 	$(".orgLinkTitle").html("Ikuti Penganjur di:");
					// }else{
					// 	$(".orgLinkTitle").empty();
					// }

					// $(".orgFacebookLink").empty();
					// if(response[10]){
					// 	$(".orgFacebookLink").html("<a href='"+response[10]+"' target='_blank'><i class='-square fa fa-2x fa-facebook-square fa-fw'></i></a>");
					// }

					// $(".orgYoutubeLink").empty();
					// if(response[11]){
					// 	$(".orgYoutubeLink").html("<a href='"+response[11]+"' target='_blank'><i class='-play fa fa-2x fa-fw fa-youtube-play'></i></a>");
					// }

					// $(".orgInstagramLink").empty();
					// if(response[12]){
					// 	$(".orgInstagramLink").html("<a href='"+response[12]+"' target='_blank'><i class='fa fa-2x fa-fw fa-instagram'></i></a>");
					// }                             

				}else{

				}
				obj.removeClass("disabled");

	
			}

		});
	}else{
		
	}

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
				// 	$(".expLinkTitle").html("Ikuti Pendakwah di:");
				// }else{
				// 	$(".expLinkTitle").empty();
				// }

				// $(".expFacebookLink").empty();
				// if(response[9]){
				// 	$(".expFacebookLink").html("<a href='"+response[9]+"' target='_blank'><i class='-square fa fa-2x fa-facebook-square fa-fw'></i></a>");
				// }

				// $(".expYoutubeLink").empty();
				// if(response[10]){
				// 	$(".expYoutubeLink").html("<a href='"+response[10]+"' target='_blank'><i class='-play fa fa-2x fa-fw fa-youtube-play'></i></a>");
				// }

				// $(".expInstagramLink").empty();
				// if(response[11]){
				// 	$(".expInstagramLink").html("<a href='"+response[11]+"' target='_blank'><i class='fa fa-2x fa-fw fa-instagram'></i></a>");
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
		alert("Please Select the Date");
	}

});

		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRDsB_dVWJyHcYlEEzozuytjwsXhaly3U"></script>
    </body>
</html>

    