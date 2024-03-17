<?php




if ($cdata2 == "showmass") {


$messageidtoedit5 = bot('sendmessage', [
        'chat_id' => $chat_id,
        'text' => "<b>Generating Cards..</b>",
        'parse_mode' => 'html',
        'reply_to_message_id' => $message_id,
    ]);

    $messageidtogen = capture(json_encode($messageidtoedit5), '"message_id":', ',');
  

$datos_tarjeta = substr($message, 5);
    $mensaje1 = substr($message, 5);
    file_put_contents('bin.txt', $mensaje1);
    $datos_tarjeta = explode('|', $datos_tarjeta);
    $numero = isset($datos_tarjeta[0]) ? $datos_tarjeta[0] : '';
    $mes = isset($datos_tarjeta[1]) ? $datos_tarjeta[1] : '';
    $anio = isset($datos_tarjeta[2]) ? $datos_tarjeta[2] : '';
    $cvv = isset($datos_tarjeta[3]) ? $datos_tarjeta[3] : '';
    $numero = str_replace('x', '', $numero);
  
  $mensaje2 = $mensaje1;


    
if (!preg_match('/^[0-9x]+$/', $numero)) {
sendMessage2($chat_id, "<b>The format to generate a card is: /gen 123456xxx|05|2025|123</b>",$messageidtogen);
return;
}

  if(strlen($anio) == "2"){
$anio = "20$anio";
  }

    if (strlen($anio) > 4) {
        sendMessage2($chat_id, "<b>The year format is incorrect. It must be a 2 or 4 digit value separated by a slash (/)</b>",$messageidtogen);
        return;
    }

    
    if (substr($numero, 0, 2) !== '34' && substr($numero, 0, 2) !== '37' && strlen($cvv) > 3) {
        
      
  bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoiban,
            'text'=>"<b>
   Wrong Format ⚠️
   Ex: <code>/gen binxxx</code>
            </b>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            
        ]);
    return;
    }
    
    elseif ((substr($numero, 0, 2) === '34' || substr($numero, 0, 2) === '37') && strlen($cvv) > 4) {
        sendMessage2($chat_id, "<b>El formato del CVV es incorrecto para tarjetas American Express. Debe ser un valor de 4 dígitos.</b>");
        return;
    }

  if (empty($mes) || $mes === "rnd" || $mes === "xx") {

        $mes_actual = date('m');
        $anio_actual = date('Y');

        for ($i = 0; $i < 10; $i++) {
            $mes_gen = str_pad($mes_actual + $i, 2, '0', STR_PAD_LEFT);
            $anio_gen = $anio_actual + mt_rand(1, 8);

            if ($mes_gen > 12) {
                $mes_gen = str_pad($mes_gen - 12, 2, '0', STR_PAD_LEFT);
                $anio_gen++;
            }

            if (substr($numero, 0, 2) === '51' || substr($numero, 0, 2) === '55') {
                $cvv = str_pad(mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);
            } else {
                $cvv = str_pad(mt_rand(100, 999), 3, '0', STR_PAD_LEFT);
            }

            $tarjeta = cc_gen($numero, $mes_gen, $anio_gen, $cvv);
            $ccs[] = $tarjeta[0];
            $cvvs[] = $cvv;
        }
    } else {
        // Verificamos si se proporcionó la fecha completa (mes y año)
        $fecha_completa = false;
        if (!empty($anio) && strpos($anio, '/') !== false) {
            $fecha_completa = true;
            $fecha = explode('/', $anio);
            $mes = str_pad($mes, 2, '0', STR_PAD_LEFT);
            $mes = $fecha[0];
            $anio = $fecha[1];
        }

      
if (empty($cvv) || $cvv === "rnd" || $cvv === "xxx" || $cvv ==="xxxx") {
    $cvvs = array();
    for ($i = 0; $i < 10; $i++) {
        if (substr($numero, 0, 2) === '34' || substr($numero, 0, 2) === '37') {
            $cvvs[] = str_pad(mt_rand(1000, 9999), 4, '0', STR_PAD_LEFT);
        } else {
            $cvvs[] = str_pad(mt_rand(100, 999), 3, '0', STR_PAD_LEFT);
        }
    }
} else {
    if ((substr($numero, 0, 2) === '34' || substr($numero, 0, 2) === '37' || substr($numero, 0, 6) === '377481') && strlen($cvv) !== 4) {
        sendMessage2($chat_id, "<b>CVV format is incorrect for AMEX cards. It must be 4 digits.</b>", $messageidtogen);
        return;
    }
    $cvvs = array_fill(0, 10, $cvv);
}

        $ccs = array();
        for ($i = 0; $i < 10; $i++) {
            if (empty($anio) && !$fecha_completa) {
                $anio_gen = mt_rand(2024, date('Y') + 10);
            } else {
                $anio_gen = $anio;
            }

            $tarjeta = cc_gen($numero, $mes, $anio_gen, $cvvs[$i]);
            $ccs[] = $tarjeta[0];
        }
    }

    $formatted_ccs = "";

    if (count($ccs) > 0) {
    $formatted_ccs .= "<code>";
    foreach ($ccs as $tarjeta) {
        $formatted_ccs .= "{$tarjeta}\n";
    }
    $formatted_ccs .= "</code>\n";
}



$numero = substr($numero, 0, 6);

    

    $fim = json_decode(file_get_contents('https://bins.antipublic.cc/bins/' . $numero), true);
    $bin = $fim["bin"] ?? null;

    if ($bin !== null) {
        $brand = $fim["brand"];
        $country = $fim["country"];
        $country_name = $fim["country_name"];
        $country_flag = $fim["country_flag"];
        $country_currencies = $
        $bank = $fim["bank"];
        $level = $fim["level"];
        $type = $fim["type"];


$sendgen = "<b>♻️ Here are your cards lolicon</b>";

$sendgen1 = ("
- - - - - - - - - - - - - - - - - - - - -
$formatted_ccs- - - - - - - - - - - - - - - - - - - - -");
$sendgen2 = ("<b>
[ϟ] Bin: <code>$bin</code>
[ϟ] Info: <code>$level - $type [$country_flag]</code>
[ϟ] Bank: <code>$bank</code>
[ϟ] Country: <code>$country_name - $country</code>
[ϟ]Req: @$username <b>[$rank]</b>
[ϟ] Dev: <code>@AY_4N</code>
</b>");


$fullgen = $sendgen . "\n" . $sendgen1 . "\n" . $sendgen2;


        bot('editMessageText', [
    'chat_id' => $cchatid2,
    'message_id' => $cmessage_id2,
    'text' => $fullgen,
    'parse_mode' => 'html',
    'reply_to_message_id' => $messageidtogen,
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [['text' => "Gen Again", 'callback_data' => "regen"], ['text' => "Format Mass", 'callback_data' => "showmass"]],
            [['text' => "Clean", 'callback_data' => "deletegen"]],
        ],
    ]),
]);

    }else {
      
        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $messageidtogen,
            'text' => "<i>❌ BIN inválido. No se encontró información para el BIN:</i> <code>$numero</code>",
            'reply_to_message_id' => $messageidtogen,
            'parse_mode' => 'html'
        ]);
    }
          }