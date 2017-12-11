<?php

class Session {

    public static function init() {
        @session_start();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key = '') {
        if ($key != '')
            return $_SESSION[$key];
        else
            return $_SESSION;
    }
    
    public static function destroy() {
        session_destroy();
    }
    
}