<?php
    namespace App\Core;
    class Security 
    {
        public static function sanitize($data) 
        {
            return htmlspecialchars(strip_tags($data));
        }

        public static function hash($password) 
        {
            return password_hash($password, PASSWORD_BCRYPT);
        }
    }