<?php
 
$strAccessToken = 'LhqxoYZGcBr8E19IgnjYeGUvulypWpyF0KrX8SEZh00yA9Jpl81qp1ePaIAhe/hJXvxW6r4HzN2x9AvqBU00hnmaiLaMd0DsACDFR1po1HijunA+664z7qwy2EUuaAvx099NbGi//uchdGrVaz1ZKQdB04t89/1O/w1cDnyilFU=';
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}
else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร")
{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "นมสดครับ";
}
else if($arrJson['events'][0]['message']['text'] == "ทำอะไรได้บ้าง")
{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันสามารปิด-เปิดหลอดไฟได้ครับ คุณได้สั่ง เปิดไฟ หรือ ปิดไฟ";
}
else if($arrJson['events'][0]['message']['text'] == "เปิดไฟ")
{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "รับทราบ เปิดไฟแล้วครับ";
}
else if($arrJson['events'][0]['message']['text'] == "ปิดไฟ")
{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "รับทราบ ปิดไฟแล้วครับ";
}
else
{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง คุณต้องสั่ง เช่น ชื่ออะไร ทำอะไรได้บ้าง เป็นต้น";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>