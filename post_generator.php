<?php
function stringToArray($inputString) {
    $inputString = trim($inputString, "[]"); // Remove the "[" and "]" characters
    $paragraphs = explode('","', $inputString); // Split the string into paragraphs
    
    $result = [];
    foreach ($paragraphs as $paragraph) {
        $result[] = trim($paragraph, '"');
    }
    
    return $result;
}


$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "https://paragraph-generator.p.rapidapi.com/paragraph-generator?topic=".urlencode("How to stay relevant in the digital world using tech skills")."&section_heading=".urlencode("Programming Languages(PHP, Python, Nodejs, React, Golang, etc), Graphic Design, Cyber Security"),
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: paragraph-generator.p.rapidapi.com",
		"X-RapidAPI-Key: 3bcf8cf84dmsh28f68321f0d7c0dp15f2abjsne081c31f8c22"
	],
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	foreach (stringToArray($response) as $post) {
		echo $post."<br><br>";
	}
}
?>