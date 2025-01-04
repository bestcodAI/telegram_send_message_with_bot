<?php 

$botToken = "7682682143:AAGTDHvfZ2CMFZUaVcMb2sseNY60jwyW8wk";
$chatId = "5186991138"; // Replace with the actual chat ID

// Message and reply markup for requesting contact
$message = "Please share your contact number by pressing the button below.";
$replyMarkup = [
    'keyboard' => [
        [
            [
                'text' => 'Share Contact',
                'request_contact' => true
            ]
        ]
    ],
    'resize_keyboard' => true,
    'one_time_keyboard' => true
];

// Telegram API URL
$url = "https://api.telegram.org/bot$botToken/sendMessage";

// Create the payload
$data = [
    'chat_id' => $chatId,
    'text' => $message,
    'reply_markup' => json_encode($replyMarkup)
];

// Send the request using cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute and close
$response = curl_exec($ch);
curl_close($ch);

// Check response
echo $response;
?>
