<?php

//=============ANTISPAM=============//
$userId = $user_id;
$timestampFile = 'database/timestamps.json';
if (!function_exists('recordBotResponseTimestamp')) {
    function recordBotResponseTimestamp($userId) {
        global $timestampFile;
        $timestamps = [];

if (file_exists($timestampFile)) {
$timestamps = json_decode(file_get_contents($timestampFile), true);
        }

$timestamps[$userId] = time();
        file_put_contents($timestampFile, json_encode($timestamps));
    }
}



function initializeTimestamp($userId) {
    global $timestampFile;
    $timestamps = [];

    if (file_exists($timestampFile)) {
        $timestamps = json_decode(file_get_contents($timestampFile), true);
    }

    if (!isset($timestamps[$userId])) {
        $timestamps[$userId] = time();
        file_put_contents($timestampFile, json_encode($timestamps));
        return false;
    }
    return true;
}

function isSpamming($userId) {
    global $timestampFile;

    $currentTime = time();

    $timestamps = [];
    if (file_exists($timestampFile)) {
        $timestamps = json_decode(file_get_contents($timestampFile), true);
    }

    if (!isset($timestamps[$userId])) {
        $timestamps[$userId] = $currentTime;
        file_put_contents($timestampFile, json_encode($timestamps));
        return false;
    }

    $lastInteractionTime = $timestamps[$userId];
    $antiSpamDuration = getAntiSpamDuration($userId);

    if ($currentTime - $lastInteractionTime < $antiSpamDuration) {
        $timeToWait = $antiSpamDuration - ($currentTime - $lastInteractionTime);
        return $timeToWait;
    }

    $timestamps[$userId] = $currentTime;
    file_put_contents($timestampFile, json_encode($timestamps));

    return false;
}


function getAntiSpamDuration($userId) {
    if (in_array($userId, file('database/owner.txt', FILE_IGNORE_NEW_LINES))) {
        return 1; 
    }

    $paidData = file_get_contents('database/paid.txt');
    $pattern = "/User ID: $userId\nRank: (.+)\n/";
    if (preg_match($pattern, $paidData, $matches)) {   
        return 30; 
    }

    return 60;
}
//==========ANTISPAM END=========//





