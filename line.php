<?php

function send_LINE($msg){
 $access_token = 'LhqxoYZGcBr8E19IgnjYeGUvulypWpyF0KrX8SEZh00yA9Jpl81qp1ePaIAhe/hJXvxW6r4HzN2x9AvqBU00hnmaiLaMd0DsACDFR1po1HijunA+664z7qwy2EUuaAvx099NbGi//uchdGrVaz1ZKQdB04t89/1O/w1cDnyilFU=';    //PUT LINE token ID at "Channel access token (long-lived)" 
 $messages = [
        'type' => 'text',
        'text' => $msg
      ];

      // Make a POST Request to Messaging API to reply to sender
      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        //'to' => 'LINE_ID',         //PUT LINE ID at "Your user ID"
        'to' => 'U308823ae8864eb049bff1c58d7e4c20c',         //PUT LINE ID at "Your user ID"
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);

      echo $result . "\r\n"; 
}

?>
