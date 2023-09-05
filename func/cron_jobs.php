<?php
require_once("session.php");
require_once("sql.php");
require_once("misc.php");
$selectposts = "SELECT * FROM posts WHERE status='Pending'";
$queryposts = mysqli_query($con, $selectposts);
while ($getposts = mysqli_fetch_assoc($queryposts)) {
    if ((($getposts["media"] == "[]") || ($getposts["media"] == "")) && (($getposts["post"] == "") || ($getposts["post"] == " "))) {
        $deletepost = "DELETE FROM posts WHERE id='".$getposts["id"]."'";
        mysqli_query($con, $deletepost);
    } else {
        $currentDateTime = date('Y-m-d H:i:s');
        if ($currentDateTime > $getposts["postdate"]) {
            $postid = $getposts["id"];
            // Test
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
            // print_r($postData);
            $response = curl_exec($ch);
            $data = json_decode($response, true);
            if (curl_errno($ch) || ($data["status"] != "success")) {
                $error = "Data: ".json_encode($data)." Curl Error:".curl_errno($ch)." postdata: ".arrayToString($postData['mediaUrls']);
                $insertlog = "INSERT INTO logs (errorlog) VALUES ('$error')";
                mysqli_query($con, $insertlog);
                curl_close($ch);
                echo "Failed";
                var_dump($currentDateTime);
            } else {
                curl_close($ch);
                $updatepost = "UPDATE posts SET status='Posted' WHERE id='$postid'";
                mysqli_query($con, $updatepost);
                echo "Posted";
                var_dump($currentDateTime);
            }
        }
    }
}
?>