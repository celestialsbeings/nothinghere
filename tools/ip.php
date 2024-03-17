<?php

function GetStrx($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}



if (strpos($text, "/ip") === 0) {


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



  


  
$iplist = preg_replace("/[^0-9.]/", "",$message);

  
if(empty($iplist)){
bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => "<b>Give me valid IP!</b>",
        'reply_to_message_id' => $message_id,
        'parse_mode' => 'html'
    ]);
} else {
$array = explode("\n", $iplist);

$gip = file_get_contents('https://scamalytics.com/ip/'.$array[0].'');


$msg = trim(strip_tags(getStrx($gip,'   <div style="border-bottom: 1px solid #CCCCCC"><b>IP Fraud Risk API</b></div>
        <pre style="margin: 0; text-transform: lowercase;">','</pre>
        <div style="border-top: 1px solid #CCCCCC"><a href="/ip/api/pricing">Click here</a> for details of our <a href="/ip/api/pricing">free usage tier</a>, <a href="/ip/api/pricing">free trial</a>, and <a href="/ip/api/pricing">pricing information</a>.</div>')));

$score = trim(strip_tags(getStrx($gip,'"ip":"'.$array[0].'",
  "score":"','",')));
  
  $risk = $country = trim(strip_tags(GetStrx($gip,'"ip":"'.$array[0].'",
  "score":"'.$score.'",
  "risk":"','"')));

  
$country = trim(strip_tags(getStrx($gip,'   </tr>
        <tr>
            <th>Country Name</th>','   </tr>
        <tr>')));
  $isp = trim(strip_tags(getStrx($gip,'   </tr>
        <tr>
            <th>ISP Name</th>','   </tr>
        <tr>')));

$ipdetails = ("<b>
IP FraudRisk 📲
━━━━━━━━━━━━━━
[ϟ]IP : <code>$array[0]</code>
[ϟ]Score : <code>$score</code>
[ϟ]Risk : <code>$risk</code>
[ϟ]ISP : <code>$isp</code>
[ϟ]Country : <code>$country</code>
━━━━━━━━━━━━━━
[ϟ]Req:</b> <a href='tg://user?id=$userId'>$firstname</a> <b>[$rank]
[ϟ]Dev: <code>@celestial_being</code>

</b>");

bot('sendMessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
        'text' => "$ipdetails",
        'reply_to_message_id' => $message_id,
        'parse_mode' => 'html'
    ]);
}
}