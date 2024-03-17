<?php

$botToken = '6713741076:AAGnXknRCDWOOblqIvMAJW3v5aMSZBP21W8';
$website = "https://api.telegram.org/bot" . $botToken;
$update = file_get_contents('php://input');
$update = json_decode($update, true);

$My_ID           = "5308059847";
$chatname        = $update["message"]["chat"]["title"]; 
$newusername     = $update["message"]["new_chat_member"]["username"];
$newgId          = $update["message"]["new_chat_member"]["id"];
$newfirstname    = $update["message"]["new_chat_member"]["first_name"];
$new_chat_member = $update["message"]["new_chat_member"];
$message         = $update["message"]["text"];
$message_id      = $update["message"]["message_id"];
$chatId          = $update["message"]["chat"]["id"];
$username2       = $update["message"]["from"]["username"];
$firstname       = $update["message"]["from"]["first_name"];
$cdata2          = $update["callback_query"]["data"];
$cchatid2        = $update["callback_query"]["message"]["chat"]["id"]; 
$username2       = $update["callback_query"]["from"]["username"];
$firstname2      = $update["callback_query"]["from"]["first_name"];
$userId2         = $update["callback_query"]["from"]["id"];
$cmessage_id2    = $update["callback_query"]["message"]["message_id"]; 
$username3       = ('@'.$username);
// $username3       = '@'.$username2;
 $info            = json_encode($update, JSON_PRETTY_PRINT); 
$emojid = '❌';
$emojil = '✅';
$owner = '<code>@celestial_being</code>';
$cofuid = '1212';
$cofuid2 = '1212';
$cofuid3 = '1212';


$update = json_decode(file_get_contents("php://input"));
$chat_id = $update->message->chat->id;
$userId = $update->message->from->id;
$userIdd = $update->message->reply_to_message->from->id;
$firstnamee = $update->message->reply_to_message->from->first_name;
$firstname = $update->message->from->first_name;
$lastname = $update->message->from->last_name;
$username = $update->message->from->username;
$chattype = $update->message->chat->type;
$replytomessageis = $update->message->reply_to_message->text;
$replytomessagei = $update->message->reply_to_message->from->id;
$replytomessageiss = $update->message->reply_to_message;
$data = $update->callback_query->data;
$callbackfname = $update->callback_query->from->first_name;
$callbacklname = $update->callback_query->from->last_name;
$callbackusername = $update->callback_query->from->username;
$callbackchatid = $update->callback_query->message->chat->id;
$callbackuserid = $update->callback_query->message->reply_to_message->from->id;
$callbackmessageid = $update->callback_query->message->message_id;
$callbackfrom = $update->callback_query->from->id;
$callbackmessage = $update->callback_query->message->text;
$callbackid = $update->callback_query->id;
$text = $update->message->text;
 

$filename = 'database/users.txt';  
$current_user = count(file($filename, FILE_SKIP_EMPTY_LINES));
$userData = file_get_contents('database/users.txt');
//===========START============//
if (strpos($text, "/start") === 0 || strpos($text, "!start") === 0 || strpos($text, ".start") === 0) {

 
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

$videostart = "https://graph.org/file/1b9732a5f508c80eabdaa.mp4";
$welcomeMessage = "👋 Hello @$username

This bot provides powerful tools for CC checking and more. 

ℹ️ Type /help for a list of available information.

🐞 If you experience any issues, please contact the owner for support.

💪 Community Power: $current_user

📡 Bot Status: <code>Online ✅</code>";        

        bot('sendVideo', [
            'chat_id' => $chat_id,
            'video' => $videostart,
            'caption' => $welcomeMessage,
            'parse_mode' => 'html',
            'reply_to_message_id' => $message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
          [['text' => "Buy", 'url' => "t.me/celestial_being"], ['text' => "❌ Close", 'callback_data' => "end"]],
                ],
            ]),
        ]);
    }   

//=========CMDS============//
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

  $videocmds = "https://graph.org/file/1b9732a5f508c80eabdaa.mp4";
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

