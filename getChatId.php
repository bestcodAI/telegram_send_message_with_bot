<?php

$botApi = "7682682143:AAGTDHvfZ2CMFZUaVcMb2sseNY60jwyW8wk";

$website = "https://api.telegram.org/bot".$botApi;

$ch = curl_init($website . '/getUpdates');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);

  $decode =  json_decode($result, true);

  foreach($decode['result'] as $d) {

    if(isset($d['message'])) {
      $chart_id = $d['message']['from']['id'];
      $account_name = $d['message']['from']['first_name'];
      $search_name =  $d['message']['from']['username']; 
      echo $chart_id ."<br>";
    }

    if(isset($d['my_chat_member'])) {
      $chart_id = $d['my_chat_member']['chat']['id'];

      echo "group_id: ". $chart_id."<br/>";
    }
    

    
  }
  echo "<pre>";
  print_r($decode);
  echo "</pre>";