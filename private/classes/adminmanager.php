<?php
final class AdminManager
{
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function accept_user($user_id)
    {
        $this->db->query("UPDATE users SET is_accepted = 1 WHERE id = '" . $this->db->real_escape_string($user_id) . "';");
    }
}
