<?php
    require 'php-jwt-master/src/JWT.php';

    use \Firebase\JWT\JWT;

    function getEmailFromToken($jwt, $key){
        try{
            $obj = JWT::decode($jwt, $key, array('HS256'));
            if(is_object($obj)){
                return $obj->data->email;
            }
            else{
                 return '';
            }
        }
        catch(Exception $e){
            return '';
        }
    }

    function getClientIDFromToken($jwt, $key){
        try{
            $obj = JWT::decode($jwt, $key, array('HS256'));
            if(is_object($obj)){
                return $obj->data->client_id;
            }
            else{
                 return '';
            }
        }
        catch(Exception $e){
            return '';
        }
    }
    
    function getAdminIDFromToken($jwt, $key){
        try{
            $obj = JWT::decode($jwt, $key, array('HS256'));
            if(is_object($obj)){
                return $obj->data->admin_id;
            }
            else{
                 return '';
            }
        }
        catch(Exception $e){
            return '';
        }
    }

    function isNotExpired($jwt, $key){
        try{
            $obj = JWT::decode($jwt, $key, array('HS256'));
            $exp_date = date("Y-m-d H:i:s", $obj->exp);
            $today = date("Y-m-d H:i:s");

            return $exp_date > $today;
        }
        catch(Exception $e){
            return false;
        }
    }

    function getToken(){
        $token = null;
        $headers = apache_request_headers();
        if(isset($headers['Authorization'])){
            return str_replace("Bearer ", "", $headers['Authorization']);
        } 
        else{
            return null;
        }
    }

    function generateJWT($email, $client_id, $secret_key){
        $issuer_claim = "GROWAPP"; // this can be the servername
        $audience_claim = "THE_AUDIENCE";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + (60 * 60 * 24); // expire time in seconds (1 day)
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "email" => $email,
                "client_id" => $client_id
                )
            );

        $jwt = JWT::encode($token, $secret_key);

        return $jwt;
    }

    function generateAdminJWT($email, $admin_id, $secret_key){
        $issuer_claim = "GROWAPP"; // this can be the servername
        $audience_claim = "THE_AUDIENCE";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + (60 * 60 * 24); // expire time in seconds (1 day)
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "email" => $email,
                "admin_id" => $admin_id
                )
            );

        $jwt = JWT::encode($token, $secret_key);

        return $jwt;
    }