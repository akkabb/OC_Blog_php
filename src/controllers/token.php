<?php

class Token {
    public static function generate() {
        return $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(6));
    }

    public static function check($token) {
        if (isset($_SESSION['token']) && $token === $_SESSION['token']) {
            unset($_SESSION['token']);
            return true;
        }
    }
}