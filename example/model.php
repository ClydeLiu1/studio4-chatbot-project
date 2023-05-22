<?php
$apiKey = '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';
$url = 'https://api.openai.com/v1/chat/completions';

$data = array(
    'prompt' => 'hello',
    'max_tokens' => 100,
    'temperature' => 0.7
);

$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$decodedResponse = json_decode($response, true);
$reply = $decodedResponse['choices'][0]['text'];

echo $reply;
?>