<?php

$botToken = '6032808522:AAH7H0oIwpnOvAjLfAtd41jROt8qhyn_N8o';

function sendMessage($chatId, $text)
{
    $params = [
        'chat_id' => $chatId,
        'text' => $text,
    ];
    
    $url = 'https://api.telegram.org/bot' . $botToken . '/sendMessage?' . http_build_query($params);
    
    file_get_contents($url);
}

$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

$message = $data['message'];
$chatId = $message['chat']['id'];
$text = $message['text'];

if (preg_match('/^https?:\/\/\S+(\.mp4|\.mov|\.avi|\.wmv|\.flv|\.mkv|\.webm)$/i', $text, $matches)) {
    $videoUrl = $matches[0];
    // Perform video saving logic here
    
    sendMessage($chatId, 'Video muvaffaqiyatli saqlandi! Muammo kuzatilsa: @Mominov_Uz');
} else {
    sendMessage($chatId, 'Video URL manzili yaroqsiz. Muammo kuzatilsa: @Mominov_Uz');
}