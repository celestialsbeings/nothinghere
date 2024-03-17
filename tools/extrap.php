<?php

if(strpos($message, '.ex') === 0 or strpos($message, '/ex') === 0 or strpos($message, '.ex') === 0){


//=====Unregistered users========//
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

//========Authorize users==========//
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


//==========MAIN FUNC============//
function random_strings($length_of_string) 
{$str_result = '0123456789'; 
    return substr(str_shuffle($str_result),   0, $length_of_string); 
}
function mes_strings($length_of_string) 
{$str_result = '123456789'; 
return substr(str_shuffle($str_result),   0, $length_of_string); 
}
function ano_strings($length_of_string) 
{$str_result = '23456789'; 
return substr(str_shuffle($str_result),   0, $length_of_string); 
}

$test = ''.random_strings(6).'';
$binlista = substr($message, 4);
$bincut = substr("$binlista", 0, 6);
$ccextrap = ''.random_strings(6).'xxxx';
$extra = 'xxxx';
$binexcc = "$bincut".$ccextrap;
$binexmes = '0'.mes_strings(1).'';
$binexano = mt_rand(2024, 2033);
error_reporting(0);


  $messageidtoedit3 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Wait for Result...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);
        $messageidtoextra = capture(json_encode($messageidtoedit3), '"message_id":', ',');


$binmsg = ("<b>
Card Extrap 📂
━━━━━━━━━━━━━━━
[ϟ]Bin: <code>$binlista</code>
[ϟ]Extrap: <code>$binexcc|$binexmes|$binexano</code>
━━━━━━━━━━━━━━━
[ϟ]Req: @$username <b>[$rank]</b>
[ϟ]Dev: <code>@celestial_being</code>

</b>");

              bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtoextra,
                'text'=>"$binmsg",
                'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'
                
            ]);}
      
        


  







  