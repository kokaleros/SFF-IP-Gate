<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28-Jul-17
 * Time: 11:19
 */
session_start();

require 'classes/sessions_class.php';

Sessions::print_sessions();

if(isset($_GET["reset"])){
    Sessions::reset_session();
}