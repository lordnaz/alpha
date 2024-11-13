
				$(function(){
					$(".organization_registration_form").validate({
						ignore: "",
						rules:
						{
							"email": {
								required: true, email: true
							},
							"password": {
								required: true, minlength: 7
							},
							"repassword": {
								required: true, equalTo: ".password2", minlength: 7
							},
				            "fullname": {
				                required: true
				            },
				            "address": {
				                required: true
				            },
				            "postcode": {
				                required: true
				            },
				            "state": {
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

							if(!obj.hasClass("disabled"))
							{
								obj.addClass("disabled");
								var serializeData = obj.serialize();
								serializeData = serializeData;
								canceling = $.ajax({
				                    type:"POST",
				                    url: "ajax_register.php",
				                    data: serializeData+"&level="+level,
				                    cache:true,
				                    success:function(data){
				                    	var response = data.split("|");
				                    	if(response[0]==2){
				                    		setTimeout(function() {
												window.location.href = "index.php";
											}, 1000);
				                        }else if(response[0]==1){
				                        	// alert(test);
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
								required: true, minlength: 7
							},
							"repassword": {
								required: true, equalTo: ".password3", minlength: 7
							},
							"title": {
				                required: true
				            },
				            "fullname": {
				                required: true
				            },
				            "phone": {
				                required: true
				            },
				            "tauliah": {
				                required: true
				            },
				            "nric": {
				                required: true
				            },
				            "education": {
				                required: true
				            },
				            "state": {
				                required: true
				            },
				            "area": {
				                required: true
				            },
				            "bank": {
				                required: true
				            },
				            "account": {
				                required: true
				            }			
						},
						submitHandler: function()
						{
							var obj = $(".expert_registration_form");

							var level = $("input[name=level]:checked").val();

							if(!obj.hasClass("disabled"))
							{
								obj.addClass("disabled");
								var serializeData = obj.serialize();
								console.log(serializeData);
								serializeData = serializeData;
								canceling = $.ajax({
				                    type:"POST",
				                    url: "ajax_register.php",
				                    data: serializeData+"&level="+level,
				                    cache:true,
				                    success:function(data){
				                    	console.log(data);
				                    	var response = data.split("|");
				                    	if(response[0]==2){
				                    		setTimeout(function() {
												window.location.href = "index.php";
											}, 1000);
				                        }else if(response[0]==1){
				                        	// alert(test);
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
			                

						}
					})
				})



$("select.title2").selectBoxIt({ autoWidth: false });
	                $("select.title2").empty();
	                $("select.title2").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = title.length; i < len; i++) {
	                    $("select.title2").data("selectBox-selectBoxIt").add({ value: title[i]["id"], text: title[i]["title"]});
	                }



	                $("select.state2").selectBoxIt({ autoWidth: false });
	                $("select.state2").empty();
	                $("select.state2").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = state.length; i < len; i++) {
	                    $("select.state2").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
	                }

	                $("select.area2").selectBoxIt({ autoWidth: false });
	                $("select.area2").empty();
	                $("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                $("select.addressState").selectBoxIt({ autoWidth: false });
	                $("select.addressState").empty();
	                $("select.addressState").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = state.length; i < len; i++) {
	                    $("select.addressState").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
	                }

	                $("select.addressState2").selectBoxIt({ autoWidth: false });
	                $("select.addressState2").empty();
	                $("select.addressState2").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = state.length; i < len; i++) {
	                    $("select.addressState2").data("selectBox-selectBoxIt").add({ value: state[i]["state_id"], text: state[i]["state"]});
	                }

	                $("select.bank").selectBoxIt({ autoWidth: false });
	                $("select.bank").empty();
	                $("select.bank").data("selectBox-selectBoxIt").add({ value: "", text: "Sila Pilih" });

	                for (var i = 0, len = bank.length; i < len; i++) {
	                    $("select.bank").data("selectBox-selectBoxIt").add({ value: bank[i]["id"], text: bank[i]["bank"]});
	                }




	                $(".state2").change(function (){
	                
	                var state = $(this).val();

	                $("select.area2").selectBoxIt();
	                $("select.area2").empty();
	                $("select.area2").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih Kawasan" });

	                console.log(area);

	                for (var i = 0, len = area.length; i < len; i++) {
	                    if(area[i]["state_id"]==state){
	                        $("select.area2").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
	                    }
	                }

	            });




















                    if (isset($_POST["fullname"])){                 
                        $fullname = $_POST["fullname"];
                    }

                    if (isset($_POST["address"])){                 
                        $address = $_POST["address"];
                    }

                    if (isset($_POST["postcode"])){  
                        $postcode = $_POST["postcode"];
                    }

                    if (isset($_POST["addressState"])){                 
                        $addressstate = $_POST["addressState"];
                    }

                    if (isset($_POST["phone"])){  
                        $phone = $_POST["phone"];
                    }

                    if (isset($_POST["facebook"])){                 
                        $facebook = $_POST["facebook"];
                    }

                    if (isset($_POST["youtube"])){                 
                        $youtube = $_POST["youtube"];
                    }

                    if (isset($_POST["instagram"])){                 
                        $instagram = $_POST["instagram"];
                    }

                    if (isset($_POST["other_link"])){                 
                        $other = $_POST["other_link"];
                    }

                    $process->insertOrganizer($level,$email,$password,$fullname,$address,$postcode,$addressstate,$phone,$facebook,$youtube,$instagram,$other);

                    echo 2;	                