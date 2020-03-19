<?php

namespace App\Service;

class GeoApi
{
    public function getCityInfo($postal_code)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://geo.api.gouv.fr/communes?codePostal=" . $postal_code);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        if( $res !== "[]" ){
            $result = json_decode($res,true);
            return $result[0]["code"];
        } else {
            return false;
        }
    }
}