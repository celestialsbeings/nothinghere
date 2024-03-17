<?php

if (strpos($text, "/rand") === 0) {

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

  
$countryCode = trim(substr($text, 6)); 
        
            if (!empty($countryCode)) {
                
                $response = file_get_contents("https://randomuser.me/api/?nat={$countryCode}&inc=location");
        
                if ($response) {
                    $data = json_decode($response, true);
        
                    if (isset($data['results'][0]['location'])) {
                        $location = $data['results'][0]['location'];
        
                        $address = [
                            'country' => $location['country'],
                            'state' => isset($location['state']) ? $location['state'] : 'Sin estado',
                            'city' => $location['city'],
                            'postcode' => $location['postcode'],
                            'street' => $location['street']['name'],
                            'number' => !empty($location['street']['number']) ? $location['street']['number'] : 'Sin número',
                        ];
        
                        $message = "
<b>Random address Generador</b> 
━━━━━━━━━━━━━━━
<b>[ϟ]Country:</b> <code>{$address['country']}</code>
<b>[ϟ]State:</b> <code>{$address['state']}</code>
<b>[ϟ]City:</b> <code>{$address['city']}</code>
<b>[ϟ]Street:</b> <code>{$address['street']}</code>
<b>[ϟ]Zip Code:</b> <code>{$address['postcode']}</code>
<b>[ϟ]Number:</b> <code>{$address['number']}</code>
━━━━━━━━━━━━━━━
<b>[ϟ]Req:</b> @$username <b>[$rank]</b>
<b>[ϟ]Dev:</b> <code>@celestial_being</code>";
       
                        $messageidtoedit1 = bot('sendMessage', [
'chat_id' => $chat_id,
'text' => $message,
'parse_mode' => 'html',
'reply_to_message_id' => $message_id
]);
                    } else {
                        bot('sendMessage', [
                            'chat_id' => $chat_id,
                            'text' => "<i>No se pudo obtener la dirección para el país {$countryCode}.</i>",
                            'reply_to_message_id' => $message_id,
                            'parse_mode' => 'html'
                        ]);
                    }
                } else {
                    bot('sendMessage', [
                        'chat_id' => $chat_id,
                        'text' => "<i>Error en la solicitud para el país {$countryCode}.</i>",
                        'reply_to_message_id' => $message_id,
                        'parse_mode' => 'html'
                    ]);
                }
            } else {
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => '<i>País no especificado. Debe ser "/rand <país>".</i>',
                    'reply_to_message_id' => $message_id,
                    'parse_mode' => 'html'
                ]);
            }}

    