<?php
class myJsonController extends Controller
{

public function getJson()
{
if (!Yii::app()->user->isGuest) {
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://coinlib.io/api/v1/coinlist?key=2dd926915f8c7b53&pref=BTC&page=1&order=volume_desc');
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$json_response = json_decode($response, true);
curl_close($curl);

if (!$response) {
$error = curl_error($curl) . '(' . curl_errno($curl) . ')';
echo $error;
}
return $json_response;
}
}
}