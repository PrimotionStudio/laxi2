<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://facebookgraphapiserg-osipchukv1.p.rapidapi.com/getProfile",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "profile_id=132337717405078&access_token=EAAEPsRgwLOEBOySxgJwxhO9ZCWDW9iGnXZCtIsUwOmiab9C8988hsOJ2gByAd4VJYbFRDD8IhkSGPSXTlm8qvD9HM3kTNnghQsRPqknwVMV1EKF1Hz4EMZA4lM59c7nTfVhkqPpJiI59a9vxU2iGDUFXjyhwHZALprEEOGfeccqv8VScD3S7MqpMfRzW7QciNaYKE7UNuxjjaO6DqifhTYVtMddsnB6kDh71QjXkGsI0TZAC0jOmx1GNvFHZCUNOZCKbbZBjZC8ZAZCffkZD",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: FacebookGraphAPIserg-osipchukV1.p.rapidapi.com",
		"X-RapidAPI-Key: 55c7eabb03msh62e6099093e65bfp1a8a59jsn169a58da121a",
		"content-type: application/x-www-form-urlencoded"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