//============TOOLS==============//
if($data == 'tools') {
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {
  
$tools = ("<b>
	Page Number: 1
	- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 SK CHECK
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/sk sk_live_</code>
Comment: No comment added
Update Since: 30-09-2022 20:29:57 PM
- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 CC GENERATE
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/gen [bin]</code>
Comment: No comment added
Update Since: 02-06-2022 23:02:20 PM
- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 BIN LOOKUP
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/bin binxxx</code>
Comment: No comment added
Update Since: 12-06-2022 18:12:33 PM
- - - - - - - - - - - - - - - - - - - - -
</b>");  
  
  bot('editMessageCaption', [
      'chat_id' => $callbackchatid,
      'video'=> $videocmds,

'caption' => $tools,
      'message_id'=>$callbackmessageid,
      'parse_mode' => 'html',
      'reply_markup'=>json_encode(['inline_keyboard'=>[
      [['text'=>'Gates', 'callback_data'=>"gates"],['text' => "Next »", 'callback_data' => "toolsn"]],
    [['text'=>'↩️Return', 'callback_data'=>"back2"]],
      ],'resize_keyboard' => true
     ]) ]);
    }
}

//=========TOOLS PAGE 1=========//
if($cdata2 == 'toolsn'){
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {
  
  $toolsn = ("<b>
Page Number: 2
	- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 WEATHER CHECK
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/weather [City]</code>
Comment: No comment added
Update Since: 30-09-2022 20:29:57 PM
- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 INFO USER
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/info</code>
Comment: No comment added
Update Since: 02-06-2022 23:02:20 PM
- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 CARD EXTRAP
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/ex $cc|$mm|$yy|$cvv</code>
Comment: No comment added
Update Since: 12-06-2022 18:12:33 PM
- - - - - - - - - - - - - - - - - - - - -
</b>");
  

  bot('editMessageCaption', [
      'chat_id' => $callbackchatid,
      'video'=> $videocmds,
      'caption' => $toolsn,
      
      'message_id'=>$callbackmessageid,
      'parse_mode' => 'html',
      'reply_markup'=>json_encode(['inline_keyboard'=>[
      [['text'=>'↩️Return', 'callback_data'=>"tools"],['text' => "Next »", 'callback_data' => "toolsnn"]],
    [['text'=>' ❌ Close', 'callback_data'=>"end"]],
      ],'resize_keyboard' => true
     ]) ]);
    }
}

if($cdata2 == 'toolsnn'){
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {
  
  $toolsnn = ("<b>
Page Number: 3
	- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 RANDOM ADDRESS
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/rand US(Ccode)</code>
Comment: No comment added
Update Since: 16-07-2022 19:58:49 PM
- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 IP ADDRESS CHECK
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/ip 1.1.1.1[ip]</code>
Comment: No comment added
Update Since: 16-07-2022 19:58:49 PM
- - - - - - - - - - - - - - - - - - - - -
Tool 🔥 IBAN CHECK
- - - - - - - - - - - - - - - - - - - - -
STATUS [ ONLINE ✅ ]
Format: <code>/iban ibanxxxxxxx</code>
Comment: No comment added
Update Since: 16-07-2022 19:58:49 PM
- - - - - - - - - - - - - - - - - - - - -
</b>");
  
  
  bot('editMessageCaption', [
      'chat_id' => $callbackchatid,
      'video'=> $videocmds,
      'caption' => $toolsnn,
      
      'message_id'=>$callbackmessageid,
      'parse_mode' => 'html',
      'reply_markup'=>json_encode(['inline_keyboard'=>[
      [['text'=>'↩️Return', 'callback_data'=>"toolsn"],['text' => "Gates", 'callback_data' => "gates"]],
    [['text'=>' ❌ Close', 'callback_data'=>"end"]],
      ],'resize_keyboard' => true
     ]) ]);
    }
}


//=============GATES===============//
if($data == 'gates'){
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {


  $gates = ("<b>
  AVAILABLE GATES	

  ϟ TOTAL GATES ↠ 6
  ϟ AUTH GATES ↠ 3
  ϟ CHARGE GATES ↠ 3
  </b>");


  bot('editMessageCaption', [
    'chat_id' => $callbackchatid,
    'video'=> $videocmds,
    'caption' => $gates,

    'message_id'=>$callbackmessageid,
    'parse_mode' => 'html',
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>'Auth', 'callback_data'=>"auth"],['text' => "Charge", 'callback_data' => "charge"]],
    [['text'=>'↩️Return', 'callback_data'=>"back2"]],
    ],'resize_keyboard' => true
   ]) ]);
  }
}

