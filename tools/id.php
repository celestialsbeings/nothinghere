<?php

$command = trim(explode(' ', $text)[0]);



if ($command === "/id") {
    $userId = $userId; 
    $chatId = $chat_id; 

  
    bot('sendMessage', [
        'chat_id' => $chatId,
        'reply_to_message_id' => $message_id,
        'text' => "<b>[ϟ]UserID:</b> <code>$userId</code>\n<b>[ϟ]ChatID:</b> <code>$chatId</code>\n",
        'parse_mode' => 'HTML',
    ]);

  
    if (isset($replytomessageiss)) {
        $replyUserId = $replytomessageiss->from->id;

        
        bot('sendMessage', [
            'chat_id' => $chatId,
            'text' => "<i>ID de la persona: </i><code>$replyUserId</code>\n<i>ID del Chat:</i> <code>$chatId</code>",
            'parse_mode' => 'HTML',
        ]);
    }
}