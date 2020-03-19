<?php
namespace App\Service;

class EtablissementPublicApi
{
    public function getTownHall($code) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://etablissements-publics.api.gouv.fr/v3/communes/".$code."/gendarmerie");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($res,true);
        return $result["features"];
    }
}