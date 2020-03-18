<?php
namespace App\Service;

class EtablissementPublicApi
{
    public function getEtabInfo($arrondissement) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://etablissements-publics.api.gouv.fr/v3/departements/".$arrondissement."/maison_handicapees");
        $res = curl_exec($ch);
        var_dump($res);
    }
}