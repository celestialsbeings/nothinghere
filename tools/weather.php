<?php

include 'class/antispam.php';

if (strpos($text, '!weather') === 0 or strpos($text, '/weather') === 0 or strpos($text, '.weather') === 0) {

    if (strpos($userData, "$userId") === false) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌
- - - - - - - - - - - - - - - - - - - - - -
[↯]Status: <code>Unregistered User! ⚠️</code>
[↯]Message: <code>You have to register first to use me</code>
You have to use <code>/register</code> to use me 
- - - - - - - - - - - - - - - - - - - - - -
</b>",
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
        return;
    }

    $paid = file_get_contents('database/paid.txt');
    if (preg_match('/User ID:\s*(\d+)/', $paid, $matches)) {
        $paids = $matches[1];
    }

    $owner = file_get_contents('database/owner.txt');
    $owners = explode("\n", $owner);

    $authgrp = file_get_contents('database/authgrp.txt');
    $authgrps = explode("\n", $authgrp);

    if (!preg_match($pattern, $paidData, $matches) && !in_array($chatId, $owners)) {

        if (!in_array($chatId, $authgrps)) {

            bot('sendMessage', [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌
- - - - - - - - - - - - - - - - - - - - - -
[↯]Status: <code>Not Allowed Here!⚠️</code>
[↯]Message: <code>Contact the Owner to authorize</code>
You have to use <code>/register</code> to use me 
- - - - - - - - - - - - - - - - - - - - - -
</b>",
                'reply_to_message_id' => $message_id,
                'parse_mode' => 'html'
            ]);
            return;
        }
    }



    //============MAIN CODE=============//

    $location = substr($message, 9);
    if (empty($location)) {

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => "<b>Give me a city Name!</b>",
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
    } else {

        $weatherToken = "89ef8a05b6c964f4cab9e2f97f696c81";

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?q=$location&appid=$weatherToken",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 50,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8,hi;q=0.7",
                "Host: api.openweathermap.org",
                "sec-fetch-dest: empty",
                "sec-fetch-site: same-site"
            ],
        ]);

        $content = curl_exec($curl);
        curl_close($curl);
        $resp = json_decode($content, true);

        $weather = $resp['weather'][0]['main'];
        $description = $resp['weather'][0]['description'];
        $temp = $resp['main']['temp'];
        $humidity = $resp['main']['humidity'];
        $feels_like = $resp['main']['feels_like'];
        $country = $resp['sys']['country'];
        $name = $resp['name'];
        $kelvin = 273;
        $celcius = $temp - $kelvin;
        $feels = $feels_like - $kelvin;
                $weatherresult = ("<b>
Weather Tool 🌩
━━━━━━━━━━━━━━━
[ϟ]Location: <code>$location</code>
[ϟ]Status: <code>$weather</code>
[ϟ]Temp: <code>$celcius °C</code>
[ϟ]Feels: <code>$feels °C</code>
[ϟ]Humidity: <code>$humidity</code>
[ϟ]Country: <code>$country</code>
━━━━━━━━━━━━━━━
[ϟ]Req: @$username <b>[$rank]</b>
[ϟ]Dev: <code>@celestial_being</code>
</b>");

        bot('sendMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => "$weatherresult",
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
    }
}

$timelast = time();