//==============BACK=============//
if ($data == 'back') {
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {
  bot('editMessageCaption', [
    'chat_id' => $callbackchatid,
    'video' => $videocmds,
    'caption' => $gates,
    'message_id' => $callbackmessageid,
    'parse_mode' => 'html',
    'reply_markup' => json_encode([
      'inline_keyboard' => [
                [['text' => "Gateways", 'callback_data' => "gates"], ['text' => "Tools", 'callback_data' => "tools"], ['text' => "Channel", 'callback_data' => "channel"]],
                [['text' => " ❌ Close", 'callback_data' => "end"]],
            ],
        ]),
    ]);
  }
}

//=============ME==============//
/*if ($data == 'me') {
  if ($callbackfrom != $callbackuserid) {
      bot('answerCallbackQuery', [
          'callback_query_id' => $callbackid,
          'text' => "Not Allowed,Open your own Menu ❌",
          "show_alert" => true
      ]);
  } else {
      // Enviar el mensaje del perfil
      $keyboard = [
          [
              ['text' => '↩️Return', 'callback_data' => 'back2'],
              ['text' => ' ❌ Close', 'callback_data' => 'end']
          ]
      ];

      bot('editMessageCaption', [
          'chat_id' => $callbackchatid,
          'reply_to_message_id' => $message_id,
          'caption' => "<b>
[🧧]PROFILE AREA
━━━━━━━━━━━━━━
[↯]User[NAME]: @$callbackusername
[↯]User[ID]: <code>$callbackuserid</code>
[↯]User[RANK]: $rank
[↯]User[EXPIRY]: $expiryDate
━━━━━━━━━━━━━━
</b>",

'message_id' => $callbackmessageid,
          'parse_mode' => 'html',
          'reply_markup' => json_encode([
              'inline_keyboard' => $keyboard,
              'resize_keyboard' => true
          ])
      ]);
  }
}*/
//==========BACK 2===========//
if ($data == 'back2') {
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {

  $cmdstext = ("<b>Welcome to my command center\nHere are my commands -
</b>");


  bot('editMessageCaption', [
    'chat_id' => $callbackchatid,
    'video' => $videocmds,
    'caption' => $cmdstext,
    'message_id' => $callbackmessageid,
    'parse_mode' => 'html',
    'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "Gateways", 'callback_data' => "gates"], ['text' => "Tools", 'callback_data' => "tools"], ['text' => "Channel", 'callback_data' => "channel"]],
                [['text' => " ❌ Close", 'callback_data' => "end"]],
            ],
        ]),
    ]);
  }
}

//============= ❌ Close============//
if($data == 'end'){
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {
  file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$cchatid2&message_id=$cmessage_id2");
 }
}
//=============CHARGE===============//
if ($data == 'charge') {
    displayChargeOptions($callbackchatid, $callbackmessageid);
}
if ($data == 'charge2') {
    displayChargeOptions2($callbackchatid, $callbackmessageid);
}

// Function to display charge options
function displayChargeOptions($chatId, $messageId) {
    $ChargeOptions = [
        [['text' => '🚀 Stripe', 'callback_data' => 'Stripechar_command'], ['text' => '🔧 Braintree', 'callback_data' => 'Braintree_command']],
        [['text' => '💳 Paypal', 'callback_data' => 'Paypal_command'], ['text' => '💳 Ruby', 'callback_data' => 'Ruby_command']],
        [['text' => '🔄 Shopify', 'callback_data' => 'Shopify_command'], ['text' => '🔮 Mars', 'callback_data' => 'Mars_command']],       // Add buttons for other commands here
        [['text' => '↩️ Return', 'callback_data' => 'gates'], ['text' => '⏭️ Next', 'callback_data' => 'charge2']], // Comma was added here
    ];
    bot('editMessageReplyMarkup', [
        'chat_id' => $chatId,
        'message_id' => $messageId,
        'reply_markup' => json_encode(['inline_keyboard' => $ChargeOptions])
    ]);
}

