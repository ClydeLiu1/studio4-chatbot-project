<?php
// Set your OpenAI API key here
$openai_key = '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';

// Get user input from the form
$input = $_POST['input'];

// Call the OpenAI API to generate a response
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.openai.com/v1/engines/davinci-codex/completions",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    "prompt" => $input,
    "max_tokens" => 50,
    "temperature" => 0.5,
    "n" => 1,
    "stop" => "\n"
  ]),
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer ".$openai_key,
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // Extract the response text from the JSON data
  $data = json_decode($response, true);
  $output = $data['choices'][0]['text'];
  
  // Display the response in a text area
  echo '<textarea>'.$input."\n".$output.'</textarea>';
}
?>
