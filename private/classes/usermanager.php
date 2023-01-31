<?php
final class UserManager
{
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function create($name, $email, $password)
    {
        $errors = [];
        $result = $this->db->query("SELECT email FROM users WHERE email = '" . $this->db->real_escape_string($email) . "';");
        
        if ($result->num_rows > 0)
        {
            // Email is already taken
            array_push($errors, 'This email is already taken by another user.');
            
            return [
                'succeeded' => false,
                'errors' => $errors
            ];
        }
        
        // Hash password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $this->db->query("INSERT INTO users (id, name, email, password, moderator) VALUES (
            '" . guid() . "',
            '" . $this->db->real_escape_string($name) . "',
            '" . $this->db->real_escape_string($email) . "',
            '" . $password . "',
            0
        );");
        
        return ['succeeded' => true, 'errors' => $errors];
    }
    
    public function log_in($email, $password)
    {
        $result = $this->db->query("SELECT id, password FROM users WHERE email = '" . $this->db->real_escape_string($email) . "';");
        
        if ($result->num_rows != 1)
        {
            // User does not exist
            return false;
        }
        
        $user = $result->fetch_assoc();
        
        if (!password_verify($password, $user['password']))
        {
            // Incorrect password
            return false;
        }
        
        $_SESSION['user'] = $user['id'];
        return true;
    }
    
    public function log_out()
    {
        $_SESSION['user'] = null;
    }
    
    public function is_logged_in()
    {
        return isset($_SESSION['user']);
    }
}
