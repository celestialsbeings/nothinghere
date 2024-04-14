<?php

$databaseFile = 'database/users.txt';
if ($message == '/register' || $message == '.register' || $message == '!register') {

    if (file_exists($databaseFile)) {
        $userIds = file_get_contents($databaseFile);
        if (strpos($userIds, (string)$userId ) !== false) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "<b>
[ϟ]User Already Registered ✅
[ϟ]Message: <i>Why you are wasting my time</i>
[ϟ]Username: @$username
[ϟ]Rank : <code>$rank</code>
</b>",
                'reply_to_message_id' => $message_id,
                'parse_mode' => 'html',
                'reply_markup' => json_encode(['inline_keyboard' => [
                    [['text' => 'OWNER', 'url' => "t.me/celestial_being"]],
                ], 'resize_keyboard' => true]),
            ]);
        } else {
            file_put_contents($databaseFile, $userId . PHP_EOL, FILE_APPEND);

            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "<b>
[ϟ]User registered successfully. User can use this bot now!✅
[ϟ]Message: <i>Hope you are here to me purchase not waste time</i>
[ϟ]Username: @$username
[ϟ]Rank: $rank
</b>",
                
                'reply_to_message_id' => $message_id,
                'parse_mode' => 'html',

            ]);
        }
    }
}