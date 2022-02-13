<?php

class Cookie
{
    public static function SetCookie(string $key, $value)
    {
        setcookie($key, $value, time() + 7200);
    }
    public static function GetCookieByKey(string $key){
        return $_COOKIE[$key];
    }
}