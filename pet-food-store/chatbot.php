<?php

require __DIR__ . '/../vendor/autoload.php';

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
	echo "OpenAI: " . $result['choices'][0]['message']['content'] . "\n";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>OpenAI Counselor</title>
</head>
<body>
	<h1>OpenAI Counselor</h1>
	<form action="index.php" method="post">
		<label for="message">Message:</label>
		<input type="text" name="message" id="message" required>
		<button type="submit">Send</button>
	</form>
</body>
</html>