// Function to display charge options 2
function displayChargeOptions2($chatId, $messageId) {
    $ChargeOptions2 = [
        [['text' => '🚀 Authnet', 'callback_data' => 'Authnet_command'], ['text' => '🔧 Stripe+Woocomm', 'callback_data' => 'Stripe+Woocomm_command']],      // Add buttons for other commands here
        [['text' => '↩️ Return', 'callback_data' => 'charge']], // Comma was added here
    ];
    bot('editMessageReplyMarkup', [
        'chat_id' => $chatId,
        'message_id' => $messageId,
        'reply_markup' => json_encode(['inline_keyboard' => $ChargeOptions2])
    ]);
}

// Callbacks for handling commands for each option will remain the same as in your original code
// Callback for displaying commands for Hermes
if ($data == 'Authnet_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        - - - - - - - - - - - - - - - - - - - - -
        Gateway 🔥 Authnet [ 25$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/atn cc|mon|year|cvv</code>
        Comment: Captcha
        Update Since: 27-08-2023 14:54:54
        - - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge2"]],
            ],'resize_keyboard' => true])
        ]);
    }
}

if ($data == 'Stripe+Woocomm_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        - - - - - - - - - - - - - - - - - - - - -
        Gateway 🔥 Stripe+Woocomm [ 25$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/bl cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 24-08-2023 17:27:52
        - - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge2"]],
            ],'resize_keyboard' => true])
        ]);
    }
}
// Callback for displaying commands for Hermes
if ($data == 'Stripechar_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Stripe [ 1$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ ONLINE ✅ ]
        Format: <code>/chk cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 16-03-2023 16:04:18
        - - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge"]],
            ],'resize_keyboard' => true])
        ]);
    }
}

// Callback for displaying commands for Hermes
if ($data == 'Shopify_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        - - - - - - - - - - - - - - - - - - - - -
        Gateway 🔥 Shopify [ 10$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/sh cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 16-03-2023 16:04:18
        - - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge"]],
            ],'resize_keyboard' => true])
        ]);
    }
}

// Callback for displaying commands for Felix
if ($data == 'Braintree_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Braintree [ 50$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ ONLINE ✅ ]
        Format: <code>/btr cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 24-08-2023 14:17:11
        - - - - - - - - - - - - - - - - - - - - -    
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge"]],
            ],'resize_keyboard' => true])
        ]);
    }
}




if ($data == 'Paypal_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Paypal [ 0.1$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ ONLINE ✅ ]
        Format: <code>/ppa cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 23-08-2023 19:18:06
        - - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


if ($data == 'Ruby_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Ruby [ 20$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/rb cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 23-08-2023 18:40:31 
        - - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


if ($data == 'Stripe_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Stripe [ 1$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ ONLINE ✅ ]
        Format: <code>/stp cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 27-06-2023 10:36:07 
        - - - - - - - - - - - - - - - - - - - - -   
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


if ($data == 'Mars_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Mars [ 1$ ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/mr cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 20-05-2023 10:18:05
        - - - - - - - - - - - - - - - - - - - - -    
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"charge"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


//=============CHANNEL=============//

if($data == 'channel'){
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {

  $channel = ("<b>Join our official channels</b>");


  bot('editMessageCaption', [
    'chat_id' => $callbackchatid,
    'video' => $videocmds,
    'caption' => $channel,
    'message_id' => $callbackmessageid,
    'parse_mode' => 'html',
  'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>'Group', 'url' => "https://t.me/anyonecanas"],
  ['text' => "Channel", 'url' => "https://t.me/@crackedaccns"]],
[['text'=>'↩️Return', 'callback_data'=>"back2"]],
],'resize_keyboard' => true
 ]) ]);
}
}

//=============AUTH================//
// Callback for displaying auth options
if ($data == 'auth') {
    displayAuthOptions($callbackchatid, $callbackmessageid);
}

// Function to display auth options
function displayAuthOptions($chatId, $messageId) {
    $authOptions = [
        [['text' => '🚀 Hermes', 'callback_data' => 'hermes_command'], ['text' => '🔧 Felix', 'callback_data' => 'felix_command']],
        [['text' => '💳 Payflow', 'callback_data' => 'payflow_command'], ['text' => '💳 Adyen', 'callback_data' => 'Adyen_command']],
        [['text' => '🔄 Recurly', 'callback_data' => 'Recurly_command'], ['text' => '🔮 Metamorphis', 'callback_data' => 'Metamorphis_command']],
        // Add buttons for other commands here
        [['text' => '↩️ Return', 'callback_data' => 'gates']], // Comma was added here
    ];
    bot('editMessageReplyMarkup', [
        'chat_id' => $chatId,
        'message_id' => $messageId,
        'reply_markup' => json_encode(['inline_keyboard' => $authOptions])
    ]);
}

