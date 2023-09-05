<?php
$apiKey = 'm93e2zvzr4gs';
$apiSecret = 'r6eund55hsens5vyxxhbm3jc7qtwuvk7yv3aykaerq28sxfcx62msma632nctqjv';
$appId = '1260187';

// Create a new post data
$postData = [
    'actor' => 'user:123', // Actor ID (user ID)
    'verb' => 'post',     // Action verb (e.g., 'post', 'share', etc.)
    'object' => 'post:456', // Object ID (post ID)
    'message' => 'Hello, this is my new post!',
    'time' => time(),
];

// Generate a signature for authentication
$signature = hash_hmac('sha256', $postData['actor'] . $postData['verb'] . $postData['object'] . $postData['time'], $apiSecret);

// Set up cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.stream-io-api.com/api/v1.0/feed/$postData[actor]/$postData[verb]/$postData[object]");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: $apiKey:$signature",
]);

// Execute cURL request
$response = curl_exec($ch);
curl_close($ch);

// Handle response
if ($response) {
    $responseData = json_decode($response, true);
    // Process response data as needed
} else {
    // Handle error
    echo "Error: " . curl_error($ch);
}
?>
