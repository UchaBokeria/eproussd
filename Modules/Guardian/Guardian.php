<?php

class Guardian 
{

    public function checkToken()
    {

        //echo hash('sha512', password_hash(AUTH_KEYWORD, PASSWORD_BCRYPT, HASH_OPTION));
        return ($_SERVER["HTTP_TOKEN"] == AUTH_KEYWORD);

    }

    private function getAuthorizationHeader(){
        $headers = null;
        
        if (isset($_SERVER['Authorization'])) $headers = trim($_SERVER["Authorization"]);
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            if (isset($requestHeaders['Authorization'])) $headers = trim($requestHeaders['Authorization']);
        }

        return $headers;
    }

    private function getBearerToken() {
        $headers = $this->getAuthorizationHeader();
        if (!empty($headers)) 
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) return $matches[1];
        return null;
    }

}