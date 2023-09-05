<?php
// Replace 'API_KEY' with your actual API key
$apiKey = 'SQQ59MT-XV14JVX-PP004R8-DTEEAVV';

// Replace 'https://app.ayrshare.com/api/post' with the actual API endpoint URL
$apiEndpoint = 'https://app.ayrshare.com/api/post';
// Data to be sent in the POST request
$postData = [
    'post' => '🚀 #OnThisDay 1990:🌐🎉 Sir Tim Berners-Lee\'s first web page revolutionized our lives, work, and code. As programmers, let\'s celebrate this groundbreaking event that shaped our digital universe. Happy World Wide Web Day! 🥳🌐#TechHistory #ProgrammingPioneers',
    'platforms' => ['twitter'],
    'mediaUrls' => ['https://user-content.wepik.com/uploads/105628785/upscaled.png?GoogleAccessId=fc-wepik-bucket-sa%40fc-wepik-pro-rev1.iam.gserviceaccount.com&Expires=1801771807&Signature=HkWH8glrKiFfXiMcGIHpaGgslh6rfpdsm5j%2FNsEDk16qXChf3FW%2BAQu%2Bv29NTAfCVOmQnyj1cuxFz%2FVJlcUgXCeCk0VavYJqhzAp7inu0dEkue1iVo5p8HQObkJfHDxOuocTjDOY9gsU9w29QkH5GusGBrq2KwE7m5EeD5StnfGLsfE%2FEnbDbivwC5RDpMdGahyHZlWD12S9Iwhoe42yow3y5o27hqPzabDX50UyHREsxbyMFcKWptzdMgmL%2BflGVw6HmKkZy9s5hz9g5UmXwXOPt59SZk31iRk9zIyO9hG84a08cEMBW9atBpycMwSL2hh7ZFtT7j8aXy0LA%2FbkbA%3D%3D'],
];

// Convert the data to JSON format
$jsonData = json_encode($postData);

// Initialize cURL session
$ch = curl_init($apiEndpoint);

// Set the cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $apiKey,
    'Content-Type: application/json',
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_POST, true);

// Execute the cURL request and get the response
$response = curl_exec($ch);

// Check if there's an error
if (curl_errno($ch)) {
    // Handle the error if needed
    echo 'cURL error: ' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);

// Process the API response (e.g., convert JSON to PHP array)
$data = json_decode($response, true);

// Do something with the data
var_dump($data);
?>
