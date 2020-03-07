<?php
//$access_token = 'LINE_token_ID';    //PUT LINE token ID at "Channel access token (long-lived)"
$access_token = 'LhqxoYZGcBr8E19IgnjYeGUvulypWpyF0KrX8SEZh00yA9Jpl81qp1ePaIAhe/hJXvxW6r4HzN2x9AvqBU00hnmaiLaMd0DsACDFR1po1HijunA+664z7qwy2EUuaAvx099NbGi//uchdGrVaz1ZKQdB04t89/1O/w1cDnyilFU=';    //PUT LINE token ID at "Channel access token (long-lived)"
$url = 'https://api.line.me/v1/oauth/verify';
$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
