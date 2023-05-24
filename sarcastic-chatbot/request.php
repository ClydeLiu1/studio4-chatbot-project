<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Set your OpenAI API key
$apiKey = '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';

$endpoint = 'https://api.openai.com/v1/chat/completions';
$model = 'gpt-3.5-turbo';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

	$parameters = [
		'temperature' => 0,
		'messages' => [
            [
                'role' => 'system',
                'content' => 'You are a helpful assistant.',
            ],
			[
				'role' => 'user',
				'content' => $message,
			],
		],
	];

	$client = new \GuzzleHttp\Client();
	$response = $client->post($endpoint, [
		'verify' => false,
		'headers' => [
			'Authorization' => 'Bearer ' . $apiKey,
			'Content-Type' => 'application/json',
		],
		'json' => [
			'model' => $model,
			'temperature' => $parameters['temperature'],
			'messages' => $parameters['messages'],
		],
	]);

	$result = json_decode($response->getBody()->getContents(), true);
	$generatedMessage = $result['choices'][0]['message']['content'];
    echo $generatedMessage;
}
?>