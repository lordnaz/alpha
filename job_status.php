<?php
include("_process.php");
// $acceptedID = 2;

// if($_SESSION["displayedUserTypeID"]==3){
//     $statusaccept = $process->getExpertKulliyyah($_SESSION["displayedUserID"],$acceptedID);
// }else if($_SESSION["displayedUserTypeID"]==2){
//     $statusaccept = $process->getOrganizerKulliyyah($_SESSION["displayedUserID"],$acceptedID);
// }

// echo $_SESSION["displayedUserID"];
// print_r($statusaccept);
?>


<div class="row">
    <div class="col-md-12 calendarAnchor">
        <h3 class="text-center">Status Tugasan</h3>
        <div class="viewCalendarWrapper">
            <a href="javascript:;" class="calendarOnClick">
                Lihat Kalendar
            </a>
        </div>
    </div>
    <div class="row statusOptionWrapper" jobStatus="accepted">
        <div class="col-md-4">
            <a href="javascript:;">
                <span class="statusOptionButton accepted active" status="accepted">
                    Diterima
                </span>
            </a>
        </div>
        <div class="col-md-4">
            <a href="javascript:;">
                <span class="statusOptionButton pending" status="pending">
                    Dalam Proses
                </span>
            </a>
        </div>
        <div class="col-md-4">
            <a href="javascript:;">
                <span class="statusOptionButton rejected" status="rejected">
                    Ditolak
                </span>
            </a>
        </div>
    </div>
</div>

<section class="jobStatusList table-module-1">
    <!-- <div class="container"> -->
        <div class="row module-1-title">
            
        </div>
        <div class="row">
            <div class="col-md-12 list-of-jobs">
                <table class="table tablelayout display nowrap" cellspacing="0" width="100%" id="mytable">

                </table>
            </div>
        </div>
    <!-- </div> -->
</section>



<section class="jobStatusCalendar">
    <div class="row">
        <div class="col-xs-12">
            <div class="viewJobStatusCalendar"></div>
        </div>
    </div>
</section>



<div class="modal fade organizerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title text-center" contenteditable="false">
                    <span class="orgName" style="font-weight: bold;">

                    </span>
                </h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <img src=" " class="img-responsive orgImage">
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
            <div class="modal-footer">
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
</div>

<div class="modal fade fullCalModal">
    <div class="modal-dialog calendar-modal-dialog">
        <div cass="row">
            <div class="modal-content">
                <div class="modal-header kuliah-details text-center">
                    <span class="">
                        KULIAH SUBUH
                    </span>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span> <span class="sr-only">close</span>
                    </button>
                    <h4 id="modalTitle" class="modal-title"></h4>
                </div>
                <div id="modalBody" class="modal-body kuliah-details">
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
                                <span class="x_organizerName">

                                </span><br />
                                <span class="x_organizerAddress">

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

                        <div class="col-xs-6 right-border">
                            <div class="modalBookedWrapper">
                                <span class="centerlabel">
                                    Ditempah oleh:
                                </span><br />
                                <span class="x_organizerName centerData">

                                </span>
                            </div>
                        </div>
                        <div class="col-xs-6 left-border">
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
                                    <span class="personal profile-image" style="height: 219.5px; background: url('upload/2/profile.jpg') no-repeat top center; background-size: cover;">                                    
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


