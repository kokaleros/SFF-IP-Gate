<?php

Class Language
{
    public $defaultLanguage = "sr";
    public $language;
    public $contry;
    private $ip;
    public $message;

    public function get_client_ip()
    {
        $ipaddress = file_get_contents("https://api.ipify.org");
//        echo $ipaddress;
//        echo $ipaddress;
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = false;

        $this->ip = $ipaddress;

        return $ipaddress;
    }

    public function get_client_country()
    {
        //get user IP
        $this->get_client_ip();

        //if clinet IP is found
        if ($this->ip) {
//            $this->ip = '188.124.211.86';

            //try to get location data
            $clientData = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $this->ip));
//            var_dump($clientData);
            if (!empty($clientData) and $clientData["geoplugin_status"] != 404) {
                $this->contry = $clientData["geoplugin_countryCode"];
                return $this->contry;
            } else {
                $this->message = "Error during geolocation your IP!";
                return false;
            }

        } else {
            $this->message = "Cant find IP address!";
            return false;
        }

    }

}


