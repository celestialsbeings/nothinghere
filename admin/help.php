// // // <?php
// // // if (!in_array($userIdd, $userData)) {
// // //     bot('sendMessage', [
// // //         'chat_id' => $chat_id,
// // //         'text' => "<b>
// // // - - - - - - - - - - - - - - - - - - - - - -
// // // [↯]ACCESS DENIED! ❌
// // // - - - - - - - - - - - - - - - - - - - - - -
// // // [↯]Status: <code>Unregistered User! ⚠️</code>
// // // [↯]Message: <code>You have to register first to use me</code>\nUse /register to register
// // // - - - - - - - - - - - - - - - - - - - - - -
// // // </b>",
// // //         'parse_mode' => 'html'
// // //     ]);
// // //     return;
// // // }

// // // $videostart = "https://graph.org/file/1b9732a5f508c80eabdaa.mp4";
// // // // 3. Check for the help command
// // // if (strpos($messageText, "/help") === 0 || strpos($messageText, "!help") === 0 || strpos($messageText, ".help") === 0) {
// // //     // Extract the actual message to be sent

// // //     // 7. Send a confirmation message back to the sender
// // //     bot('sendVideo', [
// // //         'chat_id' => $chat_id,
// // //         'video' => $videostart,
// // //         'caption' => $help,// Customize your help text
// // //         'parse_mode' => 'html',
// // //         'reply_to_message_id' => $message_id,
// // //           'reply_markup' => json_encode([
// // //               'inline_keyboard' => [
// // //         [['text' => "Buy", 'url' => "t.me/celestial_being"], ['text' => "Commands ", 'callback_data' => "/cmds"]],
// // //         [['text' => "Redeem", 'callback_data' => "claim_command"], ['text' => " ❌ Close", 'callback_data' => "end"]],
// // //               ],
// // //           ]),

// // //     ]);
// // // }

// // // if ($data == 'claim_command') {
// // //     if ($callbackfrom != $callbackuserid) {
// // //         bot('answerCallbackQuery', [
// // //             'callback_query_id' => $callbackid,
// // //             'text' => "Not Allowed,Open your own Menu ❌",
// // //             "show_alert" => true
// // //         ]);
// // //     } else {
// // //         $data = ("<b>
// // //         - - - - - - - - - - - - - - - - - - - - -
// // //         How to redeem key ? 
// // //         - - - - - - - - - - - - - - - - - - - - -
// // //         1> Send /claim command 
// // //         2> Send key with command <code>/claim {Your Key}</code>
// // //         - - - - - - - - - - - - - - - - - - - - -
// // //         </b>");

// // //         bot('editMessageCaption', [
// // //             'chat_id' => $callbackchatid,
// // //             'caption' => $data,
// // //             'message_id'=>$callbackmessageid,
// // //             'parse_mode' => 'html',
// // //             'reply_markup'=>json_encode(['inline_keyboard'=>[
// // //                 [['text'=>'↩️Return', 'callback_data'=>"charge"]],
// // //             ],'resize_keyboard' => true])
// // //         ]);
// // //     }
// // // }

// // // if ($data == 'cmd_command') {
// // //   if ($callbackfrom != $callbackuserid) {
// // //       bot('answerCallbackQuery', [
// // //           'callback_query_id' => $callbackid,
// // //           'text' => "Not Allowed, Open your own Menu ❌",
// // //           "show_alert" => true
// // //       ]);
// // //   }  
// // //   $welcomeMessage = "<b>Welcome to my command center\nHere are my commands -
// // //   </b>";
// // //         bot('sendVideo', [
// // //             'chat_id' => $chat_id,
// // //             'video' => $videocmds,
// // //             'caption' => $welcomeMessage,
// // //             'parse_mode' => 'html',
// // //             'reply_to_message_id' => $message_id,
// // //             'reply_markup' => json_encode([
// // //                 'inline_keyboard' => [
// // //                     [['text' => "Gateways", 'callback_data' => "gates"], ['text' => "Tools", 'callback_data' => "tools"], ['text' => "Channel", 'callback_data' => "channel"]],
// // //                     [['text' => " ❌ Close", 'callback_data' => "end"]],
// // //                 ],
// // //             ]),
// // //         ]);
// // // }


// // if ($data == 'cmd_command') {
// //     if ($callbackfrom != $callbackuserid) {
// //         bot('answerCallbackQuery', [
// //             'callback_query_id' => $callbackid,
// //             'text' => "Not Allowed, Open your own Menu ❌",
// //             'show_alert' => true
// //         ]);
// //         return; // Exit if not authorized
// //     }

