<?php
session_start();

require 'classes/language_class.php';
require 'classes/sessions_class.php';

//check language code
if (Sessions::get_language_code() != false) {

    //get code
    $langCode = Sessions::get_language_code();

    echo "Pronadjen jezik! " . $langCode;

    //odradi jedan switch case
    switch ($langCode) {
        case "BA" :
            $langDir = "/bs/";
            break;
        case "RS" :
            $langDir = "/rs/";
            break;
        case "SI" :
            $langDir = "/slo/";
            break;
        case "HR" :
            $langDir = "/hr/";
            break;
        case "XK" :
            $langDir = "/ks/";
            break;
        case "MK" :
            echo "makedonski";
            break;
        default:
            $langDir = "/rs/";
    }

}else{

    echo "Nema jezika! <br>";

    $lang = new Language();

    if ($lang->get_client_country()) {
        echo $lang->contry . "<br>";

        //odradi jedan switch case
        switch ($lang->contry) {
            case "BA" :
                $langDir = "/bs/";
                $langCode = "BA";
                echo "bosanski";
                break;
            case "RS" :
                $langDir = "/rs/";
                $langCode = "RS";
                echo "srpski";
                break;
            case "SI" :
                $langDir = "/slo/";
                $langCode = "SI";
                echo "slovenski";
                break;
            case "HR" :
                $langDir = "/hr/";
                $langCode = "HR";
                echo "hrvacki";
                break;
            case "XK" :
                $langDir = "/ks/";
                $langCode = "XK";
                echo "kosovo";
                break;
            case "MK" :
                echo "makedonski";
                $langDir = "/mk/";
                $langCode = "MK";
                break;
            default:
                $langDir = "/rs/";
                $langCode = "RS";
                echo 'srpski';
        }

        echo "postavljajne!";
        Sessions::set_language_code($langCode);

        die("<br><br>Redirect to: " . $langDir);

    } else {
        die("Redirect: unknowcountry.php");
    }


}
?>