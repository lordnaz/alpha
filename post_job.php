<?php
include("_process.php");

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
                            <div class="col-sm-2">
                                <select name="service2" class="service2" required>                                
                                  
                                </select> 
                            </div>
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
                                <label class="control-label">Kadar Saguhati (min)</label>
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
                                <label class="control-label">Kaedah Pembayaran</label>
                            </div>
                            <div class="col-sm-3" style="margin-top: 7px;">
                                <input type="text" name="kaedah" class="form-control kaedah" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Topik</label>
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
                                <label class="control-label">Kadar Saguhati (min)</label>
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
                                <label class="control-label">Kaedah Pembayaran</label>
                            </div>
                            <div class="col-sm-3" style="margin-top: 7px;">
                                <input type="text" name="kaedah" class="form-control kaedah" key="kaedah" placeholder="Atas Talian" autocomplete="off" readonly /> 
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label">Topik</label>
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
	                    <a  href="javascript:;" class="btn btn-primary job-status-btn view-posted-job">Lihat Tugasan</a>
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

		<script>
			$(document).ready(function(){
				
				var screenHeight, navHeight, dashHeight, keyHeight;
				var fixedNavHeight = 50;
				var paddingTop = 20;
				
				var lang, state, area, service, period, oTable;

				lang = $(".lang").attr("toggle");

				$(".page3, .page4").hide();

				function initWindowsChange(){
					screenHeight 	= $(window).height();
					navHeight		= $(".navbar").height();
					dashHeight		= screenHeight - navHeight;
					dashHeight		= screenHeight - fixedNavHeight;
					
					windowsChange();
				}

				function windowsChange(){

				}

                $(".view-posted-job").click(function(){
                    $(".side-nav-wrapper").removeClass("side-nav-active");
                    $(".job-status-btn").addClass("side-nav-active"); 
                    $(".content").load("job_status.php", function() {
                        // location.hash = "#gohere";
                    });
                });

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


				state 	= <?php echo json_encode($_SESSION["state"]); ?>;
				area 	= <?php echo json_encode($_SESSION["area"]); ?>;
				service = <?php echo json_encode($_SESSION["service"]); ?>;
				period = <?php echo json_encode($_SESSION["period"]); ?>;


				$(".findkuliah").click(function() {
					window.location.href = "index.php";
				});

				$(".bookustaz").click(function() {
					window.location.href = "bookustaz.php";
				});

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
                $("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Daerah" });

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

				$(".goBackPage1").click(function(){

	                $(".page1").show();
					$(".page2").hide();
					$(".page3").hide();
					$(".page4").hide();

	            });

                $(".job-status-btn").click(function(){
                    $(".side-nav-wrapper").removeClass("side-nav-active");
                    $(".job-status-btn").addClass("side-nav-active"); 
                    $(".content").load("job_status.php", function() {
                        // location.hash = "#gohere";
                    });
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
					$("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Daerah" });


					//show perkhidmatan list
					var selectBox = $("select").selectBoxIt();
					$("select.service").selectBoxIt({ autoWidth: false });
					$("select.service").empty();
					$("select.service").data("selectBox-selectBoxIt").add({ value: "", text: "Perkhidmatan" });

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
		     //        "columnDefs": [
					  //   { "width": "45%", "targets": 0 },
					  //   { "width": "25%", "targets": 1 },
					  //   { "width": "10%", "targets": 2 },
					  //   { "width": "10%", "targets": 3 },
					  //   { "width": "10%", "targets": 4 },
					  // ]        
		        })


	            initWindowsChange();

				$(window).resize(function(){
					initWindowsChange();
				});


	  		});
		</script>
    </body>
</html>

