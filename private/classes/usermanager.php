<?php
final class UserManager
{
    public static function create($name, $email, $password)
    {
        // Hash password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        // TODO: implement this function
    }
    
    public static function is_logged_in()
    {
        // TODO: implement this function
        return false;
    }
    
    public static function log_in($email, $password)
    {
        // TODO: implement this function
    }
    
    public static function log_out()
    {
        // TODO: implement this function
    }
}
