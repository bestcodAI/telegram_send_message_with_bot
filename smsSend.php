<?php
//Send an SMS using Gatewayapi.com
$url = "https://gatewayapi.com/rest/mtsms";
$api_token = "8OoYBjjpSo-tGaqVuii_tM2nKIIA4LJJNAERNswNjN_516lnVVWkMKxKVGwy5Lgp";

//Set SMS recipients and content
$recipients = [855713567907];
$json = [
    'sender' => 'ExampleSMS',
    'message' => 'Hello world',
    'recipients' => [],
];
foreach ($recipients as $msisdn) {
    $json['recipients'][] = ['msisdn' => $msisdn];
}

//Make and execute the http request
//Using the built-in 'curl' library
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ch,CURLOPT_USERPWD, $api_token.":");
curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($json));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
print($result);
$json = json_decode($result);
print_r($json->ids);

?>