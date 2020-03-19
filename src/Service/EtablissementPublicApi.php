<?php
namespace App\Service;

class EtablissementPublicApi
{
    public function getTownHall($code) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://etablissements-publics.api.gouv.fr/v3/departements/".$code."/mairie");
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        return $result;
    }
}