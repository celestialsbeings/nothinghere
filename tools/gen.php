<?php

//==========function editMessage====//

function saveLastUsedBin($user_id, $bin) {
    $filename = "bincache/last_used_bin_$user_id.txt";
    $data = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
    $newRecord = "$user_id - $bin";
    if (count($data) >= 100) {
        array_shift($data);
    }
    array_push($data, $newRecord);
    file_put_contents($filename, implode("\n", $data));
}

function getLastUsedBin($user_id) {
    $filename = "bincache/last_used_bin_$user_id.txt";
    if (!file_exists($filename)) {
        return null;
    }
    $data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lastRecord = end($data);
    list($id, $bin) = explode(' - ', $lastRecord);
    return $bin;
}

function generateCC($input, $quantity = 10) {
    $cardsResponse = [];
    for ($i = 0; $i < $quantity; $i++) {
        $ccInfo = parseCCFormat($input);
        $cc = generateCCNumber($ccInfo['ccNumber'], $input); 
        $mm = $ccInfo['expirationMonth'] ?? str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
        $yy = $ccInfo['expirationYear'] ?? str_pad(rand(24, 33), 2, "0", STR_PAD_LEFT);
if (strlen($yy) == 2) {
$yy = "20" . $yy;
}

if (isset($ccInfo['cvv'])) {
$cvv = $ccInfo['cvv'];
} else {
$cvv = generateRandomCVV();
}

        $cardsResponse[] = [
            'cc' => $cc,
            'mm' => $mm,
            'yy' => $yy,
            'cvv' => $cvv,
        ];
    }

    // Generate the response string

$response = "";
  
$response .= "<b>
♻️ Here are your cards lolicon

[ϟ] Format: <code>$input</code>
[ϟ] Amount: <code>$quantity</code>
 - - - - - - - - - - - - - - - - - - - - -  - - - - -
</b>";

  
if (count($cardsResponse) > 0) {
    foreach ($cardsResponse as $card) {
        $cc = $card['cc'];
        $mm = $card['mm'];
        $yy = $card['yy'];
        $cvv = $card['cvv'];

        $response .= "<code>$cc|$mm|$yy|$cvv</code>\n";
    }
}

$fim = json_decode(file_get_contents('https://bins.antipublic.cc/bins/'.$input), true);
    $bin = $fim["bin"] ?? null;
   if ($bin !== null) {
     $brand = $fim["brand"];
        $country = $fim["country"];
        $country_name = $fim["country_name"];
        $country_flag = $fim["country_flag"];
        $country_currencies = $
        $bank = $fim["bank"];
        $level = $fim["level"];
        $type = $fim["type"];   
        $brand = $fim["brand"];

$response .= "<b>- - - - - - - - - - - - - - - - - - - - - - - - - -
[ϟ] Bin: <code>$bin</code>
[ϟ] Info: <code>$level - $type [$country_flag]</code>
[ϟ] Brand: <code>$brand</code>
[ϟ] Country: <code>$country_name - $country</code>
[ϟ]Dev: <code>@celestial_being</code>

</b>";

return $response;
  }
}



function generateCCNumber($bin, $input) {
    $ccNumber = $bin;
    $remainingDigits = 16 - strlen($bin) - 1;

    for ($i = 0; $i < $remainingDigits; $i++) {
        $ccNumber .= mt_rand(0, 9);
    }

    $ccNumber .= calculateLuhnCheckDigit($ccNumber);
    return $ccNumber;
}

function calculateLuhnCheckDigit($number) {
    $sum = 0;
    $numDigits = strlen($number);
    $parity = $numDigits % 2;

        for ($i = $numDigits - 1; $i >= 0; $i--) {
        $digit = intval($number[$i]);

        if ($i % 2 != $parity) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }

        $sum += $digit;
    }

    $checkDigit = (10 - ($sum % 10)) % 10;
    return $checkDigit;
}

function generateRandomCVV() {
return str_pad(rand(1, 999), 3, "0", STR_PAD_LEFT);
 }   

