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
		<section class="table-module-1 page1">

			<div class=" ">
				<div class="row module-1-title">
				<br/>
					<h2 class="text-center">Carian Tugasan</h2>
				<br/>
					<form enctype='multipart/form-data' action="ustazfinder.php" method='post' onsubmit="return true"  accept-charset='UTF-8' name="key-landing" class="filter-job">

						<div class="row hr-wrapper">
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
                                <input type="text" name="from" class="form-control new-style from tr" key="from" placeholder="" autocomplete="off" readonly />
	                        </div>
	                        <div class="col-sm-2">
                                <input type="text" name="to" class="form-control new-style to tr" key="to" placeholder="" autocomplete="off" readonly />
	                        </div>
		                    <div class="col-sm-2">
		                    	<input type="submit" name="search" value="Cari" class="btn btn-block btn-primary form-control button tr filter_ustaz" key="search" />
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
	                            <td colspan="7"></td>
	                        </tr>                          
						</table>
					</div>
				</div>

			</div>
		</section>

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

				$(".page2, .page3, .page4").hide();

				function initWindowsChange(){
 
					
					windowsChange();
				}

				function windowsChange(){
				 
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
                                                    // $(this).closest("tr").remove();
                                                    // var response = data.split("|");
                                                    // if(response[1]==1)
                                                    // {
                                                        
                                                    // }
                                                                                               
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

