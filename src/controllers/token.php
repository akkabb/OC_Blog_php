<?php

class Token {    
    /**
     * Generate the token
     *
     * @return void
     */
    public static function generate() {
        return $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(6));
    }
    
    /**
     * Compare the two tokens found
     *
     * @param  mixed $token
     * @return void
     */
    public static function check($token) {
        if (isset($_SESSION['token']) && $token === $_SESSION['token']) {
            unset($_SESSION['token']);
            return true;
        }
    }
}