<script type="text/javascript">
    $(document).ready(function(){



        var userID = <?php echo json_encode($_SESSION["displayedUserID"]); ?>;

        $(".insertJobStatus").on("click", ".openOrganizerModal", function(){
            var userID = $(this).attr("organizerID");
            console.log(userID);

            var obj = $(".openOrganizerModal");
            if(!obj.hasClass("disabled"))
            {
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

                            $(".orgLink").attr("href","javascript:;");
                            $(".orgLink").attr("href","personalmasjid.php?viewUserID="+response[1]+"&levelID=2");

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

                            $(".orgOtherLink").empty();
                            if(response[9]){
                                $(".orgOtherLink").html("<a href='"+response[9]+"' target='_blank'>"+response[9]+"</a>");
                            }

                            if(response[10]||response[11]||response[12]){
                                $(".orgLinkTitle").html("Ikuti Penganjur di:");
                            }else{
                                $(".orgLinkTitle").empty();
                            }

                            $(".orgFacebookLink").empty();
                            if(response[10]){
                                $(".orgFacebookLink").html("<a href='"+response[10]+"' target='_blank'><i class='-square fa fa-2x fa-facebook-square fa-fw'></i></a>");
                            }

                            $(".orgYoutubeLink").empty();
                            if(response[11]){
                                $(".orgYoutubeLink").html("<a href='"+response[11]+"' target='_blank'><i class='-play fa fa-2x fa-fw fa-youtube-play'></i></a>");
                            }

                            $(".orgInstagramLink").empty();
                            if(response[12]){
                                $(".orgInstagramLink").html("<a href='"+response[12]+"' target='_blank'><i class='fa fa-2x fa-fw fa-instagram'></i></a>");
                            }                             

                        }else{

                        }
                        obj.removeClass("disabled");
                    }

                });
            }
            else
            {
                alert("Error");
            }

        });

        var jobStatus   = <?php echo json_encode($_SESSION["jobStatus"]); ?>;

        function initLoading(){
            status = jobStatus;

            $(".statusOptionButton").removeClass("active");                
            $("."+status+"").addClass("active");

            canceling = $.ajax({
                type:"POST",
                url: "ajax_jobs.php",
                data: "&userID="+userID+"&status="+status,                                  
                cache:true,
                success:function(html){
                    console.log(html);
                    $(".list-of-jobs").html(html);
                    console.log("success ajax")

                    var oTable = $('#mytable').DataTable({
                        "aoColumnDefs": [ 
                            { "bSortable": false, "aTargets": [ 0,1,2,3,4 ] },
                        ] ,

                        responsive: true
                    });
                }
            })
        }

        initLoading();

        $(".statusOptionButton").click(function(){
            status = $(this).attr("status");

            if(!$(this).hasClass("active")){
                console.log("clik okey: "+status);

                $(".statusOptionButton").removeClass("active");                
                $(this).addClass("active");

                canceling = $.ajax({
                    type:"POST",
                    url: "ajax_jobs.php",
                    data: "&userID="+userID+"&status="+status,                                  
                    cache:true,
                    success:function(html){
                        console.log(html);
                        $(".list-of-jobs").html(html);
                        console.log("success ajax")

                        var oTable = $('#mytable').DataTable({
                            "aoColumnDefs": [ 
                                { "bSortable": false, "aTargets": [ 0,1,2,3,4 ] },
                            ] ,

                            responsive: true
                        });
                    }
                })
            }            
        });

        // $(document).on("click", ".calendarOnClick", function() {
        // $(".jobStatusCalendar").on("click", ".calendarOnClick", function(){


        var element = $(this);
        var map;

        function initialize(myCenter) {
            var marker = new google.maps.Marker({
                position: myCenter
            });

            var mapProp = {
                center: myCenter,
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("map"), mapProp);
            marker.setMap(map);
        };

        $('input[name=jobType]').change(function(){
            var value = $( 'input[name=jobType]:checked' ).val();
            var obj = $(".jobTypeWrapper");

            if(!obj.hasClass("disabled"))
            {
                obj.addClass("disabled");
                $("input[name=jobType]").attr("disabled", false);

                canceling = $.ajax({
                    type:"POST",
                    url: "ajax_jobs.php",
                    data: "value="+value,
                    cache:true,
                    success:function(data){
                        console.log(data);
                        var response = data.split("|");
                            if(response[0]==2){

                            }else{
                              
                            }

                              obj.removeClass("disabled");
                              $("input[name=jobType]").removeAttr("disabled");
              
                          
                    }
                })
            }
        });

       

        var jobStatus;
        $(".calendarOnClick").click(function(){

            // alert("test");
            $(".jobStatusList").toggle();
            $(".jobStatusCalendar").toggle();

            jobStatus = $(".statusOptionWrapper").attr("jobStatus");

            canceling = $.ajax({
                url:'ajax_calendar.php',
                method:'POST',
                data: "&userID="+userID+"&status="+jobStatus,
                success:function(data){

                    console.log("data: ");
                    console.log(data);

                    $('.jobStatusCalendar').fullCalendar( 'destroy' );

                    viewCalendar(userID,jobStatus);
                    $('.jobStatusCalendar').fullCalendar('render');
                }

            });
            
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
                    $(".x_organizerName").html(event.organizerName);
                    $(".x_organizerAddress").html(event.address);

                    
                    $(".username").html(event.username);
                    $(".startTime").html(event.starttime);
                    $(".endTime").html(event.endtime);
                    $(".attendance").html(event.attendance);
                    $(".phoneNumber").html(event.phonenumber);
                    $(".eventUrl").attr("href",event.link+"?viewUserID="+event.speakerID);
                    if(event.note==""){                
                        $(".noteBox").html("Tiada Maklumat");
                    }else{
                        $(".noteBox").html(event.note);
                    }

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

        $(window).resize(function(){
            $(".mapWrapper").height(function(){
                return $(this).width();
            });
        });






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
                                    //  $(".orgOtherLink").html("<a href='"+response[9]+"' target='_blank'>"+response[9]+"</a>");
                                    // }

                                    // if(response[10]||response[11]||response[12]){
                                    //  $(".orgLinkTitle").html("Ikuti Penganjur di:");
                                    // }else{
                                    //  $(".orgLinkTitle").empty();
                                    // }

                                    // $(".orgFacebookLink").empty();
                                    // if(response[10]){
                                    //  $(".orgFacebookLink").html("<a href='"+response[10]+"' target='_blank'><i class='-square fa fa-2x fa-facebook-square fa-fw'></i></a>");
                                    // }

                                    // $(".orgYoutubeLink").empty();
                                    // if(response[11]){
                                    //  $(".orgYoutubeLink").html("<a href='"+response[11]+"' target='_blank'><i class='-play fa fa-2x fa-fw fa-youtube-play'></i></a>");
                                    // }

                                    // $(".orgInstagramLink").empty();
                                    // if(response[12]){
                                    //  $(".orgInstagramLink").html("<a href='"+response[12]+"' target='_blank'><i class='fa fa-2x fa-fw fa-instagram'></i></a>");
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
                //  $(".expLinkTitle").html("Ikuti Pendakwah di:");
                // }else{
                //  $(".expLinkTitle").empty();
                // }

                // $(".expFacebookLink").empty();
                // if(response[9]){
                //  $(".expFacebookLink").html("<a href='"+response[9]+"' target='_blank'><i class='-square fa fa-2x fa-facebook-square fa-fw'></i></a>");
                // }

                // $(".expYoutubeLink").empty();
                // if(response[10]){
                //  $(".expYoutubeLink").html("<a href='"+response[10]+"' target='_blank'><i class='-play fa fa-2x fa-fw fa-youtube-play'></i></a>");
                // }

                // $(".expInstagramLink").empty();
                // if(response[11]){
                //  $(".expInstagramLink").html("<a href='"+response[11]+"' target='_blank'><i class='fa fa-2x fa-fw fa-instagram'></i></a>");
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
    }

});       

    });
</script>
