<?php

require 'classes/language_class.php';
require 'classes/sessions_class.php';

$lang = new Language();

if ($lang->get_client_country()) {
    echo $lang->contry . "<br>";

    //odradi jedan switch case
    switch ($lang->contry) {
        case "BA" :
            echo "bosanski";
            break;
        case "RS" :
            echo "srpski";
            break;
        case "SI" :
            echo "slovenski";
            break;
        case "HR" :
            echo "hrvacki";
            break;
        case "XK" :
            echo "kosovo";
            break;
        case "MK" :
            echo "makedonski";
            break;
        default:
            echo 'engleski';
    }

} else {
    die("Redirect: unknowcountry.php");
}
?>