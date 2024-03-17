<?php


$ownerData = file_get_contents('database/owner.txt');

if (preg_match('/^\/key\s+([PVG])\|(\d+)$/', $text, $matches)) {


  
$authorizedUserIds = explode("\n", $ownerData);
if (!in_array("$userId", $authorizedUserIds)) {

    bot('sendMessage', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌
- - - - - - - - - - - - - - - - - - - - - -
[↯]Status: <code>User Alert! ⚠️</code>
[↯]Message: <code>Only Owner can use this command</code>
- - - - - - - - - - - - - - - - - - - - - -
</b>",
    'reply_to_message_id' => $message_id,
    'parse_mode' => 'html'
]);
return;
}
//-----------antispam------------//

  

  $messageidtoedit1 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Generating a key...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtoedit = capture(json_encode($messageidtoedit1), '"message_id":', ',');
  
  
  
    $ranko = $matches[1];
    $days = intval($matches[2]);
    
    if ($ranko === 'P') {
        $rank = 'PREMIUM';
    } elseif ($ranko === 'V') {
        $rank = 'VIP';
    } elseif ($ranko === 'G') {
        $rank = 'GAY';
    } else {
        
        $response = "Please specify the Rank or Day";
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $response,
            'parse_mode' => 'html',
        ]);
        return;
    }
    
    $expiryDate = date('Y-m-d', strtotime("+$days days"));
    
$key = 'celes-tial-' . strtoupper(bin2hex(random_bytes(2))) . '-' . strtoupper(bin2hex(random_bytes(2))) . '-' . strtoupper(bin2hex(random_bytes(2)));




$response = "<b>
🔑 Key created Successfully
━━━━━━━━━━━━━━━━━━
[ϟ]Key: <code>$key</code>
[ϟ]Plan: <code>$rank</code>
[ϟ]Expiry: <code>$expiryDate</code>
Claim this by <code>/claim</code> {KEY}
claim it here @trying_py_bot
━━━━━━━━━━━━━━━━━━
</b>";
    
  bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$messageidtoedit,
        'text' => $response,
        'parse_mode' => 'html',
     'disable_web_page_preview'=>'true'
      ]);

  
$keyData = "Rank: $rank\nKey: $key\nExpiry Date: $expiryDate\n\n";
    file_put_contents('database/keys.txt', $keyData, FILE_APPEND);
}
