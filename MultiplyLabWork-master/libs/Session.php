<?php
session_start();
class Session
{
    public static function SaveUser(User $user)
    {
        $_SESSION['user'] = $user;
    }

    public static function GetCurrentUser() : User
    {
        if (isset($_SESSION['user']))
            return $_SESSION['user'];
        throw new Exception("User is not exist");
    }
}