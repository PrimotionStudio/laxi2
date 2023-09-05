<?php
require 'vendor/autoload.php';  // Adjust the path if needed
use Abraham\TwitterOAuth\TwitterOAuth;

// Replace with your actual credentials
$consumerKey = '1P3MgMllUcqJZVMNt2xAuNz5R';
$consumerSecret = 'UQrswd08Wadq8n9yxv3mjL4g08yKd3TI11KQcFmFlL4yEmGN6o';
$accessToken = '1607547658549268483-8zyVRgOJaQvcbsPHjqjkf0wzH6TP2z';
$accessTokenSecret = 'gYSSQXXcoXzUgoRrQD60f6aqgLkPwIThpW2YEUSWgMuDw';

$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$status = 'Hello, World! This is my first tweet using TwitterOAuth.';
$tweet = $twitter->post('statuses/update', ['status' => $status]);

if ($twitter->getLastHttpCode() == 200) {
    echo "Tweet posted successfully!";
} else {
    echo "Error posting tweet: " . $twitter->getLastHttpCode();
}
echo "<pre>";
print_r($twitter);
echo "</pre>";