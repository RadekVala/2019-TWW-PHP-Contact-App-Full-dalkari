<?php

class MyAuth {

    public static function loginUser($username, $password){
        $_SESSION['auth'] = false;
        if($username == 'admin' && $password == 'secret'){
            // log the user in
            $_SESSION['auth'] = true;
        }
    }

    public static function isAuth(){
        if(isset($_SESSION['auth']) && $_SESSION['auth'] == true ){
            return true;
        }
        return false;
    }
}
?>