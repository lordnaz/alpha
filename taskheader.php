<?php
    include("_process.php");

    if(isset($_POST["state"])){
        $negeri     = $_POST['state'];
        $daerah     = $_POST['area'];
        $start      = $_POST['start'];
        $end        = $_POST['end'];
        $khidmat    = $_POST['service'];

        $postdata = $process->searchJobList($negeri,$daerah,$start,$end,$service);
    }

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.alphabetSearch.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.selectBoxIt.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
        <link rel="stylesheet" type="text/css" href="css/fullcalendar.css" />
        <!-- <link rel="stylesheet" href="css/fullcalendar.print.css" media="print"> -->

        
        <link rel="stylesheet" type="text/css" href="css/style_temp.css?v=1.0001">
        <link rel="stylesheet" type="text/css" href="css/style.css?v=1.0010">
        <link href="css/TaskHeader.css?v=1.0001" rel="stylesheet" type="text/css">
        <link href="css/SearchPostJobContent.css" rel="stylesheet" type="text/css">
        <!-- <link rel="stylesheet" type="text/css" href="css/index.css?v=1.0002">
        <link rel="stylesheet" type="text/css" href="css/main.css?v=1.0003"> -->
        <link rel="stylesheet" href="css/croppie.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.css" rel="stylesheet" type="text/css">


        

        <script type="text/javascript" src="js/libs/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="js/libs/jquery-ui.js"></script>
        <script type="text/javascript" src="js/libs/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="js/libs/moment.js"></script>

        <script type="text/javascript" src="js/libs/bootstrap.js"></script>
        <!-- <script type="text/javascript" src="js/libs/jquery.selectBoxIt.js"></script>       -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.selectboxit/3.8.0/jquery.selectBoxIt.min.js"></script>   
        <script type="text/javascript" src="js/libs/jquery.datetimepicker.full.min.js"></script>
        <script type="text/javascript" src="js/libs/jquery.validate.js"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="js/dataTables.alphabetSearch.min.js"</script>
        <script src="js/croppie.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.4.1/croppie.js"></script>
        


        <script src="js/general.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                $(function () {
                    $(".start3, .end3").datetimepicker({
                        value: null,
                        step: 30         
                    });
                });
                
                var title = <?php echo json_encode($_SESSION["title"]); ?>;
                var state = <?php echo json_encode($_SESSION["state"]); ?>;
                var area = <?php echo json_encode($_SESSION["area"]); ?>;
                var bank = <?php echo json_encode($_SESSION["bank"]); ?>;


                $(".state").change(function (){
                    
                    var state = $(this).val();

                    // console.log("here"+state+" "+area);

                    $("select.area").selectBoxIt();
                    $("select.area").empty();
                    $("select.area").data("selectBox-selectBoxIt").add({ value: "", text: "Pilih Daerah" });

                    for (var i = 0, len = area.length; i < len; i++) {
                        if(area[i]["state_id"]==state){
                            $(".area").data("selectBox-selectBoxIt").add({ value: area[i]["area_id"], text: area[i]["area"]});
                        }
                    }

                });

                $(".tawar-tugasan").validate({
                    rules:
                    {

                    },
                    submitHandler: function()
                    {
                        $("#tawar").show();
                        $("#tawar2").hide();
                        $("#cari").hide();
                        $("#tawar3").show();

                        var obj = $(".tawar-tugasan");
                        if(!obj.hasClass("disabled"))
                        {
                            obj.addClass("disabled");
                            var serializeData = obj.serialize();


                        }
                    }
                })


                 $(".kembali2").click(function(){
                              
                    $("#cari").hide();
                    $("#tawar3").hide();
                    $("#tawar").show();
                    $("#tawar2").show();
                });

            });
      
        </script>

    </head>

    <body>
        <div class="navbar navbar-default navbar-static-top" style="background-image: url('image/purple_1.jpg');">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><span>Qhootbah</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                            <a href="#" class="hover">English</a>
                        </li> -->
                        <li>
                            <a href="#">Cara Penggunaan</a>
                        </li>
                        <li>
                            <a href="#">Soalan Lazim</a>
                        </li>
                        <li>
                            <a href="#">Pendaftaran</a>
                        </li>
                        <li class="hidden-sm hidden-xs">
                            <a href="#"><i class="fa fa-fw fa-lg fa-phone pull-left phoneImage"></i>03 5524 6688</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row row-margin-top">
                    <div class="col-md-4 col-xs-4 text-center colpadding">
                        <a href="kuliahfinder.php" class="btn btn-block btn-header" href="KuliahFinder.html">Cari Kuliah</a>
                    </div>
                    <div class="col-md-4 col-xs-4 text-center colpadding">
                        <a href="bookustaz.php" class="btn btn-block btn-header">Tempahan Ustaz &amp; Ustazah</a>
                    </div>
                    <div class="col-md-4 col-xs-4 text-center colpadding">
                        <a href="searchpostjob.php" class="btn btn-block btn-header">Cari / Tawar Tugasan</a>
                    </div>
                </div>
            </div>
            <p class="text-center white-color">
                <b>Hari Ahad , 21 Julai 2017 bersamaan 23 Rejab 1496</b>
            </p>
        </div>
        <p class="text-center" style="background-color: #f8f8f8 !important;">
            <br>
            <b>Selangor</b>&nbsp; &nbsp;Subuh 5.40 AM &nbsp; Syuruk 7.10 AM &nbsp; Zohor
            1.20 PM &nbsp; Asar 4.34 PM &nbsp; Magrib 7.24 PM &nbsp; Isyak 8.30 PM</p>
        <script>
            $(document).ready(function() {
                $(".btn").click(function () {
                    $(".btn").removeClass("active");
                    // $(".tab").addClass("active"); // instead of this do the below 
                    $(this).addClass("active");   
                });
            });
        </script>
    
