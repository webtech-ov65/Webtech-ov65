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
            return ['succeeded' => false, 'errors' => $errors];
        }
        
        // Hash password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $this->db->query("INSERT INTO users (id, name, email, password, is_accepted, is_admin) VALUES (
            '" . guid() . "',
            '" . $this->db->real_escape_string($name) . "',
            '" . $this->db->real_escape_string($email) . "',
            '" . $password . "',
            0,
            0
        );");
        
        return ['succeeded' => true, 'errors' => $errors];
    }
    
    public function log_in($email, $password)
    {
        $errors = [];
        $result = $this->db->query("SELECT id, password, is_accepted FROM users WHERE email = '" . $this->db->real_escape_string($email) . "';");
        
        if ($result->num_rows != 1)
        {
            // User does not exist, mask where the problem lies
            array_push($errors, 'Incorrect email and password combination.');
            return ['succeeded' => false, 'errors' => $errors];
        }
        
        $user = $result->fetch_assoc();
        
        if (!password_verify($password, $user['password']))
        {
            // Incorrect password, mask where the problem lies
            array_push($errors, 'Incorrect email and password combination.');
            return ['succeeded' => false, 'errors' => $errors];
        }
        
        if (!$user['is_accepted'])
        {
            // User has not been accepted (yet)
            array_push($errors, 'Your account has not yet been accepted by an administrator.');
            return ['succeeded' => false, 'errors' => $errors];
        }
        
        $_SESSION['user'] = $user['id'];
        return ['succeeded' => true, 'errors' => $errors];
    }
    
    public function log_out()
    {
        $_SESSION['user'] = null;
    }
    
    public function is_admin()
    {
        if (!$this->is_logged_in())
        {
            return false;
        }
        
        $result = $this->db->query("SELECT is_admin FROM users WHERE id = '" . $this->db->real_escape_string($_SESSION['user']) . "';");
        
        if ($result->num_rows != 1)
        {
            return false;
        }
        
        $user = $result->fetch_assoc();
        return $user['is_admin'];
    }
    
    public function is_logged_in()
    {
        return isset($_SESSION['user']);
    }
}
