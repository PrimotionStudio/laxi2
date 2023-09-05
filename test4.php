<?php

// $userId = '810558614058408'; // Replace with your actual User ID
// $userAccessToken = 'EAALhMuJCtagBOx25nFrTmg60musEZBbcLh0luFsLHWzkIGpYHBzjyfF7YHKHT8Ua06xsB16Chg8X7hd7HxQSbmCuDYZA0lBPjQe4RaNIRU18Cf7LX3mIpcdok3ToRNX2yxmwMZAafYye7GYxDEpm2fGtbqM23lnFmOJ4c51WHZCtdzmotjZCUnPTkMIhcEKS4YAZAxIZBjMM8bsQN5Gki8sfsIfzWcmsFlZCnQZDZD'; // Replace with your actual User Access Token

// $curl = curl_init();

// curl_setopt_array($curl, [
//     // CURLOPT_URL => "https://graph.facebook.com/{$userId}/accounts?access_token={$userAccessToken}",
//     CURLOPT_URL => "https://graph.facebook.com/{$userId}?access_token={$userAccessToken}",
//     // CURLOPT_URL => "https://graph.facebook.com/pages/search?q=".urlencode("810558614058408")."&fields=".urlencode("id,name,location,link")."&access_token={$userAccessToken}",
//     // CURLOPT_URL => "https://graph.facebook.com/{$userId}/likes?access_token={$userAccessToken}",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_HEADER => false,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_HTTPGET => true,
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     echo $response;
// }



$pageId = '618110333664707'; // Replace with your actual Page ID
$userAccessToken = 'YOUR_USER_ACCESS_TOKEN'; // Replace with your actual User Access Token

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://graph.facebook.com/{$pageId}?fields=name&access_token={$userAccessToken}",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPGET => true,
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}

?>