// Callback for displaying commands for Hermes
if ($data == 'hermes_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Hermes [ Auth ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/hr cc|mon|year|cvv</code>
        Comment: Will back soon
        Update Since: 18-07-2023 13:37:17
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"auth"]],
            ],'resize_keyboard' => true])
        ]);
    }
}

// Callback for displaying commands for Felix
if ($data == 'felix_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Felix [ Auth ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/fx cc|mon|year|cvv</code>
        Comment: Will back soon
        Update Since: 14-08-2023 18:51:30     
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"auth"]],
            ],'resize_keyboard' => true])
        ]);
    }
}




if ($data == 'payflow_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Payflow [ Auth ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ ONLINE ✅ ]
        Format: <code>/plw cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 28-06-2023 12:54:35
        - - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"auth"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


if ($data == 'Adyen_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Adyen [ Auth ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ ONLINE ✅ ]
        Format: <code>/any cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 14-08-2023 18:12:42
        - - - - - - - - - - - - - - - - - - - - -  
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"auth"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


if ($data == 'Recurly_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Recurly [ Auth ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/sex cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 15-08-2023 10:12:09
        - - - - - - - - - - - - - - - - - - - - -   
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"auth"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


if ($data == 'Metamorphis_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
        Gateway 🔥 Metamorphis [ Auth ]
        - - - - - - - - - - - - - - - - - - - - -
        STATUS [ OFFLINE ❌ ]
        Format: <code>/mm cc|mon|year|cvv</code>
        Comment: No comment added
        Update Since: 02-09-2023 13:13:46
        - - - - - - - - - - - - - - - - - - - - -     
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"auth"]],
            ],'resize_keyboard' => true])
        ]);
    }
}

//=============HElP Command==============//
if (strpos($text, "/help") === 0 || strpos($text, "!help") === 0 || strpos($text, ".help") === 0) {
    if (strpos($userData, "$userId") === false) {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌
- - - - - - - - - - - - - - - - - - - - - - - - - - - -
[↯]Status: <code>Unregistered User! ⚠️</code>
[↯]Message: <code>You have to register first to use me</code>
You have to use <code>/register</code> to use me 
- - - - - - - - - - - - - - - - - - - - - - - - - - - -
</b>",
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
        return;
    }

    $videostart = "https://graph.org/file/1b9732a5f508c80eabdaa.mp4";
    $welcomeMessage = "<b>Introducing the Celestial CC Checker</b>

Created by <b>@celestial_being</b>, this potent PHP-based CC checking bot offers streamlined checking and advanced features:

* <b>Core Functionality:</b> Effortlessly verifies the validity of credit cards.
* <b>3DS Verification:</b> Determines if a card requires 3D Secure authentication for enhanced security insights.
* <b>Charged CC Detection:</b> Intelligently identifies if a card has been successfully charged, providing crucial success indicators. 

<b>Key Advantages:</b>

* <b>User-friendly:</b> Designed with ease of use in mind.
* <b>Efficient:</b> Delivers fast and reliable results.
* <b>Informative:</b> Provides deeper data points than typical CC checkers.

<b>How to use this bot:</b>
1> first register by <code>/register</code>.
2> then send <code>/cmds</code> to get the list of command for using free commands.
3> If you want bot all features click on Buy button.

Get the edge in CC checking. Contact @celestial_being for access to this powerful tool!";

    bot('sendVideo', [
        'chat_id' => $chat_id,
        'video' => $videostart,
        'caption' => $welcomeMessage,
        'parse_mode' => 'html',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "Buy", 'url' => "t.me/celestial_being"], ['text' => "Claim/Redeem", 'callback_data' => "redeem_command"]],
                [['text' => "Commands", 'callback_data' => "cmd_command"], ['text' => "Channel", 'callback_data' => "channel"]],
                [['text' => " ❌ Close", 'callback_data' => "end"]],
            ],
        ]),
    ]);
}

if ($data == 'back_command') {
    // Call the function displayHelpOptions with appropriate arguments
    displayHelpOptions($callbackchatid, $callbackmessageid);
}



