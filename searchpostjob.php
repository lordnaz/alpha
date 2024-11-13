<?php
include("_process.php");
include("moduleheader.php");

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

		<section style="background-color: #f8f8f8;">
		<br/>
		<br/>
			<div class="section" style="background-color: #f8f8f8;">
	            <div class="container">
	                
	                <div class="row marginbtm hijau-btn">
	                    <div class="col-md-offset-2">
	                        <div class="col-md-10">
	                            <div class="btn-group btn-group-justified hijau">
	                                <a class="btn btn-default carian" id="carian" style="border-color: #9013fe; color: #9013fe">Carian Tugasan</a>
	                                <a class="btn btn-default tawaran" id="tawaran" style="border-color: #9013fe; color: #9013fe">Tawar Tugasan</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
    
            </div>
			
		</section>

		<section class="table-module-1 page1" style="background-color: #f8f8f8;">

			<div class="container">
				<div class="row module-1-title">
				<br/>
					<h2 class="text-center tr" style="font-family: lust_prono_5; color: #606272;">Carian Tugasan</h2>
				<br/>
					<form enctype='multipart/form-data' action="ustazfinder.php" method='post' onsubmit="return true"  accept-charset='UTF-8' name="key-landing" class="key-landing-wrapper filter-job">

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
			                        <div class="col-sm-2">
		                                <select name="service" class="form-control service">

	                                    </select>	
			                        </div>               
			                        
			                        <div class="col-sm-2">
		                                <input type="text" name="from" class="form-control from tr sync_box" key="from" placeholder="" autocomplete="off" readonly />
			                        </div>
			                        <div class="col-sm-2">
		                                <input type="text" name="to" class="form-control to tr sync_box" key="to" placeholder="" autocomplete="off" readonly />
			                        </div>
			                    </div>
			                </div>
		                    <div class="col-sm-2">
		                    	<input type="submit" name="search" value="search" class="btn btn-block btn-primary form-control button tr filter_ustaz" key="search" />
		                    </div>
	                    </div>

		       		</form> 
					<br/>
	                    <br/>
				</div>

				<div class="row">
					<div class="col-md-12 claim-job">
						<br/>

						<table class="table tablelayout display nowrap" cellspacing="0" width="100%" id="mytable">		
							<tr>
	                            <td colspan="7">Tiada Maklumat Di Dalam Enjin Carian</td>

	                        </tr>                          
						</table>
					</div>
				</div>

			</div>
		</section>

		<form enctype="multipart/form-data" method="post" onsubmit="return false" accept-charset='UTF-8' name="book_form" class="form-horizontal create_event">
		<div class="section page2" id="page2" style="background-color: #f8f8f8;">
        
            <div class="container">
                <div class="row" id="post">
                    <div class="col-md-12">
                        <h3 class="text-center" style="font-family: lust_prono_5; color: #606272;">Butiran Tugasan
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
                            <div class="col-sm-2">

                                <select name="service2" class="service2" required>                                
                                  
                                </select>  

                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="tarikh3" class="form-control tarikh3 sync_box" key="tarikh3" id="tarikh3" placeholder="" autocomplete="off" readonly />                           
                            </div>
                            <div class="col-sm-2">
                                <select name="period2" class="form-control period2">
                                  
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Kadar Saguhati (min)</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kadar" class="form-control kadar sync_box">
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label" style="padding-left: 70px;">Anggaran Kedatangan</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kedatangan" class="form-control kedatangan sync_box">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Keadah Pembayaran</label>
                            </div>
                            <div class="col-sm-3" style="margin-top: 7px;">
                                <input type="text" name="kaedah" class="form-control kaedah sync_box" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label" style="padding-left: 70px;">Tajuk (untuk Ceramah)</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="topik" class="form-control topik sync_box">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Maklumat Tambahan</label>
                            </div>
                            <div class="col-sm-9">
                                <textarea class="form-control tambahan textarea_box" id="tambahan" name="tambahan" rows="5" cols="50"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Jenis Tempahan : </label>
                            </div>
                            <div class="radio">
                                <div class="col-sm-5" style="padding-left: 35px;">
                                    <input type="radio" placeholder="Terbuka" name="optionsRadios" value="1" unchecked="">
                                    <b>Terbuka</b>- Semua penceramah boleh tuntut tawaran kerja.
                                </div>
                                <div class="col-sm-5" style="padding-left: 29px;">
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

    	<div class="section page3" id="page3" style="background-color: #f8f8f8;">
        
            <div class="container">
                <div class="row" id="post">
                    <div class="col-md-12">
                        <h3 class="text-center" style="font-family: lust_prono_5;">Butiran Tugasan
                            <br>
                            <br>
                        </h3>
                       
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Maklumat Majlis</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="state3" class="form-control state3 sync_box" key="state3" placeholder="" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="area3" class="form-control area3 sync_box" key="area3" placeholder="" autocomplete="off" readonly /> 
                            </div>                            
                            <div class="col-sm-2">

                                <input type="text" name="service3" class="form-control service3 sync_box" key="service3" placeholder="" autocomplete="off" readonly /> 

                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="tarikh3" class="form-control tarikh3 sync_box" key="tarikh3" placeholder="" autocomplete="off" readonly />                           
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="period3" class="form-control period3 sync_box" key="period3" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Kadar Saguhati (min)</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kadar2" class="form-control kadar2 sync_box" key="kadar2" placeholder="" autocomplete="off" readonly />
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label" style="padding-left: 70px;">Anggaran Kedatangan</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="kedatangan2" class="form-control kedatangan2 sync_box" key="kedatangan2" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Keadah Pembayaran</label>
                            </div>
                            <div class="col-sm-3" style="margin-top: 7px;">
                                <input type="text" name="kaedah" class="form-control kaedah sync_box" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label" style="padding-left: 70px;">Tajuk (untuk Ceramah)</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="topik2" class="form-control topik2 sync_box" key="topik2" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Maklumat Tambahan</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" name="tambahan2" class="form-control tambahan2 textarea_box" key="tambahan2" placeholder="" autocomplete="off" readonly />
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label">Jenis Tempahan :</label>
                                </div>
                                <div class="radio2">
                                    <div class="col-sm-5" style="padding: 9px;">
                                        <input type="radio" name="optionsRadios" value="1" readonly="">
                                        <b>Terbuka</b>- Semua penceramah boleh tuntut tawaran kerja.
                                    </div>
                                <div class="col-sm-5" style="padding: 9px">
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


		<aside class="modal fade login-modal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-md-12 text-center">
                			<a class="btn btn-secondary btn-lg q-btn-secondary tr" key="continue" data-dismiss="modal"></a>
              			</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<form enctype='multipart/form-data' method='post' onsubmit="return false"  accept-charset='UTF-8' name="login_form" class="login_form text-center">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" maxlength="255" name="email"  placeholder="" />
										</div>
						            </div>
						            <div class="form-group">
						            	<div class="input-group">
											<input type="password" class="form-control" maxlength="255" name="password" placeholder="" />
										</div>
						            </div>
						            <button type="submit" class="btn btn-secondary l-btn-secondary tr" key="login">
						            	
						            </button>
						        </form>
						    </div>
						    <div class="col-md-6  login-desc">
								<div class="tr" key="whylogin">

								</div>
								<div class="tr" key="loginexplaination">
									
								</div>
						    </div>
						</div>
					</div>
					<!-- <div class="modal-footer">

					</div> -->
				</div>
			</div>
		</aside>


		<?php
            include_once "footer.php";
        ?>

		

		<script src="js/jquery-3.2.1.js"></script>		
		<script src="js/jquery-ui.js"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script src="js/bootstrap-3.3.7.js"></script>
		<script src="js/moment.js"></script>
		<script src="js/jquery.selectBoxIt.js?v=1.0001"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/datatables.js"></script>
		<script src="js/less.js?v=1.0002"></script>
		<script src="js/lang.js?v=1.0014"></script>

		<script>
			$(document).ready(function(){
				
				var screenHeight, navHeight, dashHeight, keyHeight;
				var fixedNavHeight = 50;
				var paddingTop = 20;
				
				var lang, state, area, service, period, oTable;

				lang = $(".lang").attr("toggle");

				$(".page2, .page3, .page4").hide();

				function initWindowsChange(){
					screenHeight 	= $(window).height();
					navHeight		= $(".navbar").height();
					dashHeight		= screenHeight - navHeight;
					dashHeight		= screenHeight - fixedNavHeight;
					
					windowsChange();
				}

				function windowsChange(){
					// if($(".dashboard-header").hasClass("init")){
					// 	$(".dashboard-header").css("height",dashHeight);
					// }else{
					// 	keyHeight	= $(".key-function").outerHeight();
					// 	$(".dashboard-header").css({"min-height":keyHeight+paddingTop,"height":keyHeight+paddingTop});
					// 	$(".dashboard-desc").css("display","none");
					// }
				}

				$(function () {
	                $(".tarikh").datepicker({
	                    format: "dd-mm-yyyy",
					    todayBtn: "linked",
					    clearBtn: true,
					    forceParse: false,
					    startDate: "01-01-1960",
					    endDate: "01-01-2099",
					    todayHighlight: true
	                })
	            });

				// initWindowsChange();

				// $(window).resize(function(){
				// 	initWindowsChange();
				// });

				state 	= <?php echo json_encode($_SESSION["state"]); ?>;
				area 	= <?php echo json_encode($_SESSION["area"]); ?>;
				service = <?php echo json_encode($_SESSION["service"]); ?>;
				period = <?php echo json_encode($_SESSION["period"]); ?>;

				$(function(){
					$(".login_form").validate({
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
							var obj = $(".login_form");
							if(!obj.hasClass("disabled"))
							{
								obj.addClass("disabled");
								var serializeData = obj.serialize()
								
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

											if(response[2]==1){
												setTimeout(function() {
													window.location.href = "personalgeneral.php";
												}, 500);
											}else if(response[2]==2){
												setTimeout(function() {
													window.location.href = "personalmasjid.php";
												}, 500);

											}else if(response[2]==3){
												setTimeout(function() {
													window.location.href = "personalustaz.php";
												}, 500);

											}else{
												
											}
				                        }else{

				                        }

				                        obj.removeClass("disabled");
				                    }
				                })
							}
						}
					})
				});

				// $(".go-to").click(function() {
				// 	// On-page links
				// 	var target = $(this).attr("go-to");
				// 	// target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				// 	// Does a scroll target exist?
				// 	if (target.length) {
				// 		// Only prevent default if animation is actually gonna happen
				// 		event.preventDefault();
				// 		$('html, body').animate({
				// 		  scrollTop: $("."+target).offset().top
				// 		}, 1000, function() {
				// 		  // Callback after animation
				// 		  // Must change focus!
						  
				// 		});
				// 	}
				// });


				$(".findkuliah").click(function() {
					window.location.href = "index.php";
				});

				$(".bookustaz").click(function() {
					window.location.href = "bookustaz.php";
				});

				$(".tawaran").click(function() {
					
					$(".page2").show();
					$(".page1").hide();
					$(".page3").hide();
					$(".page4").hide();

					//Negeri
					var selectBox = $("select").selectBoxIt();
					$("select.state2").selectBoxIt({ autoWidth: false });
					$("select.state2").empty();
					$("select.state2").data("selectBox-selectBoxIt").add({ value: "", text: "Negeri" });

					for (var i = 0, len = state.length; i < len; i++) {
						$("select.state2").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
					}

					//Area
					$("select.area2").selectBoxIt({ autoWidth: false });
					$("select.area2").empty();
					$("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Kawasan" });

					//show perkhidmatan list
					
					$("select.service2").selectBoxIt({ autoWidth: false });
					$("select.service2").empty();

					for (var i = 0, len = service.length; i < len; i++) {
                      $(".service2").data("selectBox-selectBoxIt").add({ value: service[i]["id"], text: service[i]["service"]});
                    }

                    //show sesi/period list
									
					$("select.period2").selectBoxIt({ autoWidth: false });
					$("select.period2").empty();
					$("select.period2").data("selectBox-selectBoxIt").add({ value: "", text: "Sesi" });

					for (var i = 0, len = period.length; i < len; i++) {
                      $(".period2").data("selectBox-selectBoxIt").add({ value: period[i]["id"], text: period[i]["period"]});
                    }

				});

				$(".carian").click(function() {
					
					$(".page1").show();
					$(".page2").hide();
					$(".page3").hide();
					$(".page4").hide();

				});

				$(".goBackPage1").click(function(){

	                $(".page1").show();
					$(".page2").hide();
					$(".page3").hide();
					$(".page4").hide();

	            });

				$(".send_button").click(function(){
                        // var statew = $(".stateName option:selected").attr("stateName");
                        // var state = $(".stateName").attr("stateName");
                        // var area2 = $(".area2").attr("areaName");
                        // var nameustaz = $(".nameustaz").val();
                        var state = $(".state2 option:selected").text();
                        var area = $(".area2 option:selected").text();
                        var service = $(".service2 option:selected").text();
                        var tarikh = $(".tarikh3").val();
                        var period = $(".period2 option:selected").text();
                        
                        // var service = $(".serviceName").attr("serviceName");
                        // var service = $(".service option:selected").text();
                        var kadar = $(".kadar").val();
                        var kedatangan = $(".kedatangan").val();
                        var topik = $(".topik").val();
                        var tambahan = $("textarea#tambahan").val();

                        var radio = $('input[name=optionsRadios]:checked').val()

                        // $('.page1').hide();
                        $('.page2').hide();
                        $('.page3').show();

                            
                        // $(".nameustaz2").val(nameustaz);
                        $(".state3").val(state);
                        $(".area3").val(area);
                        $(".service3").val(service);
                        $(".tarikh3").val(tarikh);
                        $(".period3").val(period);
                        $(".kadar2").val(kadar);
                        $(".kedatangan2").val(kedatangan);
                        $(".topik2").val(topik);
                        $(".tambahan2").val(tambahan);  

                        $("input[name=optionsRadios][value=" + radio + "]").prop('checked', true);                   

                });


                $(".back_button").click(function(){

	                $(".page1").hide();
					$(".page2").show();
					$(".page3").hide();
					$(".page4").hide();

	            });


	            $(".create_event").validate({
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
		                      required: true
		                  },
		              } ,
		              submitHandler: function()
		              {
		                  var obj = $(".create_event");
		                  if(!obj.hasClass("disabled")){
		                      obj.addClass("disabled");
		                      var serializeData = obj.serialize();

		                      canceling = $.ajax({
		                          url:'ajax_bookconfirm.php',
		                          method:'POST',
		                          data: serializeData,
		                          success:function(book){
		                            console.log(book);
                                    console.log("Success Book");

		                              // $('.page2').html(book);
		                              // $(".page3").html(book);
		                              // $(".page2").hide();
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
					$("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Kawasan" });


					//show perkhidmatan list
					var selectBox = $("select").selectBoxIt();
					$("select.service").selectBoxIt({ autoWidth: false });
					$("select.service").empty();
					//$("select.service").data("selectBox-selectBoxIt").add({ value: "", text: "Perkhidmatan" });

					for (var i = 0, len = service.length; i < len; i++) {
                      $(".service").data("selectBox-selectBoxIt").add({ value: service[i]["id"], text: service[i]["service"]});
                    }


                    //show sesi/period list
					var selectBox = $("select").selectBoxIt();
					$("select.period").selectBoxIt({ autoWidth: false });
					$("select.period").empty();
					$("select.period").data("selectBox-selectBoxIt").add({ value: "", text: "Sesi" });

					for (var i = 0, len = period.length; i < len; i++) {
                      $(".period").data("selectBox-selectBoxIt").add({ value: period[i]["id"], text: period[i]["period"]});
                    }

				});


				$(".state").change(function (){
					
					var state = $(this).val();

					$("select.area").selectBoxIt();
					$("select.area").empty();
					$("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Kawasan" });

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
					$("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Kawasan" });

					for (var i = 0, len = area.length; i < len; i++) {
						if(area[i]["state_id"]==state){
							$("select.area2").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
						}
					}

				});

				$(function () {
	                $(".from").datepicker({
	                    format: "dd-mm-yyyy",
					    todayBtn: "linked",
					    clearBtn: true,
					    forceParse: false,
					    startDate: "01-01-1960",
					    endDate: "01-01-2099",
					    todayHighlight: true
	                }).on("changeDate", function(selected){
				        startDate = new Date(selected.date.valueOf());
				        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
				        $(".to").datepicker("setStartDate", startDate);
				    }); 
	            });

				$(function () {
	                $(".to").datepicker({
	                    format: "dd-mm-yyyy",
					    todayBtn: "linked",
					    clearBtn: true,
					    forceParse: false,
					    startDate: "01-01-1960",
    					endDate: "01-01-2099",
					    todayHighlight: true
	                }).on("changeDate", function(selected){
				        FromEndDate = new Date(selected.date.valueOf());
				        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
				        $(".from").datepicker("setEndDate", FromEndDate);
				    });  
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


	            $(".filter-job").validate({
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
	                    var obj = $(".filter-job");
	                    if(!obj.hasClass("disabled"))
	                    {
	                        obj.addClass("disabled");
	                        var serializeData = obj.serialize();
	                        console.log(serializeData);

	                        canceling = $.ajax({
			                    type:"POST",
			                    url: "ajax_findjob.php",
			                    data: serializeData,			                    	
			                    cache:true,
			                    success:function(html){
			                    	console.log(html);
		                    		$('.claim-job').html(html);
	                                console.log("success ajax")

	                                var oTable = $('#mytable').DataTable({
	                                    "aoColumnDefs": [ 
	                                    	{ "bSortable": false, "aTargets": [ 0,1,2,3,4 ] },
          									// { sWidth: "20%", aTargets: [  0,1,2,3,4 ] }, // aTargets is an array of which columns (starting at 0) to apply this definition to. 3 is the 4th column. you can specify multiple columns like [0, 1, 3, 8]
	                                    ] ,

										// rowReorder: {
										// 	selector: 'td:nth-child(2)'
										// },

	                                      responsive: true
	                                });

                                    $("#mytable").on("click",".claim", function(){

                                        var jobtype = $(this).attr("jobtype");
                                        var event_id = $(this).attr("event_id");
                                        // var start_normal = $(this).attr("start_normal")

                                        var table = $('#mytable').DataTable();
                                        var row  = $(this).parents('tr')[0];

                                        console.log(this);
                                        console.log("jobtype: " + jobtype);
                                        console.log("event ID: " + event_id);
                                        // console.log("start time: "+ start_normal);

                                        if(jobtype == 1){

                                            $.ajax({
                                                url:"ajax_claimterbuka.php",
                                                method:'POST',
                                                data:{jobtype, event_id},
                                                success:function(terbuka){
                                                    console.log(terbuka);
                                                    table.row(row).remove().draw( false );
                                                    
                                                    var response = data.split("|");
                                                    if(response[1]==1)
                                                    {
                                                        
                                                    }
                                                                                               
                                                }
                                            })

                                            console.log("Terbuka Job Claim Function");
                                        }

                                        else if(jobtype == 2){

                                            $.ajax({
                                                url:"ajax_claimpilihan.php",
                                                method:'POST',
                                                data:{jobtype, event_id},
                                                success:function(terbuka){
                                                    console.log(terbuka);
                                                
                                                }
                                            })

                                            console.log("Pilihan Job Claim Function");
                                        }

                                        else{
                                            console.log("Undefined Job Type?");
                                        }

                                        // var row  = $(this).parents('tr')[0];

                                        // table.row(row).remove().draw( false );
                                    })

			                        obj.removeClass("disabled");
			                    }
			                })



	      //                   keyHeight	= $(".key-function").outerHeight();
							// $(".dashboard-header").removeClass("init");
							// $(".dashboard-desc").fadeOut("slow",function(){
							// 	// Animation complete.
							// });

							// $(".dashboard-header").css("min-height",keyHeight+paddingTop);
							// $(".module-1-title").html('<div class="col-md-12"><h1 class="text-center">Kulliyyah Finder</h1></div>');
							// $(".table-module-1").css({"margin":"25px 0"});
							// $(".dashboard-header").animate({height:keyHeight+paddingTop},1000,function(){
							// 	$(".landing-dashboard-wrapper").css("background-image","none");
							// 	$(".landing-info-wrapper").fadeOut("slow",function(){
							// 		// Animation complete.
							// 	});
							// });

							

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
		            "columnDefs": [
					    { "width": "45%", "targets": 0 },
					    { "width": "25%", "targets": 1 },
					    { "width": "10%", "targets": 2 },
					    { "width": "10%", "targets": 3 },
					    { "width": "10%", "targets": 4 },
					  ]        
		        })


	            initWindowsChange();

				$(window).resize(function(){
					initWindowsChange();
				});


	  		});
		</script>
    </body>
</html>

