<?php
require("vendor/autoload.php");
// Instantiate a new client (server side)
$client = new GetStream\Stream\Client('m93e2zvzr4gs', 'r6eund55hsens5vyxxhbm3jc7qtwuvk7yv3aykaerq28sxfcx62msma632nctqjv');
// Find your API keys here https://getstream.io/dashboard/
$userToken = $client->createUserSessionToken("the-user-id");

$chris = $client->feed('user', 'chris');

// Add an Activity; message is a custom field - tip: you can add unlimited custom fields!
$data = [
  "actor" => "chris",
  "verb" => "add",
  "object" => "picture:10",
  "foreign_id" => "picture:10",
  "message" => "Beautiful bird!",
];

$chris->addActivity($data);

// Create a following relationship between Jack's "timeline" feed and Chris' "user" feed:
$jack = $client->feed('timeline', 'jack');
$jack->follow('user', 'chris');

// Read Jack's timeline and Chris' post appears in the feed:
$activities = $jack->getActivities(10)['results'];

// Remove the activity by referencing the foreign_id you provided:
$chris->removeActivity("picture:10", true);
