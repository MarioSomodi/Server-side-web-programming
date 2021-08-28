<?php
    function LoadUsers(){
        $string = file_get_contents("./users.json");
        $oUsers = json_decode($string, true);
        return $oUsers;
    }
    function CheckUser($sUsername, $sPassword){
        $oUsers = LoadUsers();
        $bUserExists = false;
        $oUserThatLoggedIn = array(
            "username" => null,
            "password" => null
        );
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $sPassword = "";
            $sUsername = "";
            foreach($oUsers as $oUser)
            {
                if($oUser['username'] == $_POST['username'])
                {
                    $bUserExists = true;
                    $sPassword = $oUser['password'];
                    $sUsername = $oUser['username'];
                    break;
                }
            }
            if($bUserExists && $sPassword == $_POST['password'])
            {
                echo 'Log in succesfull!';
                $oUserThatLoggedIn['username'] = $sUsername;
                $oUserThatLoggedIn['password'] = $sPassword;
                return $oUserThatLoggedIn;
            }
            else
            {
                echo 'Username or password invalid. Please try again.';
                return $oUserThatLoggedIn;
            }
        }
        else
        {
            echo "Warning! Username or password missing!";
            return $oUserThatLoggedIn;
        }
    }
    function SetSessions($oUser){
        session_start();
        $_SESSION['username'] = $oUser['username'];
        $_SESSION['password'] = $oUser['password'];
    }
?>