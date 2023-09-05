<?php
// require "twitteroauth/autoload.php";
// use Abraham\TwitterOAuth\TwitterOAuth;

// // Define your API keys and tokens here
// define('CONSUMER_KEY', '1P3MgMllUcqJZVMNt2xAuNz5R');
// define('CONSUMER_SECRET', 'UQrswd08Wadq8n9yxv3mjL4g08yKd3TI11KQcFmFlL4yEmGN6o');
// define('ACCESS_TOKEN', '1607547658549268483-8zyVRgOJaQvcbsPHjqjkf0wzH6TP2z');
// define('ACCESS_TOKEN_SECRET', 'gYSSQXXcoXzUgoRrQD60f6aqgLkPwIThpW2YEUSWgMuDw');

// // Create a TwitterOAuth instance
// $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

// // Set the status message to post
// $status = 'Hello, this is a test';

// // Post the status message
// $result = $toa->post('statuses/update', array('status' => $status));

// // Check if the tweet was posted successfully
// if ($toa->getLastHttpCode() == 200) {
//     echo "Tweet posted successfully!";
// } else {
//     echo "Error posting tweet: " . $result->errors[0]->message;
// }

// http://techiella.x0.com/twitter-search-using-the-twitter-api-php/

require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', '1P3MgMllUcqJZVMNt2xAuNz5R');
define('CONSUMER_SECRET', 'UQrswd08Wadq8n9yxv3mjL4g08yKd3TI11KQcFmFlL4yEmGN6o');
define('ACCESS_TOKEN', '1607547658549268483-8zyVRgOJaQvcbsPHjqjkf0wzH6TP2z');
define('ACCESS_TOKEN_SECRET', 'gYSSQXXcoXzUgoRrQD60f6aqgLkPwIThpW2YEUSWgMuDw');

function search(array $query) {
    $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
    return $toa->get('search/tweets', $query);
}

$input = array(
    "let's see what happens", "had to go", "had to go", "there's nobody", "enough of",
    "maybe I'll go", "I'm going", "there's nothing"
);

$k = array_rand($input);
$randomPhrase = $input[$k];

$query = array(
    "q" => "\"$randomPhrase\"",
);

$results = search($query);

var_dump($results);  // Debugging: Display the API response

if (property_exists($results, 'statuses')) {
    foreach ($results->statuses as $result) {
        echo "<hr>";
        echo $result->user->screen_name . ": " . $result->text . "\n";

        // ... (rest of the loop code)
    }
} else {
    echo "No search results found.";
}

foreach ($results->statuses as $result) {
    echo "<hr>";
    echo $result->user->screen_name . ": " . $result->text . "\n";

    echo "<hr>";
    echo "Replying to this user: @" . $result->user->screen_name;
    $user = $result->user->screen_name;
    $id = $result->id;
    echo "<hr>";
    echo "Tweet ID: " . $result->id;
    echo "<hr>";
    echo "<a href='https://twitter.com/$user/status/$id/' target='_blank'>VIEW</a>";

    $corrections = array(
        "let's see what happens" => "let's see what happens",
        "had to go" => "had to go",
        "there's nobody" => "there's nobody",
        "enough of" => "enough of",
        "maybe I'll go" => "maybe I'll go",
        "I'm going" => "I'm going",
        "there's nothing" => "there's nothing"
    );

    $toCorrect = str_replace(array_keys($corrections), array_values($corrections), $randomPhrase);

    echo "<hr>";
    echo "<br>Text to correct: " . $randomPhrase;
    echo "<br>Position in var input: " . $k;
    echo "<hr>";echo "<hr>";
    echo "<br>Tweeted message:<br>";
    echo "Hello! You should write: \"" . $toCorrect . "\" @" . $result->user->screen_name;
    echo "<hr>";echo "<hr>";
    tweet("Hello! You should write: \"" . $toCorrect . "\" @" . $result->user->screen_name . " ;)", $id);
}
?>