// //     // Authorized actions
// //     $videocmds = "https://graph.org/file/1b9732a5f508c80eabdaa.mp4";
// //     $welcomeMessage = "<b>Welcome to my command center\nHere are my commands -</b>";

// //     bot('sendVideo', [
// //         'chat_id' => $chat_id,
// //         'video' => $videocmds,
// //         'caption' => $welcomeMessage,
// //         'parse_mode' => 'html',
// //         'reply_to_message_id' => $message_id,
// //         'reply_markup' => json_encode([
// //             'inline_keyboard' => [
// //                 [['text' => "Gateways", 'callback_data' => "gates"], ['text' => "Tools", 'callback_data' => "tools"], ['text' => "Channel", 'callback_data' => "channel"]],
// //                 [['text' => " ❌ Close", 'callback_data' => "end"]],
// //              ],
// //          ]),
// //     ]);
// // }
// if ($data == 'cmd_command') {
//     echo "cmd working";
//     if ($callbackfrom != $callbackuserid) {
//         bot('answerCallbackQuery', [
//             'callback_query_id' => $callbackid,
//             'text' => "Not Allowed,Open your own Menu ❌",
//             "show_alert" => true
//         ]);
//     } else {
//         echo "cmd working";
//         $data = ("<b>Welcome to my command center\nHere are my commands -</b>");

//         bot('sendVideo', [
//             'chat_id' => $chat_id,
//             'video' => $videocmds,
//             'caption' => $welcomeMessage,
//             'parse_mode' => 'html',
//             'reply_to_message_id' => $message_id,
//             'reply_markup' => json_encode([
//                 'inline_keyboard' => [
//                     [['text' => "Gateways", 'callback_data' => "gates"], ['text' => "Tools", 'callback_data' => "tools"], ['text' => "Channel", 'callback_data' => "channel"]],
//                     [['text' => " ❌ Close", 'callback_data' => "end"]],
//             ],'resize_keyboard' => true])
//         ]);
//     }
// }
// if (strpos($text, "/help") === 0 || strpos($text, "!help") === 0 || strpos($text, ".help") === 0) {
// if (strpos($userData, "$userId") === false) {
// bot('sendMessage', [
//     'chat_id' => $chat_id,
//     'message_id' => $message_id,
//     'text' => "<b>
// - - - - - - - - - - - - - - - - - - - - - -
// [↯]ACCESS DENIED! ❌
// - - - - - - - - - - - - - - - - - - - - - -
// [↯]Status: <code>Unregistered User! ⚠️</code>
// [↯]Message: <code>You have to register first to use me</code>
// You have to use <code>/register</code> to use me 
// - - - - - - - - - - - - - - - - - - - - - -
// </b>",
//     'reply_to_message_id' => $message_id,
//     'parse_mode' => 'html'
// ]);
// return;
//     }
//     $help = "<b>Introducing the Celestial CC Checker</b>

// Created by <b>@celestial_being</b>, this potent Python-based CC checking bot offers streamlined checking and advanced features:

// * <b>Core Functionality:</b> Effortlessly verifies the validity of credit cards.
// * <b>3DS Verification:</b> Determines if a card requires 3D Secure authentication for enhanced security insights.
// * <b>Charged CC Detection:</b> Intelligently identifies if a card has been successfully charged, providing crucial success indicators. 

// <b>Key Advantages:</b>

// * <b>User-friendly:</b> Designed with ease of use in mind.
// * <b>Efficient:</b> Delivers fast and reliable results.
// * <b>Informative:</b> Provides deeper data points than typical CC checkers.

// <b>How to use this bot:</b>
// 1> first register by <code>/register</code>.
// 2> then send <code>/cmds</code> to get the list of command for using free commands.
// 3> If you want bot all features click on Buy button.

// Get the edge in CC checking. Contact @celestial_being for access to this powerful tool!";
//     $videocmds = "https://graph.org/file/1b9732a5f508c80eabdaa.mp4";

//     bot('sendVideo', [
//         'chat_id' => $chatId,
//         'video' => $videocmds,
//         'caption' => $help,
//         'parse_mode' => 'html',
//         'reply_to_message_id' => $messageId,
//         'reply_markup' => json_encode([
//             'inline_keyboard' => [
//                 [['text' => "Buy", 'url' => "t.me/celestial_being"], ['text' => "Claim/Redeem", 'callback_data' => "redeem_command"]],
//                 [['text' => "Commands", 'callback_data' => "cmd_command"], ['text' => "Channel", 'callback_data' => "channel"]],
//                 [['text' => " ❌ Close", 'callback_data' => "end"]],
//             ],
//         ]),
//     ]);
// }
