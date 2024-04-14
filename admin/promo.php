<?php
// 1. Load authorized owner IDs
$ownerData = file_get_contents('database/owner.txt'); 
$authorizedUserIds = explode("\n", $ownerData);

// 2. Get the incoming message, check authorization
// $userId = $update['message']['from']['id']; 

$userIdFile = "database/users.txt";

// 3. Get the incoming message from Telegram

// 4. Check if the message starts with the trigger
if (strpos($text, "/brd") === 0 || strpos($text, "!brd") === 0 || strpos($text, ".brd") === 0){
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
    // Extract the actual message to be sent
    $broadcastMessage = substr($message, 4);

    // 5. Load user IDs from the file
    if (file_exists($userIdFile)) {
        $userIds = file($userIdFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // 6. Iterate and send the message to each user
        foreach ($userIds as $userId) {
            $apiRequest = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$userId&text=" . urlencode($broadcastMessage);
            file_get_contents($apiRequest); 
        }

        // 7. Send a confirmation message back to the sender
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Message sent to all users!"
        ]);
    } else {
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Error: User ID file not found."
        ]);
    }
}

