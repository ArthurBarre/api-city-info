

namespace App\Service;

class GeoApi
{
public function getCityInfo($city, $postal_code)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://geo.api.gouv.fr/communes?codePostal=" . $postal_code);
$res = curl_exec($ch);
var_dump($res);
//        var_dump($postal_code);
}
}