function generateRandomCVVWithLuhn($ccNumber) {
    $randomCVV = str_pad(rand(1, 999), 3, "0", STR_PAD_LEFT);
    $ccNumberWithCVV = $ccNumber . $randomCVV;
    $luhnCheckDigit = calculateLuhnCheckDigit($ccNumberWithCVV);
    return substr($randomCVV, 0, 2) . $luhnCheckDigit;
}

function parseCCFormat($input) {
    if (strpos($input, '|') !== false) {
        $ccInfo = [];
        $parts = explode('|', $input);
        if (count($parts) >= 3) {
            $ccInfo['ccNumber'] = str_replace('x', null, $parts[0]);
            $ccInfo['expirationMonth'] = $parts[1];
            $ccInfo['expirationYear'] = $parts[2];
            
            if (isset($parts[3])) {
                $cvvInput = $parts[3];
                if (empty($cvvInput) || $cvvInput === 'xxx' || $cvvInput === 'rnd') {
                    $cvv = generateRandomCVV();
                } else {
                    $cvv = $cvvInput;
                }
                $ccInfo['cvv'] = str_replace(['xxx', 'rnd'], [$cvv, $cvv], $cvvInput);
            }
        }
        return $ccInfo;
    } else {
        $ccInfo = [];
        $ccInfo['ccNumber'] = str_replace('x', null, $input);
        $ccInfo['expirationMonth'] = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
        $ccInfo['expirationYear'] = "20" . rand(24, 33); 
        $ccInfo['cvv'] = generateRandomCVV();
        return $ccInfo;
    }
}




$message = $_POST['message'] ?? '';

//--------bin info--------//



//--------bin info end----------//

$update = file_get_contents('php://input');
$update = json_decode($update, true);
if (isset($update['message'])) {
    $message = $update['message']['text'];
    $chat_id = $update['message']['chat']['id'];
    $user_id = $update['message']['from']['id'];
$username = $update['message']['from']['username'];

//==========MAIN===========//
if (preg_match('/^(?:\/|\.)gen (.+)$/', $message, $matches)) {


  
  $messageidtoedit5 = bot('sendmessage', [
        'chat_id' => $chat_id,
        'text' => "<b>Generating Cards..</b>",
        'parse_mode' => 'html',
        'reply_to_message_id' => $message_id,
    ]);

    $messageidtogen = capture(json_encode($messageidtoedit5), '"message_id":', ',');
  

  $input = $matches[1];
        saveLastUsedBin($user_id, $input);
        $response = generateCC($input, 10);
    

  
  bot('editMessageText', [
    'chat_id' => $chat_id,
    'message_id' => $messageidtogen,
    'text' => $response,
    'parse_mode' => 'html',
    'reply_to_message_id' => $messageidtogen,
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [['text' => "Gen Again", 'callback_data' => "/gen"],
            ['text' => "Clean", 'callback_data' => "deletegen"]],
        ],
    ]),
]);
}
} 


elseif (isset($update['callback_query'])) {
$callback_query = $update['callback_query'];
$data = $callback_query['data'];
$message = $callback_query['message'];
$chat_id = $message['chat']['id'];
$message_id = $message['message_id'];
$user_id = $callback_query['from']['id'];


//============REGEN==============//  
if ($cdata2 == '/gen') {
if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
        'parse_mode' => 'html',
        "show_alert" => true
        ]);

 }else{   

$input = getLastUsedBin($user_id);
$response = generateCC($input, 10);
      
    bot('editMessageText', [
    'chat_id' => $cchatid2,
    'message_id' => $cmessage_id2,
    'text' => $response,
    'parse_mode' => 'html',
    'reply_to_message_id' => $messageidtogen,
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [['text' => "Gen Again", 'callback_data' => "/gen"],
            ['text' => "Clean", 'callback_data' => "deletegen"]],
        ],
    ]),
]);

    }
  }

//==========DELETE GEN===========//
if ($cdata2 == "deletegen"){
 if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
        'parse_mode' => 'html',
        "show_alert" => true
        ]);

 }else{
   
file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$cchatid2&message_id=$cmessage_id2");
  }
 }
}
  
         
