<?php
include("_process.php");
// echo $baseURL;

$lang = 0;

if(isset($_SESSION["lang"])){
	$lang = $_SESSION["lang"];
}else{
	$_SESSION["lang"] = $lang;
}

$nav = array();
$log = array();

$nav[0]["languange"]= "B. Inggeris";
$nav[0]["login"]	= "Log Masuk";
$nav[0]["logout"]	= "Log Keluar";
$nav[0]["hiw"] 		= "Cara Penggunaan";
$nav[0]["faq"] 		= "Soalan Lazim";
$nav[0]["register"]	= "Daftar";
$nav[0]["contact"]	= "Hubungi Kami";

$nav[1]["languange"]= "Malay";
$nav[1]["login"]	= "Login";
$nav[1]["logout"]	= "Logout";
$nav[1]["hiw"] 		= "How It Works";
$nav[1]["faq"] 		= "F.A.Q";
$nav[1]["register"]	= "Register";
$nav[1]["contact"] 	= "Contact Us";

$log[0]["languange"]= "B. Inggeris";
$log[0]["login"]	= "Log Masuk";
$log[0]["logout"]	= "Log Keluar";
$log[0]["hiw"] 		= "Cara Penggunaan";
$log[0]["faq"] 		= "Soalan Lazim";
$log[0]["register"]	= "Daftar";
$log[0]["contact"]	= "Hubungi Kami";

$log[1]["languange"]= "Malay";
$log[1]["login"]	= "Login";
$log[1]["logout"]	= "Logout";
$log[1]["hiw"] 		= "How It Works";
$log[1]["faq"] 		= "F.A.Q";
$log[1]["register"]	= "Register";
$log[1]["contact"] 	= "Contact Us";

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

    	<base href="<?php echo $baseURL; ?>" target="_blank">

		<meta charset="utf-8">

		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
				 More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Qhootbah</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="SauceCode Studio">

		<link rel="shortcut icon" href="favicon.png" type="images/x-icon" />

		<!-- Facebook Metadata /-->
		<meta property="fb:page_id" content="" />
		<meta property="og:image" content="" />
		<meta property="og:description" content=""/>
		<meta property="og:title" content=""/>

		<!-- Google+ Metadata /-->
		<meta itemprop="name" content="">
		<meta itemprop="description" content="">
		<meta itemprop="image" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
		
		<!-- <link rel="stylesheet" href="css/style.css?v=1.0010" /> -->
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet/less" type="text/css" href="css/style.less?v=1.0006" />

		<script src="js/jquery-3.2.1.js"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/less.js"></script>
		

    </head>

    <body>

		<section class="landing-dashboard-wrapper">

			<!-- the gradient overlay color -->
			<div class="gradient-overlay-dashboard">


			</div>

			<nav class="navbar navbar-toggleable-md navbar-inverse">
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<a href="javascript:;">
    					<span class="navbar-toggler-icon"></span>
    				</a>
  				</button>
				<a class="navbar-brand" href="javascript:;">Qhootbah</a>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav ml-auto	">
						<li class="nav-item active">
							<a class="nav-link" href="javascript:;">
								<?php echo $nav[$lang]["register"]; ?>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:;" data-toggle="modal" data-target=".login-modal">
								<?php echo $nav[$lang]["login"]; ?>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:;">
								<?php echo $nav[$lang]["hiw"]; ?>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:;">
								<?php echo $nav[$lang]["faq"]; ?>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:;">
								<?php echo $nav[$lang]["contact"]; ?>
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<div class="container">
				<div class="row align-items-center dashboard-header">
					<div class="col-md-12 hidden-sm hidden-xs relative text-center">
						<h2 class="hidden-sm hidden-xs landing white white-color" style="padding-bottom:10px;">
							Tempah Ustaz/Ustazah untuk acara dan majlis islamik dengan lebih pantas dan mudah.
						</h2>
						<a class="btn btn-default green-color hidden-sm hidden-xs" href="#why">
							Kenapa?
						</a>
					</div>
				</div>
			</div>

			

		</section>

		<aside class="modal fade login-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-md-12 text-center">
                			<a class="btn btn-secondary btn-lg q-btn-secondary" data-dismiss="modal">Teruskan Sebagai Tetamu</a>
              			</div>
					</div>
					<div class="modal-body">
						<div class="col-md-6">
							<form enctype='multipart/form-data' method='post' onsubmit="return false"  accept-charset='UTF-8' name="login_form" class="login_form text-center">
								<div class="form-group">
									<div class="inner-addon left-addon">
										<i class="glyphicon glyphicon-envelope"></i>
										<input type="email" class="form-control user_input" maxlength="255" name="email" placeholder="Sila masukkan email anda" />
									</div>
					           		<div class="error_wrapper text-left">
					                	<!-- <label class="error error_style" for="email"><?php echo $login[$lang]["error"]; ?></label> -->
					                </div>
					                <!-- <input class="form-control" id="exampleInputEmail1" placeholder="Email" type="email"> -->
					                <div class="inner-addon left-addon">
										<i class="glyphicon glyphicon-lock"></i>
										<input type="password" class="form-control user_input" type="text" maxlength="255" name="password" placeholder="Sila masukkan kata laluan anda" />
									</div>
					           		<div class="error_wrapper text-left">
					                	<!-- <label class="error error_style" for="password"><?php echo $login[$lang]["error"]; ?></label> -->
					                </div>
					            </div>
					        </form>
					    </div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Send message</button>
					</div>
				</div>
			</div>
		</aside>	

		<script>
			$(document).ready(function(){
				screenHeight = $(window).height();
				$(".dashboard-header").css("height",screenHeight);
			});		
		</script>
    </body>
</html>

    