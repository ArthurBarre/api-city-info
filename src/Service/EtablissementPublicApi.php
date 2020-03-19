<?php
namespace App\Service;

class EtablissementPublicApi
{
    public function getTownHall($code) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://geo.api.gouv.fr/communes?code=".$code."&fields=nom,code,codesPostaux,centre,surface,contour,codeDepartement,departement,codeRegion,region,population&format=json&geometry=centre");
        $res = curl_exec($ch);
        $result = json_decode($res,true);
        return $result;
    }
}