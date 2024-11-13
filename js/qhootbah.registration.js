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

		var canceling;

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
            $("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih Kawasan" });

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
            $("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih Kawasan" });

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
            $("select.area3").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih Kawasan" });

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
		    $(".collapse").not($("div." + $(this).attr("class"))).slideUp();
		    $(".collapse." + $(this).attr("class")).slideDown();

			$(".upload-picture").croppie('destroy');
			createCroppie($(this).attr("class"));

			if($(this).attr("class")=="expert"){
				initExpert();
			}else if($(this).attr("class")=="organization"){
				initOrganization();
				// initContactNo();
				// initPostcode();
			}
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
