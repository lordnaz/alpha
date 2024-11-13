$(document).ready(function(){

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

});