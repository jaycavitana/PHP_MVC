<?php
    function save_driver($driver_id){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => FIREBASE_URL.'drivers.json',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\r\n      \"driver_id\": $driver_id,\r\n      \"current_long\": 0.0,\r\n      \"current_lat\": 0.0\r\n}\r\n",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    function get_driver_loc($driver_firebaseID){
        $url = FIREBASE_URL."drivers/".$driver_firebaseID.".json";  
        $response = (file_get_contents($url)); //Converting in json string
        $r_array = json_decode($response, true);
        return array($r_array['current_lat'], $r_array['current_long']);
    }