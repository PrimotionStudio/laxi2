<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postid = clean($_POST["post"]);
    if (($postid != "") && strstr($postid,"post")) {
        $postid = str_ireplace("post", "", $postid);
        $selectposts = "SELECT * FROM posts WHERE id='$postid'";
        $queryposts = mysqli_query($con, $selectposts);
        if (mysqli_num_rows($queryposts) == 1) {
            $getposts = mysqli_fetch_assoc($queryposts);

            // Call Post Operatio
            
        
        $apiKey = 'ZTNB3ES-DGZ4YT8-JBENPT1-9G42S35';
        $apiEndpoint = 'https://app.ayrshare.com/api/post';
        if (($getposts["media"] == "[]") || ($getposts["media"] == "")) {
            $postData = [
                'post' => trim(str_replace("'", '\'', $getposts["post"])),
                'platforms' => $getposts["platforms"],
            ];
        } else {
            $postmedia = $getposts["media"];
            $baseUrl = "https://primexnetwork.org/laxi/";
            $result = array_map(function ($value) use ($baseUrl) {
                return $baseUrl . $value;
            }, string2array($postmedia));
    
            $postData = [
                'post' => trim(str_replace("'", '\'', $getposts["post"])),
                'platforms' => $getposts["platforms"],
                'mediaUrls' => $result,
            ];
        }
        $jsonData = json_encode($postData);
        $ch = curl_init($apiEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);
        $data = json_decode($response, true);
        if (curl_errno($ch) || ($data["status"] != "success")) {
            $error = $data["message"]." Curl Error:".curl_errno($ch)." postdata: ".arrayToString($postData['mediaUrls']);
            $insertlog = "INSERT INTO logs (errorlog) VALUES ('$error')";
            mysqli_query($con, $insertlog);
            curl_close($ch);
            echo "Failed";
        } else {
            curl_close($ch);
            $updatepost = "UPDATE posts SET status='Posted' WHERE id='$postid'";
            mysqli_query($con, $updatepost);
            echo "Posted";
        }
            // if (post($con, $getposts["post"], stringToArray($getposts["platforms"]), string2array($getposts["media"])) == "Success") {
            //     $updatepost = "UPDATE posts SET status='Posted' WHERE id='$postid'"; 
            //     mysqli_query($con, $updatepost);
            //     echo "Posted";
            // } else {
            //     echo "Failed";
            // }
        } else {
            echo "An error occured connecting to server";
        }
    } else {
        echo "An error occured connecting to server";
    }
} else {
    echo "An error occured connecting to server";
}
?>