function displayHelpOptions($chatId, $messageId) {
    $help = "<b>Introducing the Celestial CC Checker</b>

  Created by <b>@celestial_being</b>, this potent Python-based CC checking bot offers streamlined checking and advanced features:

  * <b>Core Functionality:</b> Effortlessly verifies the validity of credit cards.
  * <b>3DS Verification:</b> Determines if a card requires 3D Secure authentication for enhanced security insights.
  * <b>Charged CC Detection:</b> Intelligently identifies if a card has been successfully charged, providing crucial success indicators. 

  <b>Key Advantages:</b>

  * <b>User-friendly:</b> Designed with ease of use in mind.
  * <b>Efficient:</b> Delivers fast and reliable results.
  * <b>Informative:</b> Provides deeper data points than typical CC checkers.

  <b>How to use this bot:</b>
  1> first register by <code>/register</code>.
  2> then send <code>/cmds</code> to get the list of command for using free commands.
  3> If you want bot all features click on Buy button.

  Get the edge in CC checking. Contact @celestial_being for access to this powerful tool.";
    bot('editMessageReplyMarkup', [
        'chat_id' => $chatId,
        'message_id' => $messageId,
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "Buy", 'url' => "t.me/celestial_being"], ['text' => "Claim/Redeem", 'callback_data' => "redeem_command"]],
                [['text' => "Commands", 'callback_data' => "cmd_command"], ['text' => "Channel", 'callback_data' => "channel2"]],
                [['text' => " ❌ Close", 'callback_data' => "end"]],
            ],
        ]),
    ]);
}


if ($data == 'redeem_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>
- - - - - - - - - - - - - - - - - - - - -
How to redeem your key ? 
- - - - - - - - - - - - - - - - - - - - -
1> Send /claim command 
2> Send key with command \n<code>/claim {Your Key}</code>
- - - - - - - - - - - - - - - - - - - - -
        </b>");

        bot('editMessageCaption', [
            'chat_id' => $callbackchatid,
            'caption' => $data,
            'message_id'=>$callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
                [['text'=>'↩️Return', 'callback_data'=>"back_command"]],
            ],'resize_keyboard' => true])
        ]);
    }
}


if ($data == 'cmd_command') {
    if ($callbackfrom != $callbackuserid) {
        bot('answerCallbackQuery', [
            'callback_query_id' => $callbackid,
            'text' => "Not Allowed,Open your own Menu ❌",
            "show_alert" => true
        ]);
    } else {
        $data = ("<b>Welcome to my command center\nHere are my commands -</b>");

          bot('editMessageCaption', [
            'chat_id' => $callbackchatid,

            'caption' => $channel,
            'message_id' => $callbackmessageid,
            'parse_mode' => 'html',
            'reply_markup'=>json_encode(['inline_keyboard'=>[
              [['text' => "Gateways", 'callback_data' => "gates"], ['text' => "Tools", 'callback_data' => "tools"], ['text' => "Channel", 'callback_data' => "channel"]],
              [['text' => " ❌ Close", 'callback_data' => "end"]],
            ],'resize_keyboard' => true])
        ]);
    }
}
if($data == 'channel2'){
  if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {

  $channel = ("<b>Join our official channels</b>");


  bot('editMessageCaption', [
    'chat_id' => $callbackchatid,
    'video' => $videocmds,
    'caption' => $channel,
    'message_id' => $callbackmessageid,
    'parse_mode' => 'html',
  'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>'Group', 'url' => "https://t.me/anyonecanas"],
  ['text' => "Channel", 'url' => "https://t.me/@crackedaccns"]],
[['text'=>'↩️Return', 'callback_data'=>"back_command"]],
],'resize_keyboard' => true
 ]) ]);
}
}


//=============FUNCTIONS==============//
function clean($string) {
  $text = preg_replace("/\r|\n/", " ", $string);
     $str1 = preg_replace('/\s+/', ' ', $text);
$str = preg_replace("/[^0-9]/", " ", $str1);
$string = trim($str, " ");
$lista = preg_replace('/\s+/', ' ', $string);
   return $lista; 
}


function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;
}


function sendMessage1($message) {
       $message = urlencode($message);
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".$message."&parse_mode=HTML";
        file_get_contents($url);

}


