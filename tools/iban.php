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

if(strpos($text, "/iban ") === 0){ 

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



  
$messageidtoedit2 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Wait for Result...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtoiban = capture(json_encode($messageidtoedit2), '"message_id":', ',');
        
  $ibanx = substr($message, 6);
        $iban = preg_replace("/\s+/", "", $ibanx);
        
        if(preg_match_all("/^([A-Z]{2}[ '+'\\'+'-]?[0-9]{2})(?=(?:[ '+'\\'+'-]?[A-Z0-9]){9,30}$)((?:[ '+'\\'+'-]?[A-Z0-9]{3,5}){2,7})([ '+'\\'+'-]?[A-Z0-9]{1,3})?$/", $iban, $matches)) {
            $iban = $matches[0][0];
            $startTime = microtime(true); 
      
            ###CHECKER PART###  
            $result2 = file_get_contents('https://openiban.com/validate/'.$iban.'?getBIC=true&validateBankCode=true');
            $bankcode1 = capture($result2, '"bankCode": "', '"');
            $bankname = capture($result2, '"name": "', '"');
            $zip = capture($result2, '"zip": "', '"');
            $city = capture($result2, '"city": "', '"');
            $bic = capture($result2, '"bic": "', '"');

            $timetakeen = (microtime(true) - $startTime);
            $timetaken = substr_replace($timetakeen, '',4);

            ###END OF CHECKER PART###
            
            
            if(strpos($result2, 'valid": true')){
              bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtoiban,
                'text'=>"<b>
VALID IBAN CHECKER
━━━━━━━━━━━━━━━
[ϟ]Iban: <code>$iban</code>
[ϟ]Response: Valid IBAN ✅
[ϟ]Bic: <code>$bic</code>
[ϟ]Bank Code: <code>$bankcode1</code>
[ϟ]Bank: <code>$bankname</code>
[ϟ]City: <code>$city</code>
[ϟ]Time: <code>$timetaken</code><code>s</code>
━━━━━━━━━━━━━━━
[ϟ]Req: @$username <b>[$rank]</b>
[ϟ]Dev: <code>@celestial_being</code>
</b>",
                'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'
                
            ]);
            }
        else{
              bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtoiban,
                'text'=>"<b>
VALID IBAN CHECKER
━━━━━━━━━━━━━━━
[ϟ]Iban: <code>$iban</code>
[ϟ]Response: Invalid IBAN ❌
[ϟ]Time: <code>$timetaken</code><code>s</code>
━━━━━━━━━━━━━━━
[ϟ]Req: @$username <b>[$rank]</b>
[ϟ]Dev: <code>@AY_4N</code>
</b>",
                'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'
                
            ]);}
      
        } else{
          bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoiban,
            'text'=>"<b>Provide a Valid Iban!</b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            
        ]);

        }
    }


  