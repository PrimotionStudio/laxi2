<?php
$activeTimes = [
    "Mon" => [
        "10:00",
        "15:30",
        "20:45"
    ],
    "Tue" => [
        "11:15",
        "16:00",
        "21:20"
    ],
    "Wed" => [
        "09:30",
        "14:45",
        "19:15"
    ],
    "Thu" => [
        "08:45",
        "13:30",
        "18:00"
    ],
    "Fri" => [
        "10:30",
        "15:00",
        "20:30"
    ],
    "Sat" => [
        "11:00",
        "16:15",
        "21:45"
    ],
    "Sun" => [
        "15 Aug, 2023 09:15",
        "15 Aug, 2023 14:00",
        "15 Aug, 2023 19:30"
    ]
];

// Print the array for verification
foreach ($activeTimes as $day => $times) {
    echo "$day:<br>";
    foreach ($times as $time) {
        echo " - $time<br>";
    }
    echo "<br>";
}
?>
