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
    
    public function block_user($user_id)
    {
        $this->db->query("UPDATE users SET is_blocked = 1 WHERE id = '" . $this->db->real_escape_string($user_id) . "';");
    }
    
    public function reject_delete_user($user_id)
    {
        $this->db->query("UPDATE users SET is_accepted = -1 WHERE id = '" . $this->db->real_escape_string($user_id) . "';");
    }
    
    public function unblock_user($user_id)
    {
        $this->db->query("UPDATE users SET is_blocked = 0 WHERE id = '" . $this->db->real_escape_string($user_id) . "';");
    }
}
