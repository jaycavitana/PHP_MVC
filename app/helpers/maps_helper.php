<?php
   function is_within_radius($checkpoint, $centerpoint, $km){
      $ky = 40000 / 360;
      $kx = cos(M_PI * $centerpoint[0] / 180.0) * $ky;
      $dx = abs($centerpoint[1] - $checkpoint[1]) * $kx;
      $dy = abs($centerpoint[0] - $checkpoint[0]) * $ky;
      return sqrt($dx * $dx + $dy * $dy) <= $km;
   } 

   function get_transaction_amount($checkpoint, $centerpoint, $starting_price, $succeeding){
      $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$centerpoint[0].','.$centerpoint[1]."&destinations=".$checkpoint[0].','.$checkpoint[1]."&mode=driving&key=".MAPS_API_KEY;  
      $response = (file_get_contents($url)); //Converting in json string
      $r_array = json_decode($response, true);
      $km = $r_array['rows'][0]['elements'][0]['distance']['text'];
      $km = (int)str_replace(" km", "", $km);
     
      if($km < 2){
         $km = 2;
      }
      $amount = (($km - 2) * $succeeding) + $starting_price; 

      return $amount;
   }

   function get_distance($checkpoint, $centerpoint){
      $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$centerpoint[0].','.$centerpoint[1]."&destinations=".$checkpoint[0].','.$checkpoint[1]."&mode=driving&key=".MAPS_API_KEY;  
      $response = (file_get_contents($url)); //Converting in json string
      $r_array = json_decode($response, true);
      $km = $r_array['rows'][0]['elements'][0]['distance']['text'];
      $km = str_replace(" km", "", $km);
      return round($km);
   }

   function get_ETA($current_loc, $pickup_loc, $dropoff_loc){
      //from current_loc to pickup_loc
      $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$current_loc[0].','.$current_loc[1]."&destinations=".$pickup_loc[0].','.$pickup_loc[1]."&mode=driving&key=".MAPS_API_KEY;  
      $response = (file_get_contents($url)); //Converting in json string
      $r_array = json_decode($response, true);
      $mins = $r_array['rows'][0]['elements'][0]['duration']['text'];
      $current_to_pickup_mins = (int)str_replace(' mins', '', $mins);

      //from pickup_loc to dropoff_loc
      $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$pickup_loc[0].','.$pickup_loc[1]."&destinations=".$dropoff_loc[0].','.$dropoff_loc[1]."&mode=driving&key=".MAPS_API_KEY;  
      $response = (file_get_contents($url)); //Converting in json string
      $r_array = json_decode($response, true);
      $mins = $r_array['rows'][0]['elements'][0]['duration']['text'];
      $pickup_to_dropoff_mins = (int)str_replace(' mins', '', $mins);

      $eta = $current_to_pickup_mins + $pickup_to_dropoff_mins + 20; //20 minutes to do the buying and stuff

      return $eta;
   }
   
   function get_nearest_drivers($nearby_drivers_md, $centerpoint){
      //1. create an assoc array "id" => $distance
      $row = count($nearby_drivers_md);

      $distance_md_array = [];
      
      for ($i=0; $i < $row; $i++) { 
         $distance = get_distance($nearby_drivers_md[$i][1], $centerpoint);

         array_push($distance_md_array, array('id' => $nearby_drivers_md[$i][0], 'distance' => $distance, 'bookings' => (int)$nearby_drivers_md[$i][2], 'device_token' => $nearby_drivers_md[$i][3]));
      }

      //2. sort array based on distance and bookings
      usort($distance_md_array, function($a, $b) {
         if($a['distance'] == $b['distance']){
            return $a['bookings'] <=> $b['bookings'];
         }

         return $a['distance'] <=> $b['distance'];
      });
      
      //3. get first 5
      $first_five = array_slice($distance_md_array, 0, 5, true);

      //4. return an array of drivers id
      return $first_five;
   }