<?php
    function push_notif($notif_title, $notif_text, $devToken){

        $curl = curl_init();
        $serverKey = FIREBASE_SERVER_KEY;
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>"{\r\n   \"notification\": {\r\n   \t\t\"title\": \"$notif_title\",\r\n   \t\t\"text\": \"$notif_text\"\r\n   },\r\n   \"priority\": \"High\",\r\n   \"to\": \"$devToken\"\r\n}",
          CURLOPT_HTTPHEADER => array(
            "Authorization: key=$serverKey",
            "Content-Type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
        
    }