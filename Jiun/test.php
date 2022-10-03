<?php
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://aa05-149-167-142-35.ngrok.io/pred_pedestrian',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => array('latitude' => '-37.81766034','longitude' => '144.95026189','mdate' => '2','month' => '11','year' => '2022','time' => '12'),
CURLOPT_HTTPHEADER => array(
    'Content-Type: multipart/form-data'
),
)); 

$response = curl_exec($curl);

curl_close($curl);

echo $response;

?>