function gibarray($message){
    // $cuted = substr($message, 6);
    return explode("\n", $message);
}

function time1($val)
{
    $endtime = microtime(true);
    $time = $endtime - $val;
    $time = substr($time, 0, 4);
    return $time;
    }



function replyMessage($chat_id, $text, $reply_to_message_id, $reply_markup = null) {
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'reply_to_message_id' => $reply_to_message_id,
        'reply_markup' => $reply_markup
    ]);
}



ignore_user_abort(true);
set_time_limit(0);
function bot($method, $datas = [])
{
    global $botToken;
    $url = "https://api.telegram.org/bot" . $botToken . "/" . $method;

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($datas),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        // Manejar el error de cURL
        return false;
    } else {
        // Decodificar la respuesta
        $result = json_decode($response, true);

        if ($result['ok']) {
            // La solicitud fue exitosa
            return $result['result'];
        } else {
            // Manejar el error de la API de Telegram
            return false;
        }
    }
}


function capture($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}


function sendMessage2($chatId, $message, $message_id)
{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org:443/bot'.$GLOBALS['botToken'].'/sendMessage');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'HTTP/1.1 200 OK'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"chat_id":"'.$chatId.'","text":"'.$message.'","reply_to_message_id":"'.$message_id.'","parse_mode":"HTML"}');
        $result = curl_exec($ch);
    }


function array_in_string($str, array $arr) {
    foreach($arr as $arr_value) { 
        if (stripos($str,$arr_value) !== false) return true; 
    }
    return false;
}

function forwardMessage($chatid,$from_chat_id,$message_id){
  bot('forwardMessage',[
  'chat_id'=>$chatid,
  'from_chat_id'=>$from_chat_id,
  'message_id'=>$message_id]);
}

function copyMessage($chatid,$from_chat_id,$message_id){
  bot('copyMessage',[
  'chat_id'=>$chatid,
  'from_chat_id'=>$from_chat_id,
  'message_id'=>$message_id]);
}

function sendPhoto($chat_id,$photo,$keyboard){
  bot('sendPhoto',[
  'chat_id'=>$chat_id,
  'photo'=>$photo,
  'reply_markup'=>$keyboard]);
}



function send_reply($chatId, $message_id, $keyboard, $message) {
    global $website;
    $url = $website . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message) . "&reply_to_message_id=" . $message_id . "&parse_mode=HTML&reply_markup=" . $keyboard;
    $response = file_get_contents($url);

    if ($response === FALSE) {
        error_log("Failed to send message: " . $url);
    }

    return json_decode($response, TRUE)['result']['message_id'];
}


function edit_sent_message($chatId, $message_id, $message) {
    global $website;
    $url = $website . "/editMessageText?chat_id=" . $chatId . "&message_id=" . $message_id . "&text=" . urlencode($message) . "&parse_mode=HTML";
    $response = file_get_contents($url);

    if ($response === FALSE) {
        error_log("Failed to edit message: " . $url);
    }
    return $response;
}


function reply_tox($chatId,$message_id,$keyboard,$message) {
    global $website;
    $url = $website."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML&reply_markup=".$keyboard."";
    return file_get_contents($url);
}

function deleteM($chatId,$message_id){
    global $website;
    $url = $website."/deleteMessage?chat_id=".$chatId."&message_id=".$message_id."";
    file_get_contents($url);
}


function edit_message($chatId,$message,$message_id_1) {
  sendChatAction($chatId,"type");
   $url = $GLOBALS['website']."/editMessageText?chat_id=".$chatId."&text=".$message."&message_id=".$message_id."&parse_mode=HTML&disable_web_page_preview=True";
  file_get_contents($url);
}



//============FOR EACH==============//
foreach (glob("functions/*.php") as $filename) {
    require_once $filename;
}

foreach (glob("tools/*.php") as $filename) {
    require_once $filename;
}

foreach (glob("gates/*.php") as $filename) {
    require_once $filename;
}

foreach (glob("class/*.php") as $filename) {
    require_once $filename;
}

foreach (glob("database/*.txt") as $filename) {
    require_once $filename;
}

foreach (glob("admin/*.php") as $filename) {
    require_once $filename;
}

foreach (glob("bincache/*.txt") as $filename) {
    require_once $filename;
}
