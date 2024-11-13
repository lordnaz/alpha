<?php
    require_once("_process.php");

    if(isset($_POST["level"])){

        $level = $_POST["level"];

        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $status = $process->checkUserRecord($email);

            if($status!=0){
                echo "1";
            }else{
                if($level==1){

                    if (isset($_POST["oauth_provider"])){                 
                        $oauth_provider = $_POST["oauth_provider"];
                    }else{
                        $oauth_provider = "qhootbah";
                    }

                    if (isset($_POST["oauth_uid"])){                 
                        $oauth_uid = $_POST["oauth_uid"];
                    }else{
                        $oauth_uid = "";
                    }

                    if (isset($_POST["title"])){                 
                        $title = $_POST["title"];
                    }

                    if (isset($_POST["fullname"])){                 
                        $fullname = $_POST["fullname"];
                    }

                    if (isset($_POST["nric"])){                 
                        $nric = $_POST["nric"];
                    }

                    if (isset($_POST["contactno"])){                 
                        $contactno = $_POST["contactno"];
                    }

                    if (isset($_POST["address1"])){  
                        $address1 = $_POST["address1"];

                        if (isset($_POST["address2"])){  
                            $address2 = $_POST["address2"];
                        }else{
                            $address2 = "";
                        }

                        $address = $address1.", ".$address2;
                    }                    

                    if (isset($_POST["postcode"])){                 
                        $postcode = $_POST["postcode"];
                    }

                    if (isset($_POST["city"])){                 
                        $city = $_POST["city"];
                    }

                    if (isset($_POST["area"])){  
                        $area = $_POST["area"];
                    }

                    if (isset($_POST["state"])){                 
                        $state = $_POST["state"];
                    }

                    if (isset($_POST["latitude"])){  
                        $latitude = $_POST["latitude"];
                    }else{
                        $latitude = "";
                    }

                    if (isset($_POST["longitude"])){  
                        $longitude = $_POST["longitude"];
                    }else{
                        $longitude = "";
                    }

                    if (isset($_POST["image"])){  
                        $image = $_POST["image"];

                        list($type, $image) = explode(';', $image);
                        list(, $image)      = explode(',', $image);

                        $image = base64_decode($image);
                        $img_name = time().'.jpg';
                        $img_link = "upload/profile/".$img_name;
                        file_put_contents("upload/profile/".$img_name, $image);
                    }else{
                        $img_link = "upload/profile/default.jpg";
                    }

                    $process->insertIndividual($oauth_provider,$oauth_uid,$level,$email,$password,$title,$fullname,$nric,$contactno,$address,$address1,$address2,$postcode,$city,$area,$state,$latitude,$longitude,$img_link);

                    echo 2;               

                }else if($level==2){

                    if (isset($_POST["oauth_provider"])){                 
                        $oauth_provider = $_POST["oauth_provider"];
                    }else{
                        $oauth_provider = "qhootbah";
                    }

                    if (isset($_POST["oauth_uid"])){                 
                        $oauth_uid = $_POST["oauth_uid"];
                    }else{
                        $oauth_uid = "";
                    }

                    if (isset($_POST["fullname"])){                 
                        $fullname = $_POST["fullname"];
                    }

                    if (isset($_POST["contactno"])){                 
                        $contactno = $_POST["contactno"];
                    }

                    if (isset($_POST["address1"])){  
                        $address1 = $_POST["address1"];

                        if (isset($_POST["address2"])){  
                            $address2 = $_POST["address2"];
                        }else{
                            $address2 = "";
                        }

                        $address = $address1.", ".$address2;
                    }                    

                    if (isset($_POST["postcode"])){                 
                        $postcode = $_POST["postcode"];
                    }

                    if (isset($_POST["city"])){                 
                        $city = $_POST["city"];
                    }

                    if (isset($_POST["area"])){  
                        $area = $_POST["area"];
                    }

                    if (isset($_POST["latitude"])){  
                        $latitude = $_POST["latitude"];
                    }else{
                        $latitude = "";
                    }

                    if (isset($_POST["longitude"])){  
                        $longitude = $_POST["longitude"];
                    }else{
                        $longitude = "";
                    }

                    if (isset($_POST["facebook"])){                 
                        $facebook = $_POST["facebook"];
                    }else{
                        $facebook = "";
                    }

                    if (isset($_POST["youtube"])){                 
                        $youtube = $_POST["youtube"];
                    }else{
                        $youtube = "";
                    }

                    if (isset($_POST["instagram"])){                 
                        $instagram = $_POST["instagram"];
                    }else{
                        $instagram = "";
                    }

                    if (isset($_POST["other_link"])){                 
                        $other = $_POST["other_link"];
                    }else{
                        $other = "";
                    }

                    if (isset($_POST["image"])){  
                        $image = $_POST["image"];

                        list($type, $image) = explode(';', $image);
                        list(, $image)      = explode(',', $image);

                        $image = base64_decode($image);
                        $img_name = time().'.jpg';
                        $img_link = "upload/profile/".$img_name;
                        file_put_contents("upload/profile/".$img_name, $image);
                    }else{
                        $img_link = "upload/profile/default.jpg";
                    }

                    $process->insertOrganization($oauth_provider,$oauth_uid,$level,$email,$password,$fullname,$contactno,$address,$address1,$address2,$postcode,$city,$area,$state,$latitude,$longitude,$img_link,$facebook,$youtube,$instagram,$other);

                    echo 2;

                }else if($level==3){

                    if (isset($_POST["oauth_provider"])){                 
                        $oauth_provider = $_POST["oauth_provider"];
                    }else{
                        $oauth_provider = "qhootbah";
                    }

                    if (isset($_POST["oauth_uid"])){                 
                        $oauth_uid = $_POST["oauth_uid"];
                    }else{
                        $oauth_uid = "";
                    }

                    if (isset($_POST["title"])){                 
                        $title = $_POST["title"];
                    }

                    if (isset($_POST["fullname"])){                 
                        $fullname = $_POST["fullname"];
                    }

                    if (isset($_POST["contactno"])){                 
                        $contactno = $_POST["contactno"];
                    }

                    if (isset($_POST["tauliah"])){  
                        $tauliah = $_POST["tauliah"];
                    }

                    if (isset($_POST["nric"])){                 
                        $nric = $_POST["nric"];
                    }

                    if (isset($_POST["education"])){  
                        $education = $_POST["education"];
                    }

                    if (isset($_POST["state"])){                 
                        $state = $_POST["state"];
                    }

                    if (isset($_POST["area"])){                 
                        $area = $_POST["area"];
                    }

                    if (isset($_POST["bank"])){                 
                        $bank = $_POST["bank"];
                    }

                    if (isset($_POST["account"])){                 
                        $account = $_POST["account"];
                    }


                    if (isset($_POST["facebook"])){                 
                        $facebook = $_POST["facebook"];
                    }else{
                        $facebook = "";
                    }

                    if (isset($_POST["youtube"])){                 
                        $youtube = $_POST["youtube"];
                    }else{
                        $youtube = "";
                    }

                    if (isset($_POST["instagram"])){                 
                        $instagram = $_POST["instagram"];
                    }else{
                        $instagram = "";
                    }

                    if (isset($_POST["other_link"])){                 
                        $other = $_POST["other_link"];
                    }else{
                        $other = "";
                    }

                    if (isset($_POST["services"])){                 
                        $services = $_POST["services"];
                    }

                    if (isset($_POST["rate"])){                 
                        $rate = $_POST["rate"];
                    }

                    $rates = array();
                    $temp = 0;

                    if(!empty($rate)) {
                        foreach($rate as $check) {
                            if($check!=""){
                                $rates[$temp] = $check;
                                $temp++;
                            }
                        }
                    }

                    if (isset($_POST["image"])){  
                        $image = $_POST["image"];

                        list($type, $image) = explode(';', $image);
                        list(, $image)      = explode(',', $image);

                        $image = base64_decode($image);
                        $img_name = time().'.jpg';
                        $img_link = "upload/profile/".$img_name;
                        file_put_contents("upload/profile/".$img_name, $image);
                    }else{
                        $img_link = "upload/profile/default.jpg";
                    }

                    // print_r($services);
                    // print_r($rates);

                    $process->insertExpert($oauth_provider,$oauth_uid,$level,$email,$password,$title,$fullname,$nric,$education,$contactno,$tauliah,$bank,$account,$area,$img_link,$facebook,$youtube,$instagram,$other,$services,$rates);
                    // echo $level." ".$email." ".$password." ".$title." ".$fullname." ".$contactno." ".$tauliah." ".$nric." ".$education." ".$area." ".$facebook." ".$youtube." ".$instagram." ".$other;
                    echo 2;
                }
                
            }

            
        }

    }

    // echo "|".$level."|".$email."|".$password."|";


    // $level = 3;
    // $email = "hazim@gmail.com";
    // $password = "1234567";
    // $title = 3;
    // $fullname = "Hazim Noh";
    // $phone = "0126549780";
    // $tauliah = "8888";
    // $nric = "810920145697";
    // $education = "UM";
    // $area = 145;
    // $facebook = "";
    // $youtube = "";
    // $instagram = "";
    // $other = "";

    // $process->insertExpert($level,$email,$password,$title,$fullname,$phone,$tauliah,$nric,$education,$area,$facebook,$youtube,$instagram,$other,$services,$rates);

?> 