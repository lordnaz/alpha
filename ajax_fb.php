<?php
//Load the database configuration file
include("_process.php");

//Convert JSON data into PHP variable
$userData = json_decode($_POST['userData']);

if(!empty($userData)){
    $oauth_provider = $_POST['oauth_provider'];
    //Check whether user data already exists in database
    $availability = $process->checkUserRecord($userData->email);
    echo $availability;
    // $prevQuery = "SELECT * FROM users WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$userData->id."'";

    // $prevResult = $db->query($prevQuery);
    // if($prevResult->num_rows > 0){
    if($availability > 0){ 
        //Update user data if already exists
        // $query = "UPDATE users SET first_name = '".$userData->first_name."', last_name = '".$userData->last_name."', email = '".$userData->email."', gender = '".$userData->gender."', locale = '".$userData->locale."', picture = '".$userData->picture->data->url."', link = '".$userData->link."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$userData->id."'";
        // $update = $db->query($query);
        echo 1;
    }else{
        //Insert user data
        // $query = "INSERT INTO users SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$userData->id."', first_name = '".$userData->first_name."', last_name = '".$userData->last_name."', email = '".$userData->email."', gender = '".$userData->gender."', locale = '".$userData->locale."', picture = '".$userData->picture->data->url."', link = '".$userData->link."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
        // $insert = $db->query($query);
        echo 2;
    }
}else{
    echo 0;
}
?>