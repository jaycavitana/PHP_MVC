<?php
    function send_otp($number, $message){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.semaphore.co/api/v4/messages?apikey=".SEMAPHORE_APIKEY."&number=".$number."&message=".$message."&sendername=".SEMAPHORE_SENDERNAME,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "Cookie: XSRF-TOKEN=eyJpdiI6IldEc3l6aFY0Y3VXVlY4TlRsZHMrOXc9PSIsInZhbHVlIjoiSU9ibysxVmVQN1o2a1g0MVVEWU1EY1BackVLYVlCK3QxbjlqVVwvbDVVKzZzRlhZYTJQa01rOEhMQjJtVDNOelpRR1ozM2MzaWJwOFk1ZTFCaCtkRExRPT0iLCJtYWMiOiIwMmQzMTE3NGY2YmU2NTU5MDZkZDZiN2E2MzI5YWRkNTNhMjUzODQxNDU1MDRkYTgzOTgwMmQzY2ZiYTIyZDY4In0%3D; laravel_session=eyJpdiI6IjhNZ05qUzZCVHIzSmtjbWZTRGYxQ0E9PSIsInZhbHVlIjoiMUpuN1ZlekxrdDErVlFCVzZUSnRWUlV2akpHcjZoK1wvS29RazRRVVBOeVZjclBlNlhhTG5pY09RaGRiTmhlTCtjOVJXdFVpYk5BUmJMZ1JpWVZ3QThRPT0iLCJtYWMiOiJhM2Q4MDNhMDI2MGMyZGYyZTQyMTQwMjQ3YmQ1NTZmYzNlODBhMmU3ZGUyNTVlZjQyMjMxY2VhYzJhMWJmZGIzIn0%3D"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
    }