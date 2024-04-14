<?php

if (strpos($text, "/cmds") === 0 || strpos($text, "!cmds") === 0 || strpos($text, ".cmds") === 0) {

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

  $videocmds = "https://graph.org/file/fb35c2a3a62050e2280b5.mp4";
  $welcomeMessage = "<b>Welcome to my command center\nHere are my commands -
</b>";

    bot('sendVideo', [
        'chat_id' => $chat_id,
        'video' => $videocmds,
        'caption' => $welcomeMessage,
        'parse_mode' => 'html',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "Gateways", 'callback_data' => "gates"], ['text' => "Tools", 'callback_data' => "tools"], ['text' => "Channel", 'callback_data' => "channel"]],
                [['text' => " ❌ Close", 'callback_data' => "end"]],
            ],
        ]),
    ]);
}
