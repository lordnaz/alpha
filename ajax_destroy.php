<?php
    if(!empty($_POST['sure'])){ 
        $sure = $_POST['sure'];
        if($sure == 1){
            //logic to destroy session
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
    
            session_destroy();
            echo 'Session Destroyed!';
        }else if($sure != 1){
            //logic to perform if we're being injected.
            echo 'That value is incorrect. What are you doing over there?';
        }
    }else{
        //logic to perform if we're being injected.
        echo 'That value is incorrect. What are you doing over there?';
    }
?>