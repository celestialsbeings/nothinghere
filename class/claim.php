<?php


if (preg_match('/^\/claim\s+(.+)$/', $text, $matches)) {
    $claimedKey = trim($matches[1]);
    $keyData = file_get_contents('database/keys.txt');
    if (strpos($keyData, "Key: $claimedKey") !== false) {
        $userId = $chat_id;
        $rank = '';
        $expiryDate = '';

        preg_match("/Rank: (.+)\nKey: $claimedKey\nExpiry Date: (.+)\n/", $keyData, $matches);
        if (count($matches) === 3) {
            $rank = $matches[1];
            $expiryDate = $matches[2];
        }
      
        // Remove the claimed key from the database/keys.txt file
        $keyData = str_replace("Rank: $rank\nKey: $claimedKey\nExpiry Date: $expiryDate\n\n", '', $keyData);
        file_put_contents('database/keys.txt', $keyData);


$userId = $user_id;
$chatId = $chat_id;
      
        $response = "<b>
♻️ Key Redeemed Successfully, Welcome To Paid Membership
━━━━━━━━━━━━━━━━━━
User: <code>@$username</code>
UserID: <code>$userId</code>
Rank: <code>$rank</code>
Expiry Date: <code>$expiryDate</code>
━━━━━━━━━━━━━━━━━━
</b>";
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $response,
            'parse_mode' => 'html',
        ]);
        error_log("Username value: " . $username); 
        error_log("File path: " . 'database/paid.txt');  
        $userInfo = "User ID: $userId\nUsername: @$username\nRank: $rank\nExpiry Date: $expiryDate\n";
        file_put_contents('database/paid.txt', $userInfo, FILE_APPEND);
    
    } else {
        // Key does not exist or has already been redeemed
        $response = "<b>Invalid or already redeemed key 🚫</b>";
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => $response,
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html',
        ]);
    }
}
?>
