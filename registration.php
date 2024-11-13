<?php
include("_process.php");
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
		<link rel="stylesheet" href="css/style.css?v=1.001" />
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
								<a href="index.php#contact" target="_self" class="nav-link go-to tr" key="contact" go-to="contact">
									
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</section>

	<!-- <div class="page_wrap"> -->

	<!--register section-->
	<section class="registration container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center tr" key="reg1">
							
				</h1>
				<!-- <div class="register_title">
					
				</div> -->
			</div>
			
			<div class="clearfix">
			</div>
			
			<div class="col-sm-8 col-sm-offset-2 choice-text">
				Saya ingin mendaftar sebagai...
			</div>

			<div class="clearfix">
			</div>

			<div class="col-sm-8 col-sm-offset-2 choice">
				<div class="row">
					<div class="col-sm-4">

				<label class="radio-inline">
					<input type="radio" class="normal" name="level" value="1" checked>Persendirian
				</label>

					</div>
					<div class="col-sm-4">

				<label class="radio-inline">
					<input type="radio" class="organization" name="level" value="2">Organisasi
				</label>

					</div>
					<div class="col-sm-4">
					
				<label class="radio-inline">
					<input type="radio" class="expert" name="level" value="3">Penceramah
				</label>

					</div>
				</div>
			</div>

			<div class="clearfix">
			</div>

			<div class="col-sm-8 col-sm-offset-2 note">
				Nota:<br />
				1. <b>Untuk Tenaga Pakar</b> - Pihak kami perlu mengesahkan latar belakang anda untuk menyempurnakan pendaftaran anda. Kami memerlukan salinan kad pengenalan, sijil pendidikan, dan sijil/nombor pendaftaran majlis agama negeri.<br />
				2. <b>Untuk Penganjur</b> - Pihak kami perlu mengesahkan latar belakang anda untuk menyempurnakan pendaftaran anda. Kami memerlukan salinan sijil status organisasi yang disahkan. 
			</div>

			<div class="clearfix">
			</div>


