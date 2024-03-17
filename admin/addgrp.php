

<?php

if (strpos($text, "/add") === 0 || strpos($text, "!add") === 0 || strpos($text, ".add") === 0) {

    $chatId = substr($message, 5);

    $authorizedChats = file('database/grpauth.txt', FILE_IGNORE_NEW_LINES);
    if (in_array($chatId, $authorizedChats)) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => '<b>Chat already Authorized</b>',
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
    } else {
file_put_contents('database/grpauth.txt', $chatId . PHP_EOL, FILE_APPEND);
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => '<b>Chat Authorized successfully!</b>',
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
    }
}




if (strpos($text, "/rev") === 0 || strpos($text, "!rev") === 0 || strpos($text, ".rev") === 0) {

  
$chatIdToRemove = substr($message, 5);
    
 $authGrpFile = file('database/authgrp.txt', FILE_IGNORE_NEW_LINES);
    

    if (($key = array_search($chatIdToRemove, $authGrpFile)) !== false) {

        unset($authGrpFile[$key]);
        file_put_contents('database/authgrp.txt', implode(PHP_EOL, $authGrpFile));
        
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => '<b>Chat ID removed successfully!</b>',
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => '<b>Chat ID not found!</b>',
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
    }
}