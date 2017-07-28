<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28-Jul-17
 * Time: 11:13
 */
class Sessions{

    public static function print_sessions(){
        $sessions = $_SESSION;
        echo "<pre>";
        var_dump($sessions);
        echo "</pre>";
    }

    public static function set_language_code($code = "sr"){
        $_SESSION["sff_language_code"] = $code;
    }

    public static function get_language_code(){

        //try to get langage code
        if(isset($_SESSION["sff_language_code"]) && !empty($_SESSION["sff_language_code"])){
            return $_SESSION["sff_language_code"];
        }else{
            return false;
        }
    }

    public static function reset_session(){
        if(isset($_SESSION["sff_language_code"])){
            unset($_SESSION["sff_language_code"]);
        }
    }

}