<?php
include_once "popup_login.php";
include_once "registration_individual.php";
include_once "registration_organization.php";
include_once "registration_expert.php";
?>

		<aside class="modal fade success-modal">
			<div class="modal-dialog" role="dialog">
				<div class="modal-content">
					<div class="modal-body">
						Alhamdulillah! Pendaftaran anda telah berjaya.
					</div>
				</div>
			</div>
		</aside>

		</div>
	</section>

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
		
		<script src="js/qhootbah.general.js"></script>
		<script src="js/lang.js"></script>		

		<script type="text/javascript">

	  		$(document).ready(function(){

	  			var title, state, area, bank;

	  			$(".user_registration_form").css("display","block");			

				var contactno = [{ "mask": "#########"}, { "mask": "##########"}, { "mask": "###########"}];
				var nric = [{ "mask": "######-##-####"}];
				var postcode = [{ "mask": "#####"}];
    			                
    			function initContactNo(){
	    			$(".contactno").inputmask({ 
				        mask: contactno, 
				        greedy: false, 
				        definitions: { '#': { validator: "[0-9]", cardinality: 1}}
				    });
	    		}

	    		function initNRIC(){
				    $(".nric").inputmask({ 
				        mask: nric, 
				        greedy: false, 
				        definitions: { '#': { validator: "[0-9]", cardinality: 1}}
				    });
				}

				function initPostcode(){
				    $(".postcode").inputmask({ 
				        mask: postcode, 
				        greedy: false, 
				        definitions: { '#': { validator: "[0-9]", cardinality: 1}}
				    });
				}

				initContactNo();
				initNRIC();
				initPostcode();

				$(function(){
					$(".user_registration_form").validate({
						ignore: "",
						rules: {
							"email": {
								required: true, email: true
							},
							"password": {
								required: true, minlength: 6
							},
							"repassword": {
								required: true, equalTo: "#password-individual", minlength: 6
							}
				        },
						submitHandler: function()
						{
							var obj = $(".user_registration_form");
							var level = $("input[name=level]:checked").val();

							$uploadCrop.croppie('result', {
								type: 'canvas',
								size: 'viewport'
							}).then(function (resp) {							

								if(!obj.hasClass("disabled"))
								{
									obj.addClass("disabled");
									var serializeData = obj.serialize();

									var data = {
										"image" : resp
									};

									data = serializeData + '&' + $.param(data);

									canceling = $.ajax({
					                    type:"POST",
					                    url: "ajax_register.php",
					                    data: data+"&level="+level,
					                    cache:true,
					                    success:function(data){
					                    	console.log(data);
					                    	var response = data.split("|");
					                    	if(response[0]==2){
					                    		$(".success-modal").modal("show");
					       						 setTimeout(function() {
													window.location.href = "index.php";
												}, 1000);
					                        }else if(response[0]==1){
					                        	var validator = $(".user_registration_form").validate();
												validator.showErrors({
												 	"email": "Emel ini sudah didaftar"
												});
					                        }else{
					                        	
					                        }

					                        obj.removeClass("disabled");
					                    }
					                })
								}
							});	                
						}
					})
				})

				$(function(){
					$(".organization_registration_form").validate({
						ignore: "",
						rules:
						{
							"email": {
								required: true, email: true
							},
							"password": {
								required: true, minlength: 6
							},
							"repassword": {
								required: true, equalTo: "#password-organization", minlength: 6
							},
							"fullname": {
				                required: true
				            },
				            "contactno": {
				                required: true, number: true
				            },
				            "address1": {
				                required: true
				            },
				            "postcode": {
				                required: true, number: true, minlength: 5
				            },
				            "city": {
				                required: true
				            },
				            "state": {
				                required: true
				            },
				            "area": {
				                required: true
				            },
				            "phone": {
				                required: true
				            }		
						},
						submitHandler: function()
						{
							var obj = $(".organization_registration_form");
							var level = $("input[name=level]:checked").val();

							$uploadCrop.croppie('result', {
								type: 'canvas',
								size: 'viewport'
							}).then(function (resp) {							

								if(!obj.hasClass("disabled"))
								{
									obj.addClass("disabled");
									var serializeData = obj.serialize();

									var data = {
										"image" : resp
									};

									data = serializeData + '&' + $.param(data);

									canceling = $.ajax({
					                    type:"POST",
					                    url: "ajax_register.php",
					                    data: data+"&level="+level,
					                    cache:true,
					                    success:function(data){
					                    	console.log(data);
					                    	var response = data.split("|");
					                    	if(response[0]==2){
					                    		setTimeout(function() {
													window.location.href = "index.php";
												}, 1000);
					                        }else if(response[0]==1){
					                        	var validator = $(".organization_registration_form").validate();
												validator.showErrors({
												 	"email": "Emel ini sudah didaftar"
												});
					                        }else{
					                        	
					                        }

					                        obj.removeClass("disabled");
					                    }
					                })
								}
							});                
						}
					})
				})

				$(function(){
					$(".expert_registration_form").validate({
						ignore: "",
						rules:
						{
							"email": {
								required: true, email: true
							},
							"password": {
								required: true, minlength: 6
							},
							"repassword": {
								required: true, equalTo: "#password-expert", minlength: 6
							}		
						},
						submitHandler: function()
						{
							var obj = $(".expert_registration_form");
							var level = $("input[name=level]:checked").val();

							$uploadCrop.croppie('result', {
								type: 'canvas',
								size: 'viewport'
							}).then(function (resp) {							

								if(!obj.hasClass("disabled"))
								{
									obj.addClass("disabled");
									var serializeData = obj.serialize();

									var data = {
										"image" : resp
									};

									data = serializeData + '&' + $.param(data);

									canceling = $.ajax({
					                    type:"POST",
					                    url: "ajax_register.php",
					                    data: data+"&level="+level,
					                    cache:true,
					                    success:function(data){
					                    	console.log(data);
					                    	var response = data.split("|");
					                    	if(response[0]==2){
					                    		setTimeout(function() {
													window.location.href = "index.php";
												}, 1000);
					                        }else if(response[0]==1){
					                        	var validator = $(".expert_registration_form").validate();
												validator.showErrors({
												 	"email": "Emel ini sudah didaftar"
												});
					                        }else{
					                        	
					                        }

					                        obj.removeClass("disabled");
					                    }
					                })
								}
							});                
						}
					})
				})

				title = <?php echo json_encode($_SESSION["title"]); ?>;
	  			state = <?php echo json_encode($_SESSION["state"]); ?>;
	  			area = <?php echo json_encode($_SESSION["area"]); ?>;
	  			bank = <?php echo json_encode($_SESSION["bank"]); ?>;

	  			// INDIVIDUAL
				$(function(){
					$("select.title").selectBoxIt({ autoWidth: false });
	                $("select.title").empty();
	                $("select.title").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = title.length; i < len; i++) {
	                    $("select.title").data("selectBox-selectBoxIt").add({ value: title[i]["id"], text: title[i]["title"]});
	                }

	                
	                $("select.state").selectBoxIt({ autoWidth: false });
	                $("select.state").empty();
	                $("select.state").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = state.length; i < len; i++) {
	                    $("select.state").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
	                }

	                $("select.area").selectBoxIt({ autoWidth: false });
	                $("select.area").empty();
	                $("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });
	        	});


	            $(".state").change(function (){
	                
	                var state = $(this).val();

	                $("select.area").selectBoxIt();
	                $("select.area").empty();
	                $("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih Daerah" });

	                for (var i = 0, len = area.length; i < len; i++) {
	                    if(area[i]["state_id"]==state){
	                        $("select.area").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
	                    }
	                }

	            });	            

				$('#upload').on('change', function () { 
					var reader = new FileReader();
				    reader.onload = function (e) {
				    	$uploadCrop.croppie('bind', {
				    		url: e.target.result
				    	}).then(function(){
				    		console.log('jQuery bind complete');
				    	});
				    	
				    }
				    reader.readAsDataURL(this.files[0]);
				});

	            //ORGANIZATION
				function initOrganization(){                
	                $("select.state2").selectBoxIt({ autoWidth: false });
	                $("select.state2").empty();
	                $("select.state2").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = state.length; i < len; i++) {
	                    $("select.state2").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
	                }

	                $("select.area2").selectBoxIt({ autoWidth: false });
	                $("select.area2").empty();
	                $("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });
	            }


	            $(".state2").change(function (){
	                
	                var state = $(this).val();

	                $("select.area2").selectBoxIt();
	                $("select.area2").empty();
	                $("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih Daerah" });

	                for (var i = 0, len = area.length; i < len; i++) {
	                    if(area[i]["state_id"]==state){
	                        $("select.area2").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
	                    }
	                }

	            });

				$('#upload2').on('change', function () { 
					var reader = new FileReader();
				    reader.onload = function (e) {
				    	$uploadCrop.croppie('bind', {
				    		url: e.target.result
				    	}).then(function(){
				    		console.log('jQuery bind complete');
				    	});
				    	
				    }
				    reader.readAsDataURL(this.files[0]);
				});

	            //EXPERT
	            function initExpert(){
	            	$("select.title2").selectBoxIt({ autoWidth: false });
	                $("select.title2").empty();
	                $("select.title2").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = title.length; i < len; i++) {
	                    $("select.title2").data("selectBox-selectBoxIt").add({ value: title[i]["id"], text: title[i]["title"]});
	                }

					                
	                $("select.state3").selectBoxIt({ autoWidth: false });
	                $("select.state3").empty();
	                $("select.state3").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = state.length; i < len; i++) {
	                    $("select.state3").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
	                }

	                $("select.area3").selectBoxIt({ autoWidth: false });
	                $("select.area3").empty();
	                $("select.area3").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                $("select.bank").selectBoxIt({ autoWidth: false });
	                $("select.bank").empty();
	                $("select.bank").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = bank.length; i < len; i++) {
	                    $("select.bank").data("selectBox-selectBoxIt").add({ value: bank[i]["id"], text: bank[i]["bank"]});
	                }
	            }


	            $(".state3").change(function (){
	                
	                var state = $(this).val();

	                $("select.area3").selectBoxIt();
	                $("select.area3").empty();
	                $("select.area3").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih " });

	                for (var i = 0, len = area.length; i < len; i++) {
	                    if(area[i]["state_id"]==state){
	                        $("select.area3").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
	                    }
	                }

	            });	       

				$('#upload3').on('change', function () { 
					var reader = new FileReader();
				    reader.onload = function (e) {
				    	$uploadCrop.croppie('bind', {
				    		url: e.target.result
				    	}).then(function(){
				    		console.log('jQuery bind complete');
				    	});
				    	
				    }
				    reader.readAsDataURL(this.files[0]);
				});

				function createCroppie(page) {
					$uploadCrop = $('#upload-demo-'+page).croppie({
						enableExif: true,
					    viewport: {
					        width: 190,
					        height: 190,
					        type: "square"
					    },
					    boundary: {
					        width: 200,
					        height: 200
					    }
					});
				}

				var page_active = "normal";
				createCroppie(page_active);

				$("input[type=radio]").on('change', function () {
				    if (!this.checked) return
				    console.log(this);
					var module = this;
				    $(".collapse").not($("div." + $(this).attr("class"))).slideUp();
				    $(".collapse." + $(this).attr("class")).slideDown(function(){
				    	console.log(module);
				    	$(".upload-picture").croppie('destroy');
						createCroppie($(module).attr("class"));

						if($(module).attr("class")=="expert"){
							console.log(module);
							initExpert();
						}else if($(module).attr("class")=="organization"){
							console.log(module);
							initOrganization();
							// initContactNo();
							// initPostcode();
						}
				    });

					
				});

				$('input.services').click(function(){
			        var inputValue = $(this).attr("rate");
			        $(".rate_wrapper" + inputValue).toggle();
			        if($(".rate_wrapper" + inputValue).css("display") == 'none'){
			        	$(".rate_wrapper" + inputValue +" input").val("");
			        }else{
			        	$(".rate_wrapper" + inputValue +" input").val(0);
			        }
			    });  

			});

		</script>
	  </body>
</html>
