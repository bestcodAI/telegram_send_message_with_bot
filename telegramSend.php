<?php
  $botToken="7682682143:AAGTDHvfZ2CMFZUaVcMb2sseNY60jwyW8wk";

  $website="https://api.telegram.org/bot".$botToken;
  $chatId = "-1002475273697";
  // $chatId="5186991138";  //NOTE: this chatId MUST be the chat_id of a person, NOT another bot chatId !!!**
  $params=[
      'chat_id'=>$chatId, 
      'text'=>'Hello I`m coding. Testing bot with php and development package',
  ];

  $ch = curl_init($website . '/sendMessage